<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['hapus'])){
        $id_barang = $_POST['id_barang']; 

        // Menghapus riwayat barang dari peminjaman dulu jika barang pernah/sedang dipinjam
        $deletePinjamQuery = "DELETE FROM pinjam_barang WHERE id_barang = '$id_barang'";
        if (mysqli_query($conn, $deletePinjamQuery)) {
            // Menghapus barang 
            $deleteBarangQuery = "DELETE FROM barang WHERE id_barang = '$id_barang'";
            if (mysqli_query($conn, $deleteBarangQuery)) {
            echo "<script>alert ('Data Berhasil Dihapus') </script>";
            header("Location: ../../index.php?view=databarang");
            exit();
        }else {
            echo "Gagal menghapus data barang: " . mysqli_error($conn);
        }
    } else {
        echo "Gagal menghapus data peminjaman: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>