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

$sql = "SELECT * FROM maac WHERE id = '$id_investigacion' LIMIT 1";
        $resultado2 = $con->consultaRetorno($sql);
        $maac = mysqli_fetch_assoc($resultado2);

$sql3 = "SELECT * FROM macc_perdidas WHERE id_investigacion = '$id_investigacion' LIMIT 1";
        $resultado3 = $con->consultaRetorno($sql3);
        $macc_perdidas = mysqli_fetch_assoc($resultado3);
        $num = count($macc_perdidas);

$sql4 = "SELECT * FROM metodos WHERE id = ".$row['id_metodos']." LIMIT 1";
        $resultado4 = $con->consultaRetorno($sql4);
        $metod = mysqli_fetch_assoc($resultado4);
?>
<input type="hidden" id="metodohead" name="metodohead" value="<strong>SE ENCUENTRA REVISANDO: </strong> Registro # <?php  echo $id_investigacion; ?> <?php echo $metod['descripcion']; ?> <strong>(<?php echo $metod['siglas']; ?>)</strong>">

<input type="hidden" id="id_investigacion" class="id_investigacion" name="id_investigacion" value="<?php echo $id_investigacion; ?>">
<div class="modal" id="myModalperdida" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Ingreso de Pérdidas </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" id="datos-general-metodo1">
        <input type="hidden" id="perdidatipo" class="perdidatipo" name="perdidatipo">
        <div class="row">
            <div class="col-md-12">
                <label>Descripción de pérdida:</label>
                <textarea class="form-control" id="descripcionperdida" aria-describedby="Descripcion" rows="3"></textarea>
                <h3 class="card-title font-weight-bold">Incidente Accidente</h3>
                <label>Contactos:</label>
                <textarea class="form-control" id="contactos" aria-describedby="Descripcion" rows="3"></textarea>
                <h3 class="card-title font-weight-bold">Causas Inmediatas</h3>
                <div class="row">
                  <div class="col-md-6">
                    <label>Actos subestandares:</label>
                    <textarea class="form-control" id="acto" aria-describedby="Descripcion" rows="3"></textarea>
                  </div>
                  <div class="col-md-6">
                    <label>Condiciones subestandares:</label>
                    <textarea class="form-control" id="condicion" aria-describedby="Descripcion" rows="3"></textarea>
                  </div>
                </div>
            </div>
            
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btnGuardarPerdida">Guardar</button>
        <button type="button" class="btn btn-warning"  data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>


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
                <!--/*row*/-->
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title font-weight-bold">Puedes Editar la Información Ingresada</h3>
                                <input type="hidden" name="metodo" value="MACC">
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
                    
                    <!--METODO 1-->
                    <div class="col-6">
                        <div class="card">
                            <div class="card-body">
                                <input type="hidden" name="metodo" value="MACC">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title font-weight-bold">Pérdidas</h3>
                                        <ul class="nav nav-tabs font-weight-bold">
                                          <li class="nav-item">
                                            <a class="nav-link active" id="personas-tab" data-toggle="tab" href="#personas" role="tab" aria-controls="personas" aria-selected="true">Personas</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" id="propiedad-tab" data-toggle="tab" href="#propiedad" role="tab" aria-controls="propiedad" aria-selected="false">Propiedad</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" id="procesos-tab" data-toggle="tab" href="#procesos" role="tab" aria-controls="procesos" aria-selected="false">Procesos</a>
                                          </li>
                                          <li class="nav-item">
                                            <a class="nav-link" id="ambiente-tab" data-toggle="tab" href="#ambiente" role="tab" aria-controls="ambiente" aria-selected="false">Ambiente</a>
                                          </li>
                                        </ul>
                                        <br>

                                        <div class="tab-content">
                                          <div class="tab-pane active" id="personas" role="tabpanel" aria-labelledby="personas-tab">
                                            <button type="button" class="btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact" id="perdidaPersona">Nuevo Registro</button>
                                            <table data-toggle="table"
                                                   data-url="http://localhost/SEK/app/ajax/admin-ajax.php?accion=listar_perdidas_personas&id=<?php echo $id_investigacion; ?>"
                                                   data-side-pagination="server"
                                                   data-pagination="true"
                                                   data-page-size="8"
                                                   data-height="400"
                                                   data-toolbar="#toolbar"
                                                   
                                                   data-show-refresh ="true"
                                                   data-search="true"
                                                   data-classes="table-bordered table-striped auto table-hover"
                                                   data-locale="es-ES">
                                                <thead>
                                                  <tr>
                                                    <th class="text-center text-info"><strong>Acción</strong></th>
                                                    <th class="text-center text-info"><strong>Pérdidas</strong></th>
                                                    <th class="text-center text-info"><strong>Incidente / Accidente</strong></th>
                                                    <th colspan="2" class="text-center text-info"><strong>Causas Inmediatas</strong></th>
                                                  </tr>
                                                  <tr>
                                                      <th data-field="operate" class="text-center" data-formatter="accion_boton">
                                                          <i class="fa fa-cog"></i>
                                                      </th>
                                                      <th data-field="descripcion">PERSONAS</th>
                                                      <th data-field="contactos">CONTACTOS</th>
                                                      <th data-field="actos">ACTOS SUBESTANDARES</th>
                                                      <th data-field="condiciones">CONDICIONES SUBESTANDARES</th>
                                                  </tr>
                                                </thead>
                                            </table>
                                          </div>

                                          <div class="tab-pane" id="propiedad" role="tabpanel" aria-labelledby="propiedad-tab">
                                            <button type="button" class="btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact" id="perdidaPropiedad">Nuevo Registro</button>
                                            <table data-toggle="table"
                                                   data-url="http://localhost/SEK/app/ajax/admin-ajax.php?accion=listar_perdidas_propiedad&id=<?php echo $id_investigacion; ?>"
                                                   data-side-pagination="server"
                                                   data-pagination="true"
                                                   data-page-size="8"
                                                   data-height="400"
                                                   data-toolbar="#toolbar"
                                                   
                                                   data-show-refresh ="true"
                                                   data-search="true"
                                                   data-classes="table-bordered table-striped auto table-hover"
                                                   data-locale="es-ES">
                                                <thead>
                                                <tr>
                                                  <th class="text-center text-info"><strong>Acción</strong></th>
                                                  <th class="text-center text-info"><strong>Pérdidas</strong></th>
                                                  <th class="text-center text-info"><strong>Incidente / Accidente</strong></th>
                                                  <th colspan="2" class="text-center text-info"><strong>Causas Inmediatas</strong></th>
                                                </tr>
                                                <tr>
                                                    <th data-field="operate" class="text-center" data-formatter="accion_boton">
                                                        <i class="fa fa-cog"></i>
                                                    </th>
                                                    <th data-field="descripcion">PROPIEDAD</th>
                                                    <th data-field="contactos">CONTACTOS</th>
                                                    <th data-field="actos">ACTOS SUBESTANDARES</th>
                                                    <th data-field="condiciones">CONDICIONES SUBESTANDARES</th>
                                                </tr>
                                                </thead>
                                            </table>
                                          </div>

                                          <div class="tab-pane" id="procesos" role="tabpanel" aria-labelledby="procesos-tab">
                                            <button type="button" class="btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact" id="perdidaProceso">Nuevo Registro</button>
                                            <table data-toggle="table"
                                                   data-url="http://localhost/SEK/app/ajax/admin-ajax.php?accion=listar_perdidas_proceso&id=<?php echo $id_investigacion; ?>"
                                                   data-side-pagination="server"
                                                   data-pagination="true"
                                                   data-page-size="8"
                                                   data-height="400"
                                                   data-toolbar="#toolbar"
                                                   
                                                   data-show-refresh ="true"
                                                   data-search="true"
                                                   data-classes="table-bordered table-striped auto table-hover"
                                                   data-locale="es-ES">
                                                <thead>
                                                <tr>
                                                  <th class="text-center text-info"><strong>Acción</strong></th>
                                                  <th class="text-center text-info"><strong>Pérdidas</strong></th>
                                                  <th class="text-center text-info"><strong>Incidente / Accidente</strong></th>
                                                  <th colspan="2" class="text-center text-info"><strong>Causas Inmediatas</strong></th>
                                                </tr>
                                                <tr>
                                                   <th data-field="operate" class="text-center" data-formatter="accion_boton">
                                                        <i class="fa fa-cog"></i>
                                                    </th>
                                                    <th data-field="descripcion">PROCESO</th>
                                                    <th data-field="contactos">CONTACTOS</th>
                                                    <th data-field="actos">ACTOS SUBESTANDARES</th>
                                                    <th data-field="condiciones">CONDICIONES SUBESTANDARES</th>
                                                </tr>
                                                </thead>
                                            </table>
                                          </div>

                                          <div class="tab-pane" id="ambiente" role="tabpanel" aria-labelledby="ambiente-tab">
                                            <button type="button" class="btn btn-info btn-rounded m-t-10" data-toggle="modal" data-target="#add-contact" id="perdidaAmbiente">Nuevo Registro</button>
                                            <table id="id_table"
                                                   data-toggle="table"
                                                   data-url="http://localhost/SEK/app/ajax/admin-ajax.php?accion=listar_perdidas_ambiente&id=<?php echo $id_investigacion; ?>"
                                                    data-side-pagination="server"
                                                   data-pagination="true"
                                                   data-page-size="8"
                                                   data-height="400"
                                                   data-toolbar="#toolbar"
                                                   
                                                   data-show-refresh ="true"
                                                   data-search="true"
                                                   data-classes="table-bordered table-striped auto table-hover"
                                                   data-locale="es-ES">
                                                <thead>
                                                <tr>
                                                  <th class="text-center text-info"><strong>Acción</strong></th>
                                                  <th class="text-center text-info"><strong>Pérdidas</strong></th>
                                                  <th class="text-center text-info"><strong>Incidente / Accidente</strong></th>
                                                  <th colspan="2" class="text-center text-info"><strong>Causas Inmediatas</strong></th>
                                                </tr>
                                                <tr>
                                                    <th data-field="operate" class="text-center" data-formatter="accion_boton">
                                                        <i class="fa fa-cog"></i>
                                                    </th>
                                                    <th data-field="descripcion">AMBIENTE</th>
                                                    <th data-field="contactos">CONTACTOS</th>
                                                    <th data-field="actos">ACTOS SUBESTANDARES</th>
                                                    <th data-field="condiciones">CONDICIONES SUBESTANDARES</th>
                                                </tr>
                                                </thead>
                                            </table>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                          <div class="card">
                            <div class="card-body">
                                  <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="card-title font-weight-bold">Causas Básicas</h3>
                                        <div class="row">
                                          <div class="col-md-6">
                                            <label class="font-weight-bold">Factores Personales:</label>
                                            <textarea class="form-control" id="factor_personal" aria-describedby="Descripcion" rows="3">
                                              <?php echo $maac['factor_personal']; ?>
                                            </textarea>
                                          </div>
                                          <div class="col-md-6">
                                            <label class="font-weight-bold">Factores del Trabajo:</label>
                                            <textarea class="form-control" id="factor_trabajo" aria-describedby="Descripcion" rows="3">
                                              <?php echo $maac['factor_trabajo']; ?>
                                            </textarea>
                                          </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <h3 class="card-title font-weight-bold">Falta de Control</h3>
                                        <div class="form-group">
                                          <label class="font-weight-bold">Descripción:</label>
                                          <textarea class="form-control" id="falta_control" aria-describedby="Descripcion" rows="3">
                                            <?php echo $maac['falta_control']; ?>
                                          </textarea>
                                          <small id="titulo" class="form-text text-muted">
                                            Reseña o Descripción relacionado al título. 
                                          </small>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                      <button id="btnGuardarMAAC" type="button" class="btn btn-info"> <i class="fa fa-check"></i> Guardar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                  function accion_boton(value, row, index){
                                var i = index + 1;
                                
                                var btn = '<button  id="ChangeUser'+i+'" onclick="change_status('+row.id+')"  class="btn btn-info btn-sm" type="button" title="Editar Registro"><span class="fa fa-pencil" aria-hidden="true"></span></button> ';
                                btn += '<input type="hidden" id="investigacionNew'+i+'" name="usuario'+i+'" value="'+row.usuario+'"  />';  
                                return [btn].join('');
                            }

                            function change_status(id){
                              console.log(id);
                              $('#myModalperdida').modal('show');
                            }
                </script>
                
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <h3 class="card-title font-weight-bold">Tabla de Resultado del Metodo MACC</h3>
                    <table class="table table-bordered table-responsibe" id="resultadomaac">
                      <thead>
                        <tr class="text-info">
                          <th><strong>MEDIDAS CORRECTORAS</strong></th>
                          <th><strong>CAUSAS BÁSICAS</strong></th>
                          <th><strong>CAUSAS INMEDIATAS</strong></th>
                          <th><strong>CONTACTO ACCIDENTE/INCIDENTE</strong></th>
                          <th><strong>PÉRDIDAS Y LESIONES</strong></th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php for($i = 0; $i < $num; $i++){ ?>
                        <tr>
                          <?php if($i == 0 ){ ?>
                            <td rowspan="<?php echo $num; ?>"><?php echo $maac['falta_control']; ?></td>
                            <td rowspan="<?php echo $num; ?>">FACTORES PERSONALES <br>
                              <?php echo $maac['factor_personal']; ?> <br><br>
                              FACTORES DE TRABAJO <br>
                              <?php echo $maac['factor_trabajo']; ?>
                          </td>
                          <?php } ?>
                          <td>
                            ACTOS INSEGUROS<br>
                            <?php echo $macc_perdidas['actos'] ?> <br><br>
                            CONDICIONES PELIGROSAS <br>
                            <?php echo $macc_perdidas['condiciones'] ?>
                          </td>
                          <td><?php echo $macc_perdidas['contactos'] ?></td>
                          <td><?php echo $macc_perdidas['descripcion'] ?></td>
                        </tr>
                      <?php } ?>
                      </tbody>
                    </table>
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