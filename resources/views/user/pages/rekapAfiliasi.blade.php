@extends('user.master')
@section('judul', 'Paket Aktif')
@section('deskripsi', 'Informasi Status Paket Anda')
@section('content')
    <div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
          <table id="riwayat-afiliasi" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Status Afiliasi</th>
              <th>Tanggal</th>
              <th>Jumlah</th>
              <th>Total Afiliasi</th>
            </tr>
            </thead>
            <tbody>
              @for ($i = 0; $i < 4; $i++)
                <tr>
                  <td>Kode afiliasi digunakan</td>
                  <td>17 Maret 2019</td>
                  <td>+ Rp.5.000</td>
                  <td>Rp. 500.000</td>
                </tr>
              @endfor
                <tr>
                    <td>Withdraw Afiliasi</td>
                    <td>20 Maret 2019</td>
                    <td>- Rp.500.000</td>
                    <td>Rp. 10.000</td>
                </tr>
        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
@endsection

@section('js')
<script>
    $(function () {
      $('#riwayat-afiliasi').DataTable({
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
