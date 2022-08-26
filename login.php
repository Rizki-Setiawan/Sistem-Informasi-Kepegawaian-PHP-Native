<?php
    session_start();
    if(isset($_SESSION['user'])){
    ?><script language="javascript" type="text/javascript">
    alert("Silahkan Logout Terlebih Dahulu");
    document.location='index.php';
    </script><?php
    } else {
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>RIGHT PARKING || SIMPEG</title>

    <!-- Core CSS - Include with every page -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- SB Admin CSS - Include with every page -->
    <link href="css/sb-admin.css" rel="stylesheet">

</head>

<body style="background-color: #EFEAF3;">

    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4"><br> <br>
                <div class="box" style="background-color: white; border-radius: 10px;">
                    <div class="panel-heading"><br>
                        <center>
                        <img src="images/user.png" style="width: 70px;"><br>
                         <h3>RIGHT PARKING</h3>
                        </center>
                    </div>
                    <div class="panel-body" ><center>
                        <form role="form" method="POST">
                                <fieldset>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-user fa-fw"></i></div>   
                                    <input class="form-control" placeholder="Masukan Username" name="username" type="text">
                                </div><br>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-key fa-fw"></i></div>   
                                    <input class="form-control" placeholder="Masukan password" name="password" type="password">
                                </div><br>
                                <!-- Change this to a button or input when using this as a form -->
                                    <button class="btn btn-primary" style="width:330px;" name="masuk">Masuk</button>
                            </fieldset>
                        </form>
                        <?php
                            include "koneksi.php";
                            if(isset($_POST['masuk'])){
                                $cek =mysqli_query($conn,"SELECT * FROM tbl_login WHERE username = '".$_POST['username']."' AND password = '".$_POST['password']."'");
                                $hasil = mysqli_fetch_array($cek);
                                $count = mysqli_num_rows($cek);
                                $nama_user = $hasil['user'];
                                if($count > 0){
                                                                    $_SESSION['user'] = $nama_user;?>
                                    <script language="javascript" type="text/javascript">
                                    alert("Login Berhasil. Halo! <?php echo $_SESSION['user']?>");
                                    document.location='index.php';
                                    </script><?php
                                }else{
                                   ?> <br> <div class="alert alert-warning" role="alert">Login Gagal! Silahkan Ulangi Kembali.  </div><?php
                                }
                            }
                        ?>
                    </center>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>

    <!-- Core Scripts - Include with every page -->
    <script src="js/jquery-1.10.2.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

    <!-- SB Admin Scripts - Include with every page -->
    <script src="js/sb-admin.js"></script>

</body>

</html>
<?php } ?>