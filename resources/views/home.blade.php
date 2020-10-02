@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ Auth::user()->rol }}</h1>
        <div class="row">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="examen-tab" data-toggle="tab" href="#examen" role="tab"
                            aria-controls="examen" aria-selected="true">Examenes</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="preguntas-tab" data-toggle="tab" href="#preguntas" role="tab"
                            aria-controls="preguntas" aria-selected="false">Preguntas</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="materia-tab" data-toggle="tab" href="#materia" role="tab"
                            aria-controls="materia" aria-selected="false">Materias</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade" id="examen" role="tabpanel" aria-labelledby="examen-tab">
                        @include('partials/examen')</div>
                    <div class="tab-pane fade" id="preguntas" role="tabpanel" aria-labelledby="preguntas-tab">
                        @include('partials/preguntas')
                    </div>
                    <div class="tab-pane fade show active" id="materia" role="tabpanel" aria-labelledby="materia-tab">
                        @include('partials/materia')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
