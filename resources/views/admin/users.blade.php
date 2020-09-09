@extends('layouts.app')

@section('content')
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
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row">{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->predictions_count}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="row">
            <div class="container offset-md-5">
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
