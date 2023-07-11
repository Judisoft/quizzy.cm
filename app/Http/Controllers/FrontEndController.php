<?php

namespace App\Http\Controllers;
use App\Models\Quiz;

use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function about()
    {
        //
    }

    public function plans()
    {
        return view('plans');
    }

    public function help()
    {
        return view('help');
    }

    public function contact()
    {
        return view('contact');
    }
    
    public function comingSoon() 
    {
        return view('coming-soon');
    }
}
