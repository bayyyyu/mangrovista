<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CheckEventOwner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $eventId = $request->route('event'); // Ambil parameter 'event' dari rute
        $event = Event::findOrFail($eventId);

        // Log untuk debugging
        log::info('Auth ID: ' . Auth::id());
        Log::info('Event User ID: ' . $event->user_id);

        // Periksa apakah pengguna adalah pemilik event
        if (Auth::id() !== $event->user_id) {
            // Jika bukan pemilik, arahkan ke halaman yang tidak diizinkan
            return redirect('403');
        }

        return $next($request);
    }
}
