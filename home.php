<?php
// session_start();
// if (!isset($_SESSION['login'])) {
//     header('Location:login.php');
//     exit();
// }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Source+Serif+Pro:ital,wght@1,600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    <div class="container-hompage">
        <div class="heder"></div>
        <div class="content">
            <div class="content-obat ">
                <img src="image/money.svg" alt="">
                <h3>OBAT YANG TERJUAL</h3>
            </div>
            <div class="content-penjualan">
            <img src="image/jual.svg" alt="">
                <h3>TOTAL PENDAPATAN</h3>
            </div>
            <div class="content-pembelian">
            <img src="image/obatd.svg" alt="">
                <h3>JUMLAH OBAT</h3>

            </div>
        </div>
        <div class="navbar">
            <img src="image/apotek1.png" alt="logo" >
            <h2>Apotek Salosa</h2>

            <div class="home">
                <img src="image/home.png" alt="home"class="img">
                <button type="button">HOME</button>
            </div>

            <div class="obat">
                <img src="image/obatn.svg" alt="obat" class="img">
                <a href="obat/obat.php">
                <button type="button">OBAT</button>
                </a>
            </div>

            <div class="satuan">
                <img src="image/obatn.svg" alt="satuan" class="img">
                <button type="button">SATUAN</button>
            </div>

            <div class="suplier">
                <img src="image/user1.svg" alt="suplier" class="img">
                <button type="button">SUPLIER</button>
            </div>

            <div class="user">
                <img src="image/user2.svg" alt="user" class="img">
                <button type="button">USER</button>
            </div>

            <div class="penjualan">
                <img src="image/transaksi.svg" alt="penjualan" class="img">
                <button type="button">PENJUALAN</button>
            </div>

            <div class="pembelian">
                <img src="image/transaksi.svg" alt="pembelian" class="img">
                <button type="button">PEMBELIAN</button>
              
            </div>
            <div class="logout">
                <img src="image/logout.svg" alt="logout" class="img">
                <a href="logout.php">
                <button type="button">LOGOUT</button>
            </a>
            </div>
        </div>
    </div>
</body>
</html>