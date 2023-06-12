<?php
require '../../modelos/Paciente.php';
    try {
        $paciente = new Paciente($_GET);
        $pacientes = $paciente->buscar();
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
            <form action="/Final_miron/controladores/pacientes/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <input type="hidden" name="med_id">
                <div class="row mb-3">
                    <div class="col">
                        <label for="pac_nom">Nombre del paciente</label>
                        <input type="text" name="pac_nom" id="pac_nom" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="pac_dpi">No. de DPI</label>
                        <input type="text" name="pac_dpi" id="pac_dpi" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="pac_tel">No. de telefono</label>
                        <input type="text" name="pac_tel" id="pac_tel" class="form-control" required>
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