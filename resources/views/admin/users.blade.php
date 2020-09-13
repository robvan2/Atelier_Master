@extends('layouts.app')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <div class="container">
        <div class="row d-block text-center">
            <h1 class="mb-5 display-4">Liste des utilisateurs</h1>
        </div>
        <div class="row table-responsive">
            <table class="table table-bordered table-stripped table-hover"  width="100%">
                <thead class="thead-inverse">
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Nombre de prediction</th>
                        <th>Détails</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->predictions_count}}</td>
                                <td>
                                    <form method="POST" onsubmit="submitServerUrl(this);">
                                        <input type="hidden" name="id" value="{{$user->id}}">
                                        <button type="submit" class="btn btn-warning">détails</button>
                                    </form>
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModal" aria-hidden="true">
                <!-- add modal content here -->
            </div>
            <script>
                function submitServerUrl(form) {
                    event.preventDefault();
                    let formData = new FormData(form);
                    axios.post('/users/detail',formData)
                        .then(function (response) {
                            $('#userModal').html(response.data);
                            $('#userModal').modal('show');
                        })
                        .catch(function (error) {
                            console.log(error);
                        });
                };
            </script>
        </div>
        <div class="row">
            <div class="container offset-md-5">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
