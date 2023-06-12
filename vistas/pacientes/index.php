<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">
        <h1 class="text-center">Formulario de ingreso de pacientes</h1>
        <div class="row justify-content-center">
            <form action="/Final_miron/controladores/pacientes/guardar.php" method="POST" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                    <label for="pac_nom">Nombre del paciente</label>
                        <input type="text" name="pac_nom" id="pac_nom" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="pac_dpi">No. de DPI</label>
                        <input type="text" name="pac_dpi" id="pac_dpi" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="pac_tel">No. de telefono</label>
                        <input type="text" name="pac_tel" id="pac_tel" class="form-control">
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