<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Admin Panel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

		<!-- amCharts javascript sources -->
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/amcharts.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/pie.js"></script>
		<script type="text/javascript" src="https://www.amcharts.com/lib/3/themes/light.js"></script>


</head>
<body>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" 
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" 
        crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" 
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" 
        crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" 
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" 
        crossorigin="anonymous">
    </script>

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" type="text/javascript"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <div id="app">
        <div class="wrapper">
            <!-- Sidebar  -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3 class="text-center">Prediction de Pneumonie</h3>
                </div>

                <ul class="list-unstyled components">
                    <p class="text-center">Bonjour {{Auth::user()->name}}</p>
                    <li class="">
                        <a href="#prediction" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                            Prédictions
                        </a>
                        <ul class="collapse list-unstyled" id="prediction">
                            <li>
                                <a href="/prediction">Accueil</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#model" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Modèles</a>
                        <ul class="collapse list-unstyled" id="model">
                            <li>
                                <a href="/model/results">Our results</a>
                            </li>
                            @if (Auth::user()->role->role == 'admin')
                                <li>
                                    <a href="/model/training">Train a model</a>
                                </li>
                            @endif
                        </ul>
                    </li>
                    @if (Auth::user()->role->role == 'admin')
                        <li>
                            <a href="/users">Utilisateurs</a>
                        </li>
                    @endif
                    <li class="active">
                        <a href="/">Accueil</a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li>
                        <a href="/logout" id="logout" class="btn btn-default btn-block">Déconnecter</a>
                    </li>
                </ul>
            </nav>
            <div id="content">

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">

                        <button type="button" id="sidebarCollapse" class="btn btn-info">
                            <i class="fa fa-align-left"></i>
                            <span>menu des tâches</span>
                        </button>
                        <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fa fa-align-justify"></i>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="nav-item active mr-5">
                                    <a class="nav-link" href="/">Accueil</a>
                                </li>
                                <li class="nav-item">

                                    <a class="nav-link" href="/logout">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Déconnecter
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>

                @yield('content')
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <style>
        #logout{
            color: #fff
        };
        #logout:hover{
            color: #3f81d8;
        };
    </style>
</body>
</html>
