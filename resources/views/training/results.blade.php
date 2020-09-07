@extends('layouts.app')

@section('content')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        $integrity="sha512-s+xg36jbIujB2S2VKfpGmlC3T5V2TF3lY48DX7u2r9XzGzgPsa6wTpOQA7J9iffvdeBN0q9tKzRxVxw1JviZPg=="
        crossorigin="anonymous">
    </script>

    <div class="container text-justify mb-5">
        <div class="row d-block ">
            <h1 class="text-center">
                Evolution durant l'entrainement
            </h1>
        </div>
        <div class="row mt-5">
            <div class="container d-block col-md-6 col-12 p-4">
                <p>Durant la phase d'entraînement, nous avons observé l'évolution de deux métriques par
                    ensemble de données (entrainement & validation) pour ensuite pouvoir évaluer les résultats
                    obtenus. Ces métriques sont : la perte durant l'entraînement, la justesse durant l'entraînement, 
                    , la perte durant la phase de validation, la justesse durant la phase de validation.</p>
            </div>
            <canvas id="training-loss" class="col-md-6 col-12 d-inline"></canvas>
        </div>
        <div class="row mt-5">
            <canvas id="training-accuracy" class="col-md-6 col-12 d-inline"></canvas>
            <div class="container d-block col-md-6 p-4">
                <p>Durant la phase de validation, les modèle qui ont bien convergé sont les modèles basés sur
                    : InceptionV3, EfficientNetB4 et MobileNetV2 , par contre les deux
                    autres modèles (ResNet50 et VGG-16) ont atteint de bonnes valeurs de perte et de justesse mais
                    avec des impulsions (non-stabilité) pour quelques époques, qui sont un
                    signe de surapprentissage (Overfiting). 
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="container d-block col-md-6 col-12 p-4">
                <p> Ce problème est une conséquence de la taille limitée de
                    l’ensemble de données de validation, ça n'empêche pas les modèles de bien performer durant la
                    phase d’évaluation (test). Pour cela, nous avons sauvegardé les modèles avec les meilleurs
                    résultats pendant cette phase pour ensuite les évaluer sur l’ensemble de test. 
                </p>
            </div>
            <canvas id="val-loss" class="col-md-6 col-12 d-inline"></canvas>
        </div>
        <div class="row mt-5">
            <canvas id="val-accuracy" class="col-md-6 col-12"></canvas>
            <div class="container d-block col-md-6">
                <p>
                    Les meilleurs résultats obtenus durant l'entraînement sont résumés dans le tableau ci-dessous:
                </p>
                <table class="table table-sm table-striped table-hover text-center col-12 col-md-12">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Modèle</th>
                            <th>Loss (epoch)</th>
                            <th>Accuracy (epoch)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row">Inception-V3</td>
                                <td>5.99 ∗ 10  (42)</td>
                                <td>100% (28)</td>
                            </tr>
                            <tr>
                                <td scope="row">Mobilenet V2</td>
                                <td>3.17 ∗ 10 (49)</td>
                                <td>99,8% (36)</td>
                            </tr>
                            <tr>
                                <td scope="row">VGG-16</td>
                                <td>2.93 ∗ 10   (33)</td>
                                <td>99,02%</td>
                            </tr>
                            <tr>
                                <td scope="row">Resnet-50</td>
                                <td>2.04 ∗ 10  (38)</td>
                                <td>100%  (14)</td>
                            </tr>
                            <tr>
                                <td scope="row">EfficientNetB4</td>
                                <td>2.22 ∗ 10  (40)</td>
                                <td>100%  (23)</td>
                            </tr>
                        </tbody>
                </table>
            </div>
        </div>
        <div class="line mt-5"></div>
        <div class="row d-block ">
            <h1 class="text-center">
                Evaluation des modèles
            </h1>
        </div>
        <div class="row mt-5 col-md-12 col-12">
            <p class="col-12 col-md-6">
                Durant la phase de test, les différents modèles ont donné des résultats très proches avec une
                justesse allant de 92.15% à 93.75%. La meilleure précision est de 98.72% donnée par le modèle
                basé sur MobileNet-V2. Par souci de simplification de la comparaison, on utilise la moyenne
                harmonique de précision et de rappel (sensitivité) qui s'appelle un F1-score, le meilleur résultat
                est donné par Inception-V3 avec un F1-score = 0.9502 qui permet de dire que ce modèle est le
                meilleur. 
            </p>
            <canvas id="bar-chart" class="col-md-6 col-12 d-inline"></canvas>
        </div>

        <div class="container mt-3">
            <h4 class="mb-5">Matrices de confusion</h4>

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
    </div>
    <script src="{{ asset('js/resChart.js') }}"></script>
@endsection
