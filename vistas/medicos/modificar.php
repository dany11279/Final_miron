<?php
require '../../modelos/Medico.php';
    try {
        $medico = new Medico($_GET);

        $medicos = $medico->buscar();
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar pacientes</h1>
        <div class="row justify-content-center">
            <form action="/Final_miron/controladores/medicos/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="medico_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_nom">nombre del medico</label>
                        <input type="text" name="med_nom" id="med_nom" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_esp">especialidades</label>
                        <input type="text" name="med_esp" id="med_esp" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_cli">clinica</label>
                        <input type="text" name="med_cli" id="med_cli" class="form-control" required>
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