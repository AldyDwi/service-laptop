<?php

namespace App\Http\Controllers\admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\ServiceCategory;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index() {
        return view('admin.dashboard');
    }
}
