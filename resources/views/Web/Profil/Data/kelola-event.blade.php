@php
    $tanggalEvent = new DateTime($event->tanggal_event);
    $sekarang = new DateTime();
    $selisih = $sekarang->diff($tanggalEvent);
    $hari = $selisih->days;
    $jumlah_peserta = $event->peserta_count;
    $target_peserta = $event->target_peserta;
    $percentage = $target_peserta > 0 ? ($jumlah_peserta / $target_peserta) * 100 : 0;
    $maxLength = 45;
    $nama_event = nl2br($event->nama_event);
    if (strlen($nama_event) > $maxLength) {
        $nama_event = substr($nama_event, 0, $maxLength) . '...';
    }

    // status
    $now = \Carbon\Carbon::now();
    $tanggal_event = \Carbon\Carbon::parse($event->tanggal_event);
    $tanggal_selesai = \Carbon\Carbon::parse($event->tanggal_selesai);
    $status = '';
    $statusClass = '';

    if ($now->gt($tanggal_selesai)) {
        $status = 'Selesai';
        $statusClass = 'badge-danger';
    } elseif ($now->between($tanggal_event, $tanggal_selesai)) {
        $status = 'Berlangsung';
        $statusClass = 'badge-primary';
    } else {
        $status = 'Aktif';
        $statusClass = 'badge-success';
    }
@endphp
<div class="col-md-4 py-2">
    <div class="card hover-img overflow-hidden rounded-2">
        <div class="card-body p-0 d-flex flex-column">
            <div class="card-image-container">
                <img src="{{ asset($event->foto) }}" alt="" class="img-fluid"
                    style="height: 150px; width: 100%; object-fit:cover">
                <!-- Badge sebagai overlay -->
                <span class="badge {{ $statusClass }} badge-overlay">{{ $status }}</span>
            </div>
            <div class="p-2 flex-grow-1 d-flex flex-column">
                <a href="{{ url('Event', $event->id) }}" class="d-flex flex-column flex-grow-1">
                    <h3 style="font-size: 16px; color:#090909; white-space:wrap" class="fw-semibold mb-0 fs-4">
                        {!! $nama_event !!}
                    </h3>
                </a>
                <span class="text-dark" style="font-size:12px; padding-block:10px;">
                    Lokasi: <span class="text-bold"
                        style="text-decoration: underline">{{ $event->lokasi->nama_lokasi }}</span>
                </span>

                <div class="wrapper-event-info mt-auto">
                    <p class="event-info">
                        <strong> {{ $jumlah_peserta }}</strong>
                        Peserta Mendaftar
                    </p>
                    <p class="event-info">
                        Maks. Peserta
                        <strong>{{ $target_peserta }}</strong>
                    </p>
                </div>
                <div class="progress-container" style="margin-top: -15px">
                    <div class="progress custom-progress">
                        <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%;"
                            aria-valuenow="{{ $jumlah_peserta }}" aria-valuemin="0"
                            aria-valuemax="{{ $target_peserta }}">
                            <div class="content-progress"></div>
                        </div>
                    </div>
                </div>
                <div style="display: flex; gap:5px">
                    {{-- <a href="{{ url('Event', $event->id) }}"
                                        class="btn btn-outline-green btn-xs rounded">Lihat
                                        Detail</a> --}}
                    <a href="{{ url('Event', $event->id) }}/edit" class="btn btn-outline-green btn-xs rounded">Edit</a>
                    @if ($event->tanggal_selesai < now())
                        <a href="{{ url('Event', $event->id) }}/monitoring"
                            class="btn btn-outline-green btn-xs rounded">Monitoring</a>
                        <a href="{{ url('Event', $event->id) }}/dokumentasi"
                            class="btn btn-outline-green btn-xs rounded">Dokumentasi</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
