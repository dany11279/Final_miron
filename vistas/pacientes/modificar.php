<?php
require '../../modelos/Paciente.php';
try {
    if(isset($_GET['pac_id']) && $_GET['pac_id'] != ''){

        $paca_id = $_GET['pac_id'];
        $paciente = new Paciente(["pac_id" => $paca_id]);
        $pacientes = $paciente->buscar(); }
       
    } catch (PDOException $e) {
        $error = $e->getMessage();
    } catch (Exception $e2){
        $error = $e2->getMessage();
    }
?>
<?php include_once '../../includes/header.php'?>
    <div class="container">
        <h1 class="text-center">MODIFICACION DE PACIENTES</h1>
        <div class="row justify-content-center">
            <form action="/Final_miron/controladores/pacientes/modificar.php" method="POST" class="col-lg-8 border bg-light p-3">
            <input type="hidden" name="pac_id" value="<?= $pacientes[0]['PAC_ID'] ?>">

                <div class="row mb-3">
                    <div class="col">
                        <label for="pac_nom">NOMBRE DEL PACIENTE</label>
                        <input type="text" name="pac_nom" id="pac_nom" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="pac_dpi">NUMERO DE DPI</label>
                        <input type="text" name="pac_dpi" id="pac_dpi" class="form-control" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col">
                        <label for="pac_tel">NUMERO DE TELEFONO</label>
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