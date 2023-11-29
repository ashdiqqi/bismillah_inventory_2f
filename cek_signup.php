<?php
// Include your database connection or any other necessary files
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nama_lengkap = $_POST['nama_lengkap'];
    $nim = $_POST['nim'];
    $password = $_POST['password'];
    $level = "user";
    $email = " ";
    $no_hp = " ";

    // Perform validation (add more validation as needed)
    if (empty($nama_lengkap) || empty($nim) || empty($password) || empty($level) || empty($no_hp) || empty($email)) {
        echo "All fields are required.";
    } else {
        // Perform database insertion with error handling
        $query = "INSERT INTO user (nama_lengkap, nim, password, level, no_hp, email) VALUES ('$nama_lengkap', '$nim', '$password', '$level', '$no_hp', '$email')";
        if (mysqli_query($conn, $query)) {
            echo "Account created successfully!";
            // Redirect to login_page.php after successful account creation
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
}
?>