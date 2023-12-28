<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['hapus'])){
        $id_peminjaman = $_POST['id_peminjaman']; 

        // Menghapus riwayat barang dari peminjaman dulu jika barang pernah/sedang dipinjam
        $deletePinjamQuery = "DELETE FROM pinjam_barang WHERE id_peminjaman = '$id_peminjaman'";
        if (mysqli_query($conn, $deletePinjamQuery)) {
            echo "<script>alert('Data Berhasil Dihapus')</script>";
            header("Location: ../../index.php?view=datariwayat");
            exit();
        } else {
            echo "Gagal menghapus data peminjaman: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>