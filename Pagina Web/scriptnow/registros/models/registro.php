<?php

class Modelo
{
    private $Modelo;
    private $db;

    public function __construct()
    {
        $this->Modelo = array();

        //Conexion a La BD
        $this->db = new PDO('mysql:host=localhost;dbname=scriptnow', "root", "");
    }
    //Consultar datos en la BD
    public function mostrar($tabla, $condicion)
    {
        $consul = "SELECT * FROM " . $tabla;

        // Agregar la condición solo si no está vacía
        if (!empty($condicion)) {
            $consul .= " WHERE " . $condicion;
        }

        $resu = $this->db->query($consul);

        // Verificar si la consulta fue exitosa
        if ($resu) {
            $filas = $resu->fetchAll(PDO::FETCH_ASSOC);
            return $filas;
        } else {
            // Manejar el error de consulta
            echo "Error al ejecutar la consulta: " . $this->db->errorInfo()[2];
            return false;
        }
    }


    public function insertar($tabla, $data)
    {
        // Preparar la consulta SQL con marcadores de posición
        $campos = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));
        $consulta = "INSERT INTO $tabla ($campos) VALUES ($placeholders)";

        // Preparar los valores para la consulta
        $valores = array_values($data);

        // Preparar y ejecutar la consulta preparada
        $stmt = $this->db->prepare($consulta);
        $resultado = $stmt->execute($valores);

        if ($resultado) {
            return true;
        } else {
            // Manejar el error en caso de fallo
            echo "Error al insertar el registro: " . $stmt->errorInfo()[2];
            return false;
        }
    }


    public function actualizar($tabla, $data, $condicion)
    {

        $consulta = "update " . $tabla . " set " . $data . " where " . $condicion;



        $resultado = $this->db->query($consulta);
        if ($resultado) {
            return true;
        } else {
            return false;
        }
    }
    public function eliminar($tabla, $condicion)
    {

        $eli = "delete from " . $tabla . " where " . $condicion;

        $res = $this->db->query($eli);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}
