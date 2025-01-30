<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.head')
</head>

<body class="index-page">

    @include('includes.header')

    <main class="main">
        @yield('content')
    </main>

    @include('includes.footer')


    @section('additional_js')
    @show

    @section('additional_css')
    @show
</body>

</html>
