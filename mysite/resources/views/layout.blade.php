<!doctype html>
<html>
<head>
    <title>@yield('title', 'ACR (default)')</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
    <style>
        .is-complete {
            text-decoration: line-through;
        }
    </style>
</head>

<body style="padding: 20px;">

<div  style="padding-bottom:10%;">

<div style="height:100px;" class="topnav">
    <nav>
    <a href="/" class="dropbtn">Index</a>
    <a href="/contact" style="margin-top:10px;" class="dropbtn">Contactos</a>
    <a href="/about" style="margin-top:100px;" class="dropbtn">Sobre</a>
    </nav>

</div>

    <div class="container">
        @yield('content')
    </div>

</body>
</html>