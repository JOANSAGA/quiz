<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materias;

class MateriasController extends Controller
{

    protected function create()
    {
        Materias::create([
            'nombreMateria' => request('nombreMateria'),
            'nivel' => request('nivel'),
            'descripcion' => request('descripcion'),
            'estado' => 'A',
        ]);
        return 'success';
    }
    protected function editMateria()
    {
        $materias = Materias::find(request('_id'));
        $materias->update([
            'nombreMateria' => request('nombreMateria'),
            'nivel' => request('nivel'),
            'descripcion' => request('descripcion'),
        ]);
        return 'success';
    }

    protected function inactivar($_id)
    {
        $materias = Materias::find($_id);
        $materias->update([
            'estado' => 'I'
        ]);
        return 'success';
    }
    protected function activar($_id)
    {
        $materias = Materias::find($_id);
        $materias->update([
            'estado' => 'A'
        ]);
        return 'success';
    }

    protected function getMateria($status)
    {
        $data = Materias::where('estado', '=', $status)->paginate(5);
        return [
            'pagination' => [
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
            ],
            'materias' => $data
        ];
    }
}
