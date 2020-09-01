@if ($errors->any())
    <div class="form-group">
        <script>$(".alert").alert()</script>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger alert-dismissible fade show text-justify" role="alert">
                <strong>Validation Error !</strong><p>{{$error}}</p> 
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endforeach
    </div>
@endif
