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
        switch (auth()->user()->rol) {

            case 'Estudiante':
                return view('student');
                break;

            case 'Administrador':
                return view('home');
                break;

            case 'Docente':
                return view('home');
                break;

            case '':
                return view('invitado');
                break;

            default:
                break;
        }
    }

    public function perfil()
    {
        return view('perfil');
    }
}
