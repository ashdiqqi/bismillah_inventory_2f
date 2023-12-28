<!-- Koneksi -->
    <?php
    include('../koneksi.php');

    if (isset($_SESSION['nim'])) {
        $nim = $_SESSION['nim'];
        $query = "SELECT * FROM user WHERE nim = '$nim'";
        $result = $conn->query($query);

        // Cek apakah ada data yang ditemukan
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            $namaLengkap = $row['nama_lengkap'];
            $nomorUser = $row['nim'];
            $emailAddress = $row['email'];
            $phoneNumber = $row['no_hp'];
            $class = $row['kelas'];
            $foto = $row['foto_mahasiswa'];
        } else {
            echo "Data tidak ditemukan.";
        }
    } else {
        echo "Anda belum login.";
    }
    ?>
<!-- Panel Utama -->
    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">Data</h4>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <!DOCTYPE html>
                                <html lang="en">
                                    <head>
                                        <meta charset="utf-8">
                                        <meta name="viewport" content="width=device-width, initial-scale=1">  
                                    </head>
                                    <body>
                                        <div class="container-xl px-4 mt-4">    
                                            <div class="row">
                                                <div class="col-xl-4">
                                                    <div class="card mb-4 mb-xl-0">
                                                        <div class="card-header">Profile Picture</div>
                                                            <div class="card-body text-center">
                                                                <img class="img-account-profile rounded-circle mb-2" src="../assets/img/imgmahasiswa/<?php echo $foto; ?>" alt>
                                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-8">
                                                    <div class="card mb-4">
                                                        <div class="card-header">Account Details</div>
                                                            <div class="card-body">
                                                                <form>
                                                                    <div class="mb-3">
                                                                        <label class="small mb-1" for="inputUsername">Nama Lengkap</label>
                                                                        <input class="form-control" id="inputUsername" type="text" value="<?php echo $namaLengkap; ?>" readonly>
                                                                    </div>
                                                                    <div class="row gx-3 mb-3">
                                                                        <div class="col-md-6">
                                                                            <label class="small mb-1" for="inputNIM">NIM</label>
                                                                            <input class="form-control" id="inputNIM" type="text" value="<?php echo $nomorUser; ?>" readonly>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <label class="small mb-1" for="inputClass">Kelas</label>
                                                                            <input class="form-control" id="inputClass" type="text" value="<?php echo $class; ?>" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                                        <input class="form-control" id="inputEmailAddress" type="email" value="<?php echo $emailAddress; ?>" readonly>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="small mb-1" for="inputPhone">Nomor Telepon</label>
                                                                        <input class="form-control" id="inputPhone" type="tel"  value="<?php echo $phoneNumber; ?>" readonly>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </body>
                                </html>
                            </div>
                        </div>
                    </div>
                </div>
            </div>