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


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function guru()
    {
        return view('guru.dashboard');
    }

    public function murid()
    {
        return view('murid.dashboard');
    }


    public function downloadPanduan()
    {
        $panduan = public_path('assets/image/1.jpg');
        return response()->download($panduan);
    }
}
