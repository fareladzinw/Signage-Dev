@extends('admin.master')

@section('titlePage','Master Player')

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
        </div>
      <div class="col-md-2"><a href="{{url('/admin/player/master-player/add-data')}}"><button  type="button" class="btn btn-block btn-danger">Tabmbah Data</button></a></div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <table id="master-player" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID Player</th>
          <th>Name</th>
          <th>Region</th>
          <th>Username</th>
          <th>Password</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @for ($i = 1; $i < 5; $i++)
           <tr>
              <td>14N67</td>
              <td>Rasberry Pie</td>
              <td>JABODETABEK</td>
              <td>AmanSlurd</td>
              <td>skuyparah123</td>
              <td>
                  <div class="column">
                      <div class="col-md-6"><a href="{{url('/admin/player/master-player/edit-data/'.$i)}}" class="btn btn-block btn-success">Edit</a></div>
                      <div class="col-md-6"><a href="" class="btn btn-block btn-danger">Hapus</a></div>
                  </div>
              </td>
            </tr>
          @endfor
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