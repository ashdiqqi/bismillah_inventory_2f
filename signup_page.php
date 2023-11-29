<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="loginpage.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <div class="login_page">
            <form method="POST" action="cek_signup.php">
                <div class="fonts"><i class="fas fa-user"></i></div><br>
                <span>Sign Up </span><br>
                <label>Full Name</label><br>
                <input id="nama_lengkap" name="nama_lengkap" type="text" placeholder="Enter Name" required><br>
                <label>NIM</label><br>
                <input id="nim" maxlength="15" name="nim" type="text" placeholder="Enter NIM" required><br>
                <label>Password</label><br>
                <input id="password" maxlength="15" name="password" type="password" placeholder="Enter Password"
                    required><br>
                <input type="Submit" value="Sign Up"><br>
        </div>
        </form>
    </div>
</body>

</html>
<?php
include "koneksi.php";

if (isset($_POST['Submit'])) {
    $nama_lengkap = $_POST['nama_lengkap'];
    $email = $_POST['email'];
    $nohp = $_POST['nohp'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $level = $_POST['level'];

    mysqli_query($conn, "insert into user values('','$nama_lengkap','$email','$nohp','$nim','$password','$level')");
    echo "<script>alert ('Data Berhasil Disimpan') </script>";
    echo "<meta http-equiv='refresh' content=0; URL=index.php>";
}
?>