<?php
class Usuario {
    private $id;
    private $nombre;
    private $apellido;
    private $correo;
    private $password;

    // CONSTRUCTOR
    public function __construct($nombre, $apellido, $correo, $password) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->correo = $correo;
        $this->password = password_hash($password, PASSWORD_DEFAULT); // CONTRASEÑA ENCRIPTADA
    }

    // CREATE
    public function crearUsuario($conexion) {
        $sql = "INSERT INTO usuarios (nombre, apellido, correo, password)
                VALUES ('$this->nombre', '$this->apellido', '$this->correo', '$this->password')";
        return $conexion->query($sql);
    }

    // READ


    // UPDATE

    public function actualizar($conexion) {
        $sql = "UPDATE usuarios 
                SET 
                nombre='$this->nombre', 
                apellido='$this->apellido', 
                correo='$this->correo'
                WHERE id=$this->id";
        return $conexion->query($sql);
    }

    // DELETE

    public function eliminar($conexion) {
        $sql = "DELETE 
                FROM usuarios 
                WHERE id=$this->id";
        return $conexion->query($sql);
    }


    // GETTERS
    
    public function getId() { return $this->id; }
    public function getNombre() { return $this->nombre; }
    public function getApellido() { return $this->apellido; }
    public function getCorreo() { return $this->correo; }

}

?>