<?php

namespace App\Http\Controllers;

use App\User;
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
    public function trainModel()
    {
        return view('prediction.train');
    }
    public function users()
    {
        $users = User::paginate(20);
        return view('admin.users')->with('users', $users);
    }
}
