<?php
class Alumnos{
        private $conexion;

        public function __construct(){
            require_once("../modelo/conectar.php");
            $this->conexion = Conectar::conexion();
        }
        public function __destruct()
        {
            $this->conexion = NULL;
        }
        public function get_alumnos(){
            $sql = 'SELECT id, cedula, nombre FROM alumnos WHERE activo = 1';
            $st = $this->conexion->prepare($sql);
            $st->execute();
            $alumnos = $st->fetchAll();           
            $st = NULL;
            return $alumnos;
        }  
        function get_alumno($id){
            $sql = 'SELECT id, cedula, nombre, direccion FROM alumnos WHERE id= ? && activo = 1';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $id);
            $st->execute();
            $alumno = $st->fetch(PDO::FETCH_ASSOC);
            $st = NULL;
            return $alumno;
        } 
        function update_alumnos($id, $ced, $nom, $dir){
            $exito = false;
             $sql = 'UPDATE alumnos set nombre = ?, direccion = ? WHERE id = ?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $nom);
            $st->bindParam(2, $dir);
            $st->bindParam(3, $id);
            if($st->execute()){
                $exito = true;
            }
            $st = NULL;          
           return $exito;
        }
        function delete_alumnos($id){
            $exito = false;
            $sql = 'UPDATE alumnos set activo = 0 WHERE id = ?';
            $st  = $this->conexion->prepare($sql);
            $st->bindParam(1, $id);
            if($st->execute()){
                $exito = true;
            }
            $st = NULL;         
            return $exito; 
        }
    }
