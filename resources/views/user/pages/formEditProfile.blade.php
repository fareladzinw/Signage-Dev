@extends('user.master')
@section('judul', 'Edit Profil')
@section('content')
<div class="row">
    <div class="col-xs-12">
    <div class="box box-primary">
        <div class="box-header">
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <form action="" method="post">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">
                <label for="player">Foto</label>
                <input name="foto" type="file" class="form-control" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="player">Nama</label>
                <input name="nama" type="text" class="form-control" placeholder="Lokasi">
            </div>
            <div class="form-group">
                <label for="player">Nama Bank</label>
                <input name="bank" type="text" class="form-control" placeholder="Spesifikasi">
            </div>
            <div class="form-group">
                <label for="player">Nomor Rekening</label>
                <input name="norek" type="text" class="form-control" placeholder="Spesifikasi">
            </div>
            <div class="form-group">
                <label for="player">Nama Rekening</label>
                <input name="namaRek" type="text" class="form-control" placeholder="Spesifikasi">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block btn-flat"><b> Update Profile </b></button>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
    </div>

@endsection