<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $amount = \App\Models\Verify::where('user_id', auth()->user()->id)->pluck('amount')->sum();
        $count = \App\Models\Verify::where('user_id', auth()->user()->id)->pluck('verify_count')->count();
        return view('home' , compact('amount', 'count'));
    }
}
