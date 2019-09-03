@extends('admin.master')
@section('titlePage','Master Media')
@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Master Media
                  <small>Media yang akan ditampilkan</small>
                </h1>
              </section>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="master-player" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>File Nama</th>
          <th>Durasi</th>
          <th>Type File</th>
          <th>Kapasitas File</th>
          <th>Status File</th>
          <th>Url File</th>
          <th>Status Download</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($media as $m)
           <tr>
              <td>{{$m->nama}}</td>
              <td>{{$m->duration}}</td>
              <td>{{$m->type}}</td>
              <td>{{$m->size}}</td>
              <td>{{$m->status}}</td>
              <td>{{$m->url}}</td>
              <td>{{$m->statusDownload}}</td>
              <td>
                <a href="" class="btn btn-block btn-primary">Download</a>
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