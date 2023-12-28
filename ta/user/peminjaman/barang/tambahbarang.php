<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_peminjaman = $_POST['id_peminjaman'];
    $nim = $_POST['nim'];
    $id_barang = $_POST['id_barang'];
    $tgl_pinjam = $_POST['tgl_pinjam'];
    $tgl_kembali = $_POST['tgl_kembali'];
    $qty = $_POST['qty'];
    $status = $_POST['status'];
    $nip = $_POST['nip'];

    $query = "INSERT INTO pinjam_barang (id_peminjaman, nim, id_barang, nip, tgl_pinjam, tgl_kembali, qty, status) 
    VALUES ('$id_peminjaman','$nim','$id_barang','$nip','$tgl_pinjam','$tgl_kembali','$qty','$status')";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        header("Location: ../../index.php?view=datariwayat");
        exit();
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>