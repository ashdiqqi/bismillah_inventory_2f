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
    $nama_barang = $_POST['nama_barang'];
    $maintainer = $_POST['maintainer'];
    $qty_total = $_POST['qty_total'];
    $deskripsi = $_POST['deskripsi'];
    $foto = $_FILES['foto_barang']['name'];
    $file_tmp = $_FILES['foto_barang']['tmp_name'];

    $query = "INSERT INTO barang (id_barang, nama_barang, maintainer, qty_tersedia, qty_total, foto_barang, deskripsi) VALUES ('$id_barang','$nama_barang', '$maintainer', '$qty_total', '$qty_total', '$foto', '$deskripsi')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data Berhasil Disimpan')</script>";
        header("Location: ../../index.php?view=databarang");
        exit();
    } else {
        echo "Gagal menambahkan data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
