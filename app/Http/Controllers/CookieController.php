<?php

namespace App\Http\Controllers;

use App\Models\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cookie;

class CookieController
{
    public function check()
    {
        if (!Cookie::has('id') || empty(Cookie::get('id'))) {
            $user = User::create();
            Cookie::queue('id', $user->id, 60*24*30);
        }

        return response()->json(['status' => 'success', 'data' => Request::getRequests(Cookie::get('id'))]);
    }
}
