@extends('user.master')


@section('judul', 'Dasboard')
@section('deskripsi', 'Silahkan pilih paket iklan')
@section('content')

     @foreach($pakets as $p)
     @if(\Carbon\Carbon::now()->format('Y-m-d') > \Carbon\Carbon::parse($p->startShow)->format('Y-m-d')
     && \Carbon\Carbon::now()->format('Y-m-d') < \Carbon\Carbon::parse($p->endShow)->format('Y-m-d')
     || \Carbon\Carbon::now()->format('Y-m-d') == \Carbon\Carbon::parse($p->startShow)->format('Y-m-d')
     || \Carbon\Carbon::now()->format('Y-m-d') == \Carbon\Carbon::parse($p->endShow)->format('Y-m-d'))
     <div class="card" style="text-align:center;" >
     <div class="box box-info box-paket">
            <div class="box-header">
                <div class="paket">Paket</div>
                <h3 style="margin : 0;">
                    {{ $p->nama }}
                </h3>
            </div>
            <div class="box-body">
            <p class="box-subtitle" style="margin : 0;"><b>{{$p->jumlahFile}}</b> Content Gambar Slideshow</p>
            <p class="box-subtitle" style="margin : 0;"><b>{{$p->jumlahPlayer}}</b> Player</p>
            <p class="box-subtitle" style="margin : 0;">Durasi <b>{{$p->durasi}}</b> hari</p>
            <div class="box-harga">
              @php
                  echo "Rp ". number_format($p->harga,0,',','.');
              @endphp
            </div>
          </div>
          <a href="{{ route('pesan', $p->id) }}"><button class="btn btn-pesan">Pesan Sekarang</button></a>
          </div>
        </div>
     @endif
     @endforeach
@endsection
