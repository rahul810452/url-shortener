<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if($user->hasRole('SuperAdmin'))
        {
            return view('dashboard.super-admin');
        }

        if($user->hasRole('Admin'))
        {
            return view('dashboard.admin');
        }

        if($user->hasRole('Member'))
        {
            return view('dashboard.member');
        }

        abort(403);
    }
}
