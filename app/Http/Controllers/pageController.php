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
    public function indexAdmin (){
        return view('admin.pages.landing');
    } 
    public function masterPlayer (){
        return view('admin.pages.masterPlayer');
    }
    public function listClient (){
        return view('admin.pages.listClient');
    } 
    public function indexUser(){
        return view('user.pages.home');
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
    public function addDataMaster(){
        return view('admin.pages.formMaster');
    }  
}
