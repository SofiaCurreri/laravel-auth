<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index() {
        return view('guest.home');
    }
}