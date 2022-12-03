<?php
require 'admin/functions.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:admin/login.php');
    exit();
}

$result = mysqli_query($conn, 'SELECT * FROM penjualan');
$obatterjual = mysqli_num_rows($result);

$obat = mysqli_query($conn, 'SELECT * FROM obat');
$jmlobat = mysqli_num_rows($obat);

$result1 = mysqli_query($conn, 'SELECT SUM(total) AS totall FROM penjualan;');
$pendapatan = mysqli_fetch_assoc($result1);

$total = $pendapatan['totall'];
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
        <div class="heder">
            <h1>HOME PAGE</h1>
        </div>
        <div class="content">
            <div class="content-obat ">
                <img src="image/money.svg" alt="">
                <h3 >OBAT YANG TERJUAL :<span style="color: red;"> <?= $obatterjual ?></span></h3>
            </div>
            <div class="content-penjualan">
            <img src="image/jual.svg" alt="">
                <h3>TOTAL PENDAPATAN :<span style="color: red;"> <?= $total ?></span></h3>
            </div>
            <div class="content-pembelian">
            <img src="image/obatd.svg" alt="">
                <h3>JUMLAH OBAT : <span style="color: red;"> <?= $jmlobat ?></span></h3>

            </div>
        </div>
        <div class="navbar">
            <img src="image/apotek1.png" alt="logo" >
            <h2>Apotek Salosa</h2>

            <!-- <div class="home">
                <img src="image/home.png" alt="home"class="img">
                <button type="button">HOME</button>
            </div> -->

            <a style="text-decoration: none;" href="obat/obat.php">
            <div class="obat">
                <img src="image/obatn.svg" alt="obat" class="img">
                <button type="button">OBAT</button>
            </div>
        </a>


            <a style="text-decoration: none;" href="suplier/suplier.php">
            <div class="suplier">
                <img src="image/user1.svg" alt="suplier" class="img">
                <button type="button">SUPLIER</button>
            </div>
        </a>

            <a style="text-decoration: none;" href="admin/user.php">
            <div class="user">
                    <img src="image/user2.svg" alt="user" class="img">
                    <button type="button">USER</button>
                </div>
            </a>

            <a style="text-decoration: none;" href="penjualan/penjualan.php">
            <div class="penjualan">
                <img src="image/transaksi.svg" alt="penjualan" class="img">
                <button type="button">PENJUALAN</button>
            </div>
        </a>

            <a style="text-decoration: none;" href="pembelian/pembelian.php">
            <div class="pembelian">
                <img src="image/transaksi.svg" alt="pembelian" class="img">
                <button type="button">PEMBELIAN</button>
            </div>
        </a>

            <a style="text-decoration: none;" href="admin/logout.php">
            <div class="logout">
                <img src="image/logout.svg" alt="logout" class="img">
                <button type="button">LOGOUT</button>
            </div>
        </a>
        </div>
    </div>
</body>
</html>