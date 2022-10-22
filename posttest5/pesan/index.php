<?php
    include "../header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Data Reservasi</title>
    <style>
	* {
    margin: 0;
    padding: 0;
  }
    table th {
       text-align: center;
        background-color: #E5EBB2;
        color: black;
    }
    table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        margin-top: 10%;
        margin-left: auto;
        margin-right: auto;
        border: 2px solid black;
}
    table td, table th {
        border: 1px solid black;
        padding: 6px;
        width: 100px;
}
table tr td a {
  color: black;
}

    table tr:nth-child(even){background-color: #BCE29E; color: #BCE29E;}
    table tr:nth-child(odd){background-color: #BCE29E; color: #BCE29E;}


	</style>
</head>
<body class="body">
<form action="" method="POST">
        <table align="center" border="0" class="table">
            <tr>
                <th colspan="7">Reservasi</th>
                <th><a href="tambah.php"> TAMBAH</a></th>
            </tr>
            <tr>
                <th>No</th>
                <th>Kolam</th>
                <th>Nama Pemesan</th>
                <th>Telpon</th>
                <th>Tanggal Pemesanan</th>
                <th>Jumlah</th>
                <th>Total Bayar</th>
                <th>Fungsi</th>
            </tr>

                <?php
                $no = 1;
                $tableReservasi = mysqli_query($connect, "SELECT * FROM reservasi");
                while($rowReservasi = mysqli_fetch_array($tableReservasi)){
                    $idKolam      = $rowReservasi['id_kolam'];
                    $tableKolam   =mysqli_query($connect, "SELECT * FROM kolam WHERE id_kolam='$idKolam'");
                    $rowKolam    =mysqli_fetch_array($tableKolam);
                ?>

            <tr>
                <th><?= $no++ ?></th>
                <td><input type="text" size="15" readonly value="<?= $rowKolam['nama_kolam'] ?>"></td>
                <td><input type="text" size="15" readonly value="<?= $rowReservasi['nama'] ?>"></td>
                <td><input type="text" size="15" readonly value="<?= $rowReservasi['telp'] ?>"></td>
                <td><input type="text" size="15" readonly value="<?= $rowReservasi['tanggal'] ?>"></td>
                <td><input type="text" size="15" readonly value="<?= $rowReservasi['jumlah'] ?>"></td>
                <td><input type="text" size="15" readonly value="<?= $rowReservasi['total'] ?>"></td>
                
                <td><a href="update.php?id=<?= $rowReservasi['id_reservasi']?>">Update</a> | <a href="delete.php?id=<?= $rowReservasi['id_reservasi'] ?>">Hapus</a></td>
            </tr>
            
                <?php } ?>
        </table>
        </form>
    <br>
    <br>
        </form>
    </section>
</body>
</html>