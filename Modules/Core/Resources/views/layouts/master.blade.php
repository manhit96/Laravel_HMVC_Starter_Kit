<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Module Core</title>

       {{-- Laravel Mix - CSS File --}}
       <link rel="stylesheet" href="{{ mix('css/core/core.css') }}">

    </head>
    <body>
        @yield('content')

        {{-- Laravel Mix - JS File --}}
        <script src="{{ mix('js/core/manifest.js') }}"></script>
        {{-- <script src="{{ mix('js/core/vendor.js') }}"></script> --}}
        <script src="{{ mix('js/core/core.js') }}"></script>
    </body>
</html>
