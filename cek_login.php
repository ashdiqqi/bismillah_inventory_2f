<?php
session_start();
include "koneksi.php";

$nim_nip = $_POST['nim'];
$password = $_POST['password'];

// Check in the 'user' table
$user_filter = mysqli_query($conn, "SELECT * FROM user WHERE nim='$nim_nip' AND password='$password'");
$user_count = mysqli_num_rows($user_filter);
$user_data = mysqli_fetch_array($user_filter);

// Check in the 'admin' table
$admin_filter = mysqli_query($conn, "SELECT * FROM admin WHERE nip='$nim_nip' AND password='$password'");
$admin_count = mysqli_num_rows($admin_filter);
$admin_data = mysqli_fetch_array($admin_filter);

if ($user_count > 0) {
    // User login
    $_SESSION['nim'] = $user_data['nim'];
    $_SESSION['level'] = 'user';
    $_SESSION['password'] = $user_data['password'];
    $_SESSION['nama_lengkap'] = $user_data['nama_lengkap'];
    $_SESSION['email'] = $user_data['email'];
    $_SESSION['no_hp'] = $user_data['no_hp'];
    header("location:user/");

} elseif ($admin_count > 0) {
    // Admin login
    $_SESSION['nama_lengkap'] = $admin_data['nama_lengkap'];
    $_SESSION['level'] = 'admin';
    $_SESSION['nip'] = $admin_data['nip'];
    $_SESSION['email'] = $admin_data['email'];
    $_SESSION['no_hp'] = $admin_data['no_hp'];
    $_SESSION['password'] = $admin_data['password'];
    header("location:admin/");

} else {
    header("location:login.php?alert=gagal");
}
?>