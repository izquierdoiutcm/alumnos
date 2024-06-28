<?php

if(isset($_POST['submit'])){
        include_once('test_input.php');
        $nom_usuario = validar($_POST['usuario']);
        $clave = validar($_POST['clave']);
        require_once('../modelo/Usuario.php');
        $ingreso = new Usuario();
        $usuario = $ingreso->consultarUsuario($nom_usuario, $clave);
        if(isset($usuario['nombre'])){            
            session_start();
            $_SESSION["usuario"] = $nom_usuario;
            $_SESSION['tipo'] = $usuario['tipo'];
            require_once('controlador_alumnos.php');            
        }else{            
           header('location:../index.php?error=true');
        }
    }else{ 
        require_once('vista/ingreso.php');
    }