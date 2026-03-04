<?php
require_once('DB.php');
require_once('Rol.php');
class Persona {
    protected $cedula;
    protected $nombres;
    protected $apellidos;
    protected $userName;
    protected $roles;
    public function __construct() {
        $this->roles = [];
    }
    public function setCedula($cedula) {$this->cedula = $cedula;}
    public function setNombres($nombres) {$this->nombres = $nombres;}
    public function setApellidos($apellidos) {$this->apellidos = $apellidos;}
    public function setUser($user) {$this->user = $user;}
    public function getCedula() {return $this->cedula;}
    public function getNombres() {return $this->nombres;}
    public function getApellidos() {return $this->apellidos;}
    public function getUser() {return $this->user;}
    public function addRolId($rolId) {
        $this->rolesId[] = $rolId;
    }
    public function guardar() {
        $con = DB::conectar();
        $sql = 'insert into personas(cedula, apellidos, nombres, user)values(?,?,?,?)';
        $stmt = $con->prepare($sql);
        $datos = [
            $this->cedula, 
            $this->apellidos, 
            $this->nombres, 
            $this->user, 
        ];
        $tiposDatos = 'isss';
        $stmt->bind_param( $tiposDatos, ...$datos);       
        $stmt->execute();
        $personaId = $con->insert_id;   
        for ($i = 0; $i < count($this->rolesId); $i++) {
            $sql = 'select id, rol from roles where id=?';
            $stmt = $con->prepare($sql);
            $rolId = $this->rolesId[$i];
            $tiposDatos = 's';
            $datos = [
                $rolId
            ];
            $stmt->bind_param( $tiposDatos, ...$datos );       
            $stmt->execute();
            $busquedaRol =  $stmt->get_result();
            $rolData = $busquedaRol->fetch_array();
            $rolId = $rolData['id'];
            $sql = 'insert into roles_personas(rolId, personaId)values(?,?)';
            $stmt = $con->prepare($sql);
            $datos = [
                $rolId,
                $personaId,

            ];
            $tiposDatos = 'ii';
            $stmt->bind_param( $tiposDatos, ...$datos);       
            $stmt->execute();
        }                                                                                                                                                                                                                                                                                                                                                                                                                     
    }

    public static function buscarTodo() {
        $con = DB::conectar();
        $sql = 'select cedula, nombres, apellidos, user, rol from personas inner join roles_personas on personas.id = roles_personas.personaId inner join roles on roles_personas.rolId = roles.id';
        $busqueda = $con->query($sql);
        return $busqueda;
    }
}

?>