<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personas</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</head>


<body>
    <div class="container">
        <h1 class="page-header">Personas</h1>
        <div class="well well-sm text-right">
            <a class="btn btn-primary" href="?m=nuevo">Agregar Persona</a>
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
                    <th>Acción</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($dato['registros'])) : ?>
                    <?php foreach ($registros as $registros) : ?>
                        <tr>
                            <td><?php echo $registros["documento_identidad"]; ?></td>
                            <td><?php echo $registros["nombre"]; ?></td>
                            <td><?php echo $registros["apellido"]; ?></td>
                            <td><?php echo $registros["edad"]; ?></td>
                            <td><?php echo $registros["email"]; ?></td>
                            <td><?php echo $registros["usuario"]; ?></td>
                            <td>
                                <a href="?m=editar&id=<?php echo $registro["id"]; ?>">Editar</a>
                            </td>
                            <td>
                                <a data-toggle="modal" data-target="#eliminarpersona" href="?m=eliminar&id=<?php echo $registros["id"]; ?>">Eliminar</a>
                            </td>
                        </tr>
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