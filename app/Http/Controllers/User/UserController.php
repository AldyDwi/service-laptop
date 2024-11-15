<?php

namespace App\Http\Controllers\User;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index() {
        $testimonials = Testimonial::all();
        return view('home', compact('testimonials'));
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
