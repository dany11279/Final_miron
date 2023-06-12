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
                            <th colspan="6">HOSPITAL "LA ESPERANZA" CITAS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="text-center table-dark">
                            <td colspan="6"><center>CITAS PARA EL DIA DE HOY (<?= $fecha?>) </center></td>
                            
                        </tr>
                        </tr>
                        <tr class="text-center table-secundary">
                            <td colspan="6"><?= $busqueda[1]['CLI_NOM'] ?>(DOCTOR<?= $busqueda[1]['MED_NOM'] ?>)</td>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>

                        <?php if (!empty($busqueda) && count($busqueda) > 0) : ?>
                            <?php $citasEncontradas = false; ?>
                            <?php foreach($busqueda as $key => $fila) : ?>
                                <?php if ($fila['CITA_MED'] == 1 && $fila['MED_CLI'] = 1) : ?>
                                    <?php $citasEncontradas = true; ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $fila['PAC_NOM'] ?></td>
                                        <td><?= $fila['PAC_DPI'] ?></td>
                                        <td><?= $fila['PAC_TEL'] ?></td>
                                        <td><?= $fila['CITA_HORA'] ?></td>
                                        <td><?= $fila['CITA_REFERENCIA'] ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                            <?php else : ?>
                                    <tr>
                                        <td colspan="6"><center>SIN CITAS</center></td>
                                    </tr>
                        <?php endif ?>
                        <tr class="text-center table-dark">
                            <td colspan="6"><?= $busqueda[3]['CLI_NOM'] ?>(<?= $busqueda[3]['MED_NOM'] ?>)</td>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>

                        <?php if (!empty($busqueda) && count($busqueda) > 0) : ?>
                            <?php $citasEncontradas = false; ?>
                            <?php foreach($busqueda as $key => $fila) : ?>
                                <?php if ($fila['CITA_MED'] == 2 && $fila['MED_CLI'] = 2) : ?>
                                    <?php $citasEncontradas = true; ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $fila['PAC_NOM'] ?></td>
                                        <td><?= $fila['PAC_DPI'] ?></td>
                                        <td><?= $fila['PAC_TEL'] ?></td>
                                        <td><?= $fila['CITA_HORA'] ?></td>
                                        <td><?= $fila['CITA_REFERENCIA'] ?></td>
                                    </tr>

                                <?php endif ?>
                            <?php endforeach ?>
                            <?php else : ?>
                                    <tr>
                                        <td colspan="6"><center>SIN CITAS</center></td>
                                    </tr>
                        <?php endif ?>
                        <tr class="text-center table-dark">
                            <td colspan="6"><?= $busqueda[4]['CLI_NOM'] ?>(<?= $busqueda[4]['MED_NOM'] ?>)</td>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>

                        <?php if (!empty($busqueda) && count($busqueda) > 0) : ?>
                            <?php $citasEncontradas = false; ?>
                            <?php foreach($busqueda as $key => $fila) : ?>
                                <?php if ($fila['CITA_MED'] == 3 && $fila['MED_CLI'] = 3) : ?>
                                    <?php $citasEncontradas = true; ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $fila['PAC_NOM'] ?></td>
                                        <td><?= $fila['PAC_DPI'] ?></td>
                                        <td><?= $fila['PAC_TEL'] ?></td>
                                        <td><?= $fila['CITA_HORA'] ?></td>
                                        <td><?= $fila['CITA_REFERENCIA'] ?></td>
                                    </tr>

                                <?php endif ?>
                            <?php endforeach ?>
                            <?php else : ?>
                                    <tr>
                                        <td colspan="6"><center>SIN CITAS</center></td>
                                    </tr>
                        <?php endif ?>
                        <tr class="text-center table-dark">
                            <td colspan="6"><?= $busqueda[5]['CLI_NOM'] ?>(<?= $busqueda[5]['MED_NOM'] ?>)</td>
                        </tr>
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELEFONO</th>
                            <th>HORA DE LA CITA</th>
                            <th>REFERIDO SI / NO</th>
                        </tr>
                        <?php if (!empty($busqueda) && count($busqueda) > 0) : ?>
                            <?php $citasEncontradas = false; ?>
                            <?php $key = 0; ?>
                            <?php foreach($busqueda as $key => $fila) : ?>
                                <?php if ($fila['CIT_MED'] == 5 && $fila['MED_CLI'] = 5) : ?>
                                    <?php $citasEncontradas = true; ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $fila['PAC_NOM'] ?></td>
                                        <td><?= $fila['PAC_DPI'] ?></td>
                                        <td><?= $fila['PAC_TEL'] ?></td>
                                        <td><?= $fila['CITA_HORA'] ?></td>
                                        <td><?= $fila['CITA_REFERENCIA'] ?></td>
                                    </tr>
                                <?php endif ?>
                            <?php endforeach ?>
                            <?php if (!$citasEncontradas) : ?>
                                <tr>
                                    <td colspan="6"><center>SIN CITAS</center></td>
                                </tr>
                            <?php endif ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="6"><center>SIN CITAS</center></td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div><center>
    <div class="row">
        <div class="col-lg-4">
            <a href="/Final_miron/vistas/citas/index.php" class="btn btn-info">Regresar al formulario</a>
        </div>
    </div></center>
<?php include_once '../../includes/footer.php'?>