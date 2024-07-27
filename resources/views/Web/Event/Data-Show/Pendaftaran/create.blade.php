<x-web.app-webNoSlider>
    <!-- CSS -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" href="wizard.css"> --}}

    <section class="testimonial-section padding-tb">
        <div class="container">
            <div class="row mb-15">
                <div class="col-12">
                    <div class="section-header">
                        <h3>Pendaftaran Peserta Event</h3>
                        <p>MangroVista</p>
                    </div>
                    <hr style="height:1px;border-width:0;color:#064635;background-color:#064635">
                    <div class="col-12">
                        <div class="testimonial-content">
                            <div class="row mb-2">
                                <div class="col-md-12 mt-2">
                                    <label for="" style="font-size: 12px">Nama</label>
                                    <input class="form-control form-control-sm" style="background-color: #06463548;" type="text" placeholder="{{ Auth::user()->nama_lengkap ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="" style="font-size: 12px">Email</label>
                                    <input class="form-control form-control-sm" type="text" style="background-color: #06463548;" placeholder="{{ Auth::user()->email ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="" style="font-size: 12px">No HP/Wa aktif</label>
                                    <input class="form-control form-control-sm" type="text" style="background-color: #06463548;" placeholder="{{ Auth::user()->no_telpon ?? '' }}" readonly>
                                </div>
                            </div>
                            <form action="{{ url('Event') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button class="btn btn-sm btn-outline-green float-right"><i class="fa fa-save"></i>
                                    Daftar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="wizard.js"></script>
    <style>
        .f1-steps {
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }

        .f1-progress {
            position: absolute;
            top: 24px;
            left: 0;
            width: 100%;
            height: 1px;
            background: #ddd;
        }

        .f1-progress-line {
            position: absolute;
            top: 0;
            left: 0;
            height: 1px;
            background: #338056;
        }

        .f1-step {
            position: relative;
            float: left;
            width: 25%;
            padding: 0 5px;
        }

        .f1-step-icon {
            display: inline-block;
            width: 40px;
            height: 40px;
            margin-top: 4px;
            background: #ddd;
            font-size: 16px;
            color: #fff;
            line-height: 40px;
            -moz-border-radius: 50%;
            -webkit-border-radius: 50%;
            border-radius: 50%;
        }

        .f1-step.activated .f1-step-icon {
            background: #fff;
            border: 1px solid #338056;
            color: #338056;
            line-height: 38px;
        }

        .f1-step.active .f1-step-icon {
            width: 48px;
            height: 48px;
            margin-top: 0;
            background: #338056;
            font-size: 22px;
            line-height: 48px;
        }

        .f1-step p {
            color: #ccc;
        }

        .f1-step.activated p {
            color: #338056;
        }

        .f1-step.active p {
            color: #338056;
        }

        .f1 fieldset {
            display: none;
            text-align: left;
        }

        .f1-buttons {
            text-align: right;
        }

        .f1 .input-error {
            border-color: #f35b3f;
        }

        .border-error {
            border: 1px solid #f35b3f;
        }
    </style> --}}

</x-web.app-webNoSlider>
