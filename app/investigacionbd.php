<?php include('header.php'); ?>

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
                                <h1>Registros Ingresados</h1>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                              <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">Titulo</th>
                                                <th scope="col">Descripción</th>
                                                <th scope="col">Método</th>
                                                <th scope="col">Estado</th>
                                                <th scope="col">Acciones</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr class="table-active">
                                                <th scope="row">1</th>
                                                <td>Torcedura de tobillo en instalaciones externas</td>
                                                <td>Constructo Cia Ltda./ Un trabajador se encontraba conduciendo una retroexcavadora aproximadamente a las 19:00. 
                                                </td>
                                                <td>MACC</td>
                                                <td>Abierto</td>
                                                <td><button class="btn-info"> Continuar</button> <button class="btn-danger">Anular</button><button class="btn-info"> Agregar Plan De Acciones</button></td>
                                              </tr>
                                            </tbody>
                                        </table>
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