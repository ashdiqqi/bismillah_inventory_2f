<?php
include('../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['save'])){
        //Mendapatkan id peminjaman
        $id_peminjaman = $_POST['id_peminjaman']; 

        //Mengedit status untuk peminjaman yang di pilih
        $query = "UPDATE pinjam_barang SET status= 'Ditolak' WHERE id_peminjaman='$id_peminjaman'";
        if (mysqli_query($conn, $query)) {
            echo "<script>alert ('Peminjaman ditolak') </script>";
            header("Location: ../index.php?view=datapinjambarang");
            exit();
        }else {
            echo "Gagal memproses data: " . mysqli_error($conn);
        }
    } 
}
mysqli_close($conn);
?>