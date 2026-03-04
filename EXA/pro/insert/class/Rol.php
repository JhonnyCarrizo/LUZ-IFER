<?php
require_once('DB.php');
class Rol {
    protected $rol;
    public function __construct($rol) {
        $this->rol = $rol;
    }
    public function setRol($rol) {$this->rol = $rol;}
    public function getRol() {return $this->rol;}
    public function guardar() {
        $con = DB::conectar();
        $sql = 'insert into roles(rol)values(?)';
        $stmt = $con->prepare($sql);
        $datos = [
            $this->rol, 
        ];
        $tiposDatos = 's';
        $stmt->bind_param( $tiposDatos, $datos);                                                                                                                                                                                                                                                                                                                                                                                                                                 
    }
    public static function buscarTodo() {
        $con = DB::conectar();
        $sql = 'select id, rol from roles';
        $busqueda = $con->query($sql);
        return $busqueda;
    }
}

?>