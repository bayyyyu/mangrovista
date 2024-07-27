 <div id="telahSelesai" class="tabcontent" style="display: none;">
     <div class="shop-product-wrap grids row ">
         @if ($list_event_telah_selesai->isEmpty())
             <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; height: 60vh;">
                 <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                     <img src="{{ url('/') }}/assets-web2/assets/images/icon/empty.png"
                         style="width: 100px; height: 100px;" class="mb-3">
                     <span class="text-dark">Tidak Ada Data Event Telah Selesai.</span>
                     <a href="{{ url('Event') }}" class="btn btn-md button-transform button-border"
                         style="color: white; font-size:15px">Jelajahi Event</a>
                 </div>
             </div>
         @else
             @foreach ($list_event_telah_selesai->where('tanggal_selesai', '<', now()) as $event)
                 <div class="col-md-6 col-lg-3">
                     <div class="card hover-img overflow-hidden rounded-2">
                         <div class="card-body p-0">
                             <a href="{{ url('Event', $event->id) }}">
                                 <img src="{{ asset($event->foto) }}" alt="" class="img-fluid objectfit-cover"
                                     style="height: 150px; width: 400px; object-fit:cover">
                                 <div class="p-4 " style="height: 65px">
                                     <h3 style="font-size: 16px; color:#090909;" class="fw-semibold mb-0 fs-4">
                                         @php
                                             $maxLength = 48;
                                             $nama_event = nl2br($event->nama_event);
                                             if (strlen($nama_event) > $maxLength) {
                                                 $nama_event = substr($nama_event, 0, $maxLength) . '...';
                                             }
                                         @endphp
                                         {!! $nama_event !!}
                                     </h3>
                                 </div>
                                 <span class="text-dark" style="padding-inline: 24px; font-size:12px;">
                                     Penyelenggara: {{ $event->user->nama_lengkap }}
                                 </span>
                                 @php
                                     $tanggalEvent = new DateTime($event->tanggal_event);
                                     $sekarang = new DateTime();
                                     $selisih = $sekarang->diff($tanggalEvent);
                                     $hari = $selisih->days;
                                     $jumlah_peserta = $event->peserta_count;
                                     $target_peserta = $event->target_peserta;
                                     $percentage = $target_peserta > 0 ? ($jumlah_peserta / $target_peserta) * 100 : 0;
                                 @endphp
                                 <div class="wrapper-event-info">
                                     <p class="event-info">
                                         <strong>max. Peserta</strong>
                                         {{ $target_peserta }}
                                     </p>
                                     <p class="event-info">
                                         Telah Berakhir
                                     </p>
                                 </div>
                                 <div class="progress-container">
                                     <div class="progress custom-progress">
                                         <div class="progress-bar " role="progressbar"
                                             style="width: {{ $percentage }}%;" aria-valuenow="{{ $jumlah_peserta }}"
                                             aria-valuemin="0" aria-valuemax="{{ $target_peserta }}">
                                             <div class="content-progress">

                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </a>
                         </div>
                     </div>
                 </div>
             @endforeach
         @endif
     </div>
     <br>
 </div>
