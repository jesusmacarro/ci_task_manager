<?php
if (!defined ('BASEPATH')) 
   exit ('No direct script access allowed');
class Tareas extends CI_Controller {
    public function __construct () {
        parent::__construct ();
    }

    public function index () {

        $data = array ();
        $this -> load -> model ('extended_model');
        $data['tareas'] = $this -> extended_model-> obtener_tareas_completas ();
        $this -> load -> view ('tareas/header');
        $this -> load -> view ('tareas/index', $data);
        $this -> load -> view ('tareas/footer');
    }

    public function ver ($id_tarea) {

        $data = array ();
        $this -> load -> model ('extended_model');
        $tarea = $this -> extended_model -> obtener_tarea_completa_por_id ($id_tarea);
        $data['tarea'] = $tarea;
        $this -> load -> view ('tareas/header');
        $this -> load -> view ('tareas/ver', $data);
        $this -> load -> view ('tareas/footer');
    }

    public function guardar ($id_tarea = null) {

        $data = array (); 
        $this -> load -> model ('tarea_model');
        $this -> load -> model ('departamento_model');
        $this -> load -> model ('prioridad_model');
        $this -> load -> model ('estado_model');
        
        $data['dptos'] = $this -> departamento_model -> obtener_departamentos ();
        $data['prioridades'] = $this -> prioridad_model -> obtener_prioridades ();
        $data['estados'] = $this -> estado_model -> obtener_estados ();
        
        // Si la tarea estaba creada anteriormente, se muestran los datos para su edición
        if ($id_tarea) {
            $tarea = $this -> tarea_model -> obtener_por_id ($id_tarea);
            
            $data['id_tarea'] = $tarea -> id_tarea;
            $data['dpto_solicitante'] = $tarea -> dpto_solicitante;
            $data['dpto_demandado'] = $tarea -> dpto_demandado;
            $data['titulo_tarea'] = $tarea -> titulo_tarea;
            $data['descripcion_tarea'] = $tarea -> descripcion_tarea;
            $data['prioridad_tarea'] = $tarea -> prioridad_tarea;
            $data['estado_tarea'] = $tarea -> estado_tarea;
        // Si es una tarea nueva, se muestran los datos a nulo, excepto el estado que será 'Pendiente de asignación'
        } else {
            $data['id_tarea'] = null;
            $data['dpto_solicitante'] = null;
            $data['dpto_demandado'] = null;
            $data['titulo_tarea'] = null;
            $data['descripcion_tarea'] = null;
            $data['prioridad_tarea'] = null;
            $data['estado_tarea'] = 'Pendiente de asignación';
        }
        $this -> load -> view ('tareas/header');
        $this -> load -> view ('tareas/guardar', $data);
        $this -> load -> view ('tareas/footer');
    }

    public function guardar_post ($id_tarea = null, $estado_tarea = 1) {
        // Si se edita o crea una tarea, se recogen los datos del formulario
        if ($this -> input -> post ()) {
            // Se obtienen los identificadores de los departamentos
            $dpto_solicitante = $this -> obtener_id_dpto ($this -> input -> post ('dpto_solicitante'));
            $dpto_demandado = $this -> obtener_id_dpto ($this -> input -> post ('dpto_demandado'));
            $titulo_tarea = $this -> input -> post ('titulo_tarea');
            $descripcion_tarea = $this -> input -> post ('descripcion_tarea');
            // Se obtiene el identificador de la prioridad
            $prioridad_tarea = $this -> obtener_id_prioridad ($this -> input -> post ('prioridad_tarea'));
            // Si se obtiene del formulario el estado, se calcula el identificador y será edición. Si no, será creación y tendrá id estado 1
            $this -> input -> post ('estado_tarea')? $estado_tarea = $this -> obtener_id_estado ($this -> input -> post ('estado_tarea')): $estado_tarea = 1;

            $this -> load -> model ('tarea_model');
            // Se guardan los datos de la tarea en la base de datos
            $this -> tarea_model -> guardar ( $dpto_solicitante, $dpto_demandado, $titulo_tarea, $descripcion_tarea, $prioridad_tarea, $estado_tarea, $id_tarea);

            redirect ('tareas');
        } else {
            $this -> guardar ();
        } 
    }

    public function obtener_id_dpto ($nombre_dpto) {
        
        $this -> load -> model ('departamento_model');
        return $this -> departamento_model -> obtener_id_dpto_por_nombre ($nombre_dpto) -> id_dpto;
    }

    public function obtener_id_prioridad ($descripcion_prioridad) {
        
        $this -> load -> model ('prioridad_model');
        return $this -> prioridad_model -> obtener_id_prioridad_por_descripcion ($descripcion_prioridad) -> id_prioridad;
    }

    public function obtener_id_estado ($descripcion_estado) {
        
        $this -> load -> model ('estado_model');
        return $this -> estado_model -> obtener_id_estado_por_descripcion ($descripcion_estado) -> id_estado;
    }

    public function eliminar ($id_tarea) {

        $this -> load -> model ('tarea_model');
        $this -> tarea_model -> eliminar ($id_tarea);
        redirect ('tareas');
    }
}