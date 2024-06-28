<?php
    include_once('templates/header.php');

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
        <div class='col-sm-8'>
<div class="card bg-primary mt-3 text-center text-light">
  <h1> Modificar Datos Personales Alumnos</h1>
  <p>Departamento de Control de Estudios IUTCM Ext. Mérida</p>
</div>
<form action="../controlador/controlador_alumnos.php" autocomplete='off' method='post'>
<div class="form-group">
    <label for="id">Alumno ID:</label>
    <input type="text" class="form-control" placeholder="<?=$datos['id']?>" value="<?=$datos['id']?>" name="id" readonly>
  </div>
  <div class="form-group">
    <label for="cedula">Número de Cédula:</label>
    <input type="text" class="form-control" value="<?=$datos['cedula']?>" name="cedula" readonly>
  </div>
  <div class="form-group">
    <label for="nombre">Nombre Completo:</label>
    <input type="text" class="form-control" value="<?=$datos['nombre']?>" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" value="<?=$datos['direccion']?>" name="direccion" required>
  </div>
  <input type="hidden" class="form-control" name='accion' value='actualizar_datos' required>
  <div class="form-group">
    <button type="submit" class="btn btn-primary">Modificar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.assign('todos_alumnos.php')">Regresar</button>
  </div>
</form>
</div>
<div class='col-sm-2'></div>
</div>

<!--2024 Ing. Carlos R. Izquierdo G.-->