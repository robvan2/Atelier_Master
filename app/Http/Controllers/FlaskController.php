<?php

namespace App\Http\Controllers;

use App\UserServerUrl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

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
        $serverUrl = Auth::user()->serverUrl;
        if (!$serverUrl) {
            return response(['message' => 'Server url is not defined .'], 422);
        }
        $request->validate([
            'image' => ['required']
        ]);
        $img_url = public_path('storage/images/test/' . $request->image);
        $image = fopen($img_url, 'r');
        $response = Http::attach(
            'image',
            $image,
            $request->image
        )->post($serverUrl->url . 'predict');
        File::delete($img_url);
        return $response->body();
    }
    public function setUrl(Request $request)
    {
        $request->validate([
            'serverUrl' => ['required', 'url']
        ]);
        $serverUrl = Auth::user()->serverUrl;
        if (!$serverUrl) {
            $serverUrl = new UserServerUrl();
            $serverUrl->user_id = Auth::user()->id;
        }
        $serverUrl->url = $request->serverUrl;
        $serverUrl->save();
        return response(['message' => 'url saved'], 200);
    }
}
