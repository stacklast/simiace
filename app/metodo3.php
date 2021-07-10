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
<style type="text/css" media="screen">
    
.cf:after { visibility: hidden; display: block; font-size: 0; content: " "; clear: both; height: 0; }
* html .cf { zoom: 1; }
*:first-child+html .cf { zoom: 1; }

html { margin: 0; padding: 0; }
body { font-size: 100%; margin: 0; padding: 1.75em; font-family: 'Helvetica Neue', Arial, sans-serif; }

h1 { font-size: 1.75em; margin: 0 0 0.6em 0; }

a { color: #2996cc; }
a:hover { text-decoration: none; }

p { line-height: 1.5em; }
.small { color: #666; font-size: 0.875em; }
.large { font-size: 1.25em; }

/**
 * Nestable
 */

.dd { position: relative; display: block; margin: 0; padding: 0; max-width: 600px; list-style: none; font-size: 13px; line-height: 20px; }

.dd-list { display: block; position: relative; margin: 0; padding: 0; list-style: none; }
.dd-list .dd-list { padding-left: 30px; }
.dd-collapsed .dd-list { display: none; }

.dd-item,
.dd-empty,
.dd-placeholder { display: block; position: relative; margin: 0; padding: 0; min-height: 20px; font-size: 13px; line-height: 20px; }

.dd-handle { display: block; height: 30px; margin: 5px 0; padding: 5px 10px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd-handle:hover { color: #2ea8e5; background: #fff; }

.dd-item > button { display: block; position: relative; cursor: pointer; float: left; width: 25px; height: 20px; margin: 5px 0; padding: 0; text-indent: 100%; white-space: nowrap; overflow: hidden; border: 0; background: transparent; font-size: 12px; line-height: 1; text-align: center; font-weight: bold; }
.dd-item > button:before { content: '+'; display: block; position: absolute; width: 100%; text-align: center; text-indent: 0; }
.dd-item > button[data-action="collapse"]:before { content: '-'; }

.dd-placeholder,
.dd-empty { margin: 5px 0; padding: 0; min-height: 30px; background: #f2fbff; border: 1px dashed #b6bcbf; box-sizing: border-box; -moz-box-sizing: border-box; }
.dd-empty { border: 1px dashed #bbb; min-height: 100px; background-color: #e5e5e5;
    background-image: -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                      -webkit-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:    -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                         -moz-linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-image:         linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff),
                              linear-gradient(45deg, #fff 25%, transparent 25%, transparent 75%, #fff 75%, #fff);
    background-size: 60px 60px;
    background-position: 0 0, 30px 30px;
}

.dd-dragel { position: absolute; pointer-events: none; z-index: 9999; }
.dd-dragel > .dd-item .dd-handle { margin-top: 0; }
.dd-dragel .dd-handle {
    -webkit-box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
            box-shadow: 2px 4px 6px 0 rgba(0,0,0,.1);
}

/**
 * Nestable Extras
 */

.nestable-lists { display: block; clear: both; padding: 30px 0; width: 100%; border: 0; border-top: 2px solid #ddd; border-bottom: 2px solid #ddd; }

#nestable-menu { padding: 0; margin: 20px 0; }

#nestable-output,
#nestable2-output { width: 100%; height: 7em; font-size: 0.75em; line-height: 1.333333em; font-family: Consolas, monospace; padding: 5px; box-sizing: border-box; -moz-box-sizing: border-box; }

#nestable2 .dd-handle {
    color: #fff;
    border: 1px solid #999;
    background: #bbb;
    background: -webkit-linear-gradient(top, #bbb 0%, #999 100%);
    background:    -moz-linear-gradient(top, #bbb 0%, #999 100%);
    background:         linear-gradient(top, #bbb 0%, #999 100%);
}
#nestable2 .dd-handle:hover { background: #bbb; }
#nestable2 .dd-item > button:before { color: #fff; }

@media only screen and (min-width: 700px) {

    .dd { float: left; width: 48%; }
    .dd + .dd { margin-left: 2%; }

}

.dd-hover > .dd-handle { background: #2ea8e5 !important; }

/**
 * Nestable Draggable Handles
 */

.dd3-content { display: block; height: 30px; margin: 5px 0; padding: 5px 10px 5px 40px; color: #333; text-decoration: none; font-weight: bold; border: 1px solid #ccc;
    background: #fafafa;
    background: -webkit-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:    -moz-linear-gradient(top, #fafafa 0%, #eee 100%);
    background:         linear-gradient(top, #fafafa 0%, #eee 100%);
    -webkit-border-radius: 3px;
            border-radius: 3px;
    box-sizing: border-box; -moz-box-sizing: border-box;
}
.dd3-content:hover { color: #2ea8e5; background: #fff; }

.dd-dragel > .dd3-item > .dd3-content { margin: 0; }

.dd3-item > button { margin-left: 30px; }

.dd3-handle { position: absolute; margin: 0; left: 0; top: 0; cursor: pointer; width: 30px; text-indent: 100%; white-space: nowrap; overflow: hidden;
    border: 1px solid #aaa;
    background: #ddd;
    background: -webkit-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:    -moz-linear-gradient(top, #ddd 0%, #bbb 100%);
    background:         linear-gradient(top, #ddd 0%, #bbb 100%);
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
.dd3-handle:before { content: '≡'; display: block; position: absolute; left: 0; top: 3px; width: 100%; text-align: center; text-indent: 0; color: #fff; font-size: 20px; font-weight: normal; }
.dd3-handle:hover { background: #ddd; }

#load { height: 100%; width: 100%; }
        #load {
            position    : fixed;
            z-index     : 99; /* or higher if necessary */
            top         : 0;
            left        : 0;
            overflow    : hidden;
            text-indent : 100%;
            font-size   : 0;
            opacity     : 0.6;
            background  : #E0E0E0  url('loading.gif') center no-repeat;
        }

        .del-button{
            cursor:pointer;
            text-decoration:none;
        }

        .edit-button{
            cursor:pointer;
            text-decoration:none;
        }

        .span-right{
            float:right;
        }
</style>

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
                                          <label>Editar Título de la Investigación:</label>
                                          <textarea type="text" name="titulo" id="titulo" placeholder="Título" class="box form-control" aria-describedby="titulo" rows="4"><?php echo $row['titulo']; ?>
                                          </textarea>
                                          <small id="titulo" class="form-text text-muted">
                                            Relacionado al título de la investigación del problema ACIDENTE/ENFERMEDAD
                                          </small>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                          <label>EditarDescripción:</label>
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
                                        <h2>Ingrese la lluvia de Ideas</h2>
                                        <menu id="nestable-menu">
                                            <button type="button" data-action="expand-all">Expandir</button>
                                            <button type="button" data-action="collapse-all">Mostrar Todo</button>
                                        </menu>
                                        <table>
                                            <tr>
                                                <td>Label</td>
                                                <td>:</td>
                                                <td><input type="text" id="label" placeholder="Fill label" required></td>
                                            </tr>
                                            <tr>
                                                <td>Link</td>
                                                <td>:</td>
                                                <td><input type="text" id="link" placeholder="Fill link" required></td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><button id="submit">Submit</button> <button id="reset">Reset</button></td>
                                            </tr>
                                        </table>
                                        <input type="hidden" id="id">
                                        <?php
                                        
                                        require_once 'list/config.php';

                                            $query = $db->query("select * from tbl_menu order by sort ");
                                             
                                            $ref   = [];
                                            $items = [];

                                            while($data = $query->fetch(PDO::FETCH_OBJ)) {

                                                $thisRef = &$ref[$data->id];

                                                $thisRef['parent'] = $data->parent;
                                                $thisRef['label'] = $data->label;
                                                $thisRef['link'] = $data->link;
                                                $thisRef['id'] = $data->id;

                                               if($data->parent == 0) {
                                                    $items[$data->id] = &$thisRef;
                                               } else {
                                                    $ref[$data->parent]['child'][$data->id] = &$thisRef;
                                               }

                                            }
                                             
                                             
                                            function get_menu($items,$class = 'dd-list') {

                                                $html = "<ol class=\"".$class."\" id=\"menu-id\">";

                                                foreach($items as $key=>$value) {
                                                    $html.= '<li class="dd-item dd3-item" data-id="'.$value['id'].'" >
                                                                <div class="dd-handle dd3-handle">Drag</div>
                                                                <div class="dd3-content"><span id="label_show'.$value['id'].'">'.$value['label'].'</span> 
                                                                    <span class="span-right">/<span id="link_show'.$value['id'].'">'.$value['link'].'</span> &nbsp;&nbsp; 
                                                                        <a class="edit-button" id="'.$value['id'].'" label="'.$value['label'].'" link="'.$value['link'].'" ><i class="fa fa-pencil"></i></a>
                                                                        <a class="del-button" id="'.$value['id'].'"><i class="fa fa-trash"></i></a></span> 
                                                                </div>';
                                                    if(array_key_exists('child',$value)) {
                                                        $html .= get_menu($value['child'],'child');
                                                    }
                                                        $html .= "</li>";
                                                }
                                                $html .= "</ol>";

                                                return $html;

                                            }
                                             
                                            print get_menu($items);

                                            ?>


                                                    </div>



                                                </div>

<p></p>
    <input type="hidden" id="nestable-output">
    <button id="save">Save</button>
    












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