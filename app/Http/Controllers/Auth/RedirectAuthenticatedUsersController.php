<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RedirectAuthenticatedUsersController extends Controller
{
    public function home()
    {
        if (auth()->user()->role == 'ict_developer') {
            return redirect('developerDashboard');
        }
        elseif(auth()->user()->role == 'ict_section'){
            return redirect('sectionDashboard');
        }
        elseif(auth()->user()->role == 'ict_group_leader'){
            return redirect('groupLeaderDashboard');
        }
        elseif(auth()->user()->role == 'ict_technician'){
            return redirect('technicianDashboard');
        }
        elseif(auth()->user()->role == 'ict_admin'){
            return redirect('adminDashboard');
        }
        else{
            return redirect('/login');
        }
    }
}
