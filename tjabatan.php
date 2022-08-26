<!DOCTYPE html>
<html>
<head>
	<title>Data Jabatan</title>
</head>
<body>
<table border="1">
        <thead>
            <tr>
                <th><center>Id</center></th>
                <th><center>Nip</center></th>
                <th><center>Nama</center></th>
                <th><center>Jabatan</center></th>
                <th><center>Tanggal Mulai Tugas</center></th>
                <th><center>Tanggal Selesai Tugas</center></th>

            </tr>
        </thead>
        <tbody align="center">
            <?php
            require_once 'config.php';

            $sql = "SELECT tbl_jabatan.id_jabatan,tbl_pegawai.nip,tbl_pegawai.nama,tbl_jabatan.jabatan,tbl_jabatan.tglmulai,tbl_jabatan.blnmulai,tbl_jabatan.tahunmulai,tbl_jabatan.tglselesai,tbl_jabatan.blnselesai,tbl_jabatan.tahunselesai from tbl_jabatan, tbl_pegawai where tbl_pegawai.nip=tbl_jabatan.nip ";
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['id_jabatan']."</td>
                        <td>".$row['nip']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['jabatan']."</td>
                        <td>
                        ".$row['tglmulai']."-".$row['blnmulai']."-".$row['tahunmulai']."
                        </td>
                        <td>
                        ".$row['tglselesai']."-".$row['blnselesai']."-".$row['tahunselesai']."
                        </td>
                  
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