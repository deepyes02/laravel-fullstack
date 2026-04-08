<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class Welcome
{
    public static function renderView(Request $request)
    {
        $name = $request->name;
        $age = $request->age;
        return view("welcome", ["name" => $name, "age" => $age]);
    }
}

Route::get('/', [Welcome::class, "renderView"]);
