<?php
require_once("models/registro.php");


class registroController
{

    private $model;

    public function __construct()
    {
        $this->model = new Modelo();
    }

    // Mostrar la lista de registros
    public function index()
    {
        // Obtener los registros
        $registros = $this->model->mostrar("registros", "1");

        // Incluir la vista principal y pasar los registros
        require_once("views/index.php");
    }

    // Mostrar la vista para insertar un nuevo registro
    public function nuevo()
    {
        // Pasar los datos a la vista
        require_once("views/insertar.php");
    }

    // Insertar un nuevo registro
    public function guardar()
    {
        // Validar datos del formulario
        $data = [
            "documento_identidad" => $_POST['documento_identidad'],
            "nombre" => $_POST['nombre'],
            "apellido" => $_POST['apellido'],
            "edad" => $_POST['edad'],
            "email" => $_POST['email'],
            "usuario" => $_POST['usuario'],
            "contrasena" => $_POST['contrasena'],
        ];

        // Insertar el registro en la base de datos
        try {
            $this->model->insertar("registros", $data);
            // Redirigir a la página principal después de insertar el registro
            header("Location: index.php");
        } catch (Exception $e) {
            // Manejar el error si la inserción falló
            echo "Error al insertar el registro: " . $e->getMessage();
        }
    }



    // Mostrar la vista para editar un registro
    public function editar()
    {
        // Verificar si se proporcionó un ID para editar
        if (isset($_REQUEST['id'])) {
            // Obtener el ID del registro a editar
            $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

            // Obtener el registro de la base de datos
            $registro = $this->model->mostrar("registros", "id = $id");

            // Verificar si se encontró un registro con el ID especificado
            if ($registro) {
                // Pasar los datos del registro a la vista
                $dato = array("registro" => $registro);

                // Incluir la vista para editar el registro y pasar los datos del registro
                require_once("views/editar.php");
            } else {
                // Manejar el caso en que no se encontró ningún registro con el ID especificado
                echo "No se encontró ningún registro con el ID especificado.";
            }
        } else {
            // Manejar el caso en que no se proporcionó un ID válido
            echo "ID de registro no válido.";
        }
    }
    public function update()
    {
        // Obtener los valores del formulario
        $id = $_POST['id'];
        $documento_identidad = $_POST['documento_identidad'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $usuario = $_POST['usuario'];
        $contrasena = $_POST['contrasena'];

        // Preparar los datos actualizados
        $data = [
            "documento_identidad" => $documento_identidad,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "email" => $email,
            "usuario" => $usuario,
            "contrasena" => $contrasena
        ];

        // Construir la condición para la actualización
        $condicion = "id=" . $id;

        // Actualizar el registro en la base de datos
        $this->model->actualizar("registros", $data, $condicion);

        // Redirigir a la página principal después de actualizar el registro
        header("location: index.php");
    }


    public function eliminar()
    {
        // Verificar si se proporcionó un ID para eliminar
        if (isset($_GET['id'])) { // Cambio $_REQUEST a $_GET
            $id = $_GET['id']; // Cambio $_REQUEST a $_GET

            // Construir la condición para la eliminación
            $condicion = "id=" . $id;

            // Llamar al método eliminar del modelo
            $this->model->eliminar("registros", $condicion);

            // Redirigir a la página principal después de eliminar el registro
            header("location: index.php");
        } else {
            // Manejar el caso en que no se proporcionó un ID válido
            echo "ID de registro no válido.";
        }
    }
}
