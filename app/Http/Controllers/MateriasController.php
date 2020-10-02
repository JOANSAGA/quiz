<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materias;

class MateriasController extends Controller
{

    protected function create()
    {
        $this->validate(
            request(),
            [
                'nombreMateria' => 'required',
                'nivel' => 'required',
                'descripcion' => 'required',
            ],
            [
                'nombreMateria.required' => "El campo nombre es requerido",
                'nivel.required' => "El campo nivel es requerido",
                'descripcion.required' => "El campo descripcion es requerido"
            ]
        );

        Materias::create([
            'nombreMateria' => request('nombreMateria'),
            'nivel' => request('nivel'),
            'descripcion' => request('descripcion'),
            'estado' => 'A',
        ]);

        return back();
    }

    public function inactivar()
    {
        Materias::where('_id', '=', request('_id'))->delete();
        return back()->with(['mensaje' => 'Datos del estudiante eliminados con exito']);
    }

    public function getMateria()
    {
        $data = Materias::paginate(5);
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
