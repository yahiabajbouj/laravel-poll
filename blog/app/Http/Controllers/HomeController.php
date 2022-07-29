<?php

namespace App\Http\Controllers;

use App\Contestant;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $contestants = Contestant::all();
        return view('index', compact('contestants'));
    }

    public function vote(Request $request){
        Contestant::find($request->contestantId)->increment('vote_count');
        $request->session()->put('voted', true);
        return back();
    }
}
