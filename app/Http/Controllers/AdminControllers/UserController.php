<?php

namespace App\Http\Controllers\AdminControllers;

use App\Models\User;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request)
    {
        $data['list_user'] = User::all();
        return view('Admin.User.index', $data);
    }
    function create()
    {

        return view('Admin.User.create');
    }
    public function store(Request $request)
    {
        $messages = [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah terdaftar.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Minimum Password 8 Karakter',
            // 'password.confirmed' => 'Konfirmasi password tidak cocok.',
            'role.required' => 'Role wajib dipilih.',
        ];

        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username',
            'email' => 'required|string|email|max:255|unique:user,email',
            'role' => 'required|string|in:admin,pengguna,penyelenggara',
            'password' => 'required|string|min:8'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proses penyimpanan data
        $user = new User();
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->role = $request->input('role');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        if ($request->hasFile('foto_profil')) {
            $user->handleUploadFoto();
        }

        return redirect('Admin/User')->with('success', 'Data Berhasil Ditambahkan');
    }

    function show($id)
    {
        $user = User::find($id);
        $list_event = Event::where('user_id', $user->id)->get();

        // $data['user'] = $user;
        $data = [
            'user' => $user,
            'list_event' => $list_event,

        ];
        return view('Admin.User.show', $data);
    }
    
    function edit($id)
    {
        $user = User::find($id);
        $data['user'] = $user;
        return view('Admin.User.edit', $data);
    }
    // Controller untuk Update User
    public function update(Request $request, User $user)
    {
        // Pesan error dalam Bahasa Indonesia
        $messages = [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah terdaftar.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.min' => 'Password harus memiliki setidaknya 8 karakter.',
            'role.required' => 'Role wajib dipilih.',
        ];

        // Aturan validasi
        $validator = Validator::make($request->all(), [
            'nama_lengkap' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:user,username,' . $user->id,
            'email' => 'required|string|email|max:255|unique:user,email,' . $user->id,
            'role' => 'required|string|in:admin,pengguna,penyelenggara',
            'password' => 'nullable|string|min:8',
            'foto_profil' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi untuk foto profil
        ], $messages);

        // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan error
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Proses update data
        $user->nama_lengkap = $request->input('nama_lengkap');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->role = $request->input('role');

        // Jika ada password baru, encrypt dan simpan
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }

        // Jika ada file foto baru, panggil fungsi untuk meng-handle upload foto
        if ($request->hasFile('foto_profil')) {
            $user->handleUploadFoto();
        }

        // Simpan perubahan
        $user->save();

        // Redirect dengan pesan sukses
        return redirect('Admin/User')->with('success', 'Data Berhasil Diedit');
    }

    function destroy(User $user)
    {
        // $user->handleDelete();
        $user->delete();

        return redirect('Admin/User')->with('danger', 'Data Berhasil Dihapus');
    }
}
