<?php
require_once 'Conexion.php';

class Diagnostico extends Conexion{
    public $diag_id;
    public $diag_cita;
    public $diag_descripcion;
    public $diag_situacion;


    public function __construct($args = [] )
    {
        $this->diag_id = $args['diag_id'] ?? null;
        $this->diag_cita = $args['diag_cita'] ?? '';
        $this->diag_descripcion = $args['diag_descripcion'] ?? '';
        $this->diag_situacion = $args['diag_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO diagnosticos(diag_cita, diagn_descripcion) values('$this->diag_cita','$this->diag_descripcion')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from diagnosticos inner join citas on diag_cita = cita_id where diag_situacion = 1 ";

        if($this->diag_cita != ''){
            $sql .= " and diag_cita = $this->diag_cita ";
        }

        if($this->diag_id != null){
            $sql .= " and diag_id = $this->diag_id ";
        }
        $resultado = self::servir($sql);
        return $resultado;
    }

}