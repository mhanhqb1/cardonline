<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Show user backend dashboard
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        return view('users.admin_dashboard');
    }
}
