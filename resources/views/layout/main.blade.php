<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        @include('layout.header')

        <style>
            *{
				font-family: "Poppins", Arial, sans-serif;s
			}
			.news-image{
                height: 200px;
            }
        </style>
    </head>

    <body>
        
        @include('layout.navbar')

        @yield('content')

        @include('layout.footer')
        
    </body>
</html>
 