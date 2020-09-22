<?php
class Estado_model extends CI_Model { 

    // Modelo de la tabla Estados de la base de datos
    public function __construct () {
        parent::__construct ();
    }

    public function obtener_estados () {

        $this -> db -> select ('id_estado, descripcion_estado');
        $this -> db -> from ('estados');
        $consulta = $this -> db -> get ();
        $resultado = $consulta -> result ();
        return $resultado;
    }

    public function obtener_estado_por_id ($id_estado) {

        $this -> db -> select ('id_estado, descripcion_estado');
        $this -> db -> from ('estados');
        $this -> db -> where ('id_estado', $id_estado);
        $consulta = $this -> db -> get ();
        $resultado = $consulta -> row ();
        return $resultado;
    }

    public function obtener_id_estado_por_descripcion ($descripcion_estado) {

        $this -> db -> select ('id_estado');
        $this -> db -> from ('estados');
        $this -> db -> where ('descripcion_estado', $descripcion_estado);
        $consulta = $this -> db -> get ();
        $resultado = $consulta -> row ();
        return $resultado;
    }
    
}