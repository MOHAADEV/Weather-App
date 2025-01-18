<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function showWeather(Request $request)
    {
        $apiKey = env('OPENWEATHERMAP_API_KEY');

        $location = $request->input('location', 'London');

        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $location,
            'appid' => $apiKey,
            'units' => 'metric', 
        ]);

        $weatherData = $response->json();

        return view('weather', compact('weatherData'));
    }
}
