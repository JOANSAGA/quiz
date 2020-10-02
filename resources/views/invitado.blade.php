@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-6">
                Usuario: 
                <strong>{{ Auth::user()->name }}</strong>
                no tiene un rol asisgnado
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header">Perfil</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <strong>id: </strong>{{ Auth::user()->_id }}
                        <br>
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
    </div>
@endsection
