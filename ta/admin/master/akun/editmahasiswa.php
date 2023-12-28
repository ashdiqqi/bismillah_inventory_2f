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
    $nimOLD = $_POST['nim_OLD'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $kelas = $_POST['kelas'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $no_hp = $_POST['no_hp'];
    $foto = $_FILES['foto_mahasiswa']['name'];
    $file_tmp = $_FILES['foto_mahasiswa']['tmp_name'];
    
    //Menonakktifkan autotransaksi agar tidak disimpan ke database
    mysqli_autocommit($conn, false);

    //Mengecek apakah foto juga di update
    if (!empty($foto)) {
        //Jika foto diupload
        $queryeditmahasiswa = "UPDATE user SET 
            nim = '$nim',
            nama_lengkap = '$nama_lengkap', 
            kelas = '$kelas',
            email = '$email', 
            password ='$password',
            no_hp = '$no_hp',
            foto_mahasiswa = '$foto' 
          WHERE nim = '$nimOLD'";
    } else {
        //Jika foto tidak diupload
        $queryeditmahasiswa = "UPDATE user SET 
            nim = '$nim',
            nama_lengkap = '$nama_lengkap', 
            kelas = '$kelas',
            email = '$email', 
            password ='$password',
            no_hp = '$no_hp'
          WHERE nim = '$nimOLD'";
    }

    if (mysqli_query($conn, $queryeditmahasiswa)) {
        //Mengedit nim di pinjam_barang
        $queryeditnim = "UPDATE pinjam_barang SET nim = '$nim' WHERE nim = '$nimOLD'";
        if (mysqli_query($conn, $queryeditnim)) {
            //Mengcommit data baru
            mysqli_commit($conn);
            echo "<script>alert ('Data Berhasil Diubah') </script>";
            header("Location: ../../index.php?view=datamahasiswa");
            exit();
        } else {
            //Jika gagal maka akan merollback data 
            mysqli_rollback($conn);
            echo "Gagal mengedit data peminjaman: " . mysqli_error($conn);
        }
    } else {
        mysqli_rollback($conn);
        echo "Gagal mengedit data user: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>