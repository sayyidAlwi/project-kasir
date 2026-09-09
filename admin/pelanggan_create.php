<?php 
    include "../config/connection.php";

    $namaPelanggan = $_POST["nama-pelanggan"];
    $alamat = $_POST["alamat"];
    $nomor = $_POST["no-telpon"];

    mysqli_query($conn, "INSERT INTO tb_pelanggan VALUES('','$namaPelanggan','$alamat','$nomor')");
    header("location:pelanggan_data.php");
?>