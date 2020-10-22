@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ Auth::user()->rol }}</h1>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="examen-tab" data-toggle="tab" href="#examen" role="tab" aria-controls="examen" aria-selected="false">Examenes</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="pregunta-tab" data-toggle="tab" href="#pregunta" role="tab" aria-controls="pregunta" aria-selected="false">Preguntas</a>
                </li>
                @if (Auth::user()->rol == 'Administrador')
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="materias-tab" data-toggle="tab" href="#materias" role="tab" aria-controls="materias" aria-selected="false">Materias</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="materias-tab" data-toggle="tab" href="#usuarios" role="tab" aria-controls="usuarios" aria-selected="false">Usuarios</a>
                </li>
                @endif
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="examen" role="tabpanel" aria-labelledby="examen-tab">
                    <div class="continer py-3 px-4">
                        <div class="row">
                            <div class="col-12" id="listExamen">
                                <examen-component></examen-component>
                            </div>
                        </div>
                    </div>
                </div>
                @if (Auth::user()->rol == 'Administrador')
                <div class="tab-pane fade" id="materias" role="tabpanel" aria-labelledby="materias-tab">
                    <div class="continer py-3 px-4">
                        <div class="row">
                            <div class="col-12" id="listMaterias">
                                <materia-component></materia-component>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="usuarios" role="tabpanel" aria-labelledby="usuarios-tab">
                    <div class="continer py-3 px-4">
                        <div class="row">
                            <div class="col-12" id="listUsuarios">
                                <usuarios-component></usuarios-component>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                <div class="tab-pane fade" id="pregunta" role="tabpanel" aria-labelledby="pregunta-tab">
                    <div class="continer py-3 px-4">
                        <div class="row">
                            <div class="col-12" id="listPreguntas">
                                <pregunta-component></pregunta-component>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
