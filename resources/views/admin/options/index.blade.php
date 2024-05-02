@extends('admin.admin')

@section('title', 'Toutes les options')

@section('content')

    <div class="d-flex justify-content-between align-items-center">
        <h1 style="font-weight: bold;">@yield('title')</h1>
        <a href="{{ route('admin.options.create') }}" class="btn btn-primary">Ajouter une Option</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Titre</th>
                <th class="text-end">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($options as $option)
                <tr>
                    <td>{{ $option->name }}</td>
                    <td>
                        <div class="d-flex gap-2 w-100 justify-content-end">
                            <a href="{{ route('admin.options.edit', ['option' => $option->id]) }}" class="btn btn-warning">Éditer</a>
                            <form action="{{ route('admin.options.destroy', ['option' => $option->id]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="return confirm('Voulez-vous vraiment supprimer cette Option ?')">Supprimer</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $options->links() }}

@endsection

