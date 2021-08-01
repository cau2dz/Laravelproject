<!-- INSERT MODAL -->
<ng-template #InsertModal>
    <div class="modal fade" id="InsertModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Genre</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formInsert" class="form-horizontal" action="{{route('admin.genre.store')}}" method="post">
                    <div class="modal-body">
                        @csrf
                        <div class="text-input">
                         <input type="text" id="name_insert" class="form-control "  name="name" placeholder="Enter Name">
                             <label for="input1" >Name</label>                 
                   		 </div>
                        <div id="errors-name"></div>
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
