@extends('admin.master')
@section('judul','List Client')
@section('titlePage','List Client')
@section('deskripsi','Table data Cliient Yang Terdaftar')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box">
    {{-- <div class="box-header">
      <h3 class="box-title">Hover Data Table</h3>
    </div> --}}
    <!-- /.box-header -->
    <div class="box-body">
      <table id="list-user" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Rendering engine</th>
          <th>Browser</th>
          <th>Platform(s)</th>
          <th>Engine version</th>
          <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <tr>
          <td>Trident</td>
          <td>Internet
            Explorer 4.0
          </td>
          <td>Win 95+</td>
          <td> 4</td>
          <td>
              <div class="column">
                  <div class="col-md-6"><button type="button" class="btn btn-block btn-success">Edit</button></div>
                  <div class="col-md-6"><button type="button" class="btn btn-block btn-danger">Hapus</button></div>
              </div>
          </td>
        </tr>
        <tr>
            <td>Gecko</td>
            <td>Netscape Browser 8</td>
            <td>Win 98SE+</td>
            <td>1.7</td>
            <td>
                    <div class="column">
                        <div class="col-md-6"><button type="button" class="btn btn-block btn-success">Edit</button></div>
                        <div class="col-md-6"><button type="button" class="btn btn-block btn-danger">Hapus</button></div>
                    </div>
                </td>
          </tr>
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
  </script>
@endsection