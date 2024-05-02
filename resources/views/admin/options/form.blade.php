@extends('admin.admin')

@section('title', $option->exists ? 'Editer une Option' : 'Créer une Option')

@section('content')

    <h1 style="font-weight: bold;">@yield('title')</h1>
    <form class="vstack gap-2" action="{{ route($option->exists ? 'admin.options.update' : 'admin.options.store', ['option' => $option->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method($option->exists ? 'put' : 'post')

        <div class="row">
            @include('shared.input', ['class' => 'col','label' => 'Le Nom' ,'name' => 'name', 'value' => $option->name])
        </div>

        <button class="btn btn-primary mt-3" style="width: 125px;">{{ !$option->exists ? 'Soumettre' : 'Modifier' }}</button>
    </form>

@endsection
