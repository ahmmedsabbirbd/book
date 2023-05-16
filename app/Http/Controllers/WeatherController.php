<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function weather(Request $request): string {
        $city = $request->city;

        if(!$city) {
            return "Please provide city";
        }

        return "Your {$city} is good";
    }
}
