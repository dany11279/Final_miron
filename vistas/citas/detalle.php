<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require '../../modelos/Cita.php';

try {
    $fecha = date('d/m/Y');
    $buscar = new Cita();
    $busqueda = $buscar->busqueda();
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
                        <td colspan="6"><center>CITAS PARA EL DÍA DE HOY (<?= $fecha ?>)</center></td>
                    </tr>
                    <?php if (!empty($busqueda)): ?>
                        <?php $clinicaActual = ''; $medicoActual = ''; ?>
                        <?php foreach ($busqueda as $key => $fila) : ?>
                            <?php if ($clinicaActual != $fila['CLI_NOM'] || $medicoActual != $fila['MED_NOM']): ?>
                                <?php if ($key > 0): ?>
                                    </tbody>
                                    </table>
                                <?php endif; ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr class="text-center table-secondary">
                                            <th colspan="6">CLÍNICA: <?= $fila['CLI_NOM'] ?> (<?= $fila['MED_NOM'] ?>)</th>
                                        </tr>
                                        <tr class="text-center table-secondary">
                                            <th>NO</th>
                                            <th>PACIENTE</th>
                                            <th>DPI</th>
                                            <th>TELÉFONO</th>
                                            <th>HORA DE LA CITA</th>
                                            <th>REFERIDO (SI/NO)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            <?php endif; ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $fila['PAC_NOM'] ?></td>
                                <td><?= $fila['PAC_DPI'] ?></td>
                                <td><?= $fila['PAC_TEL'] ?></td>
                                <td><?= $fila['CITA_HORA'] ?></td>
                                <td><?= $fila['CITA_REFERENCIA'] ?></td>
                            </tr>
                            <?php $clinicaActual = $fila['CLI_NOM']; $medicoActual = $fila['MED_NOM']; ?>
                        <?php endforeach ?>
                        </tbody>
                        </table>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><center>SIN CITAS</center></td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<center>
    <div class="row">
        <div class="col-lg-4">
            <a href="/Final_miron/vistas/citas/index.php" class="btn btn-info">REGRESAR AL FORMULARIO</a>
        </div>
    </div>
</center>
<?php include_once '../../includes/footer.php'?>
