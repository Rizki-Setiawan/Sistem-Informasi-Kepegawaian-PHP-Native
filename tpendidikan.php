<!DOCTYPE html>
<html>
<head>
	<title>Data Pendidikan</title>
</head>
<body>
<table border="1">
        <thead >
            <tr>
                <th><center>Id </center></th>
                <th><center>Nip</center></th>
                <th><center>Nama</center></th>
                <th><center>Pendidikan Terakhir</center></th>
               
            </tr>
        </thead>
        <tbody align="center">
            <?php
            require_once 'config.php';

            $sql = "SELECT tbl_pendidikan.id_data_pendidikan,tbl_pegawai.nip,tbl_pegawai.nama,tbl_pendidikan.pendidikan_akhir from tbl_pendidikan, tbl_pegawai where tbl_pegawai.nip=tbl_pendidikan.nip ";
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['id_data_pendidikan']."</td>
                        <td>".$row['nip']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['pendidikan_akhir']."</td>
                        
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