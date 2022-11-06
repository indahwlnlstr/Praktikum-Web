<?php
    include "../connector/connection.php";

    $idKolam = $_GET['id'];

    $query = mysqli_query($connect, "DELETE FROM kolam WHERE id_kolam='$idKolam'");
        
        if($query){
            echo"Data Berhasil di Delete";
            header("location:index.php");
        } else {
            echo"Data Gagal di Delete";
            header("location:index.php");
        }
?>