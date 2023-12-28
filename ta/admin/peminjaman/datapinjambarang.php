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
						<table id="add-row" class="display table table-striped table-hover" >
							<thead>
								<tr>
									<th>No</th>
									<th>Nama Peminjam</th>
									<th>Barang</th>
									<th>Qty</th>
									<th>Tanggal Pinjam</th>
									<th>Tanggal Kembali</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>		
							<tbody>
								<?php
									$no = 1;
									$nip = $_SESSION['nip'];
									$query = mysqli_query($conn, "SELECT * FROM pinjam_barang INNER JOIN user ON pinjam_barang.nim = user.nim
									INNER JOIN barang ON pinjam_barang.id_barang = barang.id_barang WHERE pinjam_barang.nip = '$nip'");
									while ($barang = mysqli_fetch_array($query)) {
								?>
								<tr>
									<td><?php echo $no++ ?></td>
									<td><?php echo $barang['nama_lengkap'] ?></td>
									<td><?php echo $barang['nama_barang'] ?></td>
									<td><?php echo $barang['qty'] ?></td>
									<td><?php echo $barang['tgl_pinjam'] ?></td>
									<td><?php echo $barang['tgl_kembali'] ?></td>
									<td><?php echo $barang['status'] ?></td>
									<td>
										<?php if ($barang['status'] == 'Menunggu') : ?>
										<!-- Tombol untuk menunggu -->
											<form action="" method="get" style="display:inline;" onclick="openAccModal(<?php echo $barang['id_peminjaman'];?>)">
												<input type="hidden" name="id" value="<?php echo $barang['id_peminjaman']; ?>">
												<button type="button" class="success-button">Terima</button>
											</form>
											<form action="" method="get" style="display:inline;" onclick="openTolakModal(<?php echo $barang['id_peminjaman'];?>)">
												<input type="hidden" name="id" value="<?php echo $barang['id_peminjaman']; ?>">
												<button type="button" class="alert-button">Tolak</button>
											</form>
										<?php elseif ($barang['status'] == 'Diterima') : ?>
										<!-- Tombol untuk diterima -->
											<form action="" method="get" style="display:inline;" onclick="openKembaliModal(<?php echo $barang['id_peminjaman'];?>)">
												<input type="hidden" name="id" value="<?php echo $barang['id_peminjaman']; ?>">
												<button type="button" class="info-button">Kembali</button>
											</form>
										<?php endif; ?>
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
<!-- form ACC peminjaman -->
	<?php 
		$c = mysqli_query($conn, 'SELECT * FROM pinjam_barang INNER JOIN barang ON pinjam_barang.id_barang = barang.id_barang');
		while($row = mysqli_fetch_array($c)) {
	?>
	<div class="modal fade" id="modalACCPinjam<?php echo $row['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Menyetujui Peminjaman</span> 
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="peminjaman/accpinjam.php">
					<div class="modal-body">
						<input type="hidden" name="id_peminjaman" value="<?php echo $row['id_peminjaman'] ?>">
						<input type="hidden" name="qty" value="<?php echo $row['qty'] ?>">
						<input type="hidden" name="id_barang" value="<?php echo $row['id_barang'] ?>">
						<input type="hidden" name="qty_tersedia" value="<?php echo $row['qty_tersedia'] ?>">
						<h4>Apakah Anda Ingin Menyetujui Peminjaman Barang Ini ?</h4>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="save" class="success-button"> Save</button>
						<button type="button" class="alert-button" data-dismiss="modal"> Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- fungsi agar button menghapus data berdasarkan id_peminjaman  -->
	<script>
    	function openAccModal(id_peminjaman) {
        	$(`#modalACCPinjam${id_peminjaman}`).modal('show');
    	}
	</script>
<!-- form Tolak peminjaman -->
	<?php 
		$c = mysqli_query($conn, 'SELECT * FROM pinjam_barang');
		while($row = mysqli_fetch_array($c)) {
	?>
	<div class="modal fade" id="modalTolakPinjam<?php echo $row['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Menolak Peminjaman</span> 
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="peminjaman/tolakpinjam.php">
					<div class="modal-body">
						<input type="hidden" name="id_peminjaman" value="<?php echo $row['id_peminjaman'] ?>">
						<h4>Apakah Anda Ingin Menolak Peminjaman Barang Ini ?</h4>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="save" class="success-button"> Save</button>
						<button type="button" class="alert-button" data-dismiss="modal"> Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- fungsi agar button menghapus data berdasarkan id_peminjaman  -->
	<script>
    	function openTolakModal(id_peminjaman) {
        	$(`#modalTolakPinjam${id_peminjaman}`).modal('show');
    	}
	</script>
<!-- form kembali peminjaman -->
	<?php 
		$c = mysqli_query($conn, 'SELECT * FROM pinjam_barang INNER JOIN barang ON pinjam_barang.id_barang = barang.id_barang');
		while($row = mysqli_fetch_array($c)) {
	?>
	<div class="modal fade" id="modalKembaliPinjam<?php echo $row['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Mengakhiri Peminjaman</span> 
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="peminjaman/kembalipinjam.php">
					<div class="modal-body">
						<input type="hidden" name="id_peminjaman" value="<?php echo $row['id_peminjaman'] ?>">
						<input type="hidden" name="qty" value="<?php echo $row['qty'] ?>">
						<input type="hidden" name="id_barang" value="<?php echo $row['id_barang'] ?>">
						<input type="hidden" name="qty_tersedia" value="<?php echo $row['qty_tersedia'] ?>">
						<h4>Apakah Anda Ingin Mengakhiri Peminjaman Barang Ini ?</h4>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="save" class="success-button"> Save</button>
						<button type="button" class="alert-button" data-dismiss="modal"> Cancel</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- fungsi agar button menghapus data berdasarkan id_peminjaman  -->
	<script>
    	function openKembaliModal(id_peminjaman) {
        	$(`#modalKembaliPinjam${id_peminjaman}`).modal('show');
    	}
	</script>