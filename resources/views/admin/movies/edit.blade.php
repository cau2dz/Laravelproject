<ng-template #EditModal>
   <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <form method="POST" id="formEditMovie" enctype="multipart/form-data" style="background:	#F0F8FF;">
               @csrf
               @method('PUT')
               <div class="modal-header">
                  <h5 class="modal-title">Edit Movie</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
               <div class="modal-body" style="overflow-x:hidden;overflow: auto;max-height: 450px">
                  <div class="form-group">
                     <label>Name</label>
                     <input id="name_edit" type="text" class="form-control" name="name">
                  </div>
                  <div class="form-group">
                     <label for="Image" class="col-form-label form-control-label">Image</label>
                     <div class="file-upload">
                        <div class="image-upload-wrap">
                           <input class="file-upload-input" name="image" id="store-image"
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
                  <div class="form-group">
                     <label>Genre</label>
                     <select name="genre_id" id="genre_edit" class="form-control">
                        @foreach($genres as $key => $genre)
                        <option value="{{$genre->id}}">{{$genre->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Director</label>
                     <select name="director_id" id="director_edit" class="form-control">
                        @foreach($directors as $key => $director)
                        <option value="{{$director->id}}">{{$director->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Writer</label>
                     <select name="writer_id" id="writer_edit" class="form-control">
                        @foreach($writers as $key => $writer)
                        <option value="{{$writer->id}}">{{$writer->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Year</label>
                           <select name="year" id="year_edit" class="form-control">
                              @foreach($arr_year as $key => $year)
                              <option value="{{$year}}">{{$year}}</option>
                              @endforeach
                           </select>
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="form-group">
                           <label>Description</label>
                           <textarea id="desc_edit" name="desc" class="form-control" aria-label="With textarea"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-4">
                        <div class="form-group">
                           <label>Keyword</label>
                           <input id="keyword_edit" type="text" class="form-control" name="keyword">
                        </div>
                     </div>
                     <div class="col-md-8">
                        <div class="form-group">
                           <label>Video link</label>
                           <input id="video_link_edit" type="text" class="form-control" name="video_link">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Status</label>
                           <select name="premiere" id="premiere_edit" class="form-control">
                              <option value="1">New</option>
                              <option value="0">Old</option>
                           </select>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label>Quality</label>
                           <input id="quality_edit" type="text" class="form-control" name="quality">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3">
                        <div class="form-group">
                           <label>Age limit</label>
                           <input id="age_limit_edit" type="text" class="form-control" name="age_limit">
                        </div>
                     </div>
                     <div class="col-md-9">
                        <div class="form-group">
                           <label>Country</label>
                           <input id="country_edit" type="text" class="form-control" name="country">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                  	<div class="col">
                        <p class="mb-2">Show Menu</p>
                      <label class="toggle-switch toggle-switch-success">
                        <input type="checkbox" id="onoffishide" value="" name="onoffishide">
                        <span id="ishide" class="toggle-slider round"></span>
                      </label>                      
                    </div>
                  </div>
               </div>
               <div class="modal-footer">
                  <button type="submit" name="upload" id="btnUpdate" class="btn btn-success">Save &nbsp;<i
                     class="fa fa-save"></i></button>
                  <button type="button" class="btn btn-danger" data-dismiss="modal">Close &nbsp;<i
                     class="fa fa-times-circle"></i></button>
               </div>
            </form>
         </div>
      </div>
   </div>
</ng-template>