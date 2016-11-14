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
      <th>Country</th>
      <th>Actions</th>
    </thead>
    <tbody>
      <tr v-for="client in clients">
        <td>@{{ client.id }}</td>
        <td>@{{ client.name}}</td>
        <td>@{{ client.apepat }}</td>
        <td>@{{ client.apemat }}</td>
        <td>@{{ client.email }}</td>
        <td>@{{ client.country.name }}</td>

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
        email:'',
        country_id:''
      },
      editClient:{
        id:'',
        name:'',
        apepat:'',
        apemat:'',
        email:'',
        country_id:''
      },
      countries:[]
    },
    ready: function () {
      this.list(),
      this.list_countries()
    },
    methods: {
      /* LIST ALL CLIENTS */
      list: function () {
        this.$http.get('/api/client').then((response) => {
          //console.log(response)
          this.$set('clients', response.body.clients)
          //console.log(response.body.clients)
        }, (response) => {
          console.log("errors"+response)
        });
      },
      list_countries: function () {
        this.$http.get('/api/country').then((response) => {
          this.$set('countries', response.body.countries)
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
          email:'',
          country_id:''
        }
        //console.log(client);
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
          this.editClient.id=response.body.client.id
          this.editClient.name=response.body.client.name
          this.editClient.apepat=response.body.client.apepat
          this.editClient.apemat=response.body.client.apemat
          this.editClient.email=response.body.client.email
          this.editClient.country_id=response.body.client.country_id
          console.log(response.body.client)
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
          email:'',
          country_id:''
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
