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
                    <a href="{{ route('login') }}" class="navbar-brand">Login</a>

                    @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="navbar-brand">Register</a>
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
                        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Soluta, rerum? Et, debitis impedit autem tempora repudiandae optio saepe voluptatum obcaecati ducimus, quis harum! Quas dolorem eligendi pariatur vitae dolor ab!
                        Vero error, vitae asperiores cumque quidem hic temporibus odio. Aliquid tempore sequi quos odio modi ad cum voluptas! Id incidunt consequuntur impedit voluptas sed expedita saepe quod eaque ipsum eum.
                        Odio, dolor quaerat! Cupiditate rem impedit nostrum, dolorem magnam sapiente? Tempore dolorem numquam, voluptatem ipsam asperiores sit magni minus earum accusantium expedita error voluptatum animi nisi nemo quidem officia pariatur?
                        Alias velit dignissimos nihil temporibus? Ipsam unde in autem eveniet veniam eum atque adipisci libero labore perferendis distinctio corrupti, explicabo, nam voluptatum similique voluptatem deleniti minima aut error? Nobis, exercitationem!
                        Iusto earum sit facere minima, cumque sapiente possimus sequi, porro accusamus veritatis tempore quod voluptatibus dignissimos dolor, exercitationem provident. Reiciendis fuga excepturi ipsa magni aperiam nam praesentium animi similique autem.</p>
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
                                    <img src="/img/perfil.jpg" class="figure-img img-fluid rounded card-img pt-3" alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Guzman A.</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/perfil.jpg" class="figure-img img-fluid rounded card-img pt-3" alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Casquete L.</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/perfil.jpg" class="figure-img img-fluid rounded card-img pt-3" alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Contreras J.</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/perfil.jpg" class="figure-img img-fluid rounded card-img pt-3" alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Aquino M.</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-10 col-md-6 col-lg-4 pb-3">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4 align-middle">
                                    <img src="/img/perfil.jpg" class="figure-img img-fluid rounded card-img pt-3" alt="" sizes="" srcset="">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title">Diaz D.</h5>
                                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
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