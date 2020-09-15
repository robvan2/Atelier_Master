<?php

namespace App\Http\Controllers;

use App\Prediction;
use App\User;
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
            'image' => ['required', 'image']
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = $image->getClientOriginalName();
            $image->storeAs('public/images/test/', $name);
            if ($request->helpus) {
                $ext = $image->getClientOriginalExtension();
                $str = rand();
                $new_name = md5($str);
                $file_name = $new_name . '.' . $ext;
                $image->storeAs('/dataset/new/', $file_name);
            }
            return response(['image' => $name], 200, ['content' => 'application/json']);
        }
        return response(['message' => 'failed to get image please retry'], 400);
    }
    public function predict(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $serverUrl = $user->serverUrl;
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
        $user->predictions_count = $user->predictions_count + 1;
        if ($response->object()->prediction) {
            $prediction = new Prediction();
            $prediction->user_id = $user->id;
            $prediction->predicted_class = $response->object()->prediction;
            $prediction->save();
        }
        $user->save();
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

    public function trainModel(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $serverUrl = $user->serverUrl;
        if (!$serverUrl) {
            return response(['message' => 'Server url is not defined .'], 422);
        }
        $serverUrl = $serverUrl->url . 'train';
        $request->validate([
            'model' => ['required', 'string'],
            'optimizer' => ['required', 'string'],
            'data_aug' => ['required', 'string'],
            'epochs' => ['required', 'integer', 'min:1', 'max:20'],
            'callback' => ['required', 'string'],
            'lr' => ['required', 'numeric', 'min:0.0000001', 'max:0.1']
        ]);

        $response = Http::post($serverUrl, [
            'model' => $request->model,
            'optimizer' => $request->optimizer,
            'data_aug' => $request->data_aug,
            'epochs' => $request->epochs,
            'callback' => $request->callback,
            'lr' => $request->lr
        ]);
        return $response->body();
    }
}
