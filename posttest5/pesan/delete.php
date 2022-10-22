<?php
    include "../connector/connection.php";

    $id_reservasi = $_GET['id'];

    $query = mysqli_query($connect, "DELETE FROM reservasi WHERE id_reservasi='$id_reservasi'");

    if($query){
        echo"Jenis Berhasil di Delete";
        header("location:index.php");
    } else {
        echo"Jenis Gagal di Delete";
        header("location:index.php");
    }

?>
