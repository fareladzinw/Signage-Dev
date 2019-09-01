@extends('user.master')
@section('judul', 'Withdraw')
@section('deskripsi', 'Tarik Komisi Afiliasi Anda')
@section('content')
    <div class="box box-info withdraw">
    <form action="{{ route('withdrawApproval') }}" method="post">
    {{ csrf_field() }}
    {{ method_field('POST') }}
        <div class="box-body">
            <div class="header-afiliasi">
                <h4 class="header">Jumlah Balance Anda</h4>
                <h1 class="afiliasi">Rp.{{ $balance }}</h1>
            </div>
            <div class="field-penarikan">
                <label class="label">Jumlah penarikan</label>
                <input type="text" name="amount"/>
                @if($errors->has('amount'))
                <div class="text-danger">
                    {{ $errors->first('amount')}}
                </div>
                @endif
            </div>
            <div class="field-penarikan">
                <p class="syarat">*syarat ketentuan berlaku</p>
                  <div class="col-md-6">
                      <div class="checkbox icheck">
                        <label>
                          <input type="checkbox" required> Saya setuju dengan ketentuan yang berlaku
                        </label>
                      </div>
                    </div>
                  <div class="col-md-6"><button type="submit" class="btn btn-block btn-success">Withdraw</button></div>
                </div>
    </div>
    <!-- /.box-body -->
    </form>
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
