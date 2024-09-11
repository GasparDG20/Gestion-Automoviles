<?php
class Automovil {
    private $conn; // Conexión a la base de datos
    private $table_name = "automoviles"; // Nombre de la tabla

    // Propiedades de la clase
    public $id;
    public $marca;
    public $modelo;
    public $anio;
    public $color;
    public $placa; // Nueva propiedad para la placa

    public $motor;

    public $chasis;

    public $tipo;

    // Constructor que recibe la conexión a la base de datos
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para registrar un nuevo automóvil
    public function registrar() {
        // Query para insertar un nuevo automóvil
        $query = "INSERT INTO " . $this->table_name . " (marca, modelo, anio, color, placa, motor, chasis, tipo ) VALUES (:marca, :modelo, :anio, :color, :placa, :motor, :chasis, :tipo)";

        // Preparar la declaración
        $stmt = $this->conn->prepare($query);

        // Limpiar los datos para evitar inyección SQL
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->placa = htmlspecialchars(strip_tags($this->placa)); // Limpieza de la placa
        $this-> motor = htmlspecialchars(strip_tags($this->motor));
        $this->chasis = htmlspecialchars(strip_tags($this->chasis));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));

        // Enlazar los parámetros
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":placa", $this->placa); // Enlace del parámetro placa
        $stmt->bindParam("motor", $this->motor);
        $stmt->bindParam("chasis", $this->chasis);
        $stmt->bindParam("tipo", $this->tipo);

        // Ejecutar la declaración
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }


    public function buscar($criterio) {
        $query = "SELECT * FROM " . $this->table_name . " WHERE marca LIKE :criterio OR modelo LIKE :criterio OR placa LIKE :criterio";
        $stmt = $this->conn->prepare($query);
        $criterio = "%{$criterio}%";
        $stmt->bindParam(":criterio", $criterio);
        $stmt->execute();
        return $stmt;
    }

    public function eliminar() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(":id", $this->id);
        return $stmt->execute();
    }

    public function actualizar() {
        $query = "UPDATE " . $this->table_name . " SET marca = :marca, modelo = :modelo, anio = :anio, color = :color, placa = :placa WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        
        $this->marca = htmlspecialchars(strip_tags($this->marca));
        $this->modelo = htmlspecialchars(strip_tags($this->modelo));
        $this->anio = htmlspecialchars(strip_tags($this->anio));
        $this->color = htmlspecialchars(strip_tags($this->color));
        $this->placa = htmlspecialchars(strip_tags($this->placa));
        $this->id = htmlspecialchars(strip_tags($this->id));
        $this->motor = htmlspecialchars(strip_tags($this->motor));
        $this->chasis = htmlspecialchars(strip_tags($this->chasis));
        $this->tipo = htmlspecialchars(strip_tags($this->tipo));
        
        $stmt->bindParam(":marca", $this->marca);
        $stmt->bindParam(":modelo", $this->modelo);
        $stmt->bindParam(":anio", $this->anio);
        $stmt->bindParam(":color", $this->color);
        $stmt->bindParam(":placa", $this->placa);
        $stmt->bindParam(":id", $this->id);
        $stmt->bindParam("motor", $this->motor);
        $stmt-> bindParam("chasis", $this->chasis);
        $stmt-> bindParam("tipo", $this->tipo);
                
        return $stmt->execute();
    }






}
?>
