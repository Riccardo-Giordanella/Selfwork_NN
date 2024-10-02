<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function home() {
    return view('welcome');
    }

    public function register() {
    return view('auth.register');
    }
}
