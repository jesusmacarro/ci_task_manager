<?php
class Prioridad_model extends CI_Model { 
    
    // Modelo de la tabla Prioridades de la base de datos
    public function __construct () {
        parent::__construct ();
    }

    public function obtener_prioridades () {

        $this -> db -> select ('id_prioridad, descripcion_prioridad');
        $this -> db -> from ('prioridades');
        $consulta = $this -> db -> get ();
        $resultado = $consulta -> result ();
        return $resultado;
    }

    public function obtener_prioridad_por_id ($id_prioridad) {

        $this -> db -> select ('id_prioridad, descripcion_prioridad');
        $this -> db -> from ('prioridades');
        $this -> db -> where ('id_prioridad', $id_prioridad);
        $consulta = $this -> db -> get ();
        $resultado = $consulta -> row ();
        return $resultado;
    }

    public function obtener_id_prioridad_por_descripcion ($descripcion_prioridad) {

        $this -> db -> select ('id_prioridad');
        $this -> db -> from ('prioridades');
        $this -> db -> where ('descripcion_prioridad', $descripcion_prioridad);
        $consulta = $this -> db -> get ();
        $resultado = $consulta -> row ();
        return $resultado;
    }
    

}