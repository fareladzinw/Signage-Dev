@extends('user.master')
@section('content')
  <div class="col-md-3"></div>
  <div class=" col-md-6 col-xs-12">
    <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Upload Bukti Transfer</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
            <form action="">
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
