<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Professor;

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
        return view('home');
    }

    public function firstLogin(Professor $professor)
    {
        if (is_object($professor)) {
            return view('professores.edit', compact('professor'));
        } else {
            return view('professores.create', compact('professor'));
        }
    }
}
