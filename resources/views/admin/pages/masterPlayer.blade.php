@extends('admin.master')

@section('judul','Master Player')
@section('deskripsi','Table data Player')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Master Player
                  <small>Table data Player</small>
                </h1>
              </section>
          {{-- <h1 class="box-title">Hover Data Table</h1> --}}
        </div>
        <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tabmbah Data</button></div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="master-player" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nama Player</th>
          <th>Lokasi</th>
          <th>KEYPLAYER</th>
          <th>Password</th>
          <th>Spesifikasi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($player as $p)
        <tr>
          <td>{{$p->nama}}</td>
          <td>{{$p->lokasi}}</td>
          <td>{{$p->KEYPLAYER}}</td>
          <td>{{$p->PASSWORD}}</td>
          <td>{{$p->spesifikasi}}</td>
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
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })
  </script>
@endsection