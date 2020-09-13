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


        <form class="p-3 border border-dark rounded" method="POST" action="http://127.0.0.1:5001/train">
            @csrf
            <div class="form-group">
                <label for="epoche">Nombre d'epoche</label>
                <input type="number" class="form-control" id="epoche"
                        name="epoche" aria-describedby="epoche" placeholder="Nombre d'epoche">
            </div>
            <div class="form-group">
                <label for="step_epoch">Etape par epoch</label>
                <input type="number" class="form-control"
                       name="step_epoch" id="step_epoch" placeholder="etape par epoche">
            </div>
            <p class="text-dark mb-3">Option d'optimizeur </p>


            <div class="row">
                <div class="col">
                    <label for="optimzer">Optimizeur</label>
                    <select class="custom-select d-block w-100" name="optimizer">
                        <option>adam</option>
                      </select>
                </div>

                <div class="col">
                    <label for="loss_function">Fonction de perte</label>
                    <select class="custom-select d-block w-100" name="loss_function">
                        <option>binary_crossentropy</option>
                      </select>
                </div>

                <div class="col">
                    <label for="loss_function">Taux d'apprentissage</label>
                    <select class="custom-select d-block w-100" name="learning_rate">
                        <option>0.0001</option>
                        <option>0.0002</option>
                        <option>0.0003</option>
                        <option>0.1</option>
                        <option>0.2</option>
                        <option>0.3</option>
                      </select>
                </div>
                </div>

            <button type="submit"  onclick="hide()"class="btn btn-success btn-lg btn-block mt-3">envoyer</button>
            </form>


    </div>
    <div class="col-2"></div>
</div>

<div class="row mt-5">
    <div class="col-2"></div>
    <div class="col-8">

        <div class="progress" id='progress'>
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar"
             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
        </div>
    </div>
    <div class="col-2"></div>

</div>

</div>
<script>

    function hide(){

        document.getElementById('progress').style.

    }
</script>
@endsection
