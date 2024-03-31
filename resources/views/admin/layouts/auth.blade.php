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
    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">
    @yield('styles')
</head>

<body>
    <div class="main-wrapper">
        @yield('content')
    </div>




    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/popper.min.js') }}"></script>
    @yield('scripts')
</body>

</html>
