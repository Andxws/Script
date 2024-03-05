<?php

class Modelo {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=scriptnow', "root", "");
    }

    public function mostrar($tabla, $condicion = "") {
        $consulta = "SELECT * FROM $tabla" . ($condicion ? " WHERE $condicion" : "");

        $resultado = $this->db->query($consulta);
        $filas = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $filas;
    }

    public function insertar($tabla, $data) {
        $placeholders = array_fill(0, count($data), "?");
        $consulta = "INSERT INTO $tabla VALUES (NULL, " . implode(", ", $placeholders) . ")";

        $stmt = $this->db->prepare($consulta);
        return $stmt->execute($data);
    }

    public function actualizar($tabla, $data, $condicion) {
        $updates = array_map(function ($key, $value) {
            return "$key = ?";
        }, array_keys($data), $data);

        $consulta = "UPDATE $tabla SET " . implode(", ", $updates) . " WHERE $condicion";

        $stmt = $this->db->prepare($consulta);
        return $stmt->execute(array_values($data));
    }

    public function eliminar($tabla, $condicion) {
        $consulta = "DELETE FROM $tabla WHERE $condicion";

        $resultado = $this->db->query($consulta);
        return $resultado->rowCount() > 0; // Return true si se elimina al menos una fila
    }
}