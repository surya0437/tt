<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemoController extends Controller
{

    public function ajaxLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return response()->json(['status' => 'success', 'message' => 'Login successful']);
        }

        return response()->json(['status' => 'error', 'message' => 'Invalid credentials']);
    }
}
