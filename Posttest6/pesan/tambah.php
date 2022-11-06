<?php
    include "../header.php";

    if(isset($_POST['create'])){
        $idKolam = $_POST['id_kolam'];
        $nama = $_POST['nama'];
        $telp = $_POST['telp'];
        $tanggal = $_POST['tanggal'];
        $jumlah = $_POST['jumlah'];
        $total = $_POST['total'];


        $query = mysqli_query($connect, "INSERT INTO reservasi (id_kolam, nama, telp, tanggal, jumlah, total) VALUES ('$idKolam','$nama', '$telp', '$tanggal','$jumlah','$total')");

        $queryKurang = mysqli_query($connect, "UPDATE kolam SET slot = slot - '$jumlah' WHERE id_kolam='$idKolam'");

        if($query && $queryKurang){
            echo"Jenis Berhasil di Tambahkan";
            header("location:index.php");
        } else {
            echo"Gagal Menambahkan barang";
        }
    }

?>

<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="../connector/jquery.js"></script>
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
    <title>Halaman Tambah Data Reservasi</title>
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
                    <th colspan="2">Reservasi Tempat</th>
                </tr>
                <tr>
                    <td>Nama Kolam</td>
                        <td><select name="id_kolam" class="id_kolam" id="id_kolam" required>
                                <option value="" hidden>Pilih Kolam</option>

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
                    <td>Nama Pemesan</td>
                    <td><input type="text" name="nama" class="nama" required></td>
                </tr>
                <tr>
                    <td>Nomor Telpon</td>
                    <td><input type="number" name="telp" class="telp" required></td>
                </tr>
                <tr>
                    <td>Harga Tiket</td>
                    <td><input type="text" readonly name="harga" class="harga" required></td>
                </tr>
                <tr>
                    <td>Tanggal Reservasi</td>
                    <td><input type="text" name="tanggal" required value="<?= date("Y-m-d")?>"></td>
                </tr>
                <tr>
                    <td>Jumlah Slot</td>
                    <td><input type="number" name="jumlah" class="jumlah" required autocomplete="off"></td>
                </tr>
                <tr>
                    <td>total</td>
                    <td><input type="text" name="total" class="total" readonly required></td>
                </tr>

                <tr>
                    <td align="center" colspan="2"><hr><input type="submit" name="create" value="Insert"> <a href="index.php">Back</a></td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>