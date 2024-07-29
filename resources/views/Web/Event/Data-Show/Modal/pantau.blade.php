<div class="modal fade" id="pantauModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="modal-title" style="text-align: center" id="exampleModalLongTitle">Data Penanaman Pada Event
                    <span class="text-bold"
                        style="color: black; text-decoration:underline">{{ $event->nama_event }}</span>
                </p>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row" style="padding:10px 10px 40px 10px">
                    <div class="col-sm-4 col-xs-6 text-center" style="padding-top:20px">
                        <img class="img img-responsive lazy" style="width: 100px; margin: 0px auto; display: block;"
                            src="{{ url('/') }}/assets-web2/assets/images/icon/pohon-ditanam.png">
                        <p class="text-dark">Jumlah Pohon Ditanam</p>
                        <p class="text-bold text-dark">{{ $event->tanaman_event->jumlah_pohon }} pohon</p>
                    </div>
                    <div class="col-sm-4 col-xs-6 text-center" style="padding-top:20px">
                        <img class="img img-responsive lazy" style="width: 100px; margin: 0px auto; display: block;"
                            src="{{ url('/') }}/assets-web2/assets/images/icon/leaf.png">
                        <p class="text-dark">Jenis Pohon Ditanam</p>
                        <p class="text-bold text-dark">
                            @foreach (explode(',', $event->tanaman_event->jenis_pohon) as $jenisPohon)
                                {{ $jenisPohon }}@if (!$loop->last)
                                    ,
                                @endif
                            @endforeach
                        </p>
                    </div>
                    <div class="col-sm-4 col-xs-6 text-center" style="padding-top:20px">
                        <img class="img img-responsive lazy" style="width: 100px; margin: 0px auto; display: block;"
                            src="{{ url('/') }}/assets-web2/assets/images/icon/age.png">
                        <p class="text-dark">Umur Bibit Tanaman</p>
                        <p class="text-bold text-dark">{{ $event->tanaman_event->umur_bibit }} Bulan</p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
