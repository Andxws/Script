<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insertar Personas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1>Ingresar Nuevo Registro</h1>
        <hr>
        <form action="?m=guardar" method="POST">
            <div class="form-group">
                <label>Documento Identidad</label>
                <input type="text" name="documento_identidad" class="form-control" placeholder="Ingrese su número de Identificación" data-validacion-tipo="requerido|min:3" />
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ingrese su Nombre" data-validacion-tipo="requerido|min:7" />
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" placeholder="Ingrese sus Apellidos" data-validacion-tipo="requerido|date" />
            </div>
            <div class="form-group">
                <label>Edad</label>
                <input type="number" name="edad" class="form-control" placeholder="Ingrese su Edad" data-validacion-tipo="requerido|entero|min:1" min="1" />
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" placeholder="Ingrese su Email" data-validacion-tipo="requerido|min:8" />
            </div>
            <div class="form-group">
                <label>Usuario</label>
                <input type="text" name="usuario" class="form-control" placeholder="Ingrese su Usuario" data-validacion-tipo="requerido|min:8" />
            </div>
            <div class="form-group">
               <label>Contraseña</label>
                <input id="contrasena" type="password" name="contrasena" class="form-control" placeholder="Ingrese su Contraseña" data-validacion-tipo="requerido|min:8" />
            </div>

            <input type="hidden" name="id" value="">
            <hr />
            <div class="text-right">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
        </form>
        <hr />
    </div>
</body>

</html>
