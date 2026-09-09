<?php 
    include "../config/connection.php";

    $id = $_GET["ProdukID"];

    mysqli_query($conn, "DELETE FROM tb_produk where ProdukID = '$id'");
    header("location:produk_data.php");
?>