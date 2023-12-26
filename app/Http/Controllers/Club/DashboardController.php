<?php

namespace App\Http\Controllers\Club;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() 
    {
        return Inertia::render('Club/Dashboard',);
    }
}
