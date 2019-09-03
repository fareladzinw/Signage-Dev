@extends('admin.master')
@section('judul','Requests')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box">
    <div class="box-header">
            <div class="column">
                <div class="col-md-10">
                    <section class="content-header" style="padding : 0;">
                        <h1>
                            Daftar Request Player
                        <small>Info validasi Player</small>
                        </h1>
                    </section>
                </div>
                <div class="col-md-2"><button  type="button" class="btn btn-block btn-warning" onclick="exportTableToExcel('daftar-request', 'report-daftar-request')">Dowload Excel</button></div>
           </div>
    </div>
<!-- /.box-header -->
    <div class="box-body">
      <table id="daftar-request" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nama Player</th>
          <th>ID Playlist</th>
          <th>Tanggal Request</th>
          <th>Status Request</th>
            <th>Id Unique</th>
          <th>Kapasitas File Request</th>
            <th>Estimate Tansfer</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach($request as $r)
          <tr>
              <td>{{$r -> namaplayer}}</td>
              <td>{{$r -> idplaylist}}</td>
              <td>{{$r -> tanggal}}</td>
              <td>{{$r -> status}}</td>
              <td>{{$r -> uniqueId}}</td>
              <td>{{$r -> kapasitasFile}}</td>
              <td>{{$r -> estimateTransfer}}</td>
              <td>
                  <div class="column">
                      @if($r->status === 0)
                          <form action="/admin/invoice/request-player/on/{{$r->id}}" method="post">
                              {{csrf_field()}}
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-block btn-warning">Validasi </button>
                              </div>
                          </form>
                      @elseif($r->status === 1)
                          <form action="/admin/invoice/request-player/off/{{$r->id}}" method="post">
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