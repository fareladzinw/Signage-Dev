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
              @if($m->status == 0)
              <td>Off</td>
              @elseif($m->status == 1)
              <td>On</td>
              @endif
              <td>{{$m->url}}</td>
              @if($m->statusDownload == 0)
              <td>Off</td>
              @elseif($m->statusDownload == 1)
              <td>On</td>
              @endif
              <td>
                  @if($m->statusDownload == 0)
                  <form action="/admin/player/master-media/download/{{$m->id}}" method="post">
                      {{csrf_field()}}
                      <div class="col-md-12"><button type="submit" class="btn btn-block btn-primary">download</button></div>
                  </form>
                  @elseif($m->statusDownload == 1)
                  <div class="col-md-12"><p class="btn btn-block btn-danger">Ter Download</p></div>
                  @endif
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