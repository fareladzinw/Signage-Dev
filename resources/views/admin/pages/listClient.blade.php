@extends('admin.master')
@section('judul','List Client')
@section('titlePage','List Client')
@section('deskripsi','Table data Cliient Yang Terdaftar')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box">
    <div class="box-header">
        <div class="column">
            <div class="col-md-10">
                <section class="content-header" style="padding : 0;">
                    <h1>
                        Daftar Client
                    <small>Info Client</small>
                    </h1>
                </section>
            </div>
       </div>
</div>
<!-- /.box-header -->
    <div class="box-body">
      <table id="list-user" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nama</th>
          <th>Email</th>
          <th>Alamat</th>
          <th>No. HP</th>
          <th>Link Afiliasi</th>
          <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($client as $c)
        <tr>
          <td>{{$c->nama}}</td>
          <td>{{$c->email}}</td>
          <td>{{$c->alamat}}</td>
          <td>{{$c->hp}}</td>
          <td>{{$c->linkAfiliasi}}</td>
          <td>
              <div class="column">
                  <div class="col-md-6"><a href={{url('/admin/client/master-client/edit-data/'.$c->id)}}><button type="button" class="btn btn-block btn-success">Edit</button></a></div>
                  <div class="col-md-6"><a href="{{url('/admin/client/delete/master-client/'.$c->id)}}"><button type="button" class="btn btn-block btn-danger">Hapus</button></a></div>
              </div>
          </td>
        </tr>
        @endforeach
    </tbody>
  </table>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
@endsection

@section('js')
<script>
    $(function () {
      $('#list-user').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endsection