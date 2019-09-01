@extends('admin.master')

@section('titlePage','Konfirmasi Pembayaran Paket')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Konfirmasi Pembayaran Paket
                  <small>Table Bukti Pembayaran Paket</small>
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
          <th>Type Konfirmasi</th>
          <th>Konfirmasi Dari</th>
          <th>Tanggal Konfirmasi</th>
          <th>ID Transaksi</th>
          <th>Nama Bank</th>
          <th>Nama Rekening</th>
            <th>Nominal</th>
            <th>Status Konfirmai</th>
            <th>Validasi</th>
            <th>Data Bulb</th>
            <th style="width: 50%">Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($konfirmasi as $k)
           <tr>
              <td>{{$k->type}}</td>
              <td>{{$k->konfirmasiDari}}</td>
              <td>{{$k->tanggal}}</td>
              <td>{{$k->idtransaksi}}</td>
              <td>{{$k->namaBank}}</td>
               <td>{{$k->namaRekening}}</td>
               <td>{{$k->nominal}}</td>
               <td>{{$k->status}}</td>
               <td>{{$k->validasi}}</td>
               <td>{{$k->dataBulb}}</td>
               <td>
                  <div class="column">
                      <div class="col-md-6"><a href="" class="btn btn-block btn-primary">Download</a></div>
                      @if($k->status === 0)
                          <form action="/admin/invoice/konfirmasi-pembayaran/{{$k->id}}" method="post">
                              {{csrf_field()}}
                              <div class="col-md-6">
                                  <button type="submit" class="btn btn-block btn-warning">Konfirmasi</button>
                              </div>
                          </form>
                      @elseif($k->status === 1)
                              <div class="col-md-6">
                                  <p class="btn btn-block btn-warning">Telah Dikonfirmasi</p>
                              </div>
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