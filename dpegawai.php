 <?php
    session_start();
    if(!isset($_SESSION['user'])){?>
    <script language="javascript" type="text/javascript">
    alert("Silahkan Login Terlebih Dahulu");
    document.location='login.php';
    </script><?php
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
                            <a href=""><i class="fa fa-users fa-fw"></i> Data Master<span class="fa arrow"></span></a>
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
                                    <a href="dpendidikan.php">Data Pendidikan</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                       
                        <li>
                            <a href="rekap.php"><i class="fa fa-tasks fa-fw"></i> Rekapitulasi</a>
                        </li>
                        <li>
                            <a href=""><i class="fa fa-print fa-fw"></i> Print<span class="fa arrow"></span></a>
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
                                   <a href="print_rekap.php"> Rekapitulasi Data </a>
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
                <div class="col-lg-12"><br><br>
                    <div class="col-md-12 content"   style="background-color: #F8F8F8; border-radius: 10px;">
                      <div>
                          <a href="ipegawai.php">  <br><button type="submit" class="btn btn-success"><i class='fa fa-plus fa-fw'></i>&nbsp; Masukan Data Baru</button> </a>
                     </div>
               <legend><Center>Data Pegawai</Center></legend>
               
    <table cellspacing="0" cellpadding="0" class="table table-striped table-bordered ">
        <thead style="background: #47A447; color: white;">
            <tr>
                <th><center>Nip</center></th>
                <th><center>Nama</center></th>
                <th><center>Tempat Tanggal Lahir</center></th>
                <th><center>Agama</center></th>
                <th><center>Jk</center></th>
                <th><center>Status</center></th>
                <th><center>Alamat</center></th>
                <th><center>Email</center></th>
                <th><center>Aksi</center></th>
            </tr>
        </thead>
        <tbody align="center">
            <?php
            require_once 'config.php';

            $sql = "SELECT * FROM `tbl_pegawai` ";
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['nip']."</td>
                        <td>".$row['nama']."</td>
                        <td>
                        ".$row['tempat'].",
                        ".$row['tgl']."-".$row['bln']."-".$row['tahun']."
                        </td>
                        <td>".$row['agama']."</td>
                        <td>".$row['jk']."</td>
                        <td>".$row['stat_pernikahan']."</td>
                        <td>".$row['alamat']."</td>
                        <td>".$row['email']."</td>
                        <td>
                        <a href='epegawai.php?nip=".$row['nip']."'><button type='button'class='btn btn-primary'><i class='fa fa-pencil-square-o fa-fw'></i></button></a>
                         <a onClick=\"javascript: return confirm('Apakah yakin ingin di hapus?');\"href='hpegawai.php?nip=".$row['nip']."'><button type='button'class='btn btn-danger'><i class='fa fa-trash-o fa-fw'></i></button></a>
                        </td>
                    </tr>";
                     }
                     } else {
                    echo "<tr><td colspan='12'><center>Belum Ada Data<center></td></tr>";
                    }
                    ?>
                </tbody>
                </table> 
        </div>
                </div>
               
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <footer class="text-right"><br>
                <p>Copyright &copy; 2017 Right Parking
                | Designed by <a href="http://www.templatemo.com" target="_parent">Rizki Setiawan</a></p>
            </footer>         
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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