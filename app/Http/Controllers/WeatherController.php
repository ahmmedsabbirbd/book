<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function weather($city = null){
        if(!$city) {
            return "Please provide city";
        }

        return "Your {$city} is good";
    }
}
