<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;


class PlayerController extends Controller
{
    public function index(){
        $players = Player::all();
        return view('players', compact('players'));
    }
    public function show($id){
        $player = Player::with('team')->find($id);
        return view('single-player', compact('player'));
    }
}
