<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examen;
use App\registroExamen;


class ExamenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function create()
    {
        Examen::create([
            'user' => request('user'),
            'name' => request('name'),
            'inicio' => request('inicio'),
            'tiempo' => request('tiempo'),
            'materia' => request('materia'),
            'items' => request('items'),
            'estado' => 'A',
        ]);
        return 'success';
    }
    protected function getExamen($status, $materia)
    {
        if ($materia == 'todas') {
            $data = Examen::where('estado', '=', $status)->paginate(5);
        } else {
            $data = Examen::where('estado', '=', $status)->where('materia', '=', $materia)->paginate(5);
        }
        return [
            'pagination' => [
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
            ],
            'examenes' => $data,
        ];
    }
    protected function inactivar($_id)
    {
        $Examen = Examen::find($_id);
        $Examen->update([
            'estado' => 'I'
        ]);
        return 'success';
    }
    protected function activar($_id)
    {
        $Examen = Examen::find($_id);
        $Examen->update([
            'estado' => 'A'
        ]);
        return 'success';
    }
    protected function editExamen()
    {
        $Examen = Examen::find(request('_id'));
        $Examen->update([
            'user' => request('user'),
            'name' => request('name'),
            'inicio' => request('inicio'),
            'tiempo' => request('tiempo'),
            'materia' => request('materia'),
            'items' => request('items'),
        ]);
        return 'success';
    }

    protected function goExamen($id)
    {
        $Examen = Examen::find($id);
        return view('student',  ['Examen' => $Examen]);
    }
    protected function getExamenEst($id)
    {
        $Examen = Examen::find($id);
        return ['data' => $Examen];
    }
    protected function saveExamen()
    {
        $Examen = registroExamen::create([
            'idEsrudiante' => auth()->user()->_id,
            'idexamen' => request('idexamen'),
            'respuestas' => request('respuestas'),
        ]);
        return 'success';
    }
}
