<?php
class Departamento_model extends CI_Model {
    
    // Modelo de la tabla Departamentos de la base de datos
    public function __construct () {
        parent::__construct ();
    }

    public function obtener_departamentos () {
        
        $this -> db -> select ('id_dpto, nombre_dpto');
        $this -> db -> from ('departamentos');
        $this -> db -> order_by ('id_dpto', 'asc');

        $consulta = $this -> db -> get ();
        $resultado = $consulta -> result ();
        return $resultado;
    }

    public function obtener_dpto_por_id ($id_dpto) {

        $this -> db -> select ('id_dpto, nombre_dpto');
        $this -> db -> from ('departamentos');
        $this -> db -> where ('id_dpto', $id_dpto);
        $consulta = $this -> db -> get ();
        $resultado = $consulta -> row ();
        return $resultado;
    }

    public function obtener_id_dpto_por_nombre ($nombre_dpto) {

        $this -> db -> select ('id_dpto');
        $this -> db -> from ('departamentos');
        $this -> db -> where ('nombre_dpto', $nombre_dpto);
        $consulta = $this -> db -> get ();
        $resultado = $consulta -> row ();
        return $resultado;
    }
}