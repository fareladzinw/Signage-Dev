<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Paket;
use App\Pesanan;
use App\User;

class UserController extends Controller
{
    /**
     * Load landing page user
     * @return Resource\Views\user\pages\home.blade.php
     */   
    public function homepage() 
    {
        $pakets = Paket::all();
        return view('user.pages.home')->with(['pakets' => $pakets]);
    }

    /**
     * Load landing page user
     * @return Resource\Views\login.blade.php
     */   
    public function paketAktif() 
    {
        $user     = User::where('id', Auth::user()->id)->get();
        if($user[0]->tipeClient == 'user') {
            $pesanans = Pesanan::where('user_id', $user[0]->id)->get();
            return view('user.pages.paketAKtif')->with(['pesanans' => $pesanans]);
        }
        
    }
}
