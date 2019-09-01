@extends('admin.master')

@section('content')
    @if (empty($id))
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <div class="column">
                            <div class="col-md-10">
                                <section class="content-header" style="padding : 0;">
                                    <h1>
                                        Add Data Master Paket
                                        <small>Form data master Paket</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('storePaket') }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <div class="form-group">
                                <label for="player">Nama Paket</label>
                                <input name="nama" type="text" class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="player">Harga Paket</label>
                                <input name="harga" type="text" class="form-control" placeholder="harga">
                            </div>
                            <div class="form-group">
                                <label for="player">Durasi</label>
                                <input name="durasi" type="text" class="form-control" placeholder="durasi">
                            </div>
                            <div class="form-group">
                                <label for="player">Jumlah Player</label>
                                <input name="jumlahPlayer" type="text" class="form-control" placeholder="jumlah Player">
                            </div>
                            <div class="form-group">
                                <label for="player">Jenis Content</label>
                                <input name="jenisContent" type="text" class="form-control" placeholder="jenis Content">
                            </div>
                            <div class="form-group">
                                <label for="player">Start Show</label>
                                <input name="startShow" type="date" class="datepicker" placeholder="start Show">
                            </div>
                            <div class="form-group">
                                <label for="player">End Show</label>
                                <input name="endShow" type="date" class="datepicker" placeholder="end Show">
                            </div>
                            <div class="form-group">
                                <label for="player">Jumlah File</label>
                                <input name="jumlahFile" type="text" class="form-control" placeholder="jumlah File">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Tambah Data</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>


    @elseif(!empty($id))
        <div class="row">
            <div class="col-xs-12">
                <div class="box box-danger">
                    <div class="box-header">
                        <div class="column">
                            <div class="col-md-10">
                                <section class="content-header" style="padding : 0;">
                                    <h1>
                                        Edit Master Paket
                                        <small>Form data master Paket</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    @foreach($paket as $p)
                        <div class="box-body">
                            <form action={{ route('editPaket', $id)}} method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="player">Nama Paket</label>
                                    <input name="nama" type="text" class="form-control" placeholder="Nama" value="{{$p->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Harga Paket</label>
                                    <input name="harga" type="text" class="form-control" placeholder="harga" value="{{$p->harga}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Durasi</label>
                                    <input name="durasi" type="text" class="form-control" placeholder="durasi" value="{{$p->durasi}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Jumlah Player</label>
                                    <input name="jumlahPlayer" type="text" class="form-control" placeholder="jumlah Player" value="{{$p->jumlahPlayer}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Jenis Content</label>
                                    <input name="jenisContent" type="text" class="form-control" placeholder="jenis Content" value="{{$p->jenisContent}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Start Show</label>
                                    <input name="startShow" type="date" class="datepicker" placeholder="start Show" value="{{$p->startShow}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">End Show</label>
                                    <input name="endShow" type="date" class="datepicker" placeholder="end Show" value="{{$p->endShow}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Jumlah File</label>
                                    <input name="jumlahFile" type="text" class="form-control" placeholder="jumlah File" value="{{$p->jumlahFile}}">
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
    @endif
@endsection

@section('js')
    <script>
        $('#datepicker').datepicker({
            autoclose:true,
            format: 'dd-mm-yyyy',
            orientation: bottom
        })
    </script>


@endsection