<?php
    
    session_start();
    // borrar todas las variables de sesion
    session_unset();
        
    // destruir sesion
    session_destroy();
    include('templates/header.php');  
?>
    <div class='container'>
        <div class='row mt-5'>
            <div class='col-sm-3'></div>
            <div class='col-sm-6'>
                <img src="vista/imagenes/logo.png" class="mx-auto d-block">
            </div>
            <div class='col-sm-3'></div>
        </div>
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6 mt-5" style='background-color:#EBEDEF ;'>
                <!--<h1 class='text-center text-primary'>CONTROL DE ALUMNOS IUTCM</h1>-->
                <br>
                <!---->
                <!---->
                <form action="controlador/controlador_ingreso.php"  method='post'>
                    <div class="form-group">
                        <label for='usuario'>Ingrese el nombre de usuario'</label>
                        <input type='text' class='form-control' name='usuario' required autocomplete='off' >
                    </div>
                    <div class="form-group">
                        <label for="clave">Ingrese su password</label>
                        <input type='password' name='clave' class='form-control' required>
                    </div>
                    <input type='submit' name='submit' value='PROCESAR' class='btn btn-primary'>
                </form>
                <br>
                <?php
              
        if (isset($_GET['error'])){
            $error = $_GET['error'];
            if($error){?>
                <div class="alert alert-danger">
                    <strong>! Error !</strong> Nombre de usuario o clave incorrectos.
                </div>
                <?php } ?>
                <?php } ?>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
    <?php    
    include('templates/footer.php');
    ?>
<!--2024 Ing. Carlos R. Izquierdo G.-->