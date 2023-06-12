<?php
require_once 'Conexion.php';

class medico extends Conexion{
    public $med_id;
    public $med_nom;
    public $med_esp;
    public $med_cli;
    public $med_situacion;


    public function __construct($args = [] )
    {
        $this->med_id = $args['med_id'] ?? null;
        $this->med_nom = $args['med_nom'] ?? '';
        $this->med_esp = $args['med_esp'] ?? '';
        $this->med_cli = $args['med_cli'] ?? '';
        $this->med_situacion = $args['med_situacion'] ?? '';
        
    }

    public function guardar(){
        $sql = "INSERT INTO medicos(med_nom, med_esp, med_cli) values('$this->med_nom','$this->med_esp','$this->med_cli')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from medicos where med_situacion = 1 ";

        if($this->med_nom != ''){
            $sql .= " and med_nom like '%$this->med_nom%' ";
        }

        if($this->med_esp != ''){
            $sql .= " and med_esp = $this->med_esp ";
        }
        if($this->med_cli != ''){
            $sql .= " and med_cli = $this->med_cli ";
        }

        if($this->med_id != null){
            $sql .= " and med_id = $this->med_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE medicos SET med_nom = '$this->med_nom', med_esp = $this->med_esp, med_cli = $this->med_cli where med_id = $this->med_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE medicos SET med_situacion = 0 where med_id = $this->med_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}