<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['hapus']))
    {
        $id_barang = $_POST['id_barang'];
        mysqli_query($conn,"DELETE from barang where id_barang='$id_barang'");
        echo "<script>alert ('Data Berhasil Dihapus') </script>";
        echo"<meta http-equiv='refresh' content=0; URL=?view=databarang>";
    }


    $id_barang = $_POST['id_barang'];
    $query = "DELETE FROM barang WHERE id_barang = '$id_barang'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert ('Data Berhasil Dihapus') </script>";
        header("Location: ../../index.php?view=databarang");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>