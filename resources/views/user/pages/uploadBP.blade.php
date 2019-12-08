@extends('user.master')
@section('content')
  <div class=" col-md-6 col-xs-12">
    <div class="box box-info">
    <div class="box-header">
      <h2 class="box-title">Konfirmasi Pembayaran
      </h2>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
          <form action="{{ route('buktiIndex', $pesanan->id) }}" method="POST" enctype="multipart/form-data">
          <label for="">Nama Paket</label><input type="text" name="" class="form-control" value="{{$transaksi->paket->nama}}" readonly>
          <label for="">Harga</label><input type="text" name="" class="form-control" value="Rp. {{number_format($transaksi->total, '0', ',', '.')}}" readonly>
          <label for="">Tanggal Pembayaran</label><input type="text" name="" class="form-control" value="{{\Carbon\Carbon::now()->format('d F Y')}}" readonly>
          <label for="">Pilih bank</label>
          <select name="bank" id="" class="form-control" required>
            <option value="">Pilih Bank</option>
            <option value="BCA">BCA</option>
            <option value="BRI">BRI</option>
            <option value="BNI">BNI</option>
            <option value="Mandiri">Mandiri</option>
          </select>
          <label for="">Nama Rekening Pengirim</label><input type="text" name="nama_pengirim" class="form-control" placeholder="Nama Rekening Pengirim" required>
          <label for="">No Rekening</label><input type="text" name="norek" class="form-control" placeholder="No Rekening Pengirim" required>
          <label for="">Nominal Transfer</label><input type="text" name="nominal_transfer" class="form-control" placeholder="Nominal Transfer" required>
          {{ csrf_field() }}
          {{ method_field('POST') }}
          <div class="form-grub">
            <div class="input-group">
              <label>Silahkan upload bukti transfer anda untuk konfirmasi pembayaran</label>
              <input type="file" name="buktiPembayaran" required>
            </div>
          </div>
              <button type="submit" class="btn btn-info" style="margin-top : 10px;">Upload</button>
          </form>
       </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    <div class="col-md-6">
      <p style="color: red;"><i class="fa fa-exclamation-triangle" style="color: red;"></i> Konfirmasi pembayaran merupakan salah satu cara untuk mempercepat respon admin untuk menyetujui pembayaran yang anda lakukan, untuk itu sertakan scan foto bukti pembayaran anda agar admin bisa memproses pembayaran anda dengan cepat</p>
    </div>
@endsection

@section('js')

@endsection
