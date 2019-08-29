@extends('admin.master')
@section('titlePage','Master Layout')
@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
              @if (\Session::has('alert-fail'))
              <div class="alert alert-danger">
                  <button type="button" class="close">x</button>
                  <div>{{Session::get('alert-fail')}}</div>
              </div>
              @endif
              @if (\Session::has('alert-success'))
                  <div class="alert alert-danger">
                      <button type="button" class="close">x</button>
                      <div>{{Session::get('alert-success')}}</div>
                  </div>
              @endif
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Master Layout
                  <small>Table data Layout</small>
                </h1>
              </section>
        </div>
      <div class="col-md-2"><a><button  type="button" class="btn btn-block btn-danger">Tabmbah Data</button></a></div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="master-player" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Layout Name</th>
          <th>Width</th>
          <th>Height</th>
          <th>Status Fullscreen</th>
          <th>Orientation</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($layout as $l)
           <tr>
              <td>{{$l->nama}}</td>
              <td>{{$l->width}}</td>
              <td>{{$l->height}}</td>
              <td>{{$l->statusFullscreen}}</td>
              <td>{{$l->orientation}}</td>
              <td>
                  <div class="column">
                      <div class="col-md-6"><a href="" class="btn btn-block btn-success">Edit</a></div>
                      <div class="col-md-6"><a href="/admin/player/delete/master-layout/{{$l->id}}" class="btn btn-block btn-danger">Hapus</a></div>
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