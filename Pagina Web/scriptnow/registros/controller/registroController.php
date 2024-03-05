<?php
require_once("models/registro.php");

class registroController {

    private $model;

    public function __construct()
    {
        $this->model = new Modelo();
    }

    // Mostrar la lista de registros
    public function index()
    {
        // Obtener los registros
        $registros = $this->model->mostrar("registros");

        // Asignar los registros a la variable $dato
        $dato = array("registros" => $registros);

        // Incluir la vista principal
        require_once("views/index.php");
    }

    // Mostrar la vista para insertar un nuevo registro
    public function nuevo()
    {
        require_once("views/insertar.php");
    }

    // Insertar un nuevo registro
    public function guardar()
    {
        // Validar datos del formulario

        $documento_identidad = filter_var($_REQUEST['documento_identidad'], FILTER_SANITIZE_STRING);
        $nombre = filter_var($_REQUEST['nombre'], FILTER_SANITIZE_STRING);
        $apellido = filter_var($_REQUEST['apellido'], FILTER_SANITIZE_STRING);
        $edad = filter_var($_REQUEST['edad'], FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($_REQUEST['email'], FILTER_SANITIZE_EMAIL);
        $usuario = filter_var($_REQUEST['usuario'], FILTER_SANITIZE_STRING);
        $contrasena = filter_var($_REQUEST['contrasena'], FILTER_SANITIZE_STRING);

        // Sanitizar la entrada

        $data = [
            "documento_identidad" => $documento_identidad,
            "nombre" => $nombre,
            "apellido" => $apellido,
            "edad" => $edad,
            "email" => $email,
            "usuario" => $usuario,
            "contrasena" => $contrasena,
        ];

        // Insertar el registro en la base de datos
        $this->model->insertar("registros", $data);

        // Redirigir a la página principal
        header("location: registros/index.php");
    }

    // Mostrar la vista para editar un registro
    public function editar()
    {
        // Obtener el ID del registro a editar
        $id = filter_var($_REQUEST['id'], FILTER_SANITIZE_NUMBER_INT);

        // Obtener el registro de la base de datos
        $registro = $this->model->mostrar("registros", "id = $id");

        // Incluir
    }

}
?>
