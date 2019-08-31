@extends('admin.master')
@section('judul','Master Afiliasi Client')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box">
    <div class="box-header">
            <div class="column">
                <div class="col-md-10">
                    <section class="content-header" style="padding : 0;">
                        <h1>
                            Master Afiliasi Client
                        <small>Info Afiliasi Client</small>
                        </h1>
                    </section>
                </div>
           </div>
    </div>
<!-- /.box-header -->
    <div class="box-body">
      <table id="list-user" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>Persentase</th>
          <th>Tanggal Afiliasi</th>
          <th>Nama Bank</th>
          <th>Nomor Rekening</th>
          <th>Nama Rekening</th>
          <th>Afiliasi From</th>
          <th>Link Afiliasi</th>
        </tr>
        </thead>
        <tbody>
          @foreach($afiliasi as $a)
          <tr>
              <td>{{$a->persentase}}</td>
              <td>{{$a->tanggal}}</td>
              <td>{{$a->namaBank}}</td>
              <td>{{$a->nomorRekening}}</td>
              <td>{{$a->namaRekening}}</td>
              <td>{{$a->afiliasiFrom}}</td>
              <td>{{$a->linkAfiliasi}}</td>
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
      $('#list-user').DataTable({
        'paging'      : true,
        'lengthChange': true,
        'searching'   : false,
        'ordering'    : false,
        'info'        : true,
        'autoWidth'   : false
      })
    })
  </script>
@endsection