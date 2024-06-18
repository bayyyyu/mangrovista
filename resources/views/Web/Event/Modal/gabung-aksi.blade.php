<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <section class="testimonial-section mt-3">
                <div class="row mb-15">
                    <div class="col-12">
                        <div class="section-header">
                            <h6>Daftar</h6>
                            <p>Dengan mendaftar, kamu bisa berkontribusi nyata untuk pelestarian hutan dan lingkungan
                                dengan ikut melakukan penanaman bersama sahabat alam lainnya pada Event <span
                                    style="color:black; font-weight:bold">{{ $event->nama_event }}</span> ini.</p>
                        </div>
                        <hr style="height:1px;border-width:0;color:#064635;background-color:#064635">
                        <div class="testimonial-content">
                            <div class="row mb-2">
                                <div class="col-md-12 mt-2">
                                    <label for="" style="font-size: 12px">Nama</label>
                                    <input class="form-control form-control-sm" style="background-color: #06463548;"
                                        type="text" placeholder="{{ Auth::user()->nama_lengkap ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="" style="font-size: 12px">Email</label>
                                    <input class="form-control form-control-sm" type="text"
                                        style="background-color: #06463548;"
                                        placeholder="{{ Auth::user()->email ?? '' }}" readonly>
                                </div>
                                <div class="col-md-6 mt-2">
                                    <label for="" style="font-size: 12px">No HP/Wa aktif
                                        @if (empty(Auth::user()->no_telpon))
                                            <a href="{{ url('Profil#pengaturan') }}"><span style="color:red;">(Isi nomor
                                                    telepon terlebih dahulu)</span></a>
                                        @endif
                                    </label>
                                    <input class="form-control form-control-sm" type="text"
                                        style="background-color: #06463548;"
                                        placeholder="{{ Auth::user()->no_telpon ?? '' }}" readonly>
                                </div>
                            </div>
                            <form action="{{ url('Event') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="event_id" value="{{ $event->id }}">
                                <button class="btn btn-sm btn-outline-green float-right"
                                    @if (empty(Auth::user()->no_telpon)) disabled @endif>
                                    Daftar Sekarang
                                </button>
                            </form>
                            <button class="btn btn-sm btn-outline-danger float-right mr-2" data-dismiss="modal">
                                Batal
                            </button>

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
