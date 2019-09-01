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
                                </div>
                                <div class="form-group">
                                    <label for="player">Email</label>
                                    <input name="email" type="text" class="form-control" placeholder="Email" value="{{$c->email}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Alamat</label>
                                    <input name="alamat" type="text" class="form-control" placeholder="Alamat" value="{{$c->alamat}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">No. HP</label>
                                    <input name="hp" type="text" class="form-control" placeholder="No.HP" value="{{$c->hp}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Username</label>
                                    <input name="username" type="text" class="form-control" placeholder="Username" value="{{$c->username}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Password</label>
                                    <input name="password" type="text" class="form-control" placeholder="Masukan Kembali Password">
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