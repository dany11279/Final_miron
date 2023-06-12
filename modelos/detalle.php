<?php
require_once 'Conexion.php';

class Detalle extends Conexion{
    public $det_id;
    public $det_cita;
    public $det_pac;
    public $det_med;
    public $det_situacion;


    public function __construct($args = [] )
    {
        $this->det_id = $args['det_id'] ?? null;
        $this->det_cita = $args['det_cita'] ?? '';
        $this->det_pac = $args['det_pac'] ?? '';
        $this->det_med = $args['det_med'] ?? '';
        $this->det_situacion = $args['det_situacion'] ?? '';
    }

    public function guardar(){
        $sql = "INSERT INTO detalles(det_cita, det_pac, det_med) values('$this->det_cita','$this->det_pac', '$this->det_med')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}