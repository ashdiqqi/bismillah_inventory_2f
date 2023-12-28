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
									<th>Nama Barang</th>
									<th>Qty</th>
									<th>Tanggal Peminjaman</th>
									<th>Tanggal Kembali</th>
									<th>Status</th>
									<th>Action</th>
								</tr>
							</thead>		
							<tbody>
								<?php
									$no = 1;
									$nim = $_SESSION['nim'];
									$query = mysqli_query($conn, "SELECT * FROM pinjam_barang 
									INNER JOIN admin ON pinjam_barang.nip = admin.nip 
									INNER JOIN barang ON pinjam_barang.id_barang = barang.id_barang 
									WHERE pinjam_barang.nim = '$nim'");

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
										<?php if ($barang['status'] == 'Menunggu') { ?>
											<form action="" method="get" style="display:inline;" onclick="openDetailModal(<?php echo $barang['id_peminjaman']; ?>)">
												<input type="hidden" name="id" value="<?php echo $barang['id_peminjaman']; ?>">
												<button type="button" class="info-button">Detail</button>
											</form>
											<form action="hapus_peminjaman.php" method="post" style="display:inline;" onclick="openHapusModal(<?php echo $barang['id_peminjaman']; ?>)">
												<input type="hidden" name="id" value="<?php echo $barang['id_peminjaman']; ?>">
												<button type="button" class="alert-button">Hapus</button>
											</form>
										<?php } else { ?>
											<form action="" method="get" style="display:inline;" onclick="openDetailModal(<?php echo $barang['id_peminjaman']; ?>)">
												<input type="hidden" name="id" value="<?php echo $barang['id_peminjaman']; ?>">
												<button type="button" class="info-button">Detail</button>
											</form>
										<?php } ?>
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
<!-- form detail  barang -->	
	<?php 
		$p = mysqli_query($conn, 'SELECT * from pinjam_barang INNER JOIN admin ON pinjam_barang.nip = admin.nip INNER JOIN barang ON pinjam_barang.id_barang = barang.id_barang;');
		while($d = mysqli_fetch_array($p)) {
	?>
	<div class="modal fade" id="modalDetailBarang<?php echo $d['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    	<div class="modal-dialog" role="document">
    		<div class="modal-content">
        		<div class="modal-header no-bd">
					<h5 class="modal-title">
                		<span class="fw-mediumbold">Detail Peminjaman</span>
            		</h5>
            		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                		<span aria-hidden="true">&times;</span>                		
					</button>
            	</div>
            	<form method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label>Nama Barang</label>
							<input value="<?php echo $d['nama_barang'] ?>" type="text" name="nama_barang" class="form-control" placeholder="Nama Barang..." readonly>
						</div>
						<div class="form-group">
							<label>Maintainer</label>
							<input value="<?php echo $d['nama_lengkap'] ?>" type="text" name="maintainer" class="form-control" placeholder="NIP Maintainer..." readonly>
						</div>
						<div class="form-group">
							<label>Qty</label>
							<input value="<?php echo $d['qty'] ?>" type="number" name="qty_total" class="form-control" placeholder="Stok..." readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Peminjaman</label>
							<input value="<?php echo $d['tgl_pinjam'] ?>" type="date" name="qty_total" class="form-control" placeholder="Stok..." readonly>
						</div>
						<div class="form-group">
							<label>Tanggal Kembali</label>
							<input value="<?php echo $d['tgl_kembali'] ?>" type="date" name="qty_total" class="form-control" placeholder="Stok..." readonly>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<img src="../assets/img/imgbarang/<?php echo $d['foto_barang']; ?>" alt="Foto produk" style="max-width: 100px; max-height: 100px;">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<input value="<?php echo $d['deskripsi'] ?>" type="text" name="maintainer" class="form-control" placeholder="NIP Maintainer..." readonly>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- fungsi agar button detail menampilkan data berdasarkan id_barangnya  -->
	<script>
    	function openDetailModal(id_peminjaman) {
        $(`#modalDetailBarang${id_peminjaman}`).modal('show');
    	}
	</script>
<!-- form hapus peminjaman -->
<?php 
		$c = mysqli_query($conn, 'SELECT * FROM pinjam_barang INNER JOIN admin ON pinjam_barang.nip = admin.nip INNER JOIN barang ON pinjam_barang.id_barang = barang.id_barang;');
		while($row = mysqli_fetch_array($c)) {
	?>
	<div class="modal fade" id="modalHapusBarang<?php echo $row['id_peminjaman']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Hapus Barang</span> 
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="peminjaman/riwayat/hapusriwayat.php">
					<div class="modal-body">
						<input type="hidden" name="id_peminjaman" value="<?php echo $row['id_peminjaman']; ?>">
						<h4>Apakah anda yakin ingin menghapus peminjaman ini ?</h4>
					</div>
					<div class="modal-footer no-bd">
						<button type="submit" name="hapus" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</button>
						<button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- fungsi agar button menghapus data berdasarkan id_barangnya  -->
	<script>
    	function openHapusModal(id_peminjaman) {
        	$(`#modalHapusBarang${id_peminjaman}`).modal('show');
    	}
	</script>