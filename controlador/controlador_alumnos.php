<?php
    require_once('../modelo/Alumno.php');
    include_once('test_input.php');
    if (isset($_POST['accion'])) {
        $accion = validar($_POST['accion']);      
        switch ($accion){
            case 'editar':    
                $id = validar($_POST['id']);           
                llamarEditar($id);
                break;
            case 'eliminar':
                $id = validar($_POST['id']);
                validarEliminar($id);
                break;
            case 'actualizar_datos':    
                $id = validar($_POST['id']);        
                $cedula = validar($_POST['cedula']);
                $nombre = validar(strtoupper($_POST['nombre']));
                $direccion = validar(strtoupper(($_POST['direccion'])));
                actualizarDatosAlumno($id, $cedula, $nombre, $direccion);
                 break;
            case 'eliminar_alumno':
                $id = validar($_POST['id']); 
                eliminarAlumno($id);
                break;
            case 'nuevo_alumno':
                $cedula = validar($_POST['cedula']);
                $nombre = validar(strtoupper($_POST['nombre']));
                $direccion = validar(strtoupper(($_POST['direccion'])));
                agregarDatosNuevoAlumno($cedula, $nombre, $direccion);
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
        echo "entro " . $id;
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
    function agregarDatosNuevoAlumno($cedula, $nombre, $direccion)
    {
        $alumno = new Alumnos();
        $seguir = $alumno->validarAlumnoExiste($cedula);
        
        if(!$seguir){
            $exito = $alumno->insertAlumnos($cedula, $nombre, $direccion);
            if ($exito) {
                header('location:../vista/todos_alumnos.php');
            }
        }else{
            header('location:../vista/alumno_existe.php');
        }
        
    }  


