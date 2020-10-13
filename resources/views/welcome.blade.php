<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bienvenidos</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-light shadow bg-white">
            <div class="container justify-content-end">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/home') }}" class="navbar-brand">Home</a>
                        @else
                            <a href="{{ route('login') }}" class="navbar-brand">Iniciar sesión</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="navbar-brand">Registrarse</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </nav>

        <div class="container pt-5">
            <h1>Sistema de Evaluacion</h1>
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-9">
                    <p class="text-justify">
                        Debido a la era digital y en la que se vive, los sistemas son herramientas necesarias para
                        incorporarlas en las estrategias de enseñanza - aprendizaje. Un sistema web que puede ser usado
                        como una herramienta que facilite los procesos de enseñanza y aprendizaje. Por lo tanto este
                        proyecto se desarrolla con la finalidad de poder involucrar a la Escuela Fiscal "Divicion d
                        Infanteria No.3 Guayas"con la tecnología y la innovación de la educación, a través de
                        entrevistas y observación se determina una carencia en las materias, por falta de motivación ya
                        que en estos tiempos los niños no pueden ir a dar examenes de manera presencial en la
                        institucion, la investigación de la educación con la tecnología se promueve para involucrar a
                        los niños con juegos y con gamificación. Ante la necesidad de recursos para incorporar un
                        sistema que permita el aprendizaje de las materias en los estudiantes de la unidad educativa, se
                        justifica el desarrollo de este proyecto.
                    </p>
                </div>
                <div class="col-sm-6 col-md-3">
                    <img src="/img/logo.png" class="figure-img img-fluid rounded" alt="" sizes="" srcset="">
                </div>
            </div>
        </div>
        <div class="bg-white py-5">
            <div class="container">
                <h2>Desarrollado por:</h2>
                <div class="row justify-content-center">
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/guzman2.jpg" class="figure-img img-fluid rounded card-img pt-3"
                                        alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Guzman A.</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/casquete2.jpg" class="figure-img img-fluid rounded card-img pt-3"
                                        alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Casquete L.</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/contreras2.jpg" class="figure-img img-fluid rounded card-img pt-3"
                                        alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Contreras J.</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/aquino2.jpg" class="figure-img img-fluid rounded card-img pt-3"
                                        alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Aquino M.</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/diaz2.jpg" class="figure-img img-fluid rounded card-img pt-3" alt=""
                                        sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Diaz D.</h5>
                                        <p class="card-text"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer>
            <nav class="navbar navbar-dark bg-dark justify-content-center">
                <div class="row">
                    <div class="col-"></div>
                </div>
                <div class="text-center text-white">
                    <span>© Sistema de Evaluacion 2020 - Todos los derechos reservados</span>
                </div>
            </nav>
        </footer>
        <!--Vue's dominion-->
    </div>
</body>

<script src="{{ asset('js/app.js') }}" defer></script>

</html>
