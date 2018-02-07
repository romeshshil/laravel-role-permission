<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       if(Auth::user()->hasRole('superadmin')) {
            // redirect to admin dashboard
            return redirect('superadmin/dashoboard');

        }elseif(Auth::user()->hasRole('admin')){
            // redirect to uno dashboar/d
            return redirect('/admin/dashboard/');

        }elseif(Auth::user()->hasRole('subscriber')){

            return redirect('/subscriber/dashboard');

        } elseif(Auth::user()->hasRole('demouser')){
            return redirect('/subscriber/dashboard');

        }
    }

      public function superadmin()
    {
        return view('dashboard.superadmin');
    }

     public function admin()
    {
        return view('dashboard.admin');
    }

     public function subscriber()
    {
        return view('dashboard.subscriber');
    }

}
