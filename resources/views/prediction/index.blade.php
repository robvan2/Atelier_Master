@extends('layouts.app')

@section('content')
    <div class="container border rounded" style="background-color: #f8f9fa">
        <div class="row text-center mt-2">
            <h1 class="col-12">Prediction API</h1>
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
                                <img id="display_image" class="img-fluid col-md-8 offset-md-2" src="http://placehold.it/350" 
                                alt="uploaded_image">
                            </div>
                            <div class="row text-center">
                               <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <button type="submit" class="mb-5 btn btn-lg btn-primary col-md-3 offset-md-9">
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
                    $('#display_image')
                        .attr('src', e.target.result);
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

            axios.post('/prediction/predict', formData)
            .then(function (response) {
                var image = response.data.image;
                console.log(image);
                axios.get('/test', {
                        params: {
                            image: image
                        }
                })
                .then(function (response2) {
                    alert('Predicted class : '+response2.data.prediction);
                })
                .catch(function (error) {
                    console.log(error);
                });
            })
            .catch(function (error) {
                console.log(error);
            });
        }
    </script>
@endsection