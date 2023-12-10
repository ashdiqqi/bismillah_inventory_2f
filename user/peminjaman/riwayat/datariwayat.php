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
									<form action="" method="get" style="display:inline;" onclick="openDetailModal(<?php echo $barang['id_barang']; ?>)">
											<input type="hidden" name="id" value="<?php echo $barang['id_barang']; ?>">
											<button type="button" class="info-button">Detail</button>
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
<!-- form detail  barang -->	
	<?php 
		$p = mysqli_query($conn, 'SELECT * from pinjam_barang 
		INNER JOIN admin ON pinjam_barang.nip = admin.nip
		INNER JOIN barang ON pinjam_barang.id_barang = barang.id_barang;');
		while($d = mysqli_fetch_array($p)) {
	?>
		<div class="modal fade" id="modalDetailBarang<?php echo $d['id_barang']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    		<div class="modal-dialog" role="document">
        		<div class="modal-content">
            		<div class="modal-header no-bd">
                		<h5 class="modal-title">
                   			<span class="fw-mediumbold">Detail</span>
                    		<span class="fw-light">Peminjaman</span>
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
							<label>Stok</label>
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
    	function openDetailModal(id_barang) {
        $(`#modalDetailBarang${id_barang}`).modal('show');
    	}
	</script>