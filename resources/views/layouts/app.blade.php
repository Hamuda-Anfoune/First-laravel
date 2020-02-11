<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        {{--
            THIS VIEW IS USED AS A TEMPLATE FOR OTHER VIEWS
         --}}

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{config('APP_NAME', 'LSAPP')}}</title>  <!-- use app name, if can't find it use static 'LSAPP' -->

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="/css/app.css">

    </head>
    <body>
        @include('inc.navbar')
        <div class="container">
            @yield('content')   <!-- DIFINE DIFFERNT CONTENT SECTIONS IN DIFFERENT VIEWS TO SHOW! -->
            @yield('happy')     <!-- CAN HAVE MORE THAN ONE YIELDS -->
        </div>
    </body>
</html>
