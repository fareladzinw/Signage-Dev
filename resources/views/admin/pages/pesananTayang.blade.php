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
        <div class="col-md-2"><button  type="button" class="btn btn-block btn-warning" onclick="exportTableToExcel('pesanan-tayang', 'report-pesanan-tayang')">Dowload Excel</button></div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="pesanan-tayang" class="table table-bordered table-hover">
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
                  <a href="" class="btn btn-block btn-warning">Tanyangkan</a>
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