<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Preguntas;

class PreguntaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    protected function create()
    {
        Preguntas::create([
            'pregunta' => request('pregunta'),
            'materia' => request('materia'),
            'litA' => request('litA'),
            'litB' => request('litB'),
            'litC' => request('litC'),
            'litD' => request('litD'),
            'litCorrecto' => request('litCorrecto'),
            'estado' => 'A',
        ]);
        return 'success';
    }

    protected function editPregunta()
    {
        $Preguntas = Preguntas::find(request('_id'));
        $Preguntas->update([
            'pregunta' => request('pregunta'),
            'materia' => request('materia'),
            'litA' => request('litA'),
            'litB' => request('litB'),
            'litC' => request('litC'),
            'litD' => request('litD'),
            'litCorrecto' => request('litCorrecto'),
        ]);
        return 'success';
    }

    protected function inactivar($_id)
    {
        $Preguntas = Preguntas::find($_id);
        $Preguntas->update([
            'estado' => 'I'
        ]);
        return 'success';
    }
    protected function activar($_id)
    {
        $Preguntas = Preguntas::find($_id);
        $Preguntas->update([
            'estado' => 'A'
        ]);
        return 'success';
    }

    protected function getPregunta($status, $materia)
    {
        if ($materia == 'todas') {
            $data = Preguntas::where('estado', '=', $status)->paginate(5);
        } else {
            $data = Preguntas::where('estado', '=', $status)->where('materia', '=', $materia)->paginate(5);
        }
        //$data = Preguntas::where('estado', '=', $status)->where('materia', '=', $materia)->paginate(5);
        return [
            'pagination' => [
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
            ],
            'preguntas' => $data,
            'user' => [
                'email' => auth()->user()->email,
                'nombre' => auth()->user()->name
            ]
        ];
    }

    protected function cargarPreguntas($preguntas)
    {
        $preguntas = explode(",", $preguntas);
        $data = Preguntas::whereIn('_id', $preguntas)->get();
        return ['data' => $data];
    }
}
