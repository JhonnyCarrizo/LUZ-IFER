<?php
require_once('DB.php');
require_once('Rol.php');
class Persona {
    protected $id;
    protected $cedula;
    protected $nombres;
    protected $apellidos;
    protected $userName;
    protected $roles;
    protected $rolesAsignados;
    public function __construct() {
        $this->roles = [];
    }
    public function setId($id) {$this->id = $id;}
    public function setCedula($cedula) {$this->cedula = $cedula;}
    public function setNombres($nombres) {$this->nombres = $nombres;}
    public function setApellidos($apellidos) {$this->apellidos = $apellidos;}
    public function setUser($user) {$this->user = $user;}
    public function getCedula() {return $this->cedula;}
    public function getId() {return $this->id;}
    public function getNombres() {return $this->nombres;}
    public function getApellidos() {return $this->apellidos;}
    public function getUser() {return $this->user;}
    public function addRolId($rolId) {
        $this->rolesId[] = $rolId;
    }
    public static function findById($id) {
        $con = DB::conectar();
        $sql = 'select cedula, apellidos, nombres, user from personas where id=?';
        $stmt = $con->prepare($sql);
        $datos = [
            $id
        ];
        $tiposDatos = 'i';
        $stmt->bind_param( $tiposDatos, ...$datos);       
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_array();
        $data['roles'] = Rol::getRolesByPersonaId($id);
        return $data;
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
        $stmt->close();
        for ($i = 0; $i < count($this->rolesId); $i++) {
            $sql = 'insert into roles_personas(rolId, personaId)values(?,?)';
            $stmt = $con->prepare($sql);
            $rolId = $this->rolesId[$i];
            $tiposDatos = 'ii';
            $stmt->bind_param( $tiposDatos, $rolId, $personaId );       
            $stmt->execute();
        }                                                                                                                                                                                                                                                                                                                                                                                                                     
    }
    public function editar() {
        $con = DB::conectar();
        $sql = 'select id, cedula from personas where cedula=? and id!=?';
        $stmt = $con->prepare($sql);
        $datos = [
            $this->cedula, 
            $this->id, 
        ];
        $tiposDatos = 'ii';
        $stmt->bind_param( $tiposDatos, ...$datos);       
        $stmt->execute();
        if($stmt->num_rows === 0) {
            $stmt->close();
            $sql = "update personas set cedula=?, nombres=?, apellidos=?, user=? where id=?";
            $stmt = $con->prepare($sql);
            $datos = [
                $this->cedula, 
                $this->apellidos, 
                $this->nombres, 
                $this->user, 
                $this->id,
            ];
            $tiposDatos = 'isssi';
            $stmt->bind_param( $tiposDatos, ...$datos);       
            $stmt->execute();
            $stmt->close();
            $sql = "delete from roles_personas where personaId=?";
            $stmt = $con->prepare($sql);
            $tiposDatos = 'i';
            $stmt->bind_param( $tiposDatos, $this->id);       
            $stmt->execute();
            $stmt->close();
            for ($i = 0; $i < count($this->rolesId); $i++) {
                $sql = 'insert into roles_personas(rolId, personaId)values(?,?)';
                $stmt = $con->prepare($sql);
                $rolId = $this->rolesId[$i];
                $tiposDatos = 'ii';
                $stmt->bind_param( $tiposDatos, $rolId, $this->id );       
                $stmt->execute();
                $stmt->close();
            }     
        }
    }
    public static function buscarTodo() {
        $con = DB::conectar();
        $sql = 'select personas.id as personaId, cedula, nombres, apellidos, user from personas ';
        $busqueda = $con->query($sql);
        $personas = [];
        foreach ($busqueda as $key => $data) {
            $busRoles = Rol::getRolesByPersonaId($data['personaId']);
            $personas[$key] = $data;
            $personas[$key]['roles'] = $busRoles;
        }
        return $personas;
    }
}

?>