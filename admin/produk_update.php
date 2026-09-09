<?php 
    include "../config/connection.php";

    $id = $_POST["id-produk"];
    $namaProduk = $_POST["nama-produk"];
    $harga = $_POST["harga"];
    $stok = $_POST["stok"];

    mysqli_query($conn, "UPDATE tb_produk SET NamaProduk = '$namaProduk',
    Harga = '$harga', Stok = '$stok' where ProdukID = '$id'");
    header("location:produk_data.php");
?>