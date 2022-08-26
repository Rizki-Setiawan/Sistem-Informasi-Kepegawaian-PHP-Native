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
                    <div class="col-md-12 content"  style="background-color: #F8F8F8; border-radius: 10px;"><br>
                            <legend><Center>Edit Data Mutasi</Center></legend>
                      <div class="col-sm-7 content">
                      <form method="POST">
                          <?php
            require_once 'config.php';
              if($_GET['id_mutasi']) {
                $id_mutasi = $_GET['id_mutasi'];

                $sql = "SELECT * FROM tbl_mutasi, tbl_pegawai WHERE id_mutasi= {$id_mutasi} ";
                $result = $connect->query($sql);

                $data = $result->fetch_assoc();
                      }
                ?>     
                <div class="form-group">
                <label for="">Id Mutasi</label>
                <input type="text" class="form-control" name="id_mutasi" disabled="true"  value="<?php echo $data['id_mutasi'] ?>">
              </div>
              <div class="form-group">
                <label>Nama</label>
                <select class="form-control" name="nip" >
                    <?php
            require_once 'config.php';

            $res=$connect->query("SELECT * FROM tbl_pegawai");
            while ($row=$res->fetch_array()) {
              ?>
              <option value="<?php echo $row['nip'];?>">
                <?php echo $row['nama'];?>
              </option>
              <?php
            }
                   ?> </select>              
                </div>
            </div>

            <div class="col-sm-5" >
              <form action="action">
              <div class="form-group">
                   <label>Jenis Mutasi</label>
                  <select name="jenis_mutasi" class="form-control">
                    <option value="<?php echo $data['jenis_mutasi'] ?>" <?php if($data['jenis_mutasi'] == '<?php echo $data["jenis_mutasi"];?>'){ echo 'selected';}?>><?php echo $data['jenis_mutasi'];?></option>
                <?php
                $mutasi=array("Masuk","Keluar","Pindah","Pensiun","Wafat");
                $jlh_mts=count($mutasi);
                for($c=0; $c<$jlh_mts; $c+=1){
                echo"<option value=$mutasi[$c]> $mutasi[$c] </option>";
                }
                ?>
                    </select>
            
              </div>
              <div class="form-group">
                  <label>No.SK</label>
               
               <input type="text" name="no_sk" class="form-control" value="<?php echo $data['no_sk'] ?>">
              </div>
           <div class="col-sm-12">
            <br>
             <button type="submit" class="btn btn-success"><i class='fa fa-floppy-o fa-fw'></i>&nbsp;Simpan</button>
             <button type="reset" class="btn btn-danger"><i class='fa fa-trash-o fa-fw'></i>&nbsp;Hapus</button> 
             </form>
             <br>
             <br>
           </div>
          </div>
          </form>
          </div>        
      </div>
    </div>

    <?php

require_once 'config.php';
 if($_POST) {
              
                $nip = $_POST['nip'];
                $jenis_mutasi = $_POST['jenis_mutasi'];
                $no_sk = $_POST['no_sk'];

                  $sql = "UPDATE tbl_mutasi SET nip='$nip',jenis_mutasi='$jenis_mutasi', no_sk='$no_sk' where id_mutasi={$id_mutasi}";

                       if($connect->query($sql) === TRUE) {
                    ?>
                    <script language="javascript" type="text/javascript">
                     alert("Data Berhasil di Edit");
                     document.location='dmutasi.php';
                    </script>"   ;
                    <?php
                } else {
                    echo "Error " . $sql . ' ' . $connect->connect_error;
                }

                $connect->close();
              }


?>
                    </div>
                </div>
               
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->    
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