<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['hapus'])) {
        $nim = $_POST['nim'];

        // Menghapus data dari peminjaman jika user pernah meminjam
        $deletePinjamQuery = "DELETE FROM pinjam_barang WHERE nim = '$nim'";
        if (mysqli_query($conn, $deletePinjamQuery)) {
            // Menghapus user
            $deleteUserQuery = "DELETE FROM user WHERE nim = '$nim'";
            if (mysqli_query($conn, $deleteUserQuery)) {
                echo "<script>alert ('Data Berhasil Dihapus') </script>";
                header("Location: ../../index.php?view=datamahasiswa");
                exit();
            } else {
                echo "Gagal menghapus data user: " . mysqli_error($conn);
            }
        } else {
            echo "Gagal menghapus data peminjaman: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>