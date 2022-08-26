<!DOCTYPE html>
<html>
<head>
	<title>Data Rekap</title>
</head>
<body>
	<table border="1">
        <thead ">
            <tr>
                <th><center>Nip</center></th>
                <th><center>Nama</center></th>
                <th><center>Tempat Tanggal Lahir</center></th>
                <th><center>Agama</center></th>
                <th><center>Jk</center></th>
                <th><center>Status</center></th>
                <th><center>Alamat</center></th>
                <th><center>Email</center></th>
                <th><center>Pendidikan Terakhir</center></th>
                <th><center>Jabatan</center></th>
                <th><center>Tanggal Mulai Tugas</center></th>
                <th><center>Tanggal Selesai Tugas</center></th>
                
            </tr>
        </thead>
        <tbody align="center">
            <?php
            require_once 'config.php';

            $sql = "SELECT tbl_pegawai.nip,tbl_pegawai.nama, tbl_pegawai.tempat, tbl_pegawai.tgl, tbl_pegawai.bln,tbl_pegawai.tahun,tbl_pegawai.agama,tbl_pegawai.jk,tbl_pegawai.stat_pernikahan,tbl_pegawai.alamat,tbl_pegawai.email,tbl_pendidikan.pendidikan_akhir,tbl_jabatan.jabatan,tbl_jabatan.tglmulai,tbl_jabatan.blnmulai,tbl_jabatan.tahunmulai,tbl_jabatan.tglselesai,tbl_jabatan.blnselesai,tbl_jabatan.tahunselesai from tbl_pegawai, tbl_pendidikan, tbl_jabatan where tbl_pegawai.nip=tbl_jabatan.nip and tbl_pegawai.nip=tbl_pendidikan.nip ";
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
                        <td>".$row['pendidikan_akhir']."</td>
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