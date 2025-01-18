<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function showWeather(Request $request)
    {
        // Get the API key from .env
        $apiKey = env('OPENWEATHERMAP_API_KEY');

        // Get the location from the request (default to London)
        $location = $request->input('location', 'London');

        // Fetch weather data from OpenWeatherMap API
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $location,
            'appid' => $apiKey,
            'units' => 'metric', // Use 'imperial' for Fahrenheit
        ]);

        // Decode the JSON response
        $weatherData = $response->json();

        // Pass the data to the view
        return view('weather', compact('weatherData'));
    }
}
