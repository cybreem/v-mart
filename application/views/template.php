<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>V-Mart Administration</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo config_item('assets'); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo config_item('assets'); ?>css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo config_item('assets'); ?>css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo config_item('assets'); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="<?php echo config_item('assets'); ?>css/jquery.gritter.css">

    <link rel="stylesheet" href="<?php echo config_item('assets'); ?>redactor/redactor.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">V-Mart Administration</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu alert-dropdown">
                        <li>
                            <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                        </li>
                        <li>
                            <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">View All</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?=$this->session->userdata('username')?$this->session->userdata('username'):"Unnamed"?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="auth/logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-desktop"></i> Module <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="category">Module Category</a>
                            </li>
                            <li>
                                <a href="slideshow">Module Slideshow</a>
                            </li>
                            <li>
                                <a href="product">Module Product</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">
                <?php echo $content ?>
                <!-- Page Heading -->
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="<?php echo config_item('assets'); ?>js/jquery.js"></script>
    <script src="<?php echo config_item('assets')?>js/ajaxfileupload.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo config_item('assets'); ?>js/bootstrap.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo config_item('assets'); ?>js/plugins/morris/raphael.min.js"></script>
    <script src="<?php echo config_item('assets'); ?>js/plugins/morris/morris.min.js"></script>
    <script src="<?php echo config_item('assets'); ?>js/plugins/morris/morris-data.js"></script>
    <script src="<?php echo config_item('assets'); ?>js/jquery.gritter.min.js"></script>
    <script src="<?php echo config_item('assets'); ?>redactor/redactor.min.js"></script>
    <script src="<?php echo config_item('assets'); ?>redactor/table.js"></script>
        <script src="<?php echo config_item('assets'); ?>redactor/bufferButtons.js"></script>
    <div id="myModal" class="modal fade"></div>
    <div id="myModal-lg" class="modal fade bs-example-modal-lg"></div>
    <div id="myModal-sm" class="modal fade bs-example-modal-sm"></div>
        <?php echo $script ?>
        <script>
        // gritter notification
        function gritter_alert(msg) {
            $.gritter.add({
                text : msg
            });
            return false;
        }
            <?php if($this->session->flashdata('alert')) : ?>
                gritter_alert('<?php echo $this->session->flashdata('alert') ?>');
            <?php endif; ?>
            $('.redactor-editor').redactor();
        </script>

</body>

</html>
