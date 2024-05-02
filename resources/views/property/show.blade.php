@extends('base')

@section('title', $property->title)

@section('content')

    <div class="container">
        <h1>{{ $property->title }}</h1>
        <h2>{{ $property->rooms }} pièces - {{ $property->surface }} mètres carré</h2>

        <div class="text-primary fw-bold" style="font-size: 4rem;">
            {{ number_format($property->price, thousands_separator: ' ') }} $
        </div>

        <hr>

        <div class="mt-4">
            <h4>{{ __('property.contact_title') }}</h4>

            @include('shared.flash')

            <form action="{{ route('contact', ['property' => $property->id]) }}" method="POST" class="vstack gap-3">
                @csrf
                <div class="row">
                    @include('shared.input',  ['class' => 'col', 'name' => 'firstname', 'label' => 'Prénom', 'value' => 'Jonh'])
                    @include('shared.input',  ['class' => 'col', 'name' => 'lastname', 'label' => 'Nom', 'value' => 'Doe'])
                </div>
                <div class="row">
                    @include('shared.input',  ['class' => 'col', 'name' => 'phone', 'label' => 'Téléphone', 'value' => '06 00 00 00'])
                    @include('shared.input',  ['type' => 'email', 'class' => 'col', 'name' => 'email', 'label' => 'Email', 'value' => 'jonh@doepublic.fr'])
                </div>
                @include('shared.input',  ['type' => 'textarea', 'class' => 'col', 'name' => 'message', 'label' => 'Votre Message', 'value' => 'Mon Petit Message'])
                <button class="btn btn-primary" style="width: 160px;">Nous-Contacter</button>
            </form>
        </div>

        <div class="mt-4">
            <p>{{ nl2br($property->description) }}</p>
            <div class="row">
                <div class="col-8">
                    <h2>Caractéristiques</h2>
                    <table class="table table-striped">
                        <tr>
                            <td>Surface Habitable</td>
                            <td>{{ $property->surface }} mètres carré</td>
                        </tr>
                        <tr>
                            <td>Pièces</td>
                            <td>{{ $property->rooms }}</td>
                        </tr>
                        <tr>
                            <td>Chambres</td>
                            <td>{{ $property->bedrooms }}</td>
                        </tr>
                        <tr>
                            <td>Localisation</td>
                            <td>
                                {{ $property->adress }} <br>
                                {{ $property->city }} ({{ $property->postal_code }})
                            </td>
                        </tr>
                        <tr>
                            <td>Étages</td>
                            <td>{{ $property->floor ?: 'Rez de Cahussée' }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-4">
                    <h2>Spécifictés</h2>
                    <ul class="list-group">
                        @foreach ($property->options as $option)
                            <li class="list-group-item">{{ $option->name }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
