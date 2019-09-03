
@extends('admin.master')

@section('content')

        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <div class="column">
                            <div class="col-md-10">
                                <section class="content-header" style="padding : 0;">
                                    <h1>
                                        Edit Master User
                                        <small>Form data master User</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    @foreach($client as $c)
                        <div class="box-body">
                            <form action={{ route('editClient', $id)}} method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="player">Nama Client</label>
                                    <input name="nama" type="text" class="form-control" placeholder="Nama" value="{{$c->nama}}">
                                    @if($errors->has('nama'))
                                        <div class="text-danger">
                                            {{$errors->first('nama')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Email" value="{{$c->email}}">
                                    @if($errors->has('email'))
                                        <div class="text-danger">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">Alamat</label>
                                    <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{$c->alamat}}">
                                    @if($errors->has('alamat'))
                                        <div class="text-danger">
                                            {{$errors->first('alamat')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">No. HP</label>
                                    <input name="hp" type="text" class="form-control" placeholder="No.HP" value="{{$c->hp}}">
                                    @if($errors->has('hp'))
                                        <div class="text-danger">
                                            {{$errors->first('hp')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">Username</label>
                                    <input name="username" type="text" class="form-control" placeholder="Username" value="{{$c->username}}">
                                    @if($errors->has('username'))
                                        <div class="text-danger">
                                            {{$errors->first('username')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">Password</label>
                                    <input name="password" type="text" class="form-control" placeholder="Masukan Kembali Password">
                                    @if($errors->has('password'))
                                        <div class="text-danger">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-block btn-danger">Edit Data</button>
                                </div>
                                @endforeach
                            </form>
                        </div>
                        <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>

@endsection

@section('js')
@endsection