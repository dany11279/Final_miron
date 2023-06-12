<?php
require_once 'Conexion.php';

class Receta extends Conexion{
    public $rec_id;
    public $rec_cita;
    public $rec_medicamentos;
    public $rec_situacion;


    public function __construct($args = [] )
    {
        $this->rec_id = $args['rec_id'] ?? null;
        $this->rec_cita = $args['rec_cita'] ?? '';
        $this->rec_medicamentos = $args['rec_medicamentos'] ?? '';
        $this->rec_situacion = $args['rec_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO recetas(rec_cita, rec_medicamentos) values('$this->rec_cita','$this->rec_medicamentos')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from recetas inner join citas on rec_cita = cita_id where rec_situacion = 1 ";

        if($this->rec_cita != ''){
            $sql .= " and rec_cita = $this->rec_cita ";
        }

        if($this->rec_id != null){
            $sql .= " and rec_id = $this->rec_id ";
        }
        

        $resultado = self::servir($sql);
        return $resultado;
    }

}