@extends('user.master')
@section('content')
          <!-- Profile Image -->
            <div class="box box-primary col-md-4">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{asset('bower_components/admin-lte/dist/img/user4-128x128.jpg')}}" alt="User profile picture">
  
                <h3 class="profile-username text-center">Putri Siregar</h3>
  
                <p class="text-muted text-center">Langganan sejak 01-09-2019</p>
                <p class="text-muted text-center">Kode Afiliasi : url/regafiliasiuserister/</p>
                
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Nama Bank</b> <p class="pull-right">Mandiri</p>
                  </li>
                  <li class="list-group-item">
                    <b>Nomor Rekening</b> <p class="pull-right">1230331180001</p>
                  </li>
                  <li class="list-group-item">
                    <b>Nama Rekening</b> <p class="pull-right">Putra Siregar</p>
                  </li>
                </ul>
  
                <a href="#" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          

@endsection