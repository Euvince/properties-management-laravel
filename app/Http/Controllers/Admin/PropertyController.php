<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\PropertyFormRequest;
use Facades\App\Weather;
use Illuminate\Auth\AuthManager;
use Illuminate\Cookie\CookieJar;

class PropertyController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Property::class, 'property');
    }

    public function index(AuthManager $auth, CookieJar $cookieJar): View
    {

        dd(Weather::isSunnyTomorrow());

        /* dd(app(AuthManager::class));
        dd(app('auth'));
        dd($auth->user()); */
        return view('admin.properties.index', [
            'properties' => Property::paginate(25)
        ]);
    }

    public function create(): View
    {
        $property = new Property();
        $property->fill([
            'title' => 'Mon Titre d\'essai',
            'price' => '22000000',
            'description' => 'Description d\'essai',
            'adress' => '15 rue de test',
            'surface' => 40,
            'rooms' => 3,
            'bedrooms' => 2,
            'floor' => 0,
            'city' => 'Montpellier',
            'postal_code' => 34000,
            'sold' => false
        ]);
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    public function store(PropertyFormRequest $request)
    {
        $property = Property::create($request->validated());
        dd($property->options()->sync($request->validated('options')));
        return to_route('admin.property.index')->with('success', 'L\'Article a bien été crée');
    }


    public function edit(Property $property): View
    {
        dd(Auth::user()->can('update', $property));
        return view('admin.properties.form', [
            'property' => $property,
            'options' => Option::pluck('name', 'id')
        ]);
    }

    public function update(PropertyFormRequest $request, Property $property)
    {
        $property->update($request->validated());
        dd($property->options()->sync($request->validated('options')));
        return to_route('admin.property.index')->with('success', 'L\'Article a bien été modifié');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return to_route('admin.property.index')->with('success', 'L\'Article a bien été supprimé');
    }
}
