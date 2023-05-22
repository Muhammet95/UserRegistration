<?php

namespace App\Http\Controllers;

use App\Models\Request as RequestAlias;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;

class RequestController
{
    public function save(Request $request)
    {
        try {
            Log::debug("data: " . json_encode($request->all()));

            $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'date' => 'required|date',
                'type' => 'required|string'
            ]);

            $data = $request->all();

            $id = Cookie::get('id');
            if (!$id)
                return response()->json(['status' => 'error']);

            $user = User::find($id);

            if (!$user)
                return response()->json(['status' => 'error']);

            RequestAlias::create([
                'user_id' => $user->id,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'email' => $data['email'],
                'date' => Carbon::createFromTimeString($data['date']),
                'type' => $data['type']
            ]);

            return response()->json(['status' => 'success']);
        } catch (\Exception $exception) {
            Log::error("error: " . $exception->getMessage());
            Log::error("error: " . $exception->getTraceAsString());

            return response()->json(['status' => 'error']);
        }
    }
}
