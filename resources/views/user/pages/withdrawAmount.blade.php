@extends('user.master')
@section('judul', 'Withdraw')
@section('deskripsi', 'Tarik Komisi Afiliasi Anda')
@section('content')
    <div class="box box-info withdraw">
        <div class="box-body">
            <div class="header-afiliasi">
                <h4 class="header">Jumlah Afiliasi</h4>
                <h1 class="afiliasi">Rp.1.000.000</h1>
            </div>
            <div class="field-penarikan">
                <label class="label">Jumlah penarikan</label>
                <input type="text" name="amount" />
            </div>
            <div class="field-penarikan">
                <p class="syarat">*syarat ketentuan berlaku</p>
                  <div class="col-md-6">
                      <div class="checkbox icheck">
                        <label>
                          <input type="checkbox"> Saya setuju dengan ketentuan yang berlaku
                        </label>
                      </div>
                    </div>
                  <div class="col-md-6"><button type="button" class="btn btn-block btn-success">Withdraw</button></div>
                </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
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
      $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
  </script>
@endsection
