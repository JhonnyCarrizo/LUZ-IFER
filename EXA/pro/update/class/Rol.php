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
    public static function getRolesByPersonaId($personaId) {
        $con = DB::conectar();
        $sql = 'select rolId, personaId, rol from roles inner join roles_personas on roles.id=roles_personas.rolId inner join personas on roles_personas.personaId=personas.id where personas.id = ?';
        $stmt = $con->prepare($sql);
        $tiposDatos = 'i';
        $stmt->bind_param( $tiposDatos, $personaId);  
        $stmt->execute();
        $result = $stmt->get_result();
        $arrayRoles = [];
        while ($data = $result->fetch_array()) {
            $arrayRoles[] = $data;
        }
        return $arrayRoles;
    }
}

?>