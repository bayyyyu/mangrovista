<x-app>
    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <div class="row">
                    <div class="col">
                        <h4 class="page-title">Penanaman</h4>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">MangroVista</a></li>
                            <li class="breadcrumb-item active">Penanaman</li>
                        </ol>
                    </div><!--end col-->
                    <div class="col-auto align-self-center tab">
                        <a type="button" class="btn btn-outline-info btn-sm" data-bs-toggle="modal"
                            data-bs-target="#exampleModalLarge"><i data-feather="file-plus"
                                class="align-self-center icon-xs"></i>
                            Import
                        </a>
                        <a href="{{ url('Admin/Tanaman/create') }}" class="btn btn-sm btn-outline-primary">
                            <i data-feather="plus" class="align-self-center icon-xs"></i>
                            Tambah Penanaman
                        </a>

                    </div>
                    <!--end col-->
                </div><!--end row-->
            </div><!--end page-title-box-->
        </div><!--end col-->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="bg-primary">
                            <th width="10px" style="color:aliceblue">No</th>
                            <th width="150px" style="color:aliceblue">Aksi</th>
                            <th style="color:aliceblue">Sample</th>
                            <th style="color:aliceblue">Lokasi</th>
                            <th width="10" style="color:aliceblue">Status Penanaman</th>
                        </thead>
                        <tbody>

                            @foreach ($list_tanaman as $tanaman)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ url('Admin/Tanaman', $tanaman->id) }}"
                                                class="btn btn-outline-primary btn-sm"><i class="fa fa-info"></i></a>
                                            <a href="{{ url('Admin/Tanaman', $tanaman->id) }}/edit"
                                                class="btn btn-outline-warning btn-sm"><i data-feather="edit"
                                                    class="align-self-center icon-xs"></i></a>
                                            <x-button.delete id="{{ $tanaman->id }}" />
                                        </div>
                                    </td>
                                    <td>{{ $tanaman->sample }}</td>
                                    <td>{{ $tanaman->lokasi }}</td>
                                    <td>
                                        <span data-url="{{ url('Admin/Tanaman', $tanaman->id) }}"
                                            id="statusPenanaman_{{ $tanaman->id }}"
                                            data-original-value="{{ $tanaman->status_penanaman }}">{{ $tanaman->status_penanaman }}</span>
                                        <a onclick="editStatusPenanaman({{ $tanaman->id }})"><i class="fa fa-edit btn-xs"
                                                style="float: right; "></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.Tanaman.Modal.index')
    <script>
        function editStatusPenanaman(tanamanId) {
            var spanStatusPenanaman = document.getElementById('statusPenanaman_' + tanamanId);
            var currentStatusPenanaman = spanStatusPenanaman.textContent;
            var actionUrl = spanStatusPenanaman.dataset.url;

            var formHTML = `
        <form action="${actionUrl}" method="post">
            @csrf
            @method('PUT')
            <select name="status_penanaman" onchange="showButton(this)" data-tanaman-id="${tanamanId}" data-original-value="${currentStatusPenanaman}">
                <option value="baru ditanam" ${currentStatusPenanaman === 'baru ditanam' ? 'selected' : ''}>Baru Ditanam</option>
                <option value="hidup" ${currentStatusPenanaman === 'hidup' ? 'selected' : ''}>Hidup</option>
                <option value="mati" ${currentStatusPenanaman === 'mati' ? 'selected' : ''}>Mati</option>
            </select>
            <br>
            <div class="button-group pull-right">
                <a href="#" class="btn btn-sm btn-outline-danger mt-1" onclick="cancelEditStatusPenanaman(event, ${tanamanId})" >Batal</a>
                <button class="btn btn-sm btn-outline-success mt-1" type="submit" ><i class="fa fa-save"></i> Simpan</button>
            </div>
        </form>
        `;

            spanStatusPenanaman.innerHTML = formHTML;

            // Hilangkan tombol edit saat form muncul
            var editLink = spanStatusPenanaman.nextElementSibling;
            editLink.style.display = 'none';
        }

        function cancelEditStatusPenanaman(event, tanamanId) {
            event.preventDefault();

            var spanStatusPenanaman = document.getElementById('statusPenanaman_' + tanamanId);
            var originalValue = spanStatusPenanaman.dataset.originalValue;

            spanStatusPenanaman.innerHTML = originalValue;

            // Tambahkan kembali tombol Edit
            var editLink = spanStatusPenanaman.nextElementSibling;
            editLink.style.display = 'inline';

            // Hapus elemen form
            var formElement = spanStatusPenanaman.querySelector('form');
            if (formElement) {
                formElement.remove();
            }
        }
    </script>

</x-app>
