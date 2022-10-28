<?php
    include "../connector/connection.php";

    $idKolam = $_GET['id'];

    $tableGambar = mysqli_query($connect, "SELECT * FROM images WHERE id_kolam='$idKolam'");
    $rowGambar = mysqli_fetch_array($tableGambar);
    $idGambar = $rowGambar['id'];
    $fileLama = $rowGambar['file'];
    unlink('../img/'.$fileLama);
    $query = mysqli_query($connect, "DELETE images FROM images INNER JOIN kolam ON kolam.id_kolam = images.id_kolam WHERE kolam.id_kolam='$idKolam'");
    $query = mysqli_query($connect, "DELETE FROM kolam WHERE id_kolam='$idKolam'");
        
        if($query){
            echo"Data Berhasil di Delete";
            header("location:index.php");
        } else {
            echo"Data Gagal di Delete";
            header("location:index.php");
        }
?>