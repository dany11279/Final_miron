<?php
require_once '../../modelos/Especialidad.php';
require_once '../../modelos/Clinica.php';
    try {
        $especialidad = new Especialidad();
        $clinica = new Clinica();
        $especialidades = $especialidad->buscar();
        $clinicas = $clinica->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de ingreso de Medicos</h1>
        <div class="row justify-content-center">
            <form action="/Final_miron/controladores/medicos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                    <label for="med_nom">Nombre del medico</label>
                        <input type="text" name="med_nom" id="med_nom" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_esp">Especialidad</label>
                        <select name="med_esp" id="med_esp" class="form-control">
                            <option value="">SELECCIONE</option>
                            <?php foreach ($especialidades as $key => $especialidad) : ?>
                                <option value="<?= $especialidad['ESP_ID'] ?>"><?= $especialidad['ESP_NOM'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_cli">Clinica</label>
                        <select name="med_cli" id="med_cli" class="form-control">
                            <option value="">SELECCIONE...</option>
                            <?php foreach ($clinicas as $key => $clinica) : ?>
                                <option value="<?= $clinica['CLI_ID'] ?>"><?= $clinica['CLI_NOM'] ?></option>
                            <?php endforeach?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-primary w-100">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>