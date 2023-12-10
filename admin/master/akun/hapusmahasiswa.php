<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['hapus']))
    {
        $nim = $_POST['nim'];
        $query = "DELETE FROM user WHERE nim = '$nim'";
    
        if (mysqli_query($conn, $query)) {
            echo "<script>alert ('Data Berhasil Dihapus') </script>";
            header("Location: ../../index.php?view=datamahasiswa");
            exit();
        } else {
            echo "Gagal menghapus data: " . mysqli_error($conn);
        }
    }
}
mysqli_close($conn);
?>