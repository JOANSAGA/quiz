<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{

    protected function getUsuario()
    {
        $data = User::paginate(5);
        return [
            'pagination' => [
                'total' => $data->total(),
                'current_page' => $data->currentPage(),
                'per_page' => $data->perPage(),
                'last_page' => $data->lastPage(),
                'from' => $data->firstItem(),
                'to' => $data->lastItem(),
            ],
            'User' => $data,
        ];
    }
    protected function editUsuario()
    {
        $User = User::find(request('_id'));
        $User->update([
            'name' => request('name'),
            'rol' => request('rol'),
        ]);
        return 'success';
    }

    //user estudiante
    protected function userData()
    {
        $_id = auth()->user()->_id;
        $User = User::where('_id', '=', $_id)->get();
        //find(auth()->user()->email);
        return [
            'userData' => $User,
            '_id' => $_id
        ];
    }
    protected function addMateriaEst()
    {
        $User = User::find(request('_id'));
        $User->push('materias', request('materia'), true);
        return 'success';
    }
}
