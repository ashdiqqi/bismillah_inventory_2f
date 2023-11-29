<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="loginpage.css">
    <title>Login Page</title>
</head>

<body>
    <div class="container">
        <div class="login_page">
            <form method="POST" action="cek_login.php">
                <div class="fonts"><i class="fas fa-user"></i></div><br>
                <span>Login</span><br>
                <label>NIM or NIP</label><br>
                <input id="nim" maxlength="15" name="nim" type="text" placeholder="Enter NIM or NIP" required><br>
                <label>Password</label><br>
                <input id="password" maxlength="15" name="password" type="password" placeholder="Enter Password"
                    required><br>
                <input type="Submit" value="Login"><br>
            </form>
            <a href="signup_page.php" id="show-signup" class="link">Create New Account</a>
        </div>
    </div>
</body>

</html>
<?php
include "koneksi.php";

if (isset($_POST['simpan'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $no_hp = $_POST['no_hp'];
    $nip = $_POST['nip'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    mysqli_query($conn, "INSERT INTO user VALUES('', '$nama_lengkap', '$email', '$no_hp', '$nim', '$nip', '$password', '$level')");
    echo "<script>alert('Data Berhasil Disimpan')</script>";
    echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}
?>