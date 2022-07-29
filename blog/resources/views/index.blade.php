<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet" />

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }
    </style>
</head>

<body class="antialiased">
    <div class="container">
        <div class="top-text-wrapper">
            <h4>JCI Individual Area</h4>
            <img src="{{ asset('image/logo.png') }}" style="width: 95px;" />
            <hr />
        </div>
        <form action="{{ route('vote') }}" method="POST">
            @csrf
            <div class="grid-wrapper grid-col-auto">
                @if (session()->exists('voted') && session()->get('voted') == true)
                    <h1> You Voted Before, Thanks </h1>
                @else
                    @foreach ($contestants as $contestant)
                        <label for="radio-card-{{ $contestant->id }}" class="radio-card">
                            <input type="radio" name="contestantId" value="{{ $contestant->id }}"
                                id="radio-card-{{ $contestant->id }}"
                                @if ($loop->first) checked @endif />
                            <div class="card-content-wrapper">
                                <span class="check-icon"></span>
                                <div class="card-content">
                                    <img src="{{ asset('storage/' . $contestant->img) }}"
                                        alt="{{ $contestant->name }}" />
                                    <h4>{{ $contestant->name }}</h4>
                                    <h5>{!! $contestant->description !!}</h5>
                                </div>
                            </div>
                        </label>
                    @endforeach
                @endif
            </div>
            @if (!(session()->exists('voted') && session()->get('voted') == true))
                <button type="submit">Vote</button>
            @endif
            <form>
    </div>
</body>

</html>
