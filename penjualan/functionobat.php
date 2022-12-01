<?php

$conn = mysqli_connect('localhost', 'root', '', 'apoetek');

// function query($query)
// {
//     global $conn;
//     $result = mysqli_query($conn, $query);
//     $rows = [];
//     while ($row = mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }

function tambah($data)
{
    global $conn;
    // ambil data dari tiap element dalam form
    $idobat = htmlspecialchars($data['idobat']);
    $qty = htmlspecialchars($data['qty']);
    $tanggal = htmlspecialchars($data['tanggal']);
    $harga = htmlspecialchars($data['harga']);
    $total = htmlspecialchars($data['total']);

    $cekstockobat = mysqli_query(
        $conn,
        "SELECT * FROM obat WHERE id_obat=$idobat"
    );

    $ambildatanya = mysqli_fetch_array($cekstockobat);
    $stocksekarang = $ambildatanya['stock'];
    $tambahstocksekarangdgnqty = $stocksekarang - $qty;

    // query insert data
    $addmasuk = mysqli_query(
        $conn,
        "INSERT INTO penjualan VALUES('','$idobat','$qty','$harga','$total','$tanggal')"
    );
    // $updatestockobat = mysqli_query(
    //     $conn,
    //     "UPDATE obat SET stock='$tambahstocksekarangdgnqty' WHERE id_obat=$idobat"
    // );

    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    // ambil data dari tiap element dalam form
    $id = htmlspecialchars($data['id']);
    $kodeobat = htmlspecialchars($data['kodeobat']);
    $namaobat = htmlspecialchars($data['namaobat']);
    $satuan = htmlspecialchars($data['satuan']);
    $kategori = htmlspecialchars($data['kategori']);
    $hargabeli = htmlspecialchars($data['hargabeli']);
    $hargajual = htmlspecialchars($data['hargajual']);
    $expired = htmlspecialchars($data['expired']);
    $stok = htmlspecialchars($data['stock']);

    // query update data
    mysqli_query(
        $conn,
        "UPDATE  obat SET
     kode_obat='$kodeobat',
     nama_obat='$namaobat',
     satuan='$satuan',
     kategori='$kategori',
     harga_beli='$hargabeli',
     harga_jual='$hargajual',
     expired='$expired',
     stock='$stok'
     WHERE id_obat='$id'"
    );

    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pembelian WHERE id_pembelian=$id");
    // mysqli_affected akan mengembalikan nilai min1 jika eror
    // namun jika benar akan mengembalikan nilai lebih dari 0
    return mysqli_affected_rows($conn);
}

?>
