@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3 class="text-center">
                    Usuario:
                    <strong>{{ Auth::user()->name }}</strong>
                    no tiene un rol asisgnado
                </h3>
            </div>
        </div>
        <div class="row pt-4 d-flex justify-content-center">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Datos</div>
                    <div class="card-body">
                        <strong>Nombre: </strong>{{ Auth::user()->name }}
                        <br>
                        <strong>email: </strong>{{ Auth::user()->email }}
                        <br>
                        <strong>rol:</strong>
                        @if (Auth::user()->rol)
                            {{ Auth::user()->rol }}
                        @else
                            sin asignar
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row pt-4">
            <div class="col-12">
                <h4 class="text-center">
                    Espere que se asigne un rol o comunique el inconveniente con un docente o administrador.
                </h4>
            </div>
        </div>
    </div>
@endsection
