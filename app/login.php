<?php
include('app/config.php');
if (isset($_SESSION['usuario']) && isset($_SESSION['clave']))
{
    header('Location: index.php'); 
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $site; ?>assets/images/favicon.png">
    <title>Sistema de Módulos</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $site; ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- page css -->
    <link href="css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    
    <!-- You can change the theme colors from here -->
    <link href="css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">PROYECTO SEK</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?php echo $site; ?>assets/images/background/login-register.jpg);">
            <img src="assets/images/logo-sek.jpg" alt="" style="max-width: 250px;">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform">
                        <h3 class="box-title m-b-20"><img src="assets/images/logo-text.png" alt="homepage" class="dark-logo" style="max-height:70px; " /> </h3>
                        <div class="message" id="message">

                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input id="usuario" class="form-control" type="text" required="" placeholder="Usuario"> </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input id="clave" class="form-control" type="password" required="" placeholder="Clave"> </div>
                        </div>
                        <br>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn btn-block btn-lg btn-info btn-rounded" id="btnLogin" type="button">Ingresar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </section>
    
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?php echo $site; ?>assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?php echo $site; ?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo $site; ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo $site; ?>js/login.js"></script>
    <!--Custom JavaScript -->
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
    </script>
    
</body>

</html>