<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $name = $request->name;
        $age = $request->age;
        return view("welcome", ["name" => $name, "age" => $age]);
    }
}
