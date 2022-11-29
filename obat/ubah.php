<?php
require 'functionobat.php';
// ambil data di url
$id = $_GET['ubah'];

// query data obat berdasarkan id
$query = mysqli_query($conn, "SELECT * FROM obat WHERE  id_obat=$id");

$row = mysqli_fetch_assoc($query);

// cek apakah tombol sudah di klik atau belum
if (isset($_POST['submit'])) {
    //   cek apakah data berhasil ditambahkan atau tidak
    if (ubah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil di ubah');
    document.location.href='obat.php';
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
            <h2>Page Ubah Data Obat</h2>
        </div>
        <div class="tambah">
            <a href="obat.php">
            <button >Back</button>
            </a>

        </div>

        <div class="content">

     <form action="" method="post">

     <input type="hidden" name="id" value="<?= $row['id_obat'] ?>">

        <div class="kotak">
            <div class="label">
        <label for="kodeobat">Kode Obat</label>
        </div>
        <input class="inputobat" type="text" id="kodeobat" name="kodeobat"value="<?= $row[
            'kode_obat'
        ] ?>">
        </div>


        <div class="kotak">
            <div class="label">
        <label for="namaobat">Nama Obat</label>
        </div>
      <input type="text" class="inputobat" id="namaobat" name="namaobat" value="<?= $row[
          'nama_obat'
      ] ?>">
        </div>

        <div class="kotak">
        <div class="label"><label for="satuan">Satuan</label>
        </div>
        <input type="text" class="inputobat" id="satuan" name="satuan"  value="<?= $row[
            'satuan'
        ] ?>">
        </div>

        <div class="kotak">
        <div class="label"><label for="kategori">Kategori</label>
        </div>
        <input type="text" class="inputobat" id="kategori" name="kategori"  value="<?= $row[
            'kategori'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="hargabeli">Harga Jual</label>
        </div>
        <input class="inputobat" type="text" id="hargabeli" name="hargabeli" value="<?= $row[
            'harga_beli'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="hargajual">Harga Jual</label>
        </div>
        <input class="inputobat" type="text" id="hargajual" name="hargajual" value="<?= $row[
            'harga_jual'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="expired">Expired</label>
        </div>
        <input class="inputobat" type="date" id="expired" name="expired" value="<?= $row[
            'expired'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="stock">stock</label>
        </div>
        <input class="inputobat" type="number" id="stock" name="stock" value="<?= $row[
            'stock'
        ] ?>">
        </div>

        <div class="kotak">
            <div class="label">
        <label for="expired"></label>
        </div>
        <button class="inputobat" id="submit" type="submit" name="submit">Update</button>
        </div>
       
     </form>
        </div>

    <div class="sidebar">
            <img src="../image/apotek1.png" alt="logo" >
            <h2>Apotek Salosa</h2>

            <div class="home">
                <img src="../image/home.png" alt="home"class="img">
                <button type="button">HOME</button>
            </div>

            <!-- <div class="obat">
                <img src="../image/obatn.svg" alt="obat" class="img">
                <button type="button">OBAT</button>
            </div> -->

            <div class="satuan">
                <img src="../image/obatn.svg" alt="satuan" class="img">
                <button type="button">SATUAN</button>
            </div>

            <div class="suplier">
                <img src="../image/user1.svg" alt="suplier" class="img">
                <button type="button">SUPLIER</button>
            </div>

            <div class="user">
                <img src="../image/user2.svg" alt="user" class="img">
                <button type="button">USER</button>
            </div>

            <div class="penjualan">
                <img src="../image/transaksi.svg" alt="penjualan" class="img">
                <button type="button">PENJUALAN</button>
            </div>

            <div class="pembelian">
                <img src="../image/transaksi.svg" alt="pembelian" class="img">
                <button type="button">PEMBELIAN</button>
              
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

<?php
//  if (isset($_POST['submit'])) {
//     // ambil data dari tiap element dalam form
//     $kodeobat = htmlspecialchars($_POST['kodeobat']);
//     $namaobat = htmlspecialchars($_POST['namaobat']);
//     $satuan = htmlspecialchars($_POST['satuan']);
//     $stok = htmlspecialchars($_POST['stock']);
//     $hargajual = htmlspecialchars($_POST['hargajual']);
//     $expired = htmlspecialchars($_POST['expired']);

//     // query update data
//     mysqli_query(
//         $conn,
//         "UPDATE  obat SET
//    kode_obat='$kodeobat',
//    nama_obat='$namaobat',
//    id_satuan='$satuan',
//    stok='$stok',
//    harga_jual='$hargajual',
//    expired='$expired'
//    WHERE id_obat=$_GET[edit]"
//     );

//     echo "<script>
//        alert('data berhasil diubah');
//        document.location.href='obat.php';
//        </script> ";
// }
?>