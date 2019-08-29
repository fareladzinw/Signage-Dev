@extends('admin.master')

@section('titlePage','Setup Playlist')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Setup Playlist
                  <small>Table data Playlist</small>
                </h1>
              </section>
        </div>
      <div class="col-md-2"><a href="{{url('/admin/player/master-player/add-data')}}"><button  type="button" class="btn btn-block btn-danger">Tabmbah Data</button></a></div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="master-player" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID</th>
          <th>Player</th>
          <th>File Media</th>
          <th>Duration</th>
          <th>Layout</th>
          <th>Status Loop</th>
          <th>Status Media</th>
          <th>Kategori</th>
          <th>Paket</th>
          <th style="width: 20%;">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($playlist as $p)
           <tr>
              <td>{{$p->id}}</td>
              <td>{{$p->namaplayer}}</td>
              <td>{{$p->namafile}}</td>
              <td>{{$p->duration}}</td>
              <td>{{$p->namalayout}}</td>
              <td>{{$p->statusLoop}}</td>
              <td>{{$p->statusMedia}}</td>
              <td>{{$p->namakategori}}</td>
              <td>{{$p->namapaket}}</td>
               <td>
                  <div class="column">
                      <div class="col-md-6"><a href="" class="btn btn-block btn-success">Edit</a></div>
                      <div class="col-md-6"><a href="" class="btn btn-block btn-danger">Hapus</a></div>
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
      $('#master-player').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : true
      })
    })
  </script>
@endsection