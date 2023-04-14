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
        $meta['h1'] = 'Админка';

        $vars = (object)[];
        $vars->logo = asset('dist/img/AdminLTELogo.png');
        $vars->userPhoto = asset('dist/img/user2-160x160.jpg');
        $vars = json_encode($vars);

        return view('admin.index', compact('meta','vars'));
    }
}
