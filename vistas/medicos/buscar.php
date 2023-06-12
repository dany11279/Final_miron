
<?php include_once '../../includes/header.php'?>
<?php include_once '../../includes/navbar.php'?>
    <div class="container">

        <h1 class="text-center">Buscar Medicos</h1>
        <div class="row justify-content-center">
            <form action="/Final_miron/controladores/medicos/buscar.php" method="GET" class="col-lg-8 border bg-light p-3">
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_nom">nombre del medico</label>
                        <input type="text" name="med_nom" id="med_nom" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="med_cli">clinica Asignada</label>
                        <input type="text" name="med_cli" id="med_cli" class="form-control">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <button type="submit" class="btn btn-info w-100">Buscar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include_once '../../includes/footer.php'?>