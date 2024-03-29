@extends('admin.master')
@section('judul','Riwayat Transaksi Pesanan')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box">
    <div class="box-header">
            <div class="column">
                <div class="col-md-10">
                    <section class="content-header" style="padding : 0;">
                        <h1>
                            Riwayat Transaksi Pesanan
                        <small>Log pesanan user</small>
                        </h1>
                    </section>
                </div>
                <div class="col-md-2"><button  type="button" class="btn btn-block btn-warning" onclick="exportTableToExcel('list-transaksi', 'report-list-transaksi')">Dowload Excel</button></div>
           </div>
    </div>
<!-- /.box-header -->
    <div class="box-body">
      <table id="list-transaksi" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nama User</th>
          <th>Nama Paket</th>
          <th>Jumlah Pesanan</th>
          <th>Tanggal Transaksi</th>
          <th>Nominal Pembayaran</th>
            <th>Discount</th>
            <th>Total Pembayaran</th>
            <th>Status Upload</th>
            <th>Status Tayang</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($transaksi as $t)
          <tr>
              <td>{{$t->namauser}}</td>
              <td>{{$t->namapaket}}</td>
              <td>{{$t->jumlahPesanan}}</td>
              <td>{{$t->tanggal}}</td>
              <td>{{$t->nominal}}</td>
              <td>{{$t->discount}}</td>
              <td>{{$t->total}}</td>
              <td>{{$t->statusUpload}}</td>
              <td>{{$t->statusTayang}}</td>
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