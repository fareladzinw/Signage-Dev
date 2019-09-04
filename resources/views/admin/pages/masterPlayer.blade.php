@extends('admin.master')

@section('titlePage','Master Player')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
        <div class="col-md-8">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Master Player
                  <small>Table data Player</small>
                </h1>
              </section>
        </div>
      <div class="col-md-2"><button  type="button" class="btn btn-block btn-warning" onclick="exportTableToExcel('master-player', 'report-master-player')">Dowload Excel</button></div>
      <div class="col-md-2"><a href="{{url('/admin/player/master-player/add-data')}}"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></a></div>
    </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      @if (\Session::has('alert-fail'))
          <div class="alert alert-danger">
          <a href="{{ route('indexMasterPlayer') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
              <div>{{Session::get('alert-fail')}}</div>
          </div>
      @endif
      @if (\Session::has('alert-success'))
          <div class="alert alert-success">
          <a href="{{ route('indexMasterPlayer') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
              <div>{{Session::get('alert-success')}}</div>
          </div>
      @endif
      <table id="master-player" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Nama Player</th>
          <th>Lokasi</th>
          <th>KEYPLAYER</th>
          <th>Password</th>
          <th>Spesifikasi</th>
          <th>Action</th>
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
            <td>
                <div class="column">
                    <div class="col-md-6"><a href="{{url('/admin/player/master-player/edit-data/'.$p->id)}}" class="btn btn-block btn-success">Edit</a></div>
                    <div class="col-md-6"><a href="/admin/player/master-player/delete/{{$p->id}}" class="btn btn-block btn-danger">Hapus</a></div>
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