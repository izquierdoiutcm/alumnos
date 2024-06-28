<?php
    require_once('../modelo/Alumno.php');
    include_once('test_input.php');
    if (validar(isset($_POST['id']))) {
        $accion = validar($_POST['accion']);
        $id = validar($_POST['id']);
        switch ($accion){
            case 'editar':               
                llamarEditar($id);
                break;
            case 'eliminar':
                validarEliminar($id);
                break;
            case 'actualizar_datos':
                $cedula = validar($_POST['cedula']);
                $nombre = validar(strtoupper($_POST['nombre']));
                $direccion = validar(strtoupper(($_POST['direccion'])));
                actualizarDatosAlumno($id, $cedula, $nombre, $direccion);
                 break;
            case 'eliminar_alumno':
                eliminarAlumno($id);
        }

    
    }else{
        header('location:../vista/todos_alumnos.php');
    }
    function llamarEditar($id)
    {              
        // Crea la cookie con el valor del id de usuario
        setcookie("id_usuario", $id, time() + (86400 * 30), "/");        
        header('location:../vista/editar_alumnos.php');
    }
    function validarEliminar($id){  
        // Crea la cookie con el valor del id de usuario     
        setcookie("id_usuario", $id, time() + (86400 * 30), "/");        
        header('location:../vista/validar_eliminar.php');
    }
    function actualizarDatosAlumno($id, $cedula, $nombre, $direccion)
    {
        $alumno = new Alumnos();
        $exito = $alumno->update_alumnos($id, $cedula, $nombre, $direccion);
        if ($exito) {
            header('location:../vista/todos_alumnos.php');
        }
    }
    function eliminarAlumno($id)
    {
        $alumno = new Alumnos();
        $exito = $alumno->delete_alumnos($id);
        if($exito){
            header('location:../vista/todos_alumnos.php'); 
        }

    }   


