<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pageController extends Controller
{
    public function login (){
        return view('login');
    }
    public function signUp (){
        return view('signUp');
    }
    public function aktivasi (){
        return view('aktivasi');
    }
    //admin controller
    public function addDataMaster(){
        return view('admin.pages.formMasterPlayer');
    } 
    public function editDataMaster($id){
        return view('admin.pages.formMasterPlayer',['nama'=> 'Yusuf_Wibisono', 'id'=>$id]);
    }   
    public function indexAdmin (){
        return view('admin.pages.landing');
    }
    public function masterLayout (){
        return view('admin.pages.masterLayout');
    }
    public function masterKategori (){
        return view('admin.pages.masterKategori');
    }
    public function masterMedia (){
        return view('admin.pages.masterMedia');
    }
    public function masterPlayer (){
        return view('admin.pages.masterPlayer');
    }
    public function masterAfiliasi (){
        return view('admin.pages.masterAfiliasi');
    }
    public function listClient (){
        return view('admin.pages.listClient');
    } 
    public function setupPaket (){
        return view('admin.pages.setupPaket');
    } 
    public function setupPlaylist (){
        return view('admin.pages.setupPlaylist');
    }
    public function pesananTayang (){
        return view('admin.pages.pesananTayang');
    } 
    public function konfirmasiPemabayaran (){
        return view('admin.pages.konfirmasiPemabayaran');
    } 
    public function konfirmasiWithdraw (){
        return view('admin.pages.konfirmasiWithdraw');
    } 
    public function daftarRequestPlayer (){
        return view('admin.pages.daftarRequestPlayer');
    } 
    public function riwayatPesanan (){
        return view('admin.pages.riwayatTransaksiPesanan');
    }  
    
    //usercontroller
    public function indexUser(){
        return view('user.pages.home');
    }
    public function profile(){
        return view('user.pages.profile');
    }
    public function editProfile(){
        return view('user.pages.formEditProfile');
    }
    public function paketAktif(){
        return view('user.pages.paketAktif');
    }
    public function listAfiliasi(){
        return view('user.pages.listAfiliasi');
    }
    public function withdraw(){
        return view('user.pages.withdrawAmount');
    }
    public function riwayat(){
        return view('user.pages.rekapAfiliasi');
    }
    public function pesan(){
        return view('user.pages.pesan');
    }
    public function upload(){
        return view('user.pages.uploadContent');
    }
    public function uploadBP(){
        return view('user.pages.uploadBP');
    }
}
