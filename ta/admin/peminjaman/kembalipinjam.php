<?php
include('../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])){
        // Mendapatkan beberapa data
        $id_peminjaman = $_POST['id_peminjaman'];
        $id_barang = $_POST['id_barang']; 
        $qty = $_POST['qty'];
        $qty_tersedia = $_POST['qty_tersedia'];

        // Update status pinjam barang
        $updatepinjam = "UPDATE pinjam_barang SET status= 'Selesai' WHERE id_peminjaman='$id_peminjaman'";
        if (mysqli_query($conn, $updatepinjam)) {
            // update qty_tersedia
            $updateqty = "UPDATE barang SET qty_tersedia = $qty_tersedia+$qty WHERE id_barang='$id_barang'";
            if (mysqli_query($conn, $updateqty)) {
                echo "<script>alert ('Barang sudah di kembalikan') </script>";
                header("Location: ../index.php?view=datapinjambarang");
                exit();
            }else {
                echo "Gagal mengupdate data barang: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal mengupdate data peminjaman: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>