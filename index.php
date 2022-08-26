<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header('location:login.php');
    } else {
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RIGHT PARKING || SIMPEG </title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Page-Level Plugin CSS - Blank -->

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body >

    <div id="wrapper">

        <nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0; background-color: black;">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color: #2883C8;">RIGHT PARKING</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->

                <li style="color:  #2883C8; ">
                    <h4><?php echo $_SESSION['user']; ?></h4>
                </li>                
                <li></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        
                        <li class="divider"></li>
                        <li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default navbar-static-side" role="navigation" >
                <div class="sidebar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i> Data Master<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="dpegawai.php">Data Pegawai</a>
                                </li>
                                <li>
                                    <a href="djabatan.php">Data Jabatan</a>
                                </li>
                                <li>
                                    <a href="dmutasi.php">Data Mutasi</a>
                                </li>
                                 <li>
                                    <a href="print_rekap.php"> Rekapitulasi Data </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
            
                        <li>
                            <a href="rekap.php"><i class="fa fa-tasks fa-fw"></i> Rekapitulasi</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-print fa-fw"></i> Print<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="print_pegawai.php">Data Pegawai</a>
                                </li>
                                <li>
                                    <a href="print_jabatan.php">Data Jabatan</a>
                                </li>
                                <li>
                                    <a href="print_mutasi.php"> Data Mutasi</a>
                                </li>
                                <li>
                                    <a href="print_pendidikan.php"> Data Pendidikan </a>
                                </li>
                                <li>
                                    <a href="print_pendidikan.php"> Data Pendidikan </a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                    <!-- /#side-menu -->
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12"><br><br><br>
                        <div class="panel panel-default" >
                        <div class="panel-heading" style="background-color: #47A447; color: white;">
                            <i class="fa fa-dashboard fa-fw"></i> Right Parking <i class="fa fa-angle-right"></i> Dashboard
                            <div class="pull-right">
                            </div>
                        </div>
                        <div class="panel-body">
                            <h1>Selamat Datang! <?php echo $_SESSION['user']; ?></h1> <hr>
                            <p>Ini adalah unit aplikasi Sistem Informasi Kepegawaian berbasis Web, 
                            Yang berisi data-data pegawai RIGHT PARKING.</font></p><hr>
                        </div>
                    </div>
                        <footer class="text-right">
                <p>Copyright &copy; 2017 Right Parking
                | Designed by <a href="http://www.templatemo.com" target="_parent">Rizki Setiawan</a></p>
                        </footer>              
         </div>
            </div>      
        </div>
    </div>


    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- Page-Level Plugin Scripts - Blank -->

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

    <!-- Page-Level Demo Scripts - Blank - Use for reference -->

</body>

</html>
<?php } ?>