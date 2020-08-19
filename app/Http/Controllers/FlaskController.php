<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlaskController extends Controller
{
    public function sendImage(Request $request)
    {
        $request->validate([
            'image' => ['image']
        ]);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->storeAs('public/images/test/', $name);
            //need virtuel host
            $response = Http::post('http://127.0.0.2/test',['name' => $name]);
            return $response->body();
        }
        return response(['message'=>'failed to get image please retry'],400);
    }
    public function predict(Request $request)
    {   
        $img_url = public_path('/storage/images/test/'.$request->name);
        $image = fopen($img_url, 'r');
        $response = Http::attach(
                'image',
                $image,
                $request->name
        )->post('http://69acaee121f3.ngrok.io/predict');
        return $response->body();
    }
    
}
