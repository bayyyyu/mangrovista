 <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
     aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle">Preview Image</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <div class="modal-body d-flex justify-content-center align-items-center ">
                 <div id="image-container">
                     <img id="preview-image" style="height: 200px; width:200px; object-fit:cover; border-radius:50%"
                         src="#" alt="Preview">
                 </div>
             </div>
             <div class="modal-footer">
                 <button id="btnChooseAgain" type="button" class="btn btn-sm btn-secondary" style="float: left"
                     onclick="chooseAgain()">Pilih Ulang</button>
                 <button type="button" class="btn btn-sm btn-secondary"
                     onclick="document.getElementById('btnSubmit').click()">Simpan</button>
             </div>
         </div>
     </div>
 </div>
