<?php
    class Conectar{        
        public static function conexion(){
            try{
                $conexion = new PDO('mysql:host=localhost;dbname=instituto;port=3308', 'root', '');                
                $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $conexion->exec("SET CHARACTER SET UTF8");
                //echo "éxito";
            }catch(Exception $e){
               echo("Error al conectar " . $e->getMessage() . "\n");
                echo "Linea del error " . $e->getLine();
            }
            return $conexion;
        }
        
    }