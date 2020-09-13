@extends('layouts.app')

@section('content')
    <style>
        #img-overlay {
        position: absolute;
        top: 0;
        bottom: 0;
        left: 0;
        right: 0;
        height: 100%;
        width: 100%;
        opacity: 0;
        transition: .5s ease;
        background-color: #008CBA;
        }

        .img-text {
        color: white;
        font-size: 1rem;
        position: absolute;
        top: 30%;
        left: 0%;
        height: 100%;
        width: 100%;
        text-align: justify-center;
        }
        .img-inner-text{
            color: white;
        }
        .form-check *{
            cursor: pointer;
        }
        .form-check span{
            color: #03a9e0;
            text-decoration: underline;
        }
        .form-check span:hover{
            color: #005875;
        }
        #setting-btn{
            color: #818080; 
            cursor: pointer;
        }
        #setting-btn:hover {
            color: #5a5a5a;
        }
        #setting-btn:active {
            color: #161616;
        }
        
    </style>
    <div class="container border rounded" style="background-color: #f8f9fa">
        <div class="row text-center mt-2">
            <h1 class="col-8 offset-2">Prediction API</h1>
            <!-- Button trigger modal -->
            <i class="fa fa-3x fa-cog col-1 offset-1" id="setting-btn"aria-hidden="true" data-toggle="modal" data-target="#setServerUrl">
            </i>
            
            <!-- Modal -->
            <div class="modal fade" id="setServerUrl" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                            <div class="modal-header">
                                    <h5 class="modal-title">Set server URL</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                            </div>
                        <form method="POST" onsubmit="submitServerUrl(this);">
                            @csrf
                            <div class="modal-body">
                                <div class="container-fluid">
                                        <div class="form-group row">
                                        <label for="serverUrl col-4">Server URL : </label>
                                        <input type="text" class="form-control" name="serverUrl" id="serverUrl" placeholder="http://www.aaaa.bb/cc">
                                        </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="container mt-3">
                <p class="text-justify">
                    Cette page est utilisée pour predire (avec un pourcentage) la probabilité qu'une personne est atteinte du pneumonie.
                    Pour ce faire une radio-graphie pulmonaire doit ètre fournie. Les types d'images acceptés sont : PNG; JPG; JPEG.
                </p>
            </div>
        </div>
        <div class="row">
            <div class="container mt-2">
                <form action="/prediction/predict" method="post" class="pl-5 pr-5" enctype="multipart/form-data" 
                onsubmit="handleSubmit(this);">
                    @csrf
                    <div class="custom-file ">
                      <label for="image" id="img_label" class="custom-file-label">Selectionner image</label>
                      <input type="file" accept="image/*" class="custom-file-input" name="image" id="image" style="cursor: pointer"
                       onchange="readURL(this);" required>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-6 offset-md-3" id="fig-1">
                            <div class="row">
                                <div id="img-container" class="col-md-8 offset-md-2 p-0">
                                    <img id="display_image" class="img-fluid m-0" src="http://placehold.it/350" 
                                    alt="uploaded_image">
                                    <div id="img-overlay">
                                        <div class="img-text">
                                            <p class="img-inner-text p-2 m-2">
                                                <b>Classe de prédiction : </b> <span id="pred"></span> 
                                            </p>
                                            <p class="img-inner-text p-2 m-2">
                                                <b>Pourcentage : </b> <span id="percentage"> 90% </span>
                                            </p>
                                        </div>
                                      </div>
                                </div>
                            </div>
                            <div class="row text-center">
                               <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-check col-12 col-md-6 pt-3">
                            <label class="form-check-label"  style="cursor: pointer">
                                <input class="form-check-input"  style="cursor: pointer" type="checkbox" name="helpus" id="helpus" value="1"> 
                                J'accepte d'ameliorer la platforme 
                            </label>
                            <span class="helpus-popover col-2" tabindex="0" data-toggle="popover" data-trigger="focus" title="Améliorer la platforme" 
                                    data-content="En acceptant vous autorisé l'application de sauvegarder votre radiographie pour 
                                    l'utilisée dans des futures recherches (vos informations personnelles reste anonyme).">
                                         ?     
                            </span>
                            <script>
                                $(function () {
                                    $('[data-toggle="popover"]').popover()
                                });
                            </script>
                        </div>
                        <button id="sub" type="submit" class="mb-5 btn btn-lg btn-primary col-12 col-md-3 offset-md-3">
                            <span id="loading" class="spinner-border spinner-border-md mr-2" role="status" aria-hidden="true" style="display: none"></span>
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    var img = $('#display_image');
                    var overlay = $('#img-overlay');
                    overlay.css('opacity','0');
                    img.attr('src', e.target.result);
                };
                var file = input.files[0];
                reader.readAsDataURL(file);
            }
            $('#img_label').text(file.name)
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function handleSubmit(form){
            event.preventDefault();
            let formData = new FormData(form);
            var sub = $('#sub');
            let span = $('#loading');
            span.css('display','');
            sub.html(span);
            axios.post('/prediction/predict', formData)
            .then(function (response) {
                var image = response.data.image;
                axios.get('/test', {
                        params: {
                            image: image
                        }
                })
                .then(function (response2) {
                    console.log(response2);
                    span.css('display','none');
                    sub.html(sub.html() + 'Submit');
                    prediction = response2.data.prediction;
                    if (prediction === 'Normal') {
                        percentage = ''+(100-response2.data.percentage) + ' %';
                    } else {
                        percentage = response2.data.percentage + ' %';
                    }
                    $('#percentage').html(percentage);
                    $('#pred').html(prediction);
                    var overlay = $('#img-overlay');
                    overlay.css('opacity','0.8');
                })
                .catch(function (error) {
                    span.css('display','none');
                    sub.html(sub.html() + 'Submit');
                    alert(error.response.data.message);
                });
            })
            .catch(function (error) {
                span.css('display','none');
                sub.html(sub.html() + 'Submit');
            });
        };
        function submitServerUrl(form) {
            event.preventDefault();
            let formData = new FormData(form);
            axios.post('/prediction/serverUrl',formData)
                .then(function (response) {
                    $('#setServerUrl').modal('hide');
                    console.log(response);
                })
                .catch(function (error) {
                    $('#setServerUrl').modal('hide');
                    console.log(error.response.data.message);
                });
        };
    </script>
@endsection