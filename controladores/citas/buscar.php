<?php
require_once '../../modelos/Cita.php';
require_once '../../modelos/Paciente.php';
require_once '../../modelos/Medico.php';

try {
    $cita = new Cita();
    $citas = $cita->buscar();

    $paciente = new Paciente();
    $pacientes = $paciente->buscar();

    $medico = new Medico();
    $medicos = $medico->buscar();

} catch (PDOException $e) {
    $error = $e->getMessage();
} catch (Exception $e2) {
    $error = $e2->getMessage();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Resultados de búsqueda</title>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>NO.</th>
                            <th>PACIENTE</th>
                            <th>DPI</th>
                            <th>TELÉFONO</th>
                            <th>MÉDICO</th>
                            <th>FECHA CITA</th>
                            <th>HORA</th>
                            <th>REFERIDO</th>
                            <th>MODIFICAR</th>
                            <th>ELIMINAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (count($citas) > 0) : ?>
                            <?php foreach ($citas as $key => $cita) : ?>
                                <?php
                                    $paciente = $pacientes[$key];
                                    $medico = $medicos[$key];
                                ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $paciente['PAC_NOM'] ?></td>
                                    <td><?= $paciente['PAC_DPI'] ?></td>
                                    <td><?= $paciente['PAC_TEL'] ?></td>
                                    <td><?= $medico['MED_NOM'] ?></td>
                                    <td><?= $cita['CITA_FECHA'] ?></td>
                                    <td><?= $cita['CITA_HORA'] ?></td>
                                    <td><?= $cita['CITA_REFERENCIA'] ?></td>
                                    <td><a class="btn btn-warning w-100" href="/Final_miron/vistas/citas/detalle.php?cita_fecha=<?= $cita['CITA_FECHA'] ?>">VER DETALLE</a></td>
                                    <td><a class="btn btn-danger w-100" href="/Final_miron/controladores/citas/eliminar.php?cita_id=<?= $cita['CITA_ID'] ?>">ELIMINAR</a></td>
                                </tr>
                            <?php endforeach ?>
                        <?php else : ?>
                            <tr>
                                <td colspan="10">NO EXISTEN REGISTROS</td>
                            </tr>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <a href="/Final_miron/vistas/citas/detalle.php" class="btn btn-info w-100">VER LAS CITAS DE HOY</a><br><br>
                <a href="/Final_miron/vistas/citas/buscar.php" class="btn btn-info w-100">REGRESAR A LA BUSQUEDA</a>
            </div>
        </div>
    </div>
</body>
</html>
