@extends('admin.admin')

@section('title', 'Se Connecter')

@section('content')

    <h1 style="font-weight: bold;">@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('shared.input', ['type' => 'email', 'label' => 'Email' ,'name' => 'email'])
            @include('shared.input', ['type' => 'password', 'label' => 'Mot de Passe' ,'name' => 'password'])
        </div>

        <button class="btn btn-primary mt-3" style="width: 125px;">Se Connecter</button>
    </form>

@endsection
