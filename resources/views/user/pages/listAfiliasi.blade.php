@extends('user.master')
@section('judul', 'List Afiliasi')
@section('deskripsi', 'Informasi User Yang Menggunakan Kode Afiliasi Anda')
@section('content')
  <div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
          <table id="list-afiliasi" class="table table-bordered table-hover">
            <thead>
            <tr>
              <th>Nama User</th>
              <th>Id User</th>
              <th>Tanggal</th>
            </tr>
            </thead>
            <tbody>
              @for ($i = 0; $i < 4; $i++)
              <tr>
                  <td>Adam Wildan</td>
                  <td>I12NM</td>
                  <td>19 Septemper 2019</td>
                </tr>
              @endfor
              @for ($i = 0; $i < 4; $i++)
              <tr>
                  <td>Adam Wildan</td>
                  <td>G7NM</td>
                  <td>11 September 2019</td>
                </tr>
              @endfor
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
      $('#list-afiliasi').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : true
      })
    })
  </script>
@endsection
