<div class="modal fade" tabindex="-1" role="dialog" id="myModalEdit">
  <div class="modal-dialog" role="document">
    <form>
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Client</h4>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" v-model="editClient.id" id="id" name="id">
          </div>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" v-model="editClient.name" id="name" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="apepat">Apepat</label>
            <input type="text" class="form-control" v-model="editClient.apepat" id="apepat" name="apepat" placeholder="Apepat">
          </div>
          <div class="form-group">
            <label for="apemat">Apemat</label>
            <input type="text" class="form-control" v-model="editClient.apemat" id="apemat" name="apepat" placeholder="Apemat">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" v-model="editClient.email" id="email" name="email" placeholder="Email">
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" @click="update(editClient.id)">Update</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
