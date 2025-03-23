<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function dashboard(Request $request)
    {
        $data = array();
        if ($request->expectsJson()) {
            return response()->json($data, 200);
        }
        return view('dashboard.index')->with($data);
    }
}
