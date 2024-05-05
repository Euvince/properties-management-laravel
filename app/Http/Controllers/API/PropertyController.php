<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Property\PropertyCollection;
use App\Http\Resources\Property\PropertyResource;
use App\Models\Property;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PropertyController extends Controller
{
    function index () : PropertyResource|ResourceCollection|LengthAwarePaginator  {

        // return new PropertyResource(Property::find(1));

        //return PropertyResource::collection(Property::with('options')->paginate(15));

        //return PropertyResource::collection(Property::limit(5)->with('options')->get());

        return new PropertyCollection(Property::limit(5)->with('options')->get());
    }
}
