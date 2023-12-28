<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $targetDirectory = "C:/xampp/htdocs/ta/assets/img/imgbarang"; 
    $targetFile = $targetDirectory . '/' . basename($_FILES["foto_barang"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $maxFileSize = 5 * 1024 * 1024; 

    if (in_array($fileType, $allowedExtensions) && $_FILES["foto_barang"]["size"] <= $maxFileSize) {
        if (move_uploaded_file($_FILES["foto_barang"]["tmp_name"], $targetFile)) {
            echo "File berhasil diunggah";
        } else {
            echo "Gagal mengunggah file";
        }
    } else {
        echo "File tidak valid atau melebihi ukuran maksimum yang ditetapkan";
    }

    $id_barang = $_POST['id_barang'];
    $qtyold = $_POST['qty_OLD'];
    $qtysold = $_POST['qtys_OLD'];
    $nama_barang = $_POST['nama_barang'];
    $maintainer = $_POST['maintainer'];
    $qty_total_baru = $_POST['qty_total_baru'];

    //Menghitung selisih qty_total baru dengan qty_total lama
    $selisih_qty_total = $qty_total_baru - $qtyold;
    // Menghitung qty_tersedia baru
    $qty_tersedia_baru = $qtysold + $selisih_qty_total;
    //Memastikan qty_tersedia tidak menjadi negatif
    $qty_tersedia_baru = max(0, $qty_tersedia_baru);  

    $deskripsi = $_POST['deskripsi'];
    $foto_barang = $_FILES['foto_barang']['name'];
    $file_tmp = $_FILES['foto_barang']['tmp_name'];

    //Menonakktifkan autotransaksi agar tidak disimpan ke database
    mysqli_autocommit($conn, false);

    //Mengecek apakah foto juga di update
    if (!empty($foto_barang)) {
        //Jika foto diupload
        $queryeditbarang = "UPDATE barang SET  
            nama_barang='$nama_barang', 
            maintainer='$maintainer', 
            qty_total='$qty_total_baru',
            qty_tersedia='$qty_tersedia_baru', 
            deskripsi='$deskripsi', 
            foto_barang='$foto_barang' 
          WHERE id_barang='$id_barang'";
    } else {
        //Jika foto tidak diupload
        $queryeditbarang = "UPDATE barang SET  
        nama_barang='$nama_barang', 
        maintainer='$maintainer', 
        qty_total='$qty_total_baru',
        qty_tersedia='$qty_tersedia_baru', 
        deskripsi='$deskripsi' 
        WHERE id_barang='$id_barang'";
    }

    if (mysqli_query($conn, $queryeditbarang)) {
        //Mengedit id_barang di pinjam_barang
        $queryeditid = "UPDATE pinjam_barang SET id_barang = '$id_barang'";
        if (mysqli_query($conn, $queryeditid)) {
            //Mengcommit data baru
            mysqli_commit($conn);
            echo "<script>alert ('Data Berhasil Diubah') </script>";
            header("Location: ../../index.php?view=databarang");
            exit();
        } else {
            mysqli_rollback($conn);
            echo "Gagal mengedit data: " . mysqli_error($conn);
        }
    } else {
        mysqli_rollback($conn);
        echo "Gagal mengedit data peminjaman: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>