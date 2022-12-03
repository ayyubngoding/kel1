<?php
require 'function.php';
session_start();
if (!isset($_SESSION['login'])) {
    header('Location:../admin/login.php');
    exit();
}
$id = $_GET['ubah'];
$result = mysqli_query($conn, "SELECT * FROM suplier WHERE id_suplier=$id");
$suplier = mysqli_fetch_assoc($result);

// cek apakah tombol sudah di klik atau belim
if (isset($_POST['submit'])) {
    //   cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil dirubah');
    document.location.href='suplier.php';
    </script>
    
    ";
    } else {
        echo "
    
    <script>
    alert('gagal');
    </script>
    
    ";
        echo mysqli_error($conn);
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/obat.css" >
</head>
<body>
    <div class="container-obat">
        <div class="navbar">
            <h2>Page Penjualan</h2>
        </div>
        <div class="tambah">
            <a href="suplier.php">
            <button >Back</button>
            </a>

        </div>

        <div class="content">

     <form action="" method="post">
    <input type="hidden" name="id" value="<?= $suplier['id_suplier'] ?>">
    
        <div class="kotak">
        <div class="label"><label for="nama">Nama Suplier </label>
        </div>
        <input type="text" class="inputobat" id="nama" name="nama"  value="<?= $suplier[
            'nama'
        ] ?>">
        </div>

        <div class="kotak">
        <div class="label"><label for="nohp">NO. HP </label>
        </div>
        <input type="text" class="inputobat" id="nohp" name="nohp"  value="<?= $suplier[
            'nohp'
        ] ?>">
        </div>
        
       
        
        <div class="kotak">
            <div class="label">
                <label for="alamat">Alamat</label>
            </div>
            <input class="inputobat" type="text" id="alamat" name="alamat"  value="<?= $suplier[
                'alamat'
            ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
                <label for="expired"></label>
            </div>
        <button class="inputobat" id="submit" type="submit" name="submit">Ubah</button>
        </div>
       
     </form>
        </div>

    <div class="sidebar">
            <img src="../image/apotek1.png" alt="logo" >
            <h2>Apotek Salosa</h2>

            <div class="home">
                <a href="../home.php">
                <img src="../image/home.png" alt="home"class="img">
                <button type="button">HOME</button>
                </a>
            </div>

            <div class="obat">
                <a href="../obat/obat.php">
                <img src="../image/obatn.svg" alt="obat" class="img">
                <button type="button">OBAT</button>
                </a>
            </div>

            <!-- <div class="satuan">
                <a href="../satuan/satuan.php">
                <img src="../image/obatn.svg" alt="satuan" class="img">
                <button type="button">SATUAN</button>
                </a>
            </div> -->

            <!-- <div class="suplier">
                <a href="../suplier/suplier.php">
                <img src="../image/user1.svg" alt="suplier" class="img">
                <button type="button">SUPLIER</button>
                </a>
            </div> -->

            <div class="user">
                <a href="../user/user.php">
                <img src="../image/user2.svg" alt="user" class="img">
                <button type="button">USER</button>
                </a>
            </div>

            <div class="penjualan">
                <a href="../penjualan/penjualan.php">
                <img src="../image/transaksi.svg" alt="penjualan" class="img">
                <button type="button">PENJUALAN</button>
                </a>
            </div>

            <div class="pembelian">
                <a href="../pembelian/pembelian.php">
                <img src="../image/transaksi.svg" alt="pembelian" class="img">
                <button type="button">PEMBELIAN</button>
                </a>
            </div>

            <div class="logout">
                <img src="../image/logout.svg" alt="logout" class="img">
                <a href="../admin/logout.php">
                <button type="button">LOGOUT</button>
            </a>
            </div>
        </div>
    </div>

   
</body>
</html>