<?php
require 'functionobat.php';

// cek apakah tombol sudah di klik atau belim
if (isset($_POST['submit'])) {
    //   cek apakah data berhasil ditambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
    <script>
    alert('data berhasil disimpan');
    document.location.href='penjualan.php';
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
            <a href="penjualan.php">
            <button >Back</button>
            </a>

        </div>

        <div class="content">

     <form action="" method="post">

        <div class="kotak">
            <div class="label">
        <label for="namaobat">Nama Obat</label>
        </div>
        <select name="idobat" id="idobat" class="inputobat" onchange='changeValue(this.value)' required >  
        <option value="">Pilih </option>

        <?php $pembelian = mysqli_query($conn, 'SELECT * FROM obat'); ?>
                <?php $a = "var harga_jual = new Array();\n;"; ?>
                    <?php while ($row = mysqli_fetch_assoc($pembelian)): ?>
                    <option value="<?= $row['id_obat'] ?>"><?= $row[
    'nama_obat'
] ?></option>
                    <?php $a .=
                        "harga_jual['" .
                        $row['id_obat'] .
                        "'] = {harga_jual:'" .
                        addslashes($row['harga_jual']) .
                        "'};\n"; ?>
                    <?php endwhile; ?>
                     </select>
        <!-- <input class="inputobat" type="text" id="idobat" name="idobat" onkeyup="autofill()"> -->
        </div>

        <div class="kotak">
        <div class="label"><label for="qty">qty</label>
        </div>
        <input type="text" class="inputobat" id="qty" name="qty">
        </div>
        
        <div class="kotak">
            <div class="label">
                <label for="harga">Harga</label>
            </div>
            <input class="inputobat" type="text" id="harga" name="harga" readonly>
        </div>
        
        <div class="kotak">
            <div class="label">
                <label for="total">Total</label>
            </div>
            <input class="inputobat" type="text" id="total" name="total">
        </div>

        <div class="kotak">
        <div class="label"><label for="tanggal">tanggal</label>
        </div>
        <input type="date" class="inputobat" id="tanggal" name="tanggal">
        </div>


        <div class="kotak">
            <div class="label">
                <label for="expired"></label>
            </div>
        <button class="inputobat" id="submit" type="submit" name="submit">Simpan</button>
        </div>
       
     </form>
        </div>

    <div class="sidebar1">
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

            <!-- <div class="pembelian">
                <a href="../pembelian/pembelian.php">
                <img src="../image/transaksi.svg" alt="pembelian" class="img">
                <button type="button">PEMBELIAN</button>
                </a>
            </div> -->
            <div class="logout">
                <img src="../image/logout.svg" alt="logout" class="img">
                <a href="../login.php">
                <button type="button">LOGOUT</button>
            </a>
            </div>
        </div>
    </div>

    <script src="jquery-3.6.1.min.js"></script>
    <script type="text/javascript">   
                          <?php echo $a;
//   echo $b;
?>  
                          function changeValue(id){  
                            document.getElementById('harga').value = harga_jual[id].harga_jual;  
                            // document.getElementById('warna').value = warna[id].warna;  
                          };  
                          </script>  
    <!-- <script>
          function autofill(){
                var nama_obat = $("#idobat").val();
                $.ajax({
                    url: 'autofil.php',
                    data:"idobat="+nama_obat ,
                }).done(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#harga').val(obj.harga_jual);
                
                });
            }
    </script> -->
</body>
</html>