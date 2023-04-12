<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index() {
        return view('guest.home');
    }
}