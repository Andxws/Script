<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>


<body>
    <div class="container">
        <h1 class="page-header">Registros</h1>
        <div class="well well-sm text-right">
            <a class="btn btn-primary" href="?m=nuevo">Agregar Registro</a>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Documento Identificación</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Edad</th>
                    <th>Correo Electronico</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Acción</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($registros)) : ?>
                    <?php foreach ($registros as $registro) : ?>
                        <tr>
                            <td><?php echo $registro["documento_identidad"]; ?></td>
                            <td><?php echo $registro["nombre"]; ?></td>
                            <td><?php echo $registro["apellido"]; ?></td>
                            <td><?php echo $registro["edad"]; ?></td>
                            <td><?php echo $registro["email"]; ?></td>
                            <td><?php echo $registro["usuario"]; ?></td>
                            <td><?php echo $registro["contrasena"]; ?></td>

                            <td><i class="glyphicon glyphicon-edit"><a href="?m=editar&id=<?php echo $registro["id"]; ?>"> Editar</a></i></td>
                            <td><i class="glyphicon glyphicon-remove"><a data-toggle="modal" data-target="#eliminarpersona" href="?m=eliminar&id=<?php echo $registro["id"]; ?>"> Eliminar</a></i></td>
                        </tr>
                        <?php require_once("modal.php"); ?>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="8">No hay registros disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>


        </table>
    </div>
</body>

</html>