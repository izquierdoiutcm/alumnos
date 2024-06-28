<?php  
    session_start();
    include_once('templates/header.php');    
    include_once('templates/nav_bar.php');
    if(!isset($_SESSION['usuario'])){
        header('location:../index.php');
        die();
    }
    include('../modelo/Alumno.php');
    $Alumnos = new Alumnos();
    $matrizAlumnos = $Alumnos->get_alumnos();    
?>

<div class='container-fluid'>
    <div class='row'>
        <div class='col-sm-2'></div>
        <div class='col-sm-8' id='panel_mostrar'>
            <br>
            <tabla class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <td class='p-4' colspan='4'>
                            <p class='h3 text-center'>Listado de Alumnos Activos</p>
                        </td>
                    </tr>
                </thead>
                </table>
                <table class='table mt-2' id='talumnos'>
                    <thead>
                        <tr>
                            <td class='p-2'>Id</td>
                            <td class='p-2'>Cedula</td>
                            <td class='p-2'>Nombre del Alumno</td>
                            <td class='text-center p-2'>Editar Datos</td>
                            <td class='text-center p-2'>Eliminar</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($matrizAlumnos as $registro){?>
                        <tr>
                            <td><?=$registro["id"]?></td>
                            <td><?=$registro["cedula"]?></td>
                            <td><?=$registro["nombre"]?></td>
                            <td>
                                <form method='post' action="../controlador/controlador_alumnos.php">
                                    <input type='hidden' name='id' value='<?=$registro['id']?>'>
                                    <input type='hidden' name='accion' value='editar'>
                                    <button type='submit' style="border: none;">
                                        <i class="bi bi-pencil-square"></i>
                                    </button>
                                </form>
                            </td>
                            <?php if($_SESSION['tipo'] == 'ADMINISTRADOR'){?>
                            <td>
                                <form method='post' action="../controlador/controlador_alumnos.php">
                                    <input type='hidden' name='id' value='<?=$registro['id']?>'>
                                    <input type='hidden' name='accion' value='eliminar'>
                                    <button type='submit' style="border: none;">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                            <?php }else{ ?>
                            <td class='p-2 text-center'><i class="bi bi-ban"></i></td>
                            <?php }  ?>

                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
        </div>
        <div class='col-sm-2'></div>
    </div>
</div>


<?php    
    include('templates/footer.php');
?>