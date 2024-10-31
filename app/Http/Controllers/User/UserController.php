<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index() {
        return view('home');
    }
    public function about() {
        return view('about');
    }
    public function service() {
        return view('service');
    }
    public function booking() {
        return view('user.booking');
    }
}
