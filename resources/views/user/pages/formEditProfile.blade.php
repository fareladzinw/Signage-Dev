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
        <form action="{{ route('updateProfile', $user->id) }}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('POST') }}
            <div class="form-group">
                <label for="player">Foto Profile</label>
                <input type="file" name="fotoProfile" class="form-control">
            </div>
            <div class="form-group">
                <label for="player">Nama</label>
                <input name="nama" type="text" class="form-control" value="{{$user->nama}}" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="player">Email</label>
                <input name="email" type="email" class="form-control" value="{{$user->email}}" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="player">Nama Bank</label>
                <input name="bank" type="text" class="form-control" value="{{$user->namaBank}}" placeholder="Nama Bank">
            </div>
            <div class="form-group">
                <label for="player">Nomor Rekening</label>
                <input name="norek" type="text" class="form-control" value="{{$user->nomorRekening}}" placeholder="Nomor Rekening">
            </div>
            <div class="form-group">
                <label for="player">Nama Rekening</label>
                <input name="namaRek" type="text" class="form-control" value="{{$user->namaRekening}}" placeholder="Nama Rekening">
            </div>
            <div class="form-group">
                <label for="player">Ubah Kata Sandi</label>
                <input name="password" type="password" class="form-control" placeholder="Isi kata sandi">
                <small>Bila tidak ingin merubah tidak perlu diisi</small>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-info btn-block btn-flat"><b> Ubah Profile </b></button>
            </div>
        </form>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
    </div>

@endsection