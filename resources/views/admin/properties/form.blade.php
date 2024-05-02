@extends('admin.admin')

@section('title', $property->exists ? "Éditer un Bien" : "Créer un Bien")

@section('content')

    <h1 style="font-weight: bold;">@yield('title')</h1>

    <form class="vstack gap-2" action="{{ route($property->exists ? 'admin.property.update' : 'admin.property.store', ['property' => $property->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($property->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Titre', 'name' => 'title', 'value' => $property->title])
            @include('shared.input', ['class' => 'col', 'name' => 'surface', 'value' => $property->surface])
            @include('shared.input', ['class' => 'col', 'label' => 'Prix', 'name' => 'price', 'value' => $property->price])
        </div>
        @include('shared.input', ['type' => 'textarea', 'name' => 'description', 'value' => $property->description])
        <div class="row">

            @include('shared.input', ['class' => 'col', 'label' => 'Pièces', 'name' => 'rooms', 'value' => $property->rooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Chambres', 'name' => 'bedrooms', 'value' => $property->bedrooms])
            @include('shared.input', ['class' => 'col', 'label' => 'Étages', 'name' => 'floor', 'value' => $property->floor])
        </div>
        <div class="row">
            @include('shared.input', ['class' => 'col', 'label' => 'Ville', 'name' => 'city', 'value' => $property->city])
            @include('shared.input', ['class' => 'col', 'label' => 'Adress', 'name' => 'adress', 'value' => $property->adress])
            @include('shared.input', ['class' => 'col', 'label' => 'Code Postal', 'name' => 'postal_code', 'value' => $property->postal_code])
        </div>
        @include('shared.select', ['label' => 'Spécificités', 'name' => 'options', 'value' => $property->options()->pluck('id'), 'multiple' => true, 'options' => $options])
        @include('shared.checkbox', ['label' => 'Vendu', 'name' => 'sold', 'value' => $property->sold])
        <button class="btn btn-primary mt-3" style="width: 120px;">{{ $property->exists ? 'Modifier' : 'Soumettre' }}</button>
    </form>

@endsection
