@extends('admin.master')
@section('titlePage','Master Media')
@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
          @if (\Session::has('alert-fail'))
              <div class="alert alert-danger">
                  <a href="{{ route('masterMedia') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
                  <div>{{Session::get('alert-fail')}}</div>
              </div>
          @endif
          @if (\Session::has('alert-success'))
              <div class="alert alert-success">
                  <a href="{{ route('masterMedia') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
                  <div>{{Session::get('alert-success')}}</div>
              </div>
          @endif
        <div class="col-md-10 ">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Master Media
                  <small>Media yang akan ditampilkan</small>
                </h1>
              </section>
        </div>
        <div class="col-md-2">
            <a href="{{route('addMedia')}}"><button type="button" class="btn btn-danger"><i class="fa fa-plus"></i> Add new media</button></a>
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
              <td>{{$m->file['nama']}}</td>
              <td>{{$m->file['duration']}}</td>
              <td>{{$m->file['type']}}</td>
              <td>{{$m->file['size']}}</td>
              @if($m->file['status'] == 0)
              <td>Off</td>
              @elseif($m->file['status'] == 1)
              <td>On</td>
              @endif
              <td>{{$m->file['url']}}</td>
              @if($m->statusDownload == 0)
              <td>Off</td>
              @elseif($m->statusDownload == 1)
              <td>On</td>
              @endif
              <td>
                  <form action="/admin/player/master-media/download/{{$m->id}}" method="post">
                      {{csrf_field()}}
                      <button type="submit" class="btn btn-primary"><i class="fa fa-download"></i></button>
                      <a href="{{route('addFile', $m->id)}}"><button type="button" class="btn btn-warning"><i class="fa fa-plus"></i></button></a>
                      <a href="{{route('deleteMedia', $m->id)}}"><button type="button" class="btn btn-danger"><i class="fa fa-trash"></i></button></a>
                  </form>                  
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