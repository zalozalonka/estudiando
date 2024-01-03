<br>
<a href="{{route('mensaje')}}">salir</a>
<br>
<a href="{{ route('generarPDF') }}">Generar PDF</a>

<a href="{{ route('generarPDF') }}" id="descargarPDF" target="_blank">Descargar PDF y Redirigir</a>

<script>
    document.getElementById('descargarPDF').addEventListener('click', function() {
        // Esperar 3 segundos (3000 milisegundos) antes de redirigir
        setTimeout(function() {
            // Redirigir a la página deseada
            window.location.href = "{{route('mensaje')}}";
        }, 3000); // 3000 milisegundos = 3 segundos
    });
</script>
<br>
<br>
<a style="cursor:pointer;" id="idImagen">MostrarImagen</a>
<!-- <script>
    document.getElementById("idImagen").addEventListener("click", function() {
        // Obtener la URL completa de la imagen
        var urlImagen = "{{ asset('fotos/foto.png') }}";

        // Cargar la imagen en un elemento Image de JavaScript
        var img = new Image();
        img.src = urlImagen;

        // Esperar a que la imagen esté cargada
        img.onload = function() {
            // Crear un lienzo (canvas) para dibujar la imagen
            var canvas = document.createElement('canvas');
            canvas.width = img.width;
            canvas.height = img.height;
            var ctx = canvas.getContext('2d');
            ctx.drawImage(img, 0, 0);

            // Obtener la representación en base64 de la imagen
            var base64Data = canvas.toDataURL('image/png');

            // Hacer lo que necesites con la representación en base64 (por ejemplo, enviarla a un servidor)
            // console.log(base64Data);


            var token = "{{ csrf_token() }}";

            // Realizar una solicitud AJAX POST a la ruta /mostrarImagen
            var xhr = new XMLHttpRequest();
            xhr.open("POST", '/mostrarImagen', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            // Incluir el token CSRF en la solicitud
            xhr.setRequestHeader('X-CSRF-TOKEN', token);

            // Manejar la respuesta si es necesario
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        console.log(xhr.responseText);
                    } else {
                        console.error('Error en la solicitud:', xhr.status);
                    }
                }
            };

            // Construir los datos a enviar
            var data = 'base64Data=' + encodeURIComponent(base64Data);

            // Enviar la solicitud
            console.log(data);
            xhr.send(data);

        };
    });
</script> -->


<script>
    document.getElementById("idImagen").addEventListener("click", function() {
        var token = "{{ csrf_token() }}";
        var varValue = 'pepe'; // Puedes ajustar este valor según tus necesidades

        var xhr = new XMLHttpRequest();
        xhr.open("POST", "/mostrarImagen", true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.setRequestHeader('X-CSRF-TOKEN', token);
        xhr.responseType = 'blob'; // Especifica que la respuesta será un blob (archivo binario)

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    // Éxito: manejar el archivo PDF
                    var blob = new Blob([xhr.response], {
                        type: 'application/pdf'
                    });
                    var link = document.createElement('a');
                    link.href = window.URL.createObjectURL(blob);
                    link.download = 'nombre_del_archivo.pdf';
                    link.click();
                } else {
                    // Error: manejar el error
                    console.error('Error al descargar el PDF:', xhr.status);
                }
            }
        };

        // Envía datos adicionales en el cuerpo de la solicitud
        var data = 'var=' + encodeURIComponent(varValue);
        xhr.send(data);
    })
</script>