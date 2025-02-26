<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ExampleComtroller extends Controller
{
    public function index()
    {
        $user = \Illuminate\Support\Facades\Auth::user();
        return view('example', compact('user'));
    }
}
