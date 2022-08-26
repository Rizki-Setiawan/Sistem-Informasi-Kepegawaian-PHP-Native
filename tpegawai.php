<!DOCTYPE html>
<html>
<head>
	<title>Table</title>
</head>
<body>
<table border="1">
        <thead>
            <tr>
                <th><center>Nip</center></th>
                <th><center>Nama</center></th>
                <th><center>Tempat Tanggal Lahir</center></th>
                <th><center>Agama</center></th>
                <th><center>Jk</center></th>
                <th><center>Status</center></th>
                <th><center>Alamat</center></th>
                <th><center>Email</center></th>
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
                    </tr>";
                     }
                     } else {
                    echo "<tr><td colspan='12'><center>Belum Ada Data<center></td></tr>";
                    }
                    ?>
                </tbody>
                </table> 
</body>
</html>