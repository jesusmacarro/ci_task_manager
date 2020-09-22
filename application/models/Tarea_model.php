<?php
class Tarea_model extends CI_Model { 

   // Modelo de la tabla Departamentos de la base de datos
   public function __construct () {
      parent::__construct ();
   }

   public function guardar ($dpto_solicitante, $dpto_demandado, $titulo_tarea, $descripcion_tarea, $prioridad_tarea, $estado_tarea, $id_tarea = null) {

      $data = array (
         'dpto_solicitante' => $dpto_solicitante,
         'dpto_demandado' => $dpto_demandado,
         'titulo_tarea' => $titulo_tarea,
         'descripcion_tarea' => $descripcion_tarea,
         'prioridad_tarea' => $prioridad_tarea,
         'estado_tarea' => $estado_tarea
      );

      if ($id_tarea){
         $this -> db -> where ('id_tarea', $id_tarea);
         $this -> db -> update ('tareas', $data);
      } else {
         $this -> db -> insert ('tareas', $data);
      } 
   }

   public function eliminar ($id_tarea) {

      $this -> db -> where ('id_tarea', $id_tarea);
      $this -> db -> delete ('tareas');
   }

   public function obtener_por_id ($id_tarea) {

      $this -> db -> select ('tareas.id_tarea, dpto_solicitante, dpto_demandado, titulo_tarea, descripcion_tarea, prioridad_tarea, estado_tarea, id_prioridad, descripcion_prioridad, sol.id_dpto, sol.nombre_dpto dpto_sol, dem.id_dpto, dem.nombre_dpto dpto_dem, id_estado, descripcion_estado');
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