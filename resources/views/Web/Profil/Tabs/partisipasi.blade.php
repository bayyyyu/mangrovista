<link href="{{ url('/') }}/assets-admin/dastone/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
<div class="tab-content-item" id="Partisipasi-content" style="display:none;">
    @if ($partisipasiEvents->isEmpty())
        <div class="col-md-12" style="display: flex; justify-content: center; align-items: center; height: 60vh;">
            <div style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                <img src="{{ url('/') }}/assets-web2/assets/images/icon/empty.png"
                    style="width: 100px; height: 100px;" class="mb-3">
                <span class="text-dark">Opps!! Tampaknya kamu belum terdaftar dalam event manapun.</span>
                <p>Nikmati pengalaman baru dan bergabunglah dalam event yang menarik!</p>
                <a href="{{ url('Event') }}" class="btn btn-md button-transform button-border"
                    style="color: white; font-size:15px">Jelajahi Event</a>
            </div>
        </div>
    @else
        <div style="margin-bottom: 1rem">
            <div class="custom-select">
                <select class="select2 form-control mb-3" id="event-select">
                    <option style="font-size: 10px" value="0">---Pilih Event---</option>
                    @foreach ($partisipasiEvents as $partisipasi)
                        <option value="{{ $partisipasi->event->id }}">{{ $partisipasi->event->nama_event }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="riwayat-container">
            @foreach ($partisipasiEvents as $partisipasi)
                <div class="timeline" data-id="{{ $partisipasi->event->id }}">
                    <div class="timeline-container right">
                        <div class="content">
                            <div class="wrapper-timeline-year">
                                <h2 class="timeline-year">
                                    {{ $partisipasi->created_at->translatedFormat('d F Y') }}
                                </h2>
                                {{-- <span class="timeline-badge-orange">
                            Peserta Event
                        </span> --}}
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="timeline-info">
                                        Bergabung menjadi peserta dalam Event
                                        <a href="{{ url('Event', $partisipasi->event->id) }}" target="_blank"
                                            class="text-dark">
                                            {{ $partisipasi->event->nama_event }}</a>
                                    </p>
                                </div>
                                <div class="col-md-12">
                                    <div class="btn btn-sm btn-outline-green float-right" data-toggle="modal"
                                        data-target="#qrModal">
                                        <i class="icofont-qr-code"></i> Bukti Peserta
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    @endif
    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="qrModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Bukti Peserta Event</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body text-center">
                    @if (isset($partisipasi))
                        <img src="{{ route('generate.qr', ['id' => $partisipasi->id]) }}" alt="QR Code" />
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <style>
        .custom-select {
            top: 15px;
            left: 15px;
            width: 100%;
            z-index: 1000;
            background-color: white;
            border-radius: 5px;
            padding: 5px;
        }

        .custom-select,
        .custom-select select {
            box-sizing: border-box;
        }

        .select2-container {
            width: 100% !important;
        }

        .select2-container .select2-selection--single .select2-selection__rendered {
            font-size: 13px !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #43936C;
            color: white;
        }

        .riwayat-container {
            max-height: 400px;
            overflow-y: auto;
            overflow-x: hidden
        }

        .riwayat-container::-webkit-scrollbar {
            width: 5px;
        }

        .riwayat-container::-webkit-scrollbar-track {
            background: #b8b8b8;
            border-radius: 10px;
        }

        .riwayat-container::-webkit-scrollbar-thumb {
            background: #005E4E;
            border-radius: 10px;
        }

        .riwayat-container::-webkit-scrollbar-thumb:hover {
            background: #555;
        }

        .timeline {
            position: relative;
            width: 100%;
            max-width: 100%;
            margin: 0;

        }

        .right {
            left: 10px;
        }

        .timeline-container {
            padding: 10px 40px;
            position: relative;
            background-color: inherit;
            width: 100%;
        }

        .content {
            padding: 10px 30px;
            position: relative;
            background: #fff;
            border: 1px solid #d9d9d9;
            border-radius: 13px;
        }

        .wrapper-timeline-year {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
        }

        .timeline-year {
            font-style: normal;
            font-weight: 700;
            font-size: 18px;
            line-height: 42px;
            letter-spacing: .5px;
            color: #121212;
        }

        .timeline-badge-orange {
            background: #005E4E;
            border-radius: 100px;
            font-style: normal;
            font-weight: 700;
            font-size: 12px;
            line-height: 18px;
            letter-spacing: .3px;
            color: #fff;
            margin-left: 12px;
            padding: 6px 10px;
        }

        .section p,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            margin: 0;
            padding: 0;
        }

        .timeline-info {
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            letter-spacing: .3px;
            color: #616161;
            white-space: normal
        }

        .timeline-info a {
            font-style: normal;
            font-weight: 400;
            font-size: 16px;
            line-height: 24px;
            letter-spacing: .3px;
            color: #616161;
            text-decoration: underline !important
        }

        .right::after {
            left: 3px;
        }

        .timeline-container::after {
            content: "";
            position: absolute;
            width: 16px;
            height: 16px;
            right: -17px;
            background-color: #005e4e;
            border: 4px solid #005e4e;
            top: 42.5%;
            border-radius: 50%;
            z-index: 1;
        }

        .timeline::after {
            content: "";
            position: absolute;
            width: 2px;
            background-color: #d6e5e3;
            top: 0;
            bottom: 0;
            left: 20px;
        }
    </style>
</div>
<!-- jQuery harus dimuat terlebih dahulu -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Select2 dimuat setelah jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        // Inisialisasi Select2
        $('#event-select').select2();

        // Fungsi untuk menampilkan atau menyembunyikan card berdasarkan pilihan
        function filterEvent() {
            var selectedId = $('#event-select').val(); // Ambil nilai yang dipilih

            if (selectedId == "0") {
                // Jika opsi default dipilih, tampilkan semua card
                $('.timeline').show();
            } else {
                // Sembunyikan semua card terlebih dahulu
                $('.timeline').hide();

                // Tampilkan hanya card yang sesuai dengan ID yang dipilih
                $('.timeline[data-id="' + selectedId + '"]').show();
            }
        }

        // Ketika opsi pada Select2 berubah, panggil fungsi filter
        $('#event-select').change(function() {
            filterEvent();
        });

        // Panggil filter saat halaman dimuat untuk memastikan tampilan sesuai pilihan default
        filterLokasi();
    });
</script>
