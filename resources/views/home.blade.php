@extends('base')

@section('title', 'Accueil')

@section('content')

    @php
        $type = 'info'
    @endphp

    <x-weather></x-weather>

    {{-- <x-alert :type="$type" class="fw-bold">
        Des Informations
    </x-alert> --}}

    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Agence Lorem Ipsum</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Tempore culpa repudiandae adipisci nostrum libero nam
                at necessitatibus, quas repellendus unde.
                Asperiores rerum ipsam exercitationem sit
                animi officiis praesentium incidunt. Atque!
            </p>
        </div>
    </div>

    <div class="container">
        <h2 style="font-weight: bold;">Nos Derniers Biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                @include('property.card')
            @endforeach
        </div>
    </div>

@endsection
