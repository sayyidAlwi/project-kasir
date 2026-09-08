<?php
    include "config/connection.php";

    $user = $_POST["username"];
    $pass = md5($_POST["password"]);
    $akses = $_POST["role"];

    $login = mysqli_query($conn, "SELECT * FROM tb_user where username = '$user' and password = '$pass' and role = '$akses'");
    $cek = mysqli_num_rows($login);

    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);
        if ($data['role'] == 'admin') {
            session_start();
            $_SESSION ['UserID'] = $data['UserID'];
            $_SESSION ['role'] = $data['admin'];
            header("location:admin/index.php");
        } else if ($data['role'] == 'petugas') {
            session_start();
            $_SESSION ['UserID'] = $data['UserID'];
            $_SESSION ['role'] = $data['petugas'];
            header("location:petugas/index.php");
        }
    // } else if (($_GET['pesan']) == 'logout') {
    //     header("location:index.php?pesan=logout");
    } else {
        header("location:index.php?pesan=gagal");
    }
?>