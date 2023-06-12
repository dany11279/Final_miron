<?php
require_once 'Conexion.php';

class Especialidad extends Conexion{
    public $esp_id;
    public $esp_nom;
    public $esp_situacion;

    
    public function __construct($args = [] )
    {
        $this->esp_id = $args['esp_id'] ?? null;
        $this->esp_nom = $args['esp_nom'] ?? '';
        $this->esp_situacion = $args['esp_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO especialidades(esp_nom) values('$this->esp_nom')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from especialidades where esp_situacion = 1 ";

        if($this->esp_nom != ''){
            $sql .= " and esp_nom like '%$this->esp_nom%' ";
        }

        if($this->esp_id != null){
            $sql .= " and esp_id = $this->esp_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE especialidades SET esp_nom = '$this->esp_nom' where esp_id = $this->esp_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE especialidades SET esp_situacion = 0 where esp_id = $this->esp_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}