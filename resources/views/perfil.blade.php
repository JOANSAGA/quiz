@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3">
                <div class="card">
                    <div class="card-header">Datos Personales</div>
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
        
    </div>
@endsection
