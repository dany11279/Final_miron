<?php
require '../../modelos/Medico.php';
require '../../modelos/Especialidad.php';
require '../../modelos/Clinica.php';


    try { if(isset($_GET['med_id']) && $_GET['med_id'] != ''){
    
        $med_id = $_GET['med_id'];
        $medico = new Medico(["med_id" => $med_id]);
        $especialidad = new Especialidad($_GET);
        $clinica = new cli($_GET);


        $medicos = $medico->buscar();
        $especialidades = $especialidad->buscar();
        $clinicas = $clinica->buscar();
    }
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Modificar pacientes</h1>
        <div class="row justify-content-center">
            <form action="/Final_miron/controladores/medicos/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="med_id" value="<?= $medicos[0]['MED_ID'] ?>">
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_nom">Nombre del medico</label>
                        <input type="text" name="med_nom" id="med_nom" value="<?= $medicos[0]['MED_NOM'] ?>" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_esp">Especialidad</label>
                        <select name="med_esp" id="med_esp" class="form-control">
                            <option value="">SELECCIONE...</option>
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
                        <button type="submit" class="btn btn-warning w-100">Modificar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
<?php include_once '../../includes/footer.php'?>