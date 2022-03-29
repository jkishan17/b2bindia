<?php

namespace App\Http\Controllers\Jpanel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\Module;
use App\Models\Language;
class DashboardController extends Controller
{
    //
    public function index(){
        return view('jpanel.dashboard');
    }
    public function adminSettings(){
        $totalModule = Module::all()->count();
        $totalRole = Role::all()->count();
        $totalUser = User::all()->count();
        $totalLanguage = Language::all()->count();
        return view('jpanel.adminSettings',['totalModule'=>$totalModule,'totalLanguage'=>$totalLanguage,'totalRole'=>$totalRole,'totalUser'=>$totalUser]);
    }
    
}
