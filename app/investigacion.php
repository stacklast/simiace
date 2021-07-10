<?php include('header.php'); ?>
<style type="text/css" media="screen">
    .hovereffect {
      width: 100%;
      height: 100%;
      float: left;
      overflow: hidden;
      position: relative;
      text-align: center;
      cursor: default;
    }

    .hovereffect .overlay {
      width: 100%;
      height: 100%;
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 0;
      -webkit-transition: all 0.4s ease-in-out;
      transition: all 0.4s ease-in-out;
    }

    .hovereffect:hover .overlay {
      background-color: rgba(170,170,170,0.4);
    }

    .hovereffect h2, .hovereffect img {
      -webkit-transition: all 0.4s ease-in-out;
      transition: all 0.4s ease-in-out;
    }

    .hovereffect img {
      display: block;
      position: relative;
      -webkit-transform: scale(1.1);
      -ms-transform: scale(1.1);
      transform: scale(1.1);
    }

    .hovereffect:hover img {
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      transform: scale(1);
    }

    .hovereffect h2 {
      text-transform: uppercase;
      color: #fff;
      text-align: center;
      position: relative;
      font-size: 17px;
      padding: 10px;
      background: rgba(0, 0, 0, 0.6);
    }

    .hovereffect a.info {
      display: inline-block;
      text-decoration: none;
      padding: 7px 14px;
      text-transform: uppercase;
      color: #fff;
      border: 1px solid #fff;
      margin: 50px 0 0 0;
      background-color: transparent;
      opacity: 0;
      filter: alpha(opacity=0);
      -webkit-transform: scale(1.5);
      -ms-transform: scale(1.5);
      transform: scale(1.5);
      -webkit-transition: all 0.4s ease-in-out;
      transition: all 0.4s ease-in-out;
      font-weight: normal;
      height: 85%;
      width: 85%;
      position: absolute;
      top: -20%;
      left: 8%;
      padding: 70px;
    }

    .hovereffect:hover a.info {
      opacity: 1;
      filter: alpha(opacity=100);
      -webkit-transform: scale(1);
      -ms-transform: scale(1);
      transform: scale(1);
      background-color: rgba(0,0,0,0.4);
    }
</style>

<div class="modal" id="myModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Crear Método</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="#" id="datos-general">
        <input type="hidden" id="id" class="id" name="">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                  <label>Título de la Investigación:</label>
                  <input type="text" name="titulo" id="titulo" value="" placeholder="Título" class="box form-control" aria-describedby="titulo">
                  <small id="titulo" class="form-text text-muted">
                    Relacionado al título de la investigación ACIDENTE/ENFERMEDAD
                  </small>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                  <label>Descripción:</label>
                  <textarea class="form-control" id="descripcion" aria-describedby="Descripcion" rows="15" placeholder="Ingrese todos los hechos ocurridos"></textarea>
                  <small id="titulo" class="form-text text-muted">
                    Reseña o Descripción relacionado al título. 
                  </small>
                </div>
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="btnMetodo">Crear Registros</button>
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
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h3 class="text-themecolor">Nueva Investigación</h3>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title font-weight-bold">Seleccione el MÉTODO A USAR</h3>
                                <br>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="hovereffect" id="maac">
                                            <img class="img-fluid" src="../assets/images/metodos/cadena-causal.jpg" alt="">
                                            <div class="overlay">
                                               <h2>Método del análisis de la cadena causal (MACC)</h2>
                                               <span class="info" >USAR</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hovereffect" id="mscra">
                                            <img class="img-fluid" src="../assets/images/metodos/plan-pasos.jpg" alt="">
                                            <div class="overlay">
                                               <h2>Método de Síntoma, Causa, Remedio, Acción (MSCRA)</h2>
                                               <span class="info" >USAR</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hovereffect" id="mce">
                                            <img class="img-fluid" src="../assets/images/metodos/ishkawa.jpg" alt="">
                                            <div class="overlay">
                                               <h2>Método del diagrama Ishikawa (CAUSA-EFECTO)(MCE)</h2>
                                               <span class="info" >USAR</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="hovereffect" id="mac">
                                            <img class="img-fluid" src="../assets/images/metodos/arbol-causas.jpg" alt="">
                                            <div class="overlay">
                                               <h2>Método del árbol de causas (MAC)</h2>
                                               <span class="info">USAR</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--/*row*/-->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title font-weight-bold">Investigaciones Registradas</h3>
                                
                                <div class="table-responsive" id="resultados-busqueda">

                            <table id="id_table"
                                   data-toggle="table"
                                   data-url="http://localhost/SEK/app/ajax/admin-ajax.php?accion=listar_investigacion"
                                   data-side-pagination="server"
                                   data-pagination="true"
                                   data-page-size="10"
                                   data-height="550"
                                   data-toolbar="#toolbar"
                                   data-show-export="true"
                                   data-show-refresh ="true"
                                   data-search="true"
                                   data-classes="table-bordered table-striped auto table-hover"
                                   data-locale="es-ES">
                                <thead>
                                    <tr>
                                        
                                        <th data-field="id" class="text-center" title="ID">#</th>
                                        <th data-field="fecha" class="text-center" title="Contacto">Fecha Creación</th>
                                        <th data-field="titulo" class="text-justify" title="Dirrección">Titulo</th>
                                        <!--<th data-field="descripcion" class="text-center" title="Telefono">Descripcion</th>-->
                                        <th data-field="estado" title="Usuario" class="text-center">Estado</th>
                                        <th data-field="metodo" title="Clave" class="text-center">Método</th>
                                        <th data-field="usuario" title="Tipo" class="text-center">Usuario</th>
                                        <th data-field="operate" class="text-center" data-formatter="accion_boton">
                                            <i class="fa fa-cog"></i>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </div> 
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                  function accion_boton(value, row, index){
                                var i = index + 1;
                                var metodo = 1;
                                if(row.metodo == "MAAC"){
                                  metodo = 1;
                                }
                                if(row.metodo == "MSCRA"){
                                  metodo = 2;
                                }
                                if(row.metodo == "MCE"){
                                  metodo = 3;
                                }
                                if(row.metodo == "MAC"){
                                  metodo = 4;
                                }
                                var btn = '<button  id="ChangeUser'+i+'" onclick="change_status('+row.id+','+metodo+')"  class="btn btn-info btn-sm" type="button" title="Editar Registro"><span class="fa fa-pencil" aria-hidden="true"></span></button> ';

                                if(row.estado != 'ANULADO'){
                                    opc = 'fa fa-remove';
                                    title = 'ANULAR REGISTRO';
                                    color = 'warning';
                                }else{
                                    opc = 'fa fa-ok';
                                    title = 'ACTIVAR REGISTRO';
                                    color = 'success';
                                }
                                btn += ' <button class="btn btn-'+color+' btn-sm" type="button" onclick="change_status('+row.id+',"'+metodo+'"")" data-toggle="tooltip" data-placement="top" title="'+title+'"><span class="'+opc+'" aria-hidden="true"></span></button>';
                                btn += '<input type="hidden" id="investigacionNew'+i+'" name="usuario'+i+'" value="'+row.usuario+'"  />';  
                                return [btn].join('');
                            }

                            function change_status(id, metodo){
                              window.location = '/SEK/app/metodo'+metodo+'.php?id='+encode64(id);
                            }
                </script>
                
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