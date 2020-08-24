@extends('layouts.app')

@section('content')

<div class="container-fluid">
<div class="row">
    <div class="col-2"></div>
    <div class="col-8">
        <h3 class="text-center">
            Entrainement du modèle
        </h3>
    </div>
    <div class="col-2"></div>
</div>

<div class="row mt-5">
    <div class="col-2"></div>
    <div class="col-8">
        <h5 class="ml-3">Entrainement du modèle</h5>


        <form class="p-3 border border-dark rounded" method="POST" action="">
            @csrf
            <div class="form-group">
                <label for="epoche">Nombre d'epoche</label>
                <input type="number" class="form-control" id="epoche"
                        name="epoche" aria-describedby="epoche" placeholder="Nombre d'epoche">
            </div>
            <div class="form-group">
                <label for="step_epoch">Password</label>
                <input type="number" class="form-control"
                       name="step_epoch" id="step_epoch" placeholder="etape par epoche">
            </div>
            <p class="text-dark mb-3">Option d'optimizeur </p>


            <div class="row">
                <div class="col">
                    <label for="epoche">Optimizeur</label>
                    <input type="text" id="optimizer"
                           name="optimize" class="form-control" placeholder="Optimizeur">
                </div>
                <div class="col">
                    <label for="epoche">Fonction de perte</label>
                    <select class="custom-select d-block w-100">
                        <option>binary crossentropy</option>
                      </select>
                </div>

                <div class="col">
                    <label for="epoche">Taux d'apprentissage</label>
                    <input type="number" class="form-control" name="learning_rate" id="learning_rate"
                    placeholder="Taux d'apprentissage">
                </div>
                </div>

            <button type="submit" class="btn btn-success btn-lg btn-block mt-3">envoyer</button>
            </form>


    </div>
    <div class="col-2"></div>
</div>

</div>

<div class="container-fluid">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <div class="carousel-item active">
            @include('confusion_matrix.matrix')
        </div>
        <div class="carousel-item">
            @include('confusion_matrix.matrix2')
        </div>
        <div class="carousel-item">
            @include('confusion_matrix.matrix')
        </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a>
</div>

</div>






@endsection
