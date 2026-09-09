<?php 
    include "../config/connection.php";

    $id = $_POST["id-pelanggan"];
    $namaPelanggan = $_POST["nama-pelanggan"];
    $alamat = $_POST["alamat"];
    $nomor = $_POST["no-telpon"];

    mysqli_query($conn, "UPDATE tb_pelanggan SET NamaPelanggan = '$namaPelanggan',
    Alamat = '$alamat', NomorTelepon = '$nomor' where PelangganID = '$id'");
    header("location:pelanggan_data.php");
?>