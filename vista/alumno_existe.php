<?php
    include('templates/header.php');

    if (array_key_exists('id_usuario', $_COOKIE)) {
      $id = $_COOKIE['id_usuario'];        
    } else {
      echo" La cookie id_usuario no existe";
    }

    include_once('../modelo/Alumno.php');
    $alumno = new Alumnos();
    $datos = $alumno->get_alumno($id); 

    // Elimina la cookie
    unset($_COOKIE['id_usuario']);     
?>
<div class='row'>
    <div class='col-sm-2'></div>
    <div class='col-sm-8' id='panel_mostrar'>
        <div class="card bg-primary mt-3 text-center text-light">
            <h1>El alumno ya existe</h1>
            <p>Departamento de Control de Estudios IUTCM Ext. Mérida</p>
        </div>
        <form action="../controlador/controlador_alumnos.php" autocomplete='off' method='post'>            
            <div class="form-group pt-2">
                <button type="button" class="btn btn-danger"
                    onclick="window.location.assign('todos_alumnos.php')">Regresar</button>
            </div>
        </form>
    </div>
    <div class='col-sm-2'></div>
<!-- -->
</div>