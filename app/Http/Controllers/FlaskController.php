<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlaskController extends Controller
{
    public function sendImage(Request $request)
    {
        /*$request->validate([
            'image' => ['image', 'max|1999']
        ]);
        $image = $request->file('prize_image');*/
        //$image = public_path('/acc resnet50.png');
        $image = fopen(public_path('/acc resnet50.png'), 'r');

        $response = Http::attach(
            'image',
            $image,
            'acc resnet50.png'
        )->post('http://127.0.0.1:5000/predict');
        return $response->body();
    }
}
