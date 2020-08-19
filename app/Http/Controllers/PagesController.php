<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function prediction()
    {
        return view('prediction.index');
    }
    public function results()
    {
        return view('training.results');
    }
}
