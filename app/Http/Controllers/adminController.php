<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Player;
use App\User;

class adminController extends Controller
{
    public function masterPlayer (){
        $player = Player::get();

        return view('admin.pages.masterPlayer',['player'=>$player]);
    }

    public function listClient (){
        $client = User::orderBy('tipeClient','asc')->get();

        return view('admin.pages.listClient',['client'=>$client]);
    }
}
