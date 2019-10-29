@extends('user.master')
@section('content')
  <div class="col-md-3"></div>
  <div class=" col-md-6 col-xs-12">
    <div class="box box-info">
    <div class="box-header">
      <h2 class="box-title">Info Pesanan
      </h2>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="durasi">{{ $pesanan->paket->nama }}</div>
          <div class="desc">
              Paket Start {{ \Carbon\Carbon::parse($pesanan->startShow)->format('d-m-Y') }}<br>
              Paket End {{ \Carbon\Carbon::parse($pesanan->endShow)->format('d-m-Y') }}<br>
              Harga Paket {{ $pesanan->paket->harga }}
          </div>
          <form action="{{ route('buktiIndex', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
          {{ csrf_field() }}
          {{ method_field('POST') }}
          <div class="form-grub">
            <div class="input-group">
              <label>Silahkan upload bukti transfer anda untuk konfirmasi pembayaran</label>
              <input type="file" name="buktiPembayaran">
            </div>
          </div>
              <button type="submit" class="btn btn-info" style="margin-top : 10px;">Upload</button>
          </form>
       </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

@section('js')

@endsection
