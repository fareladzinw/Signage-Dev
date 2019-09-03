@extends('admin.master')

@section('titlePage','Daftar Pesanan Tayang')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Daftar Pesanan Tayang
                  <small>Table iklan status idle</small>
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
          <th>ID Trans.</th>
          <th>Nama Paket</th>
          <th>ID Playlist</th>
          <th>Nama User</th>
          <th>Status Tayang</th>
          <th>Start Tayang</th>
          <th>End Tayang</th>
          <th>Number File</th>
          <th>Type File</th>
          <th>Url File</th>
          <th>Order File</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($pesanan as $p)
           <tr>
              <td>{{$p->idtrans}}</td>
              <td>{{$p->namapaket}}</td>
              <td>{{$p->idplaylist}}</td>
              <td>{{$p->namauser}}</td>
              <td>{{$p->status}}</td>
               <td>{{$p->startTayang}}</td>
               <td>{{$p->endTayang}}</td>
               <td>{{$p->numberFile}}</td>
               <td>{{$p->typeFile}}</td>
               <td>{{$p->urlFile}}</td>
               <td>{{$p->orderFile}}</td>
               <td>
                  <div class="column">
                      @if($p->status === 0)
                        <form action="/admin/invoice/pesanan-tayang/on/{{$p->id}}" method="post">
                          {{csrf_field()}}
                          <div class="col-md-12">
                            <button type="submit" class="btn btn-block btn-warning">Validasi </button>
                          </div>
                        </form>
                      @elseif($p->status === 1)
                              <form action="/admin/invoice/pesanan-tayang/off/{{$p->id}}" method="post">
                                  {{csrf_field()}}
                                  <div class="col-md-12">
                                      <button type="submit" class="btn btn-block btn-warning">Batal Validasi</button>
                                  </div>
                              </form>
                      @endif
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