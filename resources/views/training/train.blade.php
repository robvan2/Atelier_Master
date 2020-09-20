@extends('layouts.app')

@section('content')

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<div class="container border rounded" style="background-color: #f8f9fa">
    <div class="row text-center mt-4">
            <h3 class="col-8 offset-2">
                Entrainement du modèle
            </h3>
            @include('layouts.serverUrl')
    </div>

    <div class="row">
        <div class="container-fluid">
            <div class="row">
                <form class="form col-10 offset-1" method="POST" onsubmit="startTrain(this);">
                    @csrf
                        <div class="line"></div>
                        <div class="row">
                            <h5 class=" col-12 mb-4 text-center">
                                Options du modèle :
                            </h5>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="model" class="col pt-2">Model de base : </label>
                                <select class="form-control col" name="model" id="model" required>
                                  <option value="inception_v3">Inception V3</option>
                                  <option value="mobile_net_v2">MobileNet V2</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label class="col pt-2" for="epochs">Epoques :</label>
                                <input type="number"
                                  class="form-control col" name="epochs" id="epochs" value="5" min="1" max="20" step="1" required>
                            </div>
                            <div class="form-group col">
                                <label for="callback" class="col pt-2">Point de controle : </label>
                                <select class="form-control col" name="callback" id="callback" required>
                                  <option value="val_accuracy">Justesse durat la validation</option>
                                  <option value="val_loss">Perte durant la validation</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col">
                            <label for="data_aug" class="col pt-2">Augmentation de données : </label>
                            <select class="form-control col" name="data_aug" id="data_aug" required>
                              <option value="simple">Simple (4 facteurs plus recomondée pour ce Dataset)</option>
                              <option value="advanced">Avancée (6 facteurs)</option>
                            </select>
                        </div>
                        <div class="line"></div>
                        <div class="row">
                            <h5 class=" col-12 mb-4 text-center">
                                Options d'optimiseur :
                            </h5>
                        </div>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="optimizer" class="col pt-2">Optimiseur : </label>
                                <select class="form-control col" name="optimizer" id="optimizer" required>
                                  <option value="adam">Adam</option>
                                  <option value="rmsprop">RMSprop</option>
                                </select>
                            </div>
                            <div class="form-group col">
                                <label class="col pt-2" for="lr">Learning rate :</label>
                                <input type="number"
                                  class="form-control col" name="lr" id="lr" value="0.001" min="0.0000001" max="0.01" step="0.0000001" required>
                            </div>
                        </div>

                        @include('layouts.errors')

                        <button id="sub" type="submit" class="mb-3 mt-3 btn btn-lg btn-success col">
                            <span id="loading" class="spinner-border spinner-border-md mr-2" role="status" aria-hidden="true" style="display: none"></span>
                            Envoyer
                        </button>
                </form>
            </div>


        </div>
    </div>



</div>

<script>
    function startTrain(form) {
            event.preventDefault();
            var sub = $('#sub');
            let span = $('#loading');
            span.css('display','');
            sub.html(span);
            let formData = new FormData(form);
            axios.post('/model/training',formData)
                .then(function (response) {
                    alert(response.data['success']);
                    span.css('display','none');
                    sub.html(sub.html() + 'Envoyer');
                })
                .catch(function (error) {
                    console.log(error);
                });
     };
</script>
@endsection