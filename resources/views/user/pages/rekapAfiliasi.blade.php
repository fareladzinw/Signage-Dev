@extends('user.master')
@section('judul', 'Paket Aktif')
@section('deskripsi', 'Informasi Status Paket Anda')
@section('content')
    <div class="col-xs-12">
    @if (\Session::has('alert-success'))
    <div class="alert alert-warning">
      <a href="{{ route('login') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
      <div>{{Session::get('alert-success')}}</div>
    </div>
    @endif
    <div class="box box-info">
        <div class="box-body">
          <table id="riwayat-afiliasi" class="table table-bordered table-hover">
          <style>th, td{text-align:center;}</style>
            <thead>
            <tr>
              <th>No</th>
              <th>Jumlah</th>
              <th>Status</th>
              <th>Tanggal</th>
            </tr>
            </thead>
            <tbody>
              @foreach($withdraw as $key => $w)
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $w->nominal }}</td>
                  @if($w->status === 1)
                  <td>Success</td>
                  @endif
                  @if($w->status === 0)
                  <td>Pending</td>
                  @endif
                  <td>{{ Carbon\Carbon::parse($w->tanggal)->format('d-m-Y') }}</td>
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
      $('#riwayat-afiliasi').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : true,
      })
    })
  </script>
@endsection
