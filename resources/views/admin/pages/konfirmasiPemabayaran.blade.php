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
        <div class="col-md-2"><button  type="button" class="btn btn-block btn-warning" onclick="exportTableToExcel('konfirmasi-pembayaran', 'report-konfirmasi-pembayaran')">Dowload Excel</button></div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    @if (\Session::has('alert-fail'))
        <div class="alert alert-danger">
        <a href="{{ route('indexKonfirmasiPembayaran') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
            <div>{{Session::get('alert-fail')}}</div>
        </div>
    @endif
    @if (\Session::has('alert-success'))
        <div class="alert alert-success">
        <a href="{{ route('indexKonfirmasiPembayaran') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
            <div>{{Session::get('alert-success')}}</div>
        </div>
    @endif
      <table id="konfirmasi-pembayaran" class="table table-bordered table-hover">
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
                      <form action="/admin/invoice/download-pembayaran/{{$k->id}}" method="post">
                          {{csrf_field()}}
                          <div class="col-md-6"><button type="submit" class="btn btn-block btn-primary">download</button></div>
                      </form>
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
    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');
    
    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';
    
    // Create download link element
    downloadLink = document.createElement("a");
    
    document.body.appendChild(downloadLink);
    
    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;
    
        // Setting the file name
        downloadLink.download = filename;
        
        //triggering the function
        downloadLink.click();
    }
  }
  </script>
@endsection