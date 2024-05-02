<?php

namespace App\Http\Controllers;

use App\Events\ContactRequestEvent;
use App\Http\Requests\PropertyContacRequest;
use App\Http\Requests\SearchPropertiesRequest;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PropertyController extends Controller
{
    public function index(SearchPropertiesRequest $request): View
    {
        $query = Property::query()->latest();
        if($price = $request->validated('price')){
            $query = $query->where('price', '<=', $price);
        }
        if($surface = $request->validated('surface')){
            $query = $query->where('surface', '>=', $surface);
        }
        if($rooms = $request->validated('rooms')){
            $query = $query->where('rooms', '>=', $rooms);
        }
        if($title = $request->validated('title')){
            $query = $query->where('title', 'like', "%{$title}%");
        }
        return view('property.properties', [
            'properties' => $query->paginate(20),
            'input' => $request->validated()
        ]);
    }

    public function show(string $slug, Property $property): View | RedirectResponse
    {
        if($slug !== $property->getSlug())
        {
            return to_route('show', ['slug' => $property->getSlug(), 'property' => $property->id]);
        }
        return view('property.show', [
            'property' => $property
        ]);
    }

    public function contact(PropertyContacRequest $request, Property $property)
    {
        event(new ContactRequestEvent($property, $request->validated()));
        return back()->with('success', 'Votre demande de contact a bien été envoyé');
    }
}
