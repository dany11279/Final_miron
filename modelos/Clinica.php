<?php
require_once 'Conexion.php';

class cli extends Conexion{
    public $cli_id;
    public $cli_nom;
    public $cli_situacion;

    public function __construct($args = [] )
    {
        $this->cli_id = $args['cli_id'] ?? null;
        $this->cli_nom = $args['cli_nom'] ?? '';
        $this->cli_situacion = $args['cli_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO clinicas(cli_nom) values('$this->cli_nom')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from clinicas where cli_situacion = 1 ";

        if($this->cli_nom != ''){
            $sql .= " and cli_nom like '%$this->cli_nom%' ";
        }

        if($this->cli_id != null){
            $sql .= " and cli_id = $this->cli_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE clinicas SET cli_nom = '$this->cli_nom' where cli_id = $this->cli_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE clinicas SET cli_situacion = 0 where cli_id = $this->cli_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}