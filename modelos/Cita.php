<?php
require_once 'Conexion.php';

class Cita extends Conexion{
    public $cita_id;
    public $cita_pac;
    public $cita_med;
    public $cita_fecha;
    public $cita_hora;
    public $cita_referencia;
    public $cita_situacion;


    public function __construct($args = [] )
    {
        $this->cita_id = $args['cita_id'] ?? null;
        $this->cita_pac = $args['cita_pac'] ?? '';
        $this->cita_med = $args['cita_med'] ?? '';
        $this->cita_fecha = $args['cita_fecha'] ?? '';
        $this->cita_hora = $args['cita_hora'] ?? '';
        $this->cita_referencia= $args['cita_referencia'] ?? '';
        $this->cita_situacion = $args['cita_situacion'] ?? '';
    }

        public function setCitaFecha($fecha) {
            $sql = "SELECT * FROM citas where $this->cita_fecha = $fecha";
        }
    public function buscarPorFecha()
        {
            $sql = "SELECT * FROM citas WHERE DATE(cita_fecha) = '$this->cita_fecha' AND cita_situacion = 1";
            $resultado = self::servir($sql);
            return $resultado;
        }    
    public function guardar(){
        $sql = "INSERT INTO citas(cita_pac, cita_med, cita_fecha, cita_hora, cita_referencia) values('$this->cita_pac','$this->cita_med','$this->cita_fecha','$this->cita_hora','$this->cita_referencia')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * from citas where cita_situacion = 1 ";

        if($this->cita_paciente != ''){
            $sql .= " and cita_pac like '%$this->cita_pac %' ";
        }

        if($this->cita_medico != ''){
            $sql .= " and cita_med = $this->cita_med ";
        }

        if($this->cita_id != null){
            $sql .= " and cita_id = $this->cita_id ";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE citas SET cita_pac = '$this->cita_pac', cita_med = $this->cita_med, cita_fecha = $this->cita_fecha, cita_hora
         = $this->cita_hora, cita_referencia = $this->cita_referencia where cita_id = $this->cita_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE citas SET cita_situacion = 0 where cita_id = $this->cita_id";
        
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function busqueda(){
        

        $sql = " SELECT * FROM citas  inner join pacientes on pac_id = cita_pac 
        inner join medicos on medico_id = cita_med inner join clinicas on cli_id = med_cli ";


        $resultado = self::servir($sql);
        return $resultado;

    }
}