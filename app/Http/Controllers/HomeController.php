<?php

namespace App\Http\Controllers;

use App\Weather;
use App\Models\User;
use App\Models\Property;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{

    function __construct(
        private readonly Weather $weather
    )
    {
    }

    public function index(/* Weather $weather */): View
    {
        /* dd($this->weather); */
        /* dd(app(Weather::class)); */
        /* $user = User::first();
        $user->password = '0000';
        dd($user->password, $user); */
        return view('home', [
            'properties' => Property::available(true)->recent()->limit(4)->get()
        ]);
    }
}
