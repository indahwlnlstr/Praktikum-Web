<?php 
    include "../header.php";

    if(isset($_POST['create'])){
        $namaKolam = $_POST['nama_kolam'];
        $harga = $_POST['harga'];
        $slot = $_POST['slot'];

        $query = mysqli_query($connect, "INSERT INTO kolam ( nama_kolam, harga, slot) VALUES ('$namaKolam','$harga','$slot')");
        if(!empty($_FILES['gambar']['name'])){
            $query = mysqli_query($connect,"SELECT * FROM kolam WHERE nama_kolam='$namaKolam'");
            $result = mysqli_fetch_assoc($query);
            $id = $result['id_kolam'];
            $waktu = $_POST['waktu'];
            $nama = $_POST['nama_gambar'];
            $gambar = $_FILES['gambar']['name'];
            $x = explode('.',$gambar);
            $ekstensi = strtolower(end($x));
            $gambar_baru = "$nama.$ekstensi";
            $tmp = $_FILES['gambar']['tmp_name'];
            if(move_uploaded_file($tmp,"../img/$gambar_baru")){
              $query = mysqli_query($connect,"INSERT INTO images (id_kolam,file,upload_on) VALUES ($id, '$gambar_baru','$waktu');");
              if($query){
            echo"Data Berhasil di Tambah";
            header("location:index.php");
        } else {
            echo"Data Gagal di Tambah";
        }
    }
}
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Tambah Data Kolam</title>
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
            width: 50%;
            margin-top: 10%;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid black;
    }
        table td, table th {
            border: 1px solid black;
            padding: 5px;
    }
    table tr td a {
    color: black;
    }

    table tr:nth-child(even){background-color: #BCE29E; color: black;}
    table tr:nth-child(odd){background-color: #BCE29E; color: black;}
	</style>    
</head>
<body class="body">
    <section class="center">
        <form action="" method="POST" enctype="multipart/form-data" class="box">
            <table border="0" align="center">
                <tr>
                    <th colspan="2">Data Kolam Yang Akan Ditambahkan</th>
                </tr>
                <tr>
                    <td>Nama Kolam</td>
                    <td><input type="text" name="nama_kolam" required></td>
                </tr>
                <tr>
                    <td>Harga Tiket</td>
                    <td><input type="number" name="harga" required></td>
                </tr>

                <tr>
                    <td>Slot</td>
                    <td><input type="number" name="slot" required></td>
                </tr>
                <tr>
                    <td>Nama File</td>
                    <td><input type="text" placeholer="Masukkan Sesuai File Yang Di Upload" name="nama_gambar" required></td>
                </tr>
                <tr>
                    <td>File</td>
                    <td><input type="file" name="gambar" required></td>
                    <input type="datetime"  value="<?php echo date("Y-m-d\TH:i:s"); ?>" hidden name="waktu">
                </tr>

                <tr>
                    <td align="center" colspan="2"><hr><input type="submit" name="create" value="Insert"> <a href="index.php">Back</a></td>
                </tr>
            </table>
        </form>
    </section>
</body>
</html>