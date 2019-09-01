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
              <th>Nama Lengkap</th>
              <th>Username</th>
              <th>Persentase</th>
              <th>Nominal</th>
              <th>Tanggal</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($afiliasi as $af)
              @foreach ($komisi as $k)
              <tr>
                  <td>{{ $af->nama }}</td>
                  <td>{{ $af->username }}</td>
                  <td>{{ $k->persentase }}</td>
                  <td>{{ $k->nominal }}</td>
                  <td>{{ Carbon\Carbon::parse($k->updated_at)->format('d-m-Y') }}</td>
              </tr>
              @endforeach
              @endforeach
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
        'autoWidth'   : true,
        'order'       : [[ 4, 'DESC']],
      })
    })
  </script>
@endsection
