<!-- Membuat style button -->
	<style>
    /* Tombol Edit (Warning) */
    .warning-button {
        background-color: #ffcc00;
        color: #333;
        padding: 10px 15px;
        border: none;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 14px;
        cursor: pointer;
        border-radius: 5px;
    }
    
    /* Tombol Hapus (Alert) */
    .alert-button {
        background-color: #ff3333;
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

    /* Tombol Info */
    .info-button {
        background-color: #3498db;
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


<!-- Panel utama pinjam barang -->
	<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">Data Barang</h4>
			</div>
<!-- form tampil data barang -->
		<div class="row">
			<div class="col-md-12">
				<div class="card">
				<div class="card-body">
					<div class="table-responsive">
						<table id="add-row" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Barang</th>
									<th>Maintainer</th>
									<th>Stok</th>
									<th>Foto</th>
									<th>Action</th>
								</tr>
							</thead>		
							<tbody>
								<?php
									$no = 1;
									$query = mysqli_query($conn, 'SELECT * from barang INNER JOIN admin ON barang.maintainer = admin.nip;');
									while ($barang = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $barang['nama_barang'] ?></td>
									<td><?php echo $barang['nama_lengkap'] ?></td>
									<td><?php echo $barang['qty_tersedia'] . '/' . $barang['qty_total']; ?></td>
									<td><img src="../assets/img/imgbarang/<?php echo $barang['foto_barang']; ?>" alt="Foto produk" style="max-width: 100px; max-height: 100px;"></td>
									<td>
										<form action="" method="get" style="display:inline;" onclick="openDetailModal(<?php echo $barang['id_barang']; ?>)">
											<input type="hidden" name="id" value="<?php echo $barang['id_barang']; ?>">
											<button type="button" class="info-button">Detail</button>
										</form>
										<form action="" method="get" style="display:inline;" onclick="openPinjamModal(<?php echo $barang['id_barang']; ?>)">
											<input type="hidden" name="id" value="<?php echo $barang['id_barang']; ?>">
											<button type="button" class="success-button">Pinjam</button>
										</form>
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
<!-- form detail barang -->	
	<?php 
		$p = mysqli_query($conn, 'SELECT * FROM barang INNER JOIN admin ON barang.maintainer = admin.nip;');
		while($d = mysqli_fetch_array($p)) {
	?>
		<div class="modal fade" id="modalDetailBarang<?php echo $d['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    		<div class="modal-dialog" role="document">
        		<div class="modal-content">
            		<div class="modal-header no-bd">
                		<h5 class="modal-title">
                   			<span class="fw-mediumbold">Detail</span>
                    		<span class="fw-light">Barang</span>
                		</h5>
                		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    		<span aria-hidden="true">&times;</span>
                		</button>
            		</div>
            	<form method="POST" enctype="multipart/form-data" action="master/barang/editbarang.php">
					<div class="modal-body">
						<div class="form-group">
							<label>ID Barang</label>
							<input value="<?php echo $d['id_barang'] ?>" type="text" name="id_barang" class="form-control" readonly>
						</div>
						<div class="form-group">
							<label>Nama Barang</label>
							<input value="<?php echo $d['nama_barang'] ?>" type="text" name="nama_barang" class="form-control" placeholder="Nama Barang..." readonly>
						</div>
						<div class="form-group">
							<label>Maintainer</label>
							<input value="<?php echo $d['nama_lengkap'] ?>" type="text" name="maintainer" class="form-control" placeholder="NIP Maintainer..." readonly>
						</div>
						<div class="form-group">
							<label>Stok</label>
							<input value="<?php echo $d['qty_total'] ?>" type="number" name="qty_total" class="form-control" placeholder="Stok..." readonly>
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea class="form-control" placeholder="Deskripsi..." rows="5" name="deskripsi" style="white-space: pre-line;" readonly><?php echo $d['deskripsi'] ?></textarea>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<img src="../assets/img/imgbarang/<?php echo $d['foto_barang']; ?>" alt="Foto produk" style="max-width: 100px; max-height: 100px;">
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	<?php } ?>
	<!-- fungsi agar button detail menampilkan data berdasarkan id_barangnya  -->
	<script>
    	function openDetailModal(id_barang) {
        $(`#modalDetailBarang${id_barang}`).modal('show');
    	}
	</script>
<!-- form pinjam barang -->
	<?php 
		$p = mysqli_query($conn, 'SELECT * FROM barang
		INNER JOIN admin ON barang.maintainer = admin.nip');
		while($d = mysqli_fetch_array($p)) {
	?>
		
	<div class="modal fade" id="modalPinjamBarang<?php echo $d['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header no-bd">
						<h5 class="modal-title">
							<span class="fw-mediumbold">Peminjaman</span> 
							<span class="fw-light">Baru</span>
						</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
						<form method="POST" enctype="multipart/form-data" action="peminjaman/barang/tambahbarang.php">
							<div class="modal-body">
								<div class="form-group">
									<label>ID Pinjam</label>
										<?php
											$query = mysqli_query($conn, "SELECT MAX(id_peminjaman) AS max_id FROM pinjam_barang");
											$row = mysqli_fetch_assoc($query);
											$next_id = $row['max_id'] + 1;
										?>
									<input type="text" name="id_peminjaman" class="form-control" value="<?php echo $next_id; ?>" readonly>

								</div>
								<div class="form-group">
									<label>NIM</label>
									<input type="hidden" name="nim" readonly class="form-control" placeholder="NIP Maintainer ..." value="<?= $_SESSION['nim']?>" required="">
								</div>
								<div class="form-group">
									<label>ID_barang</label>
									<input type="hidden" name="id_barang" class="form-control" value="<?php echo $d['id_barang'] ?>" readonly>
								</div>
								<div class="form-group">
									<label>Nama Barang</label>
										<input type="text" name="nama_barang" class="form-control" value="<?php echo $d['nama_barang'] ?>" readonly>
								</div>
								<div class="form-group">
									<label>Maintainer</label>
									<input type="text"  readonly class="form-control" placeholder="NIP Maintainer ..." value="<?php echo $d['nama_lengkap'] ?>" readonly>
								</div>
								<div class="form-group">
									<label>Stok</label>
										<input type="number" name="qty" class="form-control" min="1" max ="<?php echo $d['qty_total'] ?>" value="1" required="">
								</div>
								<div class="form-group">
									<label>Tanggal peminjaman</label>
									<input type="date" name="tgl_pinjam"  class="form-control" placeholder required="">
								</div>
								<div class="form-group">
									<label>Tanggal pengembalian</label>
									<input type="date" name="tgl_kembali"  class="form-control" placeholder required="">
								</div>
								<div class="form-group">
									<label>Status</label>
									<input type="text" name="status"  class="form-control" value="Pending" placeholder readonly>
								</div>
							</div>
								<div class="modal-footer no-bd">
									<button type="submit" name="simpan" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
									<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
								</div>
						</form>
				</div>
			</div>
		</div>
	<?php } ?>

	<!-- fungsi agar button detail menampilkan data berdasarkan id_barangnya  -->
	<script>
    	function openPinjamModal(id_barang) {
        $(`#modalPinjamBarang${id_barang}`).modal('show');
    	}

    // Mendapatkan tanggal saat ini
    var today = new Date();

    // Mendapatkan semua elemen input dengan name "tgl_pinjam"
    var tglPinjamInputs = document.getElementsByName("tgl_pinjam");
    // Mengatur nilai minimum pada semua elemen input "tgl_pinjam" menjadi tanggal hari ini
    for (var i = 0; i < tglPinjamInputs.length; i++) {
        tglPinjamInputs[i].min = today.toISOString().split('T')[0];
    }

    // Mendapatkan semua elemen input dengan name "tgl_kembali"
    var tglKembaliInputs = document.getElementsByName("tgl_kembali");
    // Mengatur nilai minimum pada semua elemen input "tgl_kembali" menjadi tanggal hari ini
    for (var i = 0; i < tglKembaliInputs.length; i++) {
        tglKembaliInputs[i].min = today.toISOString().split('T')[0];
    }

	</script>