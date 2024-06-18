 <div class="modal fade bd-example-modal-lg" id="exampleModalLarge" tabindex="-1" role="dialog"
     aria-labelledby="myLargeModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header bg-info">
                 <h6 class="modal-title m-0" id="myLargeModalLabel">Import Data Penanaman</h6>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div><!--end modal-header-->
             <div class="modal-body">
                 <div class="container mt-3">
                     <form action="{{ url('Admin/Tanaman') }}" method="POST" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="" class="control-label">Event
                                         Penanaman</label>
                                     <select name="event_id" id="event_id"
                                         class="select2 form-control mb-3 custom-select"
                                         style="width: 100%; height:36px;">
                                         <option>--Pilih Event--</option>
                                         <br>
                                         @foreach ($list_event as $event)
                                             <option value="{{ $event->id }}">{{ $event->nama_event }}</option>
                                             <br>
                                         @endforeach
                                     </select>
                                     @if ($errors->any('nama_event'))
                                         <ul class="text-danger">
                                             @foreach ($errors->get('nama_event') as $error)
                                                 <li>{{ $error }}</li>
                                             @endforeach
                                         </ul>
                                     @endif
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label for="file">Pilih file Excel:</label>
                                     <input  accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"  type="file" name="file" class="form-control" required>
                                 </div>
                             </div>
                         </div>

                         <button type="submit" class="btn btn-outline-info">Import</button>
                     </form>
                 </div>


             </div><!--end modal-body-->
             <div class="modal-footer">
                 <button type="button" class="btn btn-soft-secondary btn-sm" data-bs-dismiss="modal">Close</button>
             </div><!--end modal-footer-->
         </div><!--end modal-content-->
     </div><!--end modal-dialog-->
 </div><!--end modal-->
