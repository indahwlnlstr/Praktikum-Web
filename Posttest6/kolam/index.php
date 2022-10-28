<?php 
    include "../header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>LIST KOLAM</title>
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
        width: 80%;
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
  
 <form method="post">
</head>
<body class="body">

    <form action="" method="POST">
        <table align="center" border="0" class="table">
            <tr>
                <th colspan="6" rowspan="">LIST KOLAM</th>
                <th><a href="tambah.php"> TAMBAH</a></th>

            </tr>
            <tr>
                <th rowspan="">No</th>
                <th>Nama Kolam</th>
                <th>Harga Tiket</th>
                <th>Slot</th>
                <th>Gambar</th>
                <th>Waktu Upload</th>
                <th>Fungsi</th>
            </tr>

                <?php
                    $no = 1;
                    $tableKolam = mysqli_query($connect, "SELECT * FROM kolam INNER JOIN images ON kolam.id_kolam = images.id_kolam");
                    while($rowKolam = mysqli_fetch_array($tableKolam)){
                ?>

            <tr>
                <th><?= $no++ ?></th>
                <td><input type="text" size="15" readonly value="<?= $rowKolam['nama_kolam'] ?>"></td>
                <td><input type="text" size="15" readonly value="Rp.<?= $rowKolam['harga'] ?>"></td>
                <td><input type="text" size="15" readonly value="<?= $rowKolam['slot'] ?>"></td>
                <td><img width="60px" src="../img/<?=$rowKolam['file']?>" alt="<?=$rowKolam['file']?>"></td>
                <td><input type="text" size="15" readonly value="<?= $rowKolam['upload_on'] ?>"></td>
                <td><a href="update.php?id=<?= $rowKolam['id_kolam']?>">Edit</a> | <a href="hapus.php?id=<?= $rowKolam['id_kolam'] ?>">Hapus</a></td>
            </tr>

                <?php }?>
        </table>
        </form>
    <br>
    <br>
</body>
</html>