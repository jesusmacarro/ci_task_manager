<?php
class Extended_model extends CI_Model { 

  // Modelo para obtener datos de varias tablas a la vez de la base de datos 
  public function __construct () {
    parent::__construct ();
  }

  public function obtener_tareas_completas () {

    $this -> db -> select ('id_tarea, dpto_solicitante, dpto_demandado, titulo_tarea, descripcion_tarea, prioridad_tarea, estado_tarea, id_prioridad, descripcion_prioridad, sol.id_dpto, sol.nombre_dpto dpto_sol, dem.id_dpto, dem.nombre_dpto dpto_dem, id_estado, descripcion_estado');
    $this -> db -> from ('tareas');
    $this -> db -> join ('prioridades', 'prioridad_tarea = id_prioridad');
    $this -> db -> join ('departamentos sol', 'dpto_solicitante = sol.id_dpto');
    $this -> db -> join ('departamentos dem', 'dpto_demandado = dem.id_dpto');
    $this -> db -> join ('estados', 'estado_tarea = id_estado');
    $this -> db -> order_by ('id_tarea', 'desc');
    $consulta = $this -> db -> get ();
    $resultado = $consulta -> result ();
    return $resultado;
  }

  public function obtener_tarea_completa_por_id ($id_tarea) {

    $this -> db -> select ('id_tarea, dpto_solicitante, dpto_demandado, titulo_tarea, descripcion_tarea, prioridad_tarea, estado_tarea, id_prioridad, descripcion_prioridad, sol.id_dpto, sol.nombre_dpto dpto_sol, dem.id_dpto, dem.nombre_dpto dpto_dem, id_estado, descripcion_estado');
    $this -> db -> from ('tareas');
    $this -> db -> join ('prioridades', 'prioridad_tarea = id_prioridad');
    $this -> db -> join ('departamentos sol', 'dpto_solicitante = sol.id_dpto');
    $this -> db -> join ('departamentos dem', 'dpto_demandado = dem.id_dpto');
    $this -> db -> join ('estados', 'estado_tarea = id_estado');
    $this -> db -> where ('id_tarea', $id_tarea);
    $consulta = $this -> db -> get ();
    $resultado = $consulta -> row ();
    return $resultado;
  }

}