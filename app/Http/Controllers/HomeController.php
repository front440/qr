<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = \Auth::user();
        switch ($user->role) {
            case "admin":                
                // return view('admin.dash.index', compact($user));
                return redirect('admin/alumnos/datos');
                break;
            case "user":
                return redirect('/user/home');
                return view('user.dash.noActive', ["user" => $user]);
                break;
            default:
                return view('home');
                break;
        }
    }
}
