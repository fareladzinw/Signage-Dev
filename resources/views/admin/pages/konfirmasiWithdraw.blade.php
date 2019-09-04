@extends('admin.master')

@section('titlePage','Konfirmasi Withdraw')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box ">
    <div class="box-header">
      <div class="column">
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Konfirmasi Withdraw
                  <small>Table request user untuk penarikan afiliasi</small>
                </h1>
              </section>
        </div>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    @if (\Session::has('alert-fail'))
        <div class="alert alert-danger">
        <a href="{{ route('indexKonfirmasiWithdraw') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
            <div>{{Session::get('alert-fail')}}</div>
        </div>
    @endif
    @if (\Session::has('alert-success'))
        <div class="alert alert-success">
        <a href="{{ route('indexKonfirmasiWithdraw') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
            <div>{{Session::get('alert-success')}}</div>
        </div>
    @endif
      <table id="master-player" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>ID User</th>
          <th>Nama User</th>
          <th>Tanggal</th>
          <th>Nominal</th>
          <th>StatusWithdraw</th>
            <th>Nama Bank</th>
            <th>Nomor Rekening</th>
          <th>Action</th>
        </tr>
        </thead>
        <tbody>
          @foreach ($withdraw as $w)
           <tr>
              <td>{{$w->userid}}</td>
              <td>{{$w->nama}}</td>
              <td>{{$w->tanggal}}</td>
              <td>{{$w->nominal}}</td>
              <td>{{$w->status}}</td>
              <td>{{$w->namaBank}}</td>
              <td>{{$w->nomorRekening}}</td>
              <td>
                  <div class="column">
                      @if($w->status === 0)
                          <form action="/admin/invoice/konfirmasi-withdraw/{{$w->id}}" method="post">
                              {{csrf_field()}}
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-block btn-warning">Konfirmasi </button>
                              </div>
                          </form>
                      @elseif($w->status === 1)
                              <div class="col-md-12">
                                  <p type="submit" class="btn btn-block btn-success">Telah Dikonfirmasi</p>
                              </div>
                          </form>
                      @endif
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
  </script>
@endsection