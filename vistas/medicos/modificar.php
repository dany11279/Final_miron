<?php
require '../../modelos/Medico.php';

try {
    if(isset($_GET['paciente_id']) && $_GET['paciente_id'] != ''){

        $pac_id = $_GET['pac_id'];
        $paciente = new Paciente(["pac_id" => $paciente_id]);
        $pacientes = $paciente->buscar();}
    }

?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">Modificar medico</h1>
        <div class="row justify-content-center">
            <form action="/Final_miron/controladores/medicos/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="pac_id" value="<?= $pacientes[0]['PAC_ID'] ?>">
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