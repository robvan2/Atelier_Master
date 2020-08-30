@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        $integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
        crossorigin="anonymous">
    </script>

    <div class="container">
        <div class="row d-block ">
            <h1 class="text-center">
                Evolution durant l'entrainement
            </h1>
        </div>
        <div class="row mt-5">
            <div class="container d-block col-md-6 col-12 p-4">
                <h2>lorem :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quasi impedit voluptates officiis aut explicabo. Officiis rem, quo laborum
                    quis laudantium nobis iure repellendus explicabo libero dicta fugiat in, vitae asperiores!</p>
            </div>
            <canvas id="training-loss" class="col-md-6 col-12 d-inline"></canvas>
        </div>
        <div class="row mt-5">
            <canvas id="training-accuracy" class="col-md-6 col-12 d-inline"></canvas>
            <div class="container d-block col-md-6 p-4">
                <h2>lorem :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quasi impedit voluptates officiis aut explicabo. Officiis rem, quo laborum
                    quis laudantium nobis iure repellendus explicabo libero dicta fugiat in, vitae asperiores!
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="container d-block col-md-6 col-12 p-4">
                <h2>lorem :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quasi impedit voluptates officiis aut explicabo. Officiis rem, quo laborum
                    quis laudantium nobis iure repellendus explicabo libero dicta fugiat in, vitae asperiores!
                </p>
            </div>
            <canvas id="val-loss" class="col-md-6 col-12 d-inline"></canvas>
        </div>
        <div class="row mt-5">
            <canvas id="val-accuracy" class="col-md-6 col-12 d-inline"></canvas>
            <div class="container d-block col-md-6 p-4">
                <h2>lorem :</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Quasi impedit voluptates officiis aut explicabo. Officiis rem, quo laborum
                    quis laudantium nobis iure repellendus explicabo libero dicta fugiat in, vitae asperiores!
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <canvas id="bar-chart" class="col-md-10 offset-md-1 col-12 d-inline"></canvas>
        </div>

        <div class="container">
            <h3>Matrice de confusion</h3>

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="3000">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        @include('confusion_matrix.vgg16')
                    </div>
                    <div class="carousel-item">
                        @include('confusion_matrix.resNet50')
                    </div>
                    <div class="carousel-item">
                        @include('confusion_matrix.mobileNet')
                    </div>
                    <div class="carousel-item">
                        @include('confusion_matrix.inceptionV3')
                    </div>
                    <div class="carousel-item">
                        @include('confusion_matrix.efficientNet')
                    </div>
                </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls"
                        role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls"
                        role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                        </a>
            </div>
        </div>
        <div class="row mt-5">
            <canvas id="kfold-acc" class="col-md-12 col-12 d-inline"></canvas>
        </div>
    </div>
    <script src="{{ asset('js/resChart.js') }}"></script>
    <script src="{{ asset('js/kfoldCharts.js') }}"></script>
@endsection
