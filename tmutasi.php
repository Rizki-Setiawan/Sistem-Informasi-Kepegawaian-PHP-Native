<!DOCTYPE html>
<html>
<head>
	<title>Data Mutasi</title>
</head>
<body>
<table border="1">
        <thead >
            <tr>
                <th><center>Id</center></th>
                <th><center>Nip</center></th>
                <th><center>Nama</center></th>
                <th><center>Jenis Mutasi</center></th>
                <th><center>No.SK</center></th>
               
            </tr>
        </thead>
        <tbody align="center">
            <?php
            require_once 'config.php';

            $sql = "SELECT tbl_mutasi.id_mutasi,tbl_pegawai.nip,tbl_pegawai.nama,tbl_mutasi.jenis_mutasi,tbl_mutasi.no_sk from tbl_mutasi, tbl_pegawai where tbl_pegawai.nip=tbl_mutasi.nip ";
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>".$row['id_mutasi']."</td>
                        <td>".$row['nip']."</td>
                        <td>".$row['nama']."</td>
                        <td>".$row['jenis_mutasi']."</td>
                        <td>".$row['no_sk']."</td>
                        
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