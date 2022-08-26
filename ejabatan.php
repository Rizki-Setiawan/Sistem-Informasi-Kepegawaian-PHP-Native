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
                            <legend><Center>Edit Data Jabatan</Center></legend>
                      <div class="col-sm-8 content">
                      <form method="POST">
                    <?php
            require_once 'config.php';
              if($_GET['id_jabatan']) {
                $id_jabatan = $_GET['id_jabatan'];

                $sql = "SELECT * FROM tbl_jabatan, tbl_pegawai WHERE id_jabatan= {$id_jabatan} ";
                $result = $connect->query($sql);

                $data = $result->fetch_assoc();
                      }
                ?>     
                <div class="form-group">
                <label for="">Id Jabatan</label>
                <input type="text" disabled="true" class="form-control" name="id_jabatan" value="<?php echo $data['id_jabatan'] ?>">
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
              <div class="form-group">
                <label> Jabatan</label>
                 <select name="jabatan" class="form-control">
                  <option value="<?php echo $data['jabatan'] ?>" <?php if($data['jabatan'] == '<?php echo $data["jabatan"];?>'){ echo 'selected';}?>><?php echo $data['jabatan'];?></option>
                <?php
                $jbtn=array("Divisi","Manajer","Direktur");
                $jlh_jabatan=count($jbtn);
                for($c=0; $c<$jlh_jabatan; $c+=1){
                echo"<option value=$jbtn[$c]> $jbtn[$c] </option>";
                }
                ?>
                    </select>
              </div>
            </div>

            <div class="col-sm-4" >
              <form action="action">
              <div class="form-group">
                   <label>Tanggal Mulai Tugas</label>
                   <table>
                        <tr>                
                            <th>
                            <select name="tglmulai" class="form-control">
                              <option value="<?php echo $data['tglmulai'] ?>" <?php if($data['tglmulai'] == '<?php echo $data["tglmulai"];?>'){ echo 'selected';}?>><?php echo $data['tglmulai'];?></option>
                            <?php
                            for($a=1; $a<=31; $a+=1){
                             echo"<option value=$a> $a </option>";
                                }
                            ?>
                            </select>

                            </th>
                <th>
                  <select name="blnmulai" class="form-control">
                    <option value="<?php echo $data['blnmulai'] ?>" <?php if($data['blnmulai'] == '<?php echo $data["blnmulai"];?>'){ echo 'selected';}?>><?php echo $data['blnmulai'];?></option>
                <?php
                $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                $jlh_bln=count($bulan);
                for($c=0; $c<$jlh_bln; $c+=1){
                echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                }
                ?>
                    </select>
              </th>
              <th>
                  <select class="form-control" name="tahunmulai">
                    <option value="<?php echo $data['tahunmulai'] ?>" <?php if($data['tahunmulai'] == '<?php echo $data["tahunmulai"];?>'){ echo 'selected';}?>><?php echo $data['tahunmulai'];?></option>
                  <?php
                    $now=date('Y');
                    for ($a=1970;$a<=$now;$a++)
                    {
                    echo "<option value='$a'>$a</option>";
                    }
                    ?></select>
              </th>
              </tr>
              </table>
              </div>
              <div class="form-group">
                  <label>Tanggal Selesai Tugas</label>
                <table>
                        <tr>                
                            <th>
                            <select name="tglselesai" class="form-control">
                              <option value="<?php echo $data['tglselesai'] ?>" <?php if($data['tglselesai'] == '<?php echo $data["tglselesai"];?>'){ echo 'selected';}?>><?php echo $data['tglselesai'];?></option>
                            <?php
                            for($a=1; $a<=31; $a+=1){
                             echo"<option value=$a> $a </option>";
                                }
                            ?>
                            </select>

                            </th>
                <th>
                  <select name="blnselesai" class="form-control">
                    <option value="<?php echo $data['blnselesai'] ?>" <?php if($data['blnselesai'] == '<?php echo $data["blnselesai"];?>'){ echo 'selected';}?>><?php echo $data['blnselesai'];?></option>
                <?php
                $bulan=array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
                $jlh_bln=count($bulan);
                for($c=0; $c<$jlh_bln; $c+=1){
                echo"<option value=$bulan[$c]> $bulan[$c] </option>";
                }
                ?>
                    </select>
              </th>
              <th>
                  <select class="form-control" name="tahunselesai">
                    <option value="<?php echo $data['tahunselesai'] ?>" <?php if($data['tahunselesai'] == '<?php echo $data["tahunselesai"];?>'){ echo 'selected';}?>><?php echo $data['tahunselesai'];?></option>
                  <?php
                   for($a=1970; $a<=2030; $a+=1){
                             echo"<option value=$a> $a </option>";
                                }
                    ?></select>
              </th>
              </tr>
              </table>
              </div>
           <div class="col-sm-12">
            <br>
             <button type="submit" class="btn btn-success"><i class='fa fa-floppy-o fa-fw'></i>&nbsp;Simpan</button>
             <button type="reset" class="btn btn-danger"><i class='fa fa-trash-o fa-fw'></i>&nbsp;Hapus</button> 
             </form>
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
                $jabatan = $_POST['jabatan'];
                $tglmulai = $_POST['tglmulai'];
                $blnmulai = $_POST['blnmulai'];
                $tahunmulai = $_POST['tahunmulai'];
                $tglselesai = $_POST['tglselesai'];
                $blnselesai = $_POST['blnselesai'];
                $tahunselesai = $_POST['tahunselesai'];
              

                  $sql = "UPDATE tbl_jabatan SET nip='$nip',jabatan='$jabatan', tglmulai='$tglmulai', blnmulai='$blnmulai', tahunmulai='$tahunmulai', tglselesai='$tglselesai', blnselesai='$blnselesai', tahunselesai='$tahunselesai'  where id_jabatan={$id_jabatan}";

                       if($connect->query($sql) === TRUE) {
                    ?>
                    <script language="javascript" type="text/javascript">
                     alert("Data Berhasil di Edit");
                     document.location='djabatan.php';
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