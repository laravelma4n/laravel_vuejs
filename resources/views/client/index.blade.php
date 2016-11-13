@extends('layout.master')
@section('header-menu')
  <li ><a href="#">Home</a></li>
  <li class="active"><a href="#">Client</a></li>
@endsection
@section('header-content')
  List all Clients
@endsection
@section('center-content')
  <button class="btn btn-danger" data-toggle="modal" data-target="#myModal">New User</button>
  <table class="table table-striped">
    <thead>
      <th>#</th>
      <th>Name</th>
      <th>Apepat</th>
      <th>Apemat</th>
      <th>Email</th>
      <th>Actions</th>
    </thead>
    <tbody>
      <tr v-for="client in clients">
        <td>@{{ client.id }}</td>
        <td>@{{ client.name}}</td>
        <td>@{{ client.apepat }}</td>
        <td>@{{ client.apemat }}</td>
        <td>@{{ client.email }}</td>
        <td>
          <button class="btn btn-primary btn-xs" @click="delete(client.id)">Del</button>
          <button class="btn btn-success btn-xs" @click="edit(client.id)" data-toggle="modal" data-target="#myModalEdit">Edit</button>
        </td>
      </tr>


    </tbody>
  </table>
  @include('client.create')
  @include('client.edit')
@endsection

@section('scripts')
  <script type="text/javascript">
  Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('content');
  new Vue({
    el: '#app',
    data:{
      newClient: {
        id: '',
        name: '',
        apepat: '',
        apemat: '',
        email:''
      },
      editClient:{
        id:'',
        name:'',
        apepat:'',
        apemat:'',
        email:''
      }
    },
    ready: function () {
      this.list()
    },
    methods: {
      /* LIST ALL CLIENTS */
      list: function () {
        this.$http.get('/api/client').then((response) => {
          this.$set('clients', response.body.clients)
          //console.log(response.body.clients)
        }, (response) => {
          console.log("errors"+response)
        });
      },
      /* CREATE NEW CLIENT */
      store: function () {
        var client=this.newClient
        this.newClient={
          name:'',
          apepat:'',
          apemat:'',
          email:''
        }
        this.$http.post('/api/client/',client).then(function (response) {
          console.log(response)
          this.list()
          $('#myModal').modal('hide')
        }, function (response) {
          console.log(response)
        });

      },
      /* EDIT CLIENT */
      edit: function(id){
        this.$http.get('/api/client/'+id+'/edit').then((response) => {
          //  this.$set('clients', response.body.clients)
          this.editClient.id=response.body.client.id
          this.editClient.name=response.body.client.name
          this.editClient.apepat=response.body.client.apepat
          this.editClient.apemat=response.body.client.apemat
          this.editClient.email=response.body.client.email
          console.log(response.body.client)
          //console.log(response.body.clients)
        }, (response) => {
          console.log("errors"+response)
        });



      },
      /* UPDATE CLIENT */
      update: function (id) {
        var client=this.editClient
        this.editClient={
          name:'',
          apepat:'',
          apemat:'',
          email:''
        }

        this.$http.patch('/api/client/'+id,client).then((response) => {
          this.list()
          $('#myModalEdit').modal('hide')
        }, (response) => {
          console.log("errors"+response)
        });

      },
      /* DELETE CLIENT */
      delete: function (id) {
        this.$http.delete('/api/client/'+id).then(function (response) {
          console.log(response.status)
          this.list()
        }, function (response) {
          console.log(response)
        });

      },
    }

  });
  </script>
@stop
