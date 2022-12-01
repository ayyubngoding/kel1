<?php
// jualan produk
// komik
// game

use Produk as GlobalProduk;

class Produk
{
    public $judul,
        $penulis,
        $penerbit,
        $harga = 0;

    public function __construct(
        $judul = 'judul',
        $penulis = 'penulis',
        $penerbit = 'penerbit',
        $harga = ''
    ) {
        $this->judul = $judul;
        $this->penulis = $penulis;
        $this->penerbit = $penerbit;
        $this->harga = $harga;
    }

    public function getLabel()
    {
        return "$this->penulis, $this->penerbit";
    }
}

$produk1 = new Produk('Naruto', 'Mamashi Kishimoto', 'Shonen Jump', '30000');

$produk2 = new Produk('Uncharted', 'Neil Druckmann', 'Sony Komputer', '250000');

$produk3 = new Produk('Mobile Legends');

echo 'Komik :' . $produk1->getLabel();
echo '<hr>';
echo 'Game :' . $produk2->getLabel();
echo '<hr>';
echo 'Nama Game' . ' ' . $produk3->judul;
echo '<hr>';
var_dump($produk3);

?>
