<div class="modal fade bd-example-modal-xl" id="dokumentasiModal" tabindex="-1" role="dialog"
    aria-labelledby="dokumentasiModalLabel">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dokumentasi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('Event', $event->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="repeater-custom-show-hide">
                        <div data-repeater-list="car">
                            <div data-repeater-item="" style="padding: 10px">
                                <div class="form-group row  d-flex align-items-end">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label class="form-label">File</label>
                                            <input type="file" name="file" class="form-control" />
                                        </div><!--end col-->
                                        <div class="col-md-12">
                                            <label class="form-label">Deskripsi</label>
                                            <textarea name="deskripsi" class="form-control"></textarea>
                                        </div><!--end col-->
                                        <div class="col-md-12 mt-2">
                                            <span data-repeater-delete="" class="btn"
                                                style="border: 1px solid red; color:red">
                                                <span class="far fa-trash-alt me-1"></span>
                                            </span>
                                        </div><!--end col-->
                                    </div>

                                </div><!--end row-->
                                <hr>
                            </div><!--end /div-->
                        </div><!--end repet-list-->
                        <div class="form-group row mb-0">
                            <div class="col-sm-12">
                                <span data-repeater-create="" class="btn"
                                    style="border: 1px solid rgb(0, 119, 255); color:rgb(0, 119, 255)">
                                    <span class="fa fa-plus"></span> Tambah
                                </span>

                            </div><!--end col-->
                        </div><!--end row-->
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-green" data-dismiss="modal">Tutup</button>
                    <button  class="btn btn-green">Simpan</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
