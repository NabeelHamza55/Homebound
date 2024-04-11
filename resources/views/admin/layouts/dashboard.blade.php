<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        @hasSection('title')
            @yield('title') | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
    <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    @yield('styles')

</head>

<body>
    <div class="main-wrapper">
        <div class="dashboard-page">
            <div class="dashboard-row d-flex">
                @include('admin.dashboard.components.sidebar')

                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>


    <!-- apexcharts -->
    <script src="{{ asset('admin/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- apexcharts init -->
    @yield('scripts')

</body>

</html>
