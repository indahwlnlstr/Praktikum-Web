<?php
    include "../header.php";
 
    $idPesan = $_GET['id'];

    if(isset($_POST['update'])){
        $idKolam = $_POST['id_kolam'];
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $tanggal = $_POST['tanggal'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];

        $query = mysqli_query($connect, "UPDATE reservasi SET id_kolam='$idKolam', nama='$nama',telp='$telp', tanggal='$tanggal', jumlah='$jumlah', total='$total' WHERE id_reservasi='$idPesan'");
        if($query){
            echo"Jenis Berhasil di Update";
            header("location:index.php");
        } else {
            echo"Jenis Gagal di Update";
        }
    }
    $tableReservasi = mysqli_query($connect, "SELECT * FROM reservasi WHERE id_reservasi='$idPesan'");
    $rowReservasi = mysqli_fetch_array($tableReservasi);
    $idKolam1      = $rowReservasi['id_kolam'];
    $tableKolam   =mysqli_query($connect, "SELECT * FROM kolam WHERE id_kolam='$idKolam1'");
    $rowKolam    =mysqli_fetch_array($tableKolam);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="../connector/jquery-3.4.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.id_kolam').change(function(){
                var id_kolam = $(this).val();

                $.ajax({
                    url         : 'get_kolam.php',
                    type        : 'POST',
                    dataType    : 'json',
                    data        : {id : id_kolam}
                })
                .done(function(result){
                    $('.harga').val(result.harga);
                    console.log(result);
                    console.log("success");
                })
                .fail(function(result){
                    console.log(result);
                    console.log("fail");
                });
            });

            $('.jumlah').on("input propertychange", function(){
                var jumlah_slot = $('.jumlah').val();
                var harga = $('.harga').val();

                $('.total').val(+(jumlah_slot) * +(harga));
            });
        });
    </script>
    <title>Halaman Update Reservasi</title>
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

    table tr:nth-child(even){background-color: #BCE29E; color: black;}
    table tr:nth-child(odd){background-color: #BCE29E; color: black;}
    table tr:hover,table tr:hover a{background-color: white; color: black;
}
	</style>
</head>
<body class="body">    
<section class="center">
        <form action="" method="POST" class="box">
            <table border="0" align="center">
                <tr>
                    <th colspan="2">Data Reservasi Yang Akan Di Ubah</th>
                </tr>
                <tr>
                    <td>Nama Kolam</td>
                        <td><select name="id_kolam" class="id_kolam" id="id_kolam" required>
                               <option value="<?= $rowKolam['id_kolam']?>" hidden><?= $rowKolam['nama_kolam']?></option>

                            <?php
                                $tableKolam = mysqli_query($connect, "SELECT * FROM kolam");
                                while($rowKolam = mysqli_fetch_array($tableKolam)){
                            ?>

                                <option value="<?= $rowKolam['id_kolam']?>"><?= $rowKolam['nama_kolam']?></option>

                            <?php } ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Harga Tiket</td>
                    <?php
                                $tableKolam = mysqli_query($connect, "SELECT * FROM kolam");
                                while($rowKolam = mysqli_fetch_array($tableKolam)){
                            ?>
                    <td><input type="text" readonly name="harga" value="<?= $rowKolam['harga']?>" class="harga" required></td>
                <?php } ?>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value="<?= $rowReservasi['nama']?>" class="nama" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>Nomor Telpon</td>
                    <td><input type="number" name="telp" value="<?= $rowReservasi['telp']?>" class="telp" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>tanggal masuk</td>
                    <td><input type="text" name="tanggal" required value="<?= date("Y-m-d")?>"></td>
                </tr>
                <tr>
                    <td>jumlah</td>
                    <td><input type="number" name="jumlah" value="<?= $rowReservasi['jumlah']?>" class="jumlah" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>total</td>
                    <td><input type="text" name="total" value="<?= $rowReservasi['total']?>" class="total" required></td>
                </tr>

                <tr>
                    <td align="center" colspan="2"><hr><input type="submit" name="update" value="Update"> <a href="index.php">Back</a></td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>