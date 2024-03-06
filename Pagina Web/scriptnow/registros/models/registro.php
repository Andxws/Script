<?php

class Modelo
{
    private $db;

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=scriptnow', "root", "");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            throw new Exception("Error al conectar a la base de datos: " . $e->getMessage());
        }
    }

    public function mostrar($tabla, $condicion)
    {
        try {
            // Asegúrate de que la condición no esté vacía antes de agregarla a la consulta
            $whereClause = $condicion ? "WHERE $condicion" : "";
            
            $stmt = $this->db->prepare("SELECT * FROM $tabla $whereClause");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            throw new Exception("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    public function insertar($tabla, $data)
    {
        $campos = implode(', ', array_keys($data));
        $placeholders = implode(', ', array_fill(0, count($data), '?'));

        $consulta = "INSERT INTO $tabla ($campos) VALUES ($placeholders)";

        try {
            $stmt = $this->db->prepare($consulta);
            $stmt->execute(array_values($data));
            return $stmt->rowCount() > 0; // Verificar si se insertó algún registro
        } catch (PDOException $e) {
            throw new Exception("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }

    public function actualizar($tabla, $data, $condicion)
    {
        $actualizaciones = array();
        foreach ($data as $columna => $valor) {
            $actualizaciones[] = "$columna = ?";
        }
        $actualizaciones_sql = implode(', ', $actualizaciones);
        
        $consulta = "UPDATE $tabla SET $actualizaciones_sql WHERE $condicion";
        try {
            $valores = array_values($data);
            $stmt = $this->db->prepare($consulta);
            $stmt->execute($valores);
            return $stmt->rowCount() > 0; // Verificar si se actualizó algún registro
        } catch (PDOException $e) {
            throw new Exception("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }
    
    public function eliminar($tabla, $condicion)
    {
        $eli = "DELETE FROM $tabla WHERE $condicion";
        try {
            $stmt = $this->db->prepare($eli);
            $stmt->execute();
            return $stmt->rowCount() > 0; // Verificar si se eliminó algún registro
        } catch (PDOException $e) {
            throw new Exception("Error al ejecutar la consulta: " . $e->getMessage());
        }
    }
}
?>
