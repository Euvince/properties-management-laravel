@extends('base')

@section('title', 'Tous nos Biens')

@section('content')

    <h2 style="font-weight: bold;">Tous les Biens</h2>
    <div class="bg-light p-5 mb-5 text-center">
        <form action="" method="GET" class="container d-flex gap-2">
            <input type="number" placeholder="Budget-Max" class="form-control" name="price" value="{{ $input['price'] ?? '' }}">
            <input type="number" placeholder="Surface-Minimale" class="form-control" name="surface" value="{{ $input['surface'] ?? '' }}">
            <input type="number" placeholder="Nombre de Pièces-min" class="form-control" name="rooms" value="{{ $input['rooms'] ?? '' }}">
            <input placeholder="Mot-Clé" class="form-control" name="title" value="{{ $input['title'] ?? '' }}">
            <button class="btn btn-primary btn-sm flex-grow-0">Rechercher</button>
        </form>
    </div>

    <div class="container mt-3">
        <div class="row">
            @forelse ($properties as $property)
                <div class="col-3 mb-4">
                    @include('property.card')
                </div>
            @empty
            <div class="alert alert-danger">
                Aucun Bien ne correspond à votre Recherche
            </div>
            @endforelse
        </div>
        <div class="my-4">
            {{ $properties->links() }}
        </div>
    </div>

@endsection
