<?php
    include_once('templates/header.php'); 
    
?>
<div class='row'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8'>
<div class="card bg-primary mt-3 text-center text-light">
  <h1> Agregar Alumnos</h1>
  <p>Departamento de Control de Estudios IUTCM Ext. Mérida</p>
</div>
<form action="../controlador/controlador_alumnos.php" autocomplete='off' method='post'>
  <div class="form-group">
    <label for="cedula">Número de Cédula:</label>
    <input type="number" class="form-control" value="" name="cedula" placeholder="Ej: 21231456" require>
  </div>
  <div class="form-group">
    <label for="nombre">Nombre Completo:</label>
    <input type="text" class="form-control" value="" name="nombre" required>
  </div>
  <div class="form-group">
    <label for="direccion">Dirección:</label>
    <input type="text" class="form-control" value="" name="direccion" required>
  </div>
  <input type="hidden" class="form-control" name='accion' value='nuevo_alumno' required>
  <div class="form-group">
    <button type="submit" name="submit" class="btn btn-primary">Agregar</button>
    <button type="button" class="btn btn-danger" onclick="window.location.assign('todos_alumnos.php')">Regresar</button>
  </div>
</form>
</div>
<div class='col-sm-2'></div>
</div>