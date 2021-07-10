<?php include('header.php'); 

function goback()
{
    header("Location: http://localhost/SEK/app/investigacion.php");
    exit;
}
 

if(!isset($_REQUEST['id'])){
    goback();
}
$id_investigacion = base64_decode($_REQUEST['id']);
include('ajax/conexion.php'); 
$con = new Conexion();
$sql2 = "SELECT * FROM investigacion WHERE id = '$id_investigacion' LIMIT 1";
        $resultado = $con->consultaRetorno($sql2);
        $row = mysqli_fetch_assoc($resultado);


$sql4 = "SELECT * FROM metodos WHERE id = ".$row['id_metodos']." LIMIT 1";
        $resultado4 = $con->consultaRetorno($sql4);
        $metod = mysqli_fetch_assoc($resultado4);

?>
<input type="hidden" id="metodohead" name="metodohead" value="<strong>SE ENCUENTRA REVISANDO: </strong> Registro # <?php  echo $id_investigacion; ?> <?php echo $metod['descripcion']; ?> <strong>(<?php echo $metod['siglas']; ?>)</strong>">

<input type="hidden" id="id_investigacion" class="id_investigacion" name="id_investigacion" value="<?php echo $id_investigacion; ?>">
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">

            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">

                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title font-weight-bold">Puedes Editar la Información Ingresada</h3>
                                <input type="hidden" name="metodo" value="MSCRA">
                                <hr>
                                <form action="#" id="datos-general">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="font-weight-bold">Editar Título de la Investigación:</label>
                                          <textarea type="text" name="titulo" id="titulo" placeholder="Título" class="box form-control" aria-describedby="titulo" rows="4"><?php echo $row['titulo']; ?>
                                          </textarea>
                                          <small id="titulo" class="form-text text-muted">
                                            Relacionado al título de la investigación del problema ACIDENTE/ENFERMEDAD
                                          </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label class="font-weight-bold">Editar Descripción:</label>
                                          <textarea class="form-control" id="exampleFormControlTextarea1" aria-describedby="Descripcion" rows="40"><?php echo $row['descripcion']; ?></textarea>
                                          <small id="titulo" class="form-text text-muted">
                                            Reseña o Descripción relacionado al título. 
                                          </small>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                      <button id="btnContinuar" type="button" class="btn btn-info"> <i class="fa fa-check"></i> Guardar</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title font-weight-bold">Síntoma</h3>
                                        <label class="font-weight-bold">Qué:</label>
                                        <textarea name="que" class="form-control" id="que" aria-describedby="Descripcion" rows="3"></textarea>
                                        <label class="font-weight-bold">Quién:</label>
                                        <textarea class="form-control" id="quien" aria-describedby="Descripcion" rows="3"></textarea>
                                        <label class="font-weight-bold">Dónde:</label>
                                        <textarea class="form-control" id="donde" aria-describedby="Descripcion" rows="3"></textarea>
                                        <label class="font-weight-bold">Cuándo:</label>
                                        <textarea class="form-control" id="cuando" aria-describedby="Descripcion" rows="3"></textarea>
                                        <label class="font-weight-bold">Cómo:</label>
                                        <textarea class="form-control" id="como" aria-describedby="Descripcion" rows="3"></textarea>
                                        <label class="font-weight-bold">Por qué:</label>
                                        <textarea class="form-control" id="porque" aria-describedby="Descripcion" rows="3"></textarea>
                                    </div>
                                    <style type="text/css" media="screen">
                                        textarea {width:100%;border-radius: 5px;}
                                    </style>
                                    <div class="col-md-12">
                                        <h3 class="card-title font-weight-bold">Causa</h3>
                                        <div class="row">
                                          <div class="col-md-4"><textarea name="accidente" id="accidente"><?php echo $row['titulo']; ?></textarea></div>
                                           <div class="col-md-3">*<strong>Accidente</strong></div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-1 text-right"><i class="mdi  mdi-rotate-225 mdi-36px mdi-undo"></i></div>
                                             <div class="col-md-4"><label>Causa:</label><textarea name="causa" id="causa"></textarea></div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-1"></div>
                                             <div class="col-md-1 text-right"><i class="mdi  mdi-rotate-225 mdi-36px mdi-undo"></i></div>
                                             <div class="col-md-4"><label>Causa:</label><textarea name="causa1" id="causa1"></textarea></div>
                                        </div>
                                        <div class="row">
                                             <div class="col-md-2"></div>
                                             <div class="col-md-1 text-right"><i class="mdi  mdi-rotate-225 mdi-36px mdi-undo"></i></div>
                                             <div class="col-md-4"><label>Causa:</label><textarea name="causa2" id="causa2"></textarea></div>
                                        </div>
                                         <div class="row">
                                             <div class="col-md-1"></div>
                                             <div class="col-md-2"></div>
                                             <div class="col-md-1 text-right"><i class="mdi  mdi-rotate-225 mdi-36px mdi-undo"></i></div>
                                             <div class="col-md-4"><label>Causa:</label><textarea name="causa3" id="causa3"></textarea></div>
                                        </div>
                                         <div class="row">
                                             <div class="col-md-2"></div>
                                             <div class="col-md-2"></div>
                                             <div class="col-md-1 text-right"><i class="mdi  mdi-rotate-225 mdi-36px mdi-undo"></i></div>
                                             <div class="col-md-4"><textarea name="causareal" id="causareal"></textarea></div>
                                             <div class="col-md-3">*<strong>Causa Real</strong></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="rem">
                                        <h3 class="card-title font-weight-bold">Remedio</h3>
                                        <style type="text/css" media="screen">
                                            .mdi-plus-box-outline:hover{ color: blue; cursor: pointer; }
                                        </style>
                                        <textarea id="remedio" name="remedio[]" rows="2"></textarea>
                                        <i id="plus" class="mdi  mdi-36px mdi-plus-box-outline"></i>
                                        <i id="minus" class="mdi  mdi-36px mdi-minus-box-outline"></i>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="card-title font-weight-bold">Acción</h3>
                                        <textarea name="act" id="act" disabled="disabled" readonly="readonly" rows="5">Establecimiento de un plan de acción para adoptar medidas preventivas/correctivas establecidas en el paso anterior. Señalando responsables, plazo de ejecución y presupuesto.  </textarea>
                                    </div>
                                    <div class="form-actions">
                                        <button id="btnGuardarMSCRA" type="button" class="btn btn-info"> <i class="fa fa-check"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <?php include('copy.php'); ?>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
<?php include('footer.php'); ?>