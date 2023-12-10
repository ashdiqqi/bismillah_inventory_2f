<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $targetDirectory = "C:/xampp/htdocs/ta/assets/img/imgmahasiswa"; 
    $targetFile = $targetDirectory . '/' . basename($_FILES["foto_mahasiswa"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $maxFileSize = 5 * 1024 * 1024; 

    if (in_array($fileType, $allowedExtensions) && $_FILES["foto_mahasiswa"]["size"] <= $maxFileSize) {
        if (move_uploaded_file($_FILES["foto_mahasiswa"]["tmp_name"], $targetFile)) {
            echo "File berhasil diunggah";
        } else {
            echo "Gagal mengunggah file";
        }
    } else {
        echo "File tidak valid atau melebihi ukuran maksimum yang ditetapkan";
    }
    $nim = $_POST['nim'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $foto = $_FILES['foto_mahasiswa']['name'];
    $file_tmp = $_FILES['foto_mahasiswa']['tmp_name'];

    $query = "UPDATE user SET 
            nim='$nim', 
            nama_lengkap='$nama_lengkap', 
            email='$email', 
            password ='$password',
            no_hp='$no_hp',
            foto_mahasiswa='$foto' 
          WHERE nim='$nim'";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert ('Data Berhasil Diubah') </script>";
        header("Location: ../../index.php?view=datamahasiswa");
        exit();
    } else {
        echo "Gagal mengedit data: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
