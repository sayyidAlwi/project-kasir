<?php 
    include "../config/connection.php";

    $id = $_GET["PelangganID"];

    mysqli_query($conn, "DELETE FROM tb_pelanggan where PelangganID = '$id'");
    header("location:pelanggan_data.php");
?>