<?php

namespace App\Http\Controllers\Fq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CysticFibrosisRequest extends Controller
{
    public function index()
    {
        return view('fq.welcome');
    }

    public function home()
    {
        return view('fq.home');
    }


}
