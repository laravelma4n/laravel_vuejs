<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <form @submit.prevent="store" method="post">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">New Client</h4>
        </div>
        <div class="modal-body">

          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" v-model="newClient.name" id="name" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label for="apepat">Apepat</label>
            <input type="text" class="form-control" v-model="newClient.apepat" id="apepat" name="apepat" placeholder="Apepat">
          </div>
          <div class="form-group">
            <label for="apemat">Apemat</label>
            <input type="text" class="form-control" v-model="newClient.apemat" id="apemat" name="apepat" placeholder="Apemat">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="text" class="form-control" v-model="newClient.email" id="email" name="email" placeholder="Email">
          </div>



        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
      </div><!-- /.modal-content -->
    </form>
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
