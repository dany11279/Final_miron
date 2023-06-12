<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Cita.php';

    try {
   
   $fecha = date('d/m/Y');
   $buscar = new Cita();

   $busqueda= $buscar->busqueda();
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } 
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center table-dark">
                            <th colspan="6">DETALLE DE CITA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6"><center>CITAS PARA EL DIA DE HOY (<?= $fecha?>) </center></td>
                            
                        </tr>
                        <tr class="text-center table-dark">
                            <td colspan="6"><?= $busqueda[0]['CLI_NOM'] ?>(<?= $busqueda[0]['MED_NOM'] ?>)</td>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>
                

                        <?php 
                            foreach($busqueda as $key => $fila) : ?>
                        <?php if( $fila['CITA_FECHA'] == date('Y-d-m')) { ?>
                        <tr>
                        
                            <td><?= $key + 1 ?></td>
                            <td><?= $fila['PAC_NOM'] ?></td>
                            <td><?= $fila['PAC_DPI'] ?></td>
                            <td><?= $fila['PAC_TEL'] ?></td>
                            <td><?= $fila['CITA_FECHA'] ?></td>
                            <td><?= $fila['CITA_REFERENCIA'] ?></td>
                        </tr>
                        <?php  } ?>
                        <?php endforeach ?>


                        <tr class="text-center table-dark">
                            <td colspan="6"><?= $busqueda[2]['CLI_NOM'] ?>(<?= $busqueda[2]['MED_NOM'] ?>)</td>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>
                

                        <?php foreach($busqueda as $key => $fila) : ?>
                        <?php if( $fila['CITA_FECHA'] == date('Y-d-m')) { ?>
                        <tr>
                        
                            <td><?= $key + 1 ?></td>
                            <td><?= $fila['PAC_NOM'] ?></td>
                            <td><?= $fila['PAC_DPI'] ?></td>
                            <td><?= $fila['PAC_TEL'] ?></td>
                            <td><?= $fila['CITA_FECHA'] ?></td>
                            <td><?= $fila['CITA_REFERENCIA'] ?></td>
                        </tr>
                        <?php  } ?>

                        <?php endforeach ?>
                       
                        <tr>
                            <td colspan="6"><center>SIN CITAS</center></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4">
            <center><a href="/Final_miron/vistas/citas/index.php" class="btn btn-info">Regresar al formulario</a></center>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>