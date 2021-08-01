<!--Add Modal -->
<ng-template #InsertModal>
   <div class="modal fade" id="InsertModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content" >
            <div class="modal-header">
               <h5 class="modal-title" id="exampleModalLabel">INSERT WRITER</h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <form enctype="multipart/form-data" id="insertWriter" class="form-horizontal"
               action="{{route('admin.writer.store')}}" method="post">
               @csrf
               <div class="modal-body" style="overflow-y: auto; max-height: 400px; overflow-x:hidden" >
                  <div class="text-input">
                     <label for="input1" >Name</label>  
                     <input type="text" id="name_insert" class="form-control "  name="name" placeholder="Enter Name">
                  </div>
                  <div class="form-group">
                     <label for="Image" class="col-form-label form-control-label">Image</label>
                     <div class="file-upload">
                        <div class="image-upload-wrap">
                           <input class="file-upload-input" name="image" id="image_insert"
                              type='file' onchange="readURL(this);" accept="image/*" />
                           <div class="drag-text">
                              <h3>Drag and drop a file or select add Image</h3>
                           </div>
                        </div>
                        <div class="file-upload-content">
                           <img class="file-upload-image" src="#" alt="your image" />
                           <div class="image-title-wrap">
                              <button type="button" onclick="removeUpload()"
                                 class="remove-image">
                              Remove <span class="image-title">Uploaded Image</span>
                              </button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="text-input">
                     <label for="input1" >Description</label>    
                     <input type="text" id="desc_insert" class="form-control "  name="desc"  aria-label="With textarea">
                  </div>
                  <div class="text-input">
                     <label for="input1" >Facebook</label>         
                     <input type="text" id="facebook_insert" class="form-control "  name="facebook" placeholder="Enter fb link...">
                  </div>
                  <div class="text-input">
                     <label for="input1" >Twitter</label>     
                     <input type="text" id="twitter_insert" class="form-control "  name="twitter" placeholder="Enter twitter link...">
                  </div>
                  <div class="text-input">
                     <label for="input1" >Wiki</label>   
                     <input type="text" id="wiki_insert" class="form-control "  name="wiki" placeholder="Enter wiki link...">
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Save &nbsp;<i class="fa fa-save"></i></button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i
                     class="fa fa-times-circle"></i></button>
               </div>
            </form>
         </div>
      </div>
   </div>
</ng-template>