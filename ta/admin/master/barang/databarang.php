<!-- Panel utama data barang -->
	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
<!-- form tampil data barang -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="page-title">Data Barang</h4>
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddBarang">
							<i class="fa fa-plus"></i>  Tambah Data
						</button>
					</div>
				</div>
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
								<th>Deskripsi</th>
								<th>Action</th>
							</tr>
						</thead>		
						<tbody>
							<?php
								$sessionNIP = $_SESSION['nip'];
								$no = 1;
								$query = mysqli_query($conn, 'SELECT * from barang INNER JOIN admin ON barang.maintainer = admin.nip;');
								while ($barang = mysqli_fetch_array($query)) {
								$maintainerNIP = $barang['maintainer'];
							?>
							<tr>
								<td><?php echo $no++ ?></td>
								<td><?php echo $barang['nama_barang'] ?></td>
								<td><?php echo $barang['nama_lengkap'] ?></td>
								<td><?php echo $barang['qty_tersedia'] . '/' . $barang['qty_total']; ?></td>
								<td><img src="../assets/img/imgbarang/<?php echo $barang['foto_barang']; ?>" alt="Foto produk" style="max-width: 100px; max-height: 100px;"></td>
								<td><?php echo $barang['deskripsi'] ?></td>
								<td>
									<?php if ($sessionNIP == $maintainerNIP) : ?>		
										<form action="" method="get" style="display:inline;" onclick="openEditModal(<?php echo $barang['id_barang']; ?>)">
											<input type="hidden" name="id" value="<?php echo $barang['id_barang']; ?>">
											<button type="button" class="warning-button">Edit</button>
										</form>
										<form action="" method="get" style="display:inline;" onclick="openHapusModal(<?php echo $barang['id_barang']; ?>)">
											<input type="hidden" name="id" value="<?php echo $barang['id_barang']; ?>">
											<button type="button" class="alert-button">Hapus</button>
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
<!-- form tambah data barang -->
	<div class="modal fade" id="modalAddBarang" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">New Barang</span> 
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="master/barang/tambahbarang.php">
					<div class="modal-body">
						<div class="form-group">
							<label>ID Barang</label>
								<?php
									$query = mysqli_query($conn, "SELECT MAX(id_barang) AS max_id FROM barang");
									$row = mysqli_fetch_assoc($query);
									$next_id = $row['max_id'] + 1;
								?>
							<input type="text" name="id_barang" class="form-control" value="<?php echo $next_id; ?>" readonly>
						</div>
						<div class="form-group">
							<label>Nama Barang</label>
							<input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang ..." required="">
						</div>
						<div class="form-group">
							<label>Maintainer</label>
							<input type="hidden" name="maintainer" readonly class="form-control" value="<?= $_SESSION['nip']?>">
							<input type="text"  readonly class="form-control" value="<?= $_SESSION['nama_lengkap']?>">
						</div>
						<div class="form-group">
							<label>Stok</label>
							<input type="number" name="qty_total" class="form-control" placeholder="Stok ..." required="">
						</div>
						<div class="form-group">
							<label>Deskripsi</label>
							<textarea placeholder="Deskripsi ..." class="form-control" rows="5" name="deskripsi" style="white-space: pre-line;" required=""></textarea>
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" name="foto_barang"  class="form-control" placeholder required="">
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
<!-- form edit data barang -->	
	<?php 
		$p = mysqli_query($conn, 'SELECT * FROM barang INNER JOIN admin ON barang.maintainer = admin.nip;');
		while($d = mysqli_fetch_array($p)) {
	?>
	<div class="modal fade" id="modalEditBarang<?php echo $d['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    	<div class="modal-dialog" role="document">
       		<div class="modal-content">
           		<div class="modal-header no-bd">
               		<h5 class="modal-title">
    	       			<span class="fw-mediumbold">Edit Barang</span>
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
						<input value="<?php echo $d['id_barang'] ?>" type="hidden" name="id_OLD" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Nama Barang</label>
						<input value="<?php echo $d['nama_barang'] ?>" type="text" name="nama_barang" class="form-control" placeholder="Nama Barang..." required="">
					</div>
					<div class="form-group">
						<label>Maintainer</label>
						<input type="hidden" name="maintainer" class="form-control" value="<?= $_SESSION['nip']?>" readonly>
						<input type="text" class="form-control" value="<?= $_SESSION['nama_lengkap']?>" readonly>
					</div>
					<div class="form-group">
						<label>Stok</label>
						<input value="<?php echo $d['qty_total'] ?>" type="number" min="0" name="qty_total_baru" class="form-control" placeholder="Stok..." required="">
						<input value="<?php echo $d['qty_total'] ?>" type="hidden" name="qty_OLD" class="form-control" readonly>
						<input value="<?php echo $d['qty_tersedia'] ?>" type="hidden" name="qtys_OLD" class="form-control" readonly>
					</div>
					<div class="form-group">
						<label>Deskripsi</label>
						<textarea class="form-control" placeholder="Deskripsi..." rows="5" name="deskripsi" style="white-space: pre-line;" required=""><?php echo $d['deskripsi'] ?></textarea>
					</div>
					<div class="form-group">
						<label>Foto</label>
						<img src="../assets/img/imgbarang/<?php echo $d['foto_barang']; ?>" alt="Foto produk" style="max-width: 100px; max-height: 100px;">
						<input type="file" name="foto_barang" class="form-control" placeholder="Pilih gambar...">
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" name="ubah" class="btn btn-primary"><i class="fa fa-save"></i> Save Changes</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-undo"></i> Close</button>
				</div>
			</form>
			</div>
		</div>
	</div>
	<?php } ?>
	<!-- fungsi agar button edit menampilkan data berdasarkan id_barangnya  -->
	<script>
    	function openEditModal(id_barang) {
        	$(`#modalEditBarang${id_barang}`).modal('show');
    	}
	</script>
<!-- form hapus barang -->
	<?php 
		$c = mysqli_query($conn, 'SELECT * FROM barang INNER JOIN admin ON barang.maintainer = admin.nip;');
		while($row = mysqli_fetch_array($c)) {
	?>
	<div class="modal fade" id="modalHapusBarang<?php echo $row['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
				<form method="POST" enctype="multipart/form-data" action="master/barang/hapusbarang.php">
					<div class="modal-body">
						<input type="hidden" name="id_barang" value="<?php echo $row['id_barang'] ?>">
						<h4>Apakah Anda Ingin Menghapus Data Ini ?</h4>
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
    	function openHapusModal(id_barang) {
        	$(`#modalHapusBarang${id_barang}`).modal('show');
    	}
	</script>