<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   function Dashboard(Request $request)  {
    dd(Auth::user());
   }
}
