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
           </div>
    </div>
<!-- /.box-header -->
    <div class="box-body">
      <table id="list-user" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Name</th>
          <th>Telp</th>
          <th>Role</th>
          <th>Username</th>
          <th>Password</th>
        </tr>
        </thead>
        <tbody>
          @for ($i = 0; $i < 4; $i++)
          <tr>
              <td>Adam GV</td>
              <td>081222344564</td>
              <td>Premium</td>
              <td>Bucin</td>
              <td>Akubucin123</td>
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