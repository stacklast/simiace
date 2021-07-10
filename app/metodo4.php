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
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <p>¿Quién? ¿Qué? ¿Cuándo? ¿Dónde? ¿Cómo? ¿Por que?</p>
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