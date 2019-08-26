@extends('user.master')
@section('judul', 'Paket Aktif')
@section('deskripsi', 'Informasi Status Paket Anda')
@section('content')
<div class="row">
    <div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
          <table id="paket-status" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama Paket</th>
              <th>Tanggal Pesan</th>
              <th>Tanggal Selesai</th>
              <th>Region Siaran</th>
              <th>Status</th>
            </tr>
            </thead>
            <tbody>
              @for ($i = 0; $i < 4; $i++)
              <tr>
                  <td>Paket Mahasiswa</td>
                  <td>17 Agustus 2019</td>
                  <td>29 September 2019</td>
                  <td>Jawa Timur</td>
                  <td>Aktif</td>
                </tr>
              @endfor
              @for ($i = 0; $i < 4; $i++)
              <tr>
                  <td>Paket Mahasiswa</td>
                  <td>17 Agustus 2019</td>
                  <td>29 September 2019</td>
                  <td>Jawa Timur</td>
                  <td>Kadaluarsa</td>
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
      $('#paket-status').DataTable({
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
