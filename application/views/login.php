<!DOCTYPE html>
<html>
<head><meta charset="gb18030">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Calculadoras</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/eksternal/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<header class="masthead">
    <div class="container h-100">
        <div class="row align-items-center">
            <div class="col-12 text-center">
                <div class="formround">
                    <body class="hold-transition login-page">
                    <h1 class="font-weight-light">Bienvenido Administrador</h1>

                    <div class="login-logo">
                        <a href="<?php echo base_url(); ?>assets/index2.html"><b>Mi</b>Logo</a>
                    </div>

                    <!-- /.login-logo -->
                    <div class="login-box-body">
                        <p class="login-box-msg">
                            Inicia sesión para comenzar
                        </p>

                        <form action="<?php echo base_url('Auth/login'); ?>" method="post">
                            <div class="form-group has-feedback">
                                <input type="text" class="form-control" placeholder="Nombre de Usuario/Email " name="username">
                                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                            </div>
                            <div class="form-group has-feedback">
                                <input type="password" class="form-control " placeholder="Contraseña" name="password">
                                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                            <div class="row">

                                <div class=" col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                                </div>
                            </div>
                        </form>

                    </div>
                    <?php
                    echo show_err_msg($this->session->flashdata('error_msg'));
                    ?>
                </div>

                <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
                <!-- Bootstrap 3.3.6 -->
                <script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.min.js"></script>
                <!-- iCheck -->

                </body>

            </div>
        </div>
</header>



</html>
