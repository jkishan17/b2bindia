<?php

namespace App\Http\Controllers\Jpanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        return view('jpanel.dashboard');
    }
}
