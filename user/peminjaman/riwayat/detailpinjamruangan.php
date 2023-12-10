<!-- Membuat style button -->
<style>
    /* Tombol Success */
    .success-button {
        background-color: #2ecc71;
        color: #fff;
        padding: 10px 15px;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
    }
</style>

<?php
include('../../../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
?>

<!-- Panel utama data barang -->
<div class="main-panel">
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Riwayat Peminjaman</h4>
            </div>

            <!-- form tampil data barang -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Barang</th>
                                            <th>Stok</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        $query = mysqli_query($conn, 'SELECT * from pinjam_barang 
                                        INNER JOIN admin ON pinjam_barang.nip = admin.nip
                                        INNER JOIN barang ON pinjam_barang.id_barang = barang.id_barang;');
                                        while ($barang = mysqli_fetch_array($query)) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $barang['nama_barang'] ?></td>
                                                <td><?php echo $barang['qty'] ?></td>
                                                <td><?php echo $barang['tgl_pinjam'] ?></td>
                                                <td><?php echo $barang['tgl_kembali'] ?></td>
                                                <td><?php echo $barang['status'] ?></td>
                                                <td>
                                                    <!-- Display details here -->
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
mysqli_close($conn);
?>
