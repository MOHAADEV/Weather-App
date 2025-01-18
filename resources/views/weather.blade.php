<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Weather App</h1>
        <form action="/weather" method="GET" class="mb-4">
            <div class="input-group">
                <input type="text" name="location" class="form-control" placeholder="Enter a city" required>
                <button type="submit" class="btn btn-primary">Get Weather</button>
            </div>
        </form>

        @if(isset($weatherData['name']))
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">{{ $weatherData['name'] }}, {{ $weatherData['sys']['country'] }}</h2>
                    <p class="card-text">
                        <strong>Temperature:</strong> {{ $weatherData['main']['temp'] }}°C<br>
                        <strong>Weather:</strong> {{ $weatherData['weather'][0]['description'] }}<br>
                        <strong>Humidity:</strong> {{ $weatherData['main']['humidity'] }}%<br>
                        <strong>Wind Speed:</strong> {{ $weatherData['wind']['speed'] }} m/s<br>
                    </p>
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                Unable to fetch weather data. Please try again.
            </div>
        @endif
    </div>
</body>
</html>