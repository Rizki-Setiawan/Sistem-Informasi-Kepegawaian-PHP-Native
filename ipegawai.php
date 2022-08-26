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
                            <legend><Center>Input Data Pegawai</Center></legend>
                      <div class="col-sm-6 content">
                      <form method="POST">
              <div class="form-group">
                <label for="">Nip</label>
                <input type="text" class="form-control" name="nip" placeholder="Masukan Nip Pegawai">
              </div>
              <div class="form-group">
                <label for="">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
              </div>
              <div class="form-group">
                <label for="">Tempat Tanggal Lahir</label>
                    <table>
                        <tr>
                            <th>
                  <input type="text" name="tempat" class="form-control" placeholder="Tempat Lahir" />
                            </th>
                            <th>
                            <select name="tgl" class="form-control">
                              <option></option>
                            <?php
                            for($a=1; $a<=31; $a+=1){
                             echo"<option value=$a> $a </option>";
                                }
                            ?>
                            </select>

                            </th>
                <th>
                  <select name="bln" class="form-control">
                    <option></option>
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
                  <select class="form-control" name="tahun">
                    <option></option>
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
                <label>agama</label>
                <select name="agama" class="form-control">
                <option></option>
                <?php
                $agama=array("Islam","Katholik","Protestan","Hindu","Budha","KongHuChu");
                $jlh_agama=count($agama);
                for($ag=0; $ag<$jlh_agama; $ag+=1){
                echo"<option value=$agama[$ag]> $agama[$ag] </option>";
                }
                ?>
                    </select>
              </div>
            </div>

            <div class="col-sm-6" >
              <div class="form-group">
                  <label>Jenis Kelamin</label>
                  <select name="jk" class="form-control">
                      <option></option>
                      <option>Pria</option>
                      <option>Wanita</option>
                  </select>
              </div>
              <div class="form-group">
                <label for="">Status Pernikahan</label> 
                <select name="stat_pernikahan" class="form-control">
                  <option></option>
                  <option>Menikah</option>
                  <option>Tidak Menikah</option>
                </select>
              </div>
              <div>
                  <label>Alamat</label>
                  <input type="text" name="alamat" class="form-control">
              </div>
              <div style="padding-top: 15px;">
                  <label>Email</label>
                  <input type="text" name="email" class="form-control"><br>
              </div>
           </div>
           <div class="col-sm-12">
            <center><br>
             <button type="submit" class="btn btn-success"><i class='fa fa-floppy-o fa-fw'></i>&nbsp;Simpan</button>
             <button type="reset" class="btn btn-danger"><i class='fa fa-trash-o fa-fw'></i>&nbsp;Hapus</button> 
           </center>
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
if($_POST){
$nip = $_POST ['nip'];
$nama = $_POST ['nama'];
$tempat = $_POST ['tempat'];
$tgl = $_POST ['tgl'];
$bln = $_POST ['bln'];
$tahun = $_POST ['tahun'];
$agama = $_POST ['agama'];
$jk =$_POST['jk'];
$stat_pernikahan=$_POST['stat_pernikahan'];
$alamat=$_POST['alamat'];
$email=$_POST['email'];


if($nip =='' || $nama =='' || $tempat == '' || $tgl=='' || $bln =='' || $tahun == '' ||  $agama == ''|| $jk == ''|| $stat_pernikahan == ''|| $alamat == ''|| $email == ''){
    ?>
   <script language="javascript" type="text/javascript">
                     alert("Maaf! field tidak boleh ada yang kosong.");
                     document.location='ipegawai.php';
                    </script>"   ;<?php
} else {
    
    $sql = "INSERT INTO `tbl_pegawai` (`nip`, `nama`, `tempat`, `tgl`, `bln`, `tahun`, `agama`, `jk`, `stat_pernikahan`, `alamat`, `email`) VALUES ('$nip', '$nama', '$tempat', '$tgl', '$bln', '$tahun', ' $agama', '$jk', '$stat_pernikahan', '$alamat', '$email');";


    if($connect->query($sql) === TRUE) {
        ?>
        <script language="javascript" type="text/javascript">
                     alert("Selamat! data berhasil di input.");
                     document.location='dpegawai.php';
                    </script>"   ;
        <?php
    } else {
        echo "Error " . $sql . ' ' . $connect->connect_error;
    }

    $connect->close();
  }
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