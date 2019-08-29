@extends('user.master')
@section('judul', 'Paket Aktif')
@section('deskripsi', 'Informasi Status Paket Anda')
@section('content')
    <div class="col-xs-12">
    <div class="box box-info">
        <div class="box-body">
          <table id="paket-status" class="table table-bordered table-hover">
          <style>th, td{ text-align:center;}</style>
            <thead>
            <tr>
              <th>Nama Paket</th>
              <th>Tanggal Pesan</th>
              <th>Tanggal Mulai</th>
              <th>Tanggal Selesai</th>
              <th>Region Siaran</th>
              <th>Status</th>
              <th>Upload Iklan</th>
            </tr>
            </thead>
            <tbody>
              @foreach ($pesanans as $p)
              <tr>
                  <td>{{ $p->paket->nama }}</td>
                  <td>{{ Carbon\Carbon::parse($p->tanggal)->format('d-m-Y') }}</td>
                  <td>{{ Carbon\Carbon::parse($p->startShow)->format('d-m-Y') }}</td>
                  <td>{{ Carbon\Carbon::parse($p->endShow)->format('d-m-Y') }}</td>
                  <td>Jawa Timur</td>
                  @if ($p->status == 0) 
                    <td>Kadaluarsa</td> 
                  @else 
                    <td>Aktif</td>
                  @endif
                  <td><a href="" class="btn btn-primary">Upload</a></td>
                </tr>
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
