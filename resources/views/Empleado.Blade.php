<html>

<head>
    <link rel="stylesheet" type="text/css" href="{{asset('css/estilos.css')}}">
</head>

<body>
    <h1>Empresa patito.com</h1>
    <br>
    <p>el nombre del empleado es {{$nombre}} y sus días trabajados son {{$diasTrabajados}}</p>
    @if($nombre == "adrian")
    <br>
    <p>hola adrian</p>
    <img src="{{asset('fotos/foto.png')}}">
    @else
    <p>hola desconocido</p>
    <img src="{{asset('fotos/php.png')}}" alt="">
    @endif
    <br>
    <a href="{{route('mensaje')}}">salir</a>

</body>

</html>