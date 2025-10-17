<?php
class Tareas {
    private $id;
    private $titulo;
    private $descripcion;
    private $realizada;
    private $fecha_inicio;
    private $fecha_fin;
    private $duracion_estimada;

    // CONSTRUCTOR
    public function __construct($titulo, $descripcion, $fecha_inicio, $duracion_estimada, $realizada = false, $fecha_fin = null) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->realizada = $realizada;
        $this->fecha_inicio = $fecha_inicio;
        $this->fecha_fin = $fecha_fin;
        $this->duracion_estimada = $duracion_estimada;
    }

    // CREATE (AGREGAR TAREAS)
    public function crear($conexion) {
        $sql = "INSERT INTO tareas (titulo, descripcion, realizada, fecha_inicio, fecha_fin, duracion_estimada)
                VALUES ('$this->titulo', '$this->descripcion', ".($this->realizada ? 1 : 0).", '$this->fecha_inicio', ".($this->fecha_fin ? "'$this->fecha_fin'" : "NULL").", '$this->duracion_estimada')";
        return $conexion->query($sql);
    }

    // READ


    // UPDATE (MODIFICAR TAREAS)

    public function actualizar($conexion) {
        $sql = "UPDATE tareas 
                SET 
                titulo='$this->titulo',
                descripcion='$this->descripcion',
                duracion_estimada='$this->duracion_estimada'
                WHERE id=$this->id";
        return $conexion->query($sql);
    }

    // DELETE (ELIMINAR TAREAS)

    public function eliminar($conexion) {
        $sql = "DELETE 
                FROM tareas 
                WHERE id=$this->id";
        return $conexion->query($sql);
    }


    // MÉTODO PARA MARCAR TAREA COMO REALIZADA

    public function marcarRealizada($conexion) {
        $this->realizada = true;
        $this->fecha_fin = date("Y-m-d");
        $sql = "UPDATE tareas 
                SET realizada=1, fecha_fin='$this->fecha_fin' 
                WHERE id=$this->id";
        return $conexion->query($sql);
    }


    // GETTERS

    public function getId() { return $this->id; }
    public function getTitulo() { return $this->titulo; }
    public function getDescripcion() { return $this->descripcion; }
    public function getRealizada() { return $this->realizada; }
    public function getFechaInicio() { return $this->fecha_inicio; }
    public function getFechaFin() { return $this->fecha_fin; }
    public function getDuracionEstimada() { return $this->duracion_estimada; }

    // SETTERS
    
    public function setTitulo($titulo) { $this->titulo = $titulo; }
    public function setDescripcion($descripcion) { $this->descripcion = $descripcion; }
    public function setDuracionEstimada($duracion) { $this->duracion_estimada = $duracion; }

}

?>