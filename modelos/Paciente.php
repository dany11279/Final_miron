<?php
require_once 'Conexion.php';

class Paciente extends Conexion{
    public $pac_id;
    public $pac_nom;
    public $pac_dpi;
    public $pac_tel;
    public $pac_situacion;


    public function __construct($args = [] )
    {
        $this->pac_id = $args['pac_id'] ?? null;
        $this->pac_nom = $args['pac_nom'] ?? '';
        $this->pac_dpi = $args['pac_dpi'] ?? '';
        $this->pac_tel = $args['pac_tel'] ?? '';
        $this->pac_situacion = $args['pac_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO pacientes(pac_nom, pac_dpi, pac_tel) values('$this->pac_nom','$this->pac_dpi','$this->pac_tel')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from pacientes where pac_situacion = 1 ";

        if($this->pac_nom != ''){
            $sql .= " and pac_nom like '%$this->pac_nom%' ";
        }

        if($this->pac_dpi != ''){
            $sql .= " and pac_dpi = $this->pac_dpi ";
        }
        if($this->pac_tel != ''){
            $sql .= " and pac_tel = $this->pac_tel ";
        }

        if($this->pac_id != null){
            $sql .= " and pac_id = $this->pac_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE pacientes SET pac_nom = '$this->pac_nom', pac_dpi = $this->pac_dpi , pac_tel = $this->pac_tel where pac_id = $this->pac_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE pacientes SET pac_situacion = 0 where pac_id = $this->pac_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}