<?php
require 'functionobat.php';
$jumlahDataPerHalaman = 5;
$query = mysqli_query($conn, 'SELECT * FROM obat');
$jumlahData = mysqli_num_rows($query);
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
$halamanAktif = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$awalData = $jumlahDataPerHalaman * $halamanAktif - $jumlahDataPerHalaman;

// $obat = mysqli_query(
//     $conn,
//     "SELECT * FROM obat JOIN satuan ON obat.id_satuan= satuan.id_satuan  LIMIT $awalData,$jumlahDataPerHalaman "
// );
if (isset($_POST['cari'])) {
    $keyword = $_POST['keyword'];
    $obat = mysqli_query(
        $conn,
        "SELECT * FROM obat  WHERE
   kode_obat LIKE '%$keyword%' OR
   nama_obat LIKE '%$keyword%'
    "
    );
} else {
    $obat = mysqli_query(
        $conn,
        "SELECT * FROM obat LIMIT $awalData,$jumlahDataPerHalaman "
    );
}
$no = 1;
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/obat.css" >
    <link rel="stylesheet" href="style.css" >

   

</head>
<body>
    <div class="container-obat">
        <div class="navbar">
            <h2>Page Obat</h2>
        </div>
        <div class="tambah">
            <a href="tambahobat.php">
            <button >Tambah Data</button>
            </a>

            <div class="keyword">

                <form action="" method="post">
            <input class="cari" type="text" name="keyword" autofocus placeholder="search" autocomplete="of">
            <button type="submit" name="cari">Cari</button>
            </form>

            </div>
        </div>
        
           
        <div class="content">
      <table border="1" cellspacing="0">

      <tr>
                <th>NO.URUT</th>
                <th>KODE OBAT</th>
                <th>NAMA OBAT</th>
                <th>SATUAN</th>
                <th>KATEGORI</th>
                <th>HARGA JUAL</th>
                <th>EXPIRED</th>
                <th>STOK</th>
                <th colspan="2">AKSI</th>
     </tr>

        <?php while ($row = mysqli_fetch_assoc($obat)): ?>
        <tr>
           <td><?= $no ?></td>
           <td class="idobat"><?= $row['id_obat'] ?></td>
           <td><?= $row['kode_obat'] ?></td>
           <td><?= $row['nama_obat'] ?></td>
           <td><?= $row['satuan'] ?></td>
           <td><?= $row['kategori'] ?></td>
           <td><?= $row['harga_jual'] ?></td>
           <td><?= $row['expired'] ?></td>
           <td><?= $row['stock'] ?></td>

           <td>
            <a href="ubah.php?ubah=<?php echo $row['id_obat']; ?>">
                <img class="edit" src="../image/update.svg" alt="">
            </a>
           </td>
           <td>
            <a href="hapus.php?hapus=<?= $row[
                'id_obat'
            ] ?>" onclick="return confirm('Apakah Data Akan di Hapus?')">
            <img class="hapus" src="../image/Delete.svg" alt="">
            </a>
           </td>

        </tr>
           <?php $no++; ?>
        <?php endwhile; ?>

      </table>
      <div class="content-navigasi">
      <div class="jmldata">
      <p>Jumlah Data <?= $jumlahData ?></p>
      </div>
      <!-- navigasi -->
      <div class="navigasi">
        <?php if ($halamanAktif > 1): ?>
            <a href="?halaman=<?= $halamanAktif - 1 ?>">&laquo;</a>
        <?php endif; ?>

      <?php for ($i = 1; $i <= $jumlahHalaman; $i++): ?>
        <?php if ($i == $halamanAktif): ?>
        <a class="halaman" href="obat.php?halaman=<?= $i ?>"><?= $i ?></a>
        <?php else: ?>
            <a href="obat.php?halaman=<?= $i ?>"><?= $i ?></a>
            <?php endif; ?>
      <?php endfor; ?>

      <?php if ($halamanAktif < $jumlahHalaman): ?>
            <a href="?halaman=<?= $halamanAktif + 1 ?>">&raquo;</a>
        <?php endif; ?>
        </div>
        </div>

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

            <!-- <div class="obat">
                <img src="../image/obatn.svg" alt="obat" class="img">
                <button type="button">OBAT</button>
            </div> -->

            <!-- <div class="satuan">
                <a href="../satuan/satuan.php">
                <img src="../image/obatn.svg" alt="satuan" class="img">
                <button type="button">SATUAN</button>
                </a>
            </div> -->

            <div class="suplier">
                <a href="../suplier/suplier.php">
                <img src="../image/user1.svg" alt="suplier" class="img">
                <button type="button">SUPLIER</button>
                </a>
            </div>

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
                <a href="../login.php">
                <button type="button">LOGOUT</button>
            </a>
            </div>
        </div>
    </div>
</body>
</html>