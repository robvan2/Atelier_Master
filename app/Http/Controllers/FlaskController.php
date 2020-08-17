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
            return Http::get('http://127.0.0.1:8000/test',['name' => $name]);
        }
        return response(['message'=>'failed to get image please retry'],200);
    }
    public function predict(Request $request)
    {
        return public_path('/storage/images/test/'+$request->name);
        $image = fopen(public_path('/storage/images/test/'+$request->name), 'r');
        $response = Http::attach(
                'image',
                $image,
                $request->name
        )->post('http://ca147890b483.ngrok.io/predict');
        return $response->body();
    }
    
}
