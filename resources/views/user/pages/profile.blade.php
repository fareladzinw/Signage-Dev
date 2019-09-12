@extends('user.master')
@section('content')
          <!-- Profile Image -->
            <div class="box box-primary col-md-4">
              <div class="box-body box-profile">
                <img class="profile-user-img img-responsive img-circle" src="{{ asset('images/'. $user->foto) }}" alt="User profile picture">
  
                <h3 class="profile-username text-center">{{ $user->nama}}</h3>
  
                <p class="text-muted text-center">{{ $user->email }}</p>
                <p class="text-muted text-center">Langganan sejak {{ \Carbon\Carbon::parse($user->created_at)->format('d-m-Y') }}</p>
                <p class="text-muted text-center">Kode Afiliasi : url/register/{{ $user->linkAfiliasi}}</p>
                
                <ul class="list-group list-group-unbordered">
                  <li class="list-group-item">
                    <b>Nama Bank</b> <p class="pull-right">{{ $user->namaBank}}</p>
                  </li>
                  <li class="list-group-item">
                    <b>Nomor Rekening</b> <p class="pull-right">{{ $user->nomorRekening}}</p>
                  </li>
                  <li class="list-group-item">
                    <b>Nama Rekening</b> <p class="pull-right">{{ $user->namaRekening }}</p>
                  </li>
                </ul>
  
                <a href="{{ route('editProfile', $user->id) }}" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
              </div>
              <!-- /.box-body -->
            </div>
            <!-- /.box -->
          

@endsection