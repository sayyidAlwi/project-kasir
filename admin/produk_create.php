<?php 
    include "../config/connection.php";

    $namaProduk = $_POST["nama-produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    mysqli_query($conn, "INSERT INTO tb_produk VALUES('','$namaProduk','$harga','$stok')");
    header("location:produk_data.php");
?>