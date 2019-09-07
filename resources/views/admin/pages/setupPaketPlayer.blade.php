@extends('admin.master')
@section('judul','Setup Paket with Player')

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="column">
                        <div class="col-md-10">
                            <section class="content-header" style="padding : 0;">
                                <h1>
                                    Setup Paket With Player
                                    <small>Info setup paket to player</small>
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
                            <th>ID Paket</th>
                            <th>Nama Paket</th>
                            <th>ID Player</th>
                            <th>Nama Player</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($playlist as $p)
                            <tr>
                                <td>{{$p->idpaket}}</td>
                                <td>{{$p->namapaket}}</td>
                                <td>{{$p->idplayer}}</td>
                                <td>{{$p->namaplayer}}</td>
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