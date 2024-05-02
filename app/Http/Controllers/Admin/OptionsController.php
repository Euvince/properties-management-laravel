<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OptionFormRequest;
use App\Models\Option;
use Illuminate\Contracts\View\View;

class OptionsController extends Controller
{

    public function index(): View
    {
        return view('admin.options.index', [
            'options' => Option::paginate(3)
        ]);
    }

    public function create(): View
    {
        return view('admin.options.form', [
            'option' => new Option()
        ]);
    }

    public function store(OptionFormRequest $request)
    {
        Option::create($request->validated());
        return to_route('admin.options.index')->with('success', 'L\'Option a bien été crée');
    }


    public function edit(Option $option): View
    {
        return view('admin.options.form', [
            'option' => $option
        ]);
    }


    public function update(OptionFormRequest $request, Option $option)
    {
        $option->update($request->validated());
        return to_route('admin.options.index')->with('success', 'L\'Option a bien été modifiée');
    }

    public function destroy(Option $option)
    {
        $option->delete();
        return to_route('admin.options.index')->with('success', 'L\'Option a bien été supprimée');
    }
}
