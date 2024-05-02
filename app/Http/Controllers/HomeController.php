<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Property;
use App\Weather;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index(Weather $weather): View
    {
        /* dd($weather); */
        /* $user = User::first();
        $user->password = '0000';
        dd($user->password, $user); */

        return view('home', [
            'properties' => Property::available(true)->recent()->limit(4)->get()
        ]);
    }
}
