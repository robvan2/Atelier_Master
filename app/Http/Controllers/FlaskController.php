<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;

class FlaskController extends Controller
{
    public function sendImage(Request $request)
    {
        $request->validate([
            'image' => ['image']
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->storeAs('public/images/test/', $name);
            return response(['image' => $name], 200, ['content' => 'application/json']);
        }
        return response(['message' => 'failed to get image please retry'], 400);
    }
    public function predict(Request $request)
    {
        $img_url = public_path('storage/images/test/' . $request->image);
        $image = fopen($img_url, 'r');
        $response = Http::attach(
            'image',
            $image,
            $request->image
        )->post('http://080d201fc840.ngrok.io/predict');
        File::delete($img_url);
        return $response->body();
    }
}
