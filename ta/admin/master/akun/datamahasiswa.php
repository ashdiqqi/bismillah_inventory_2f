<!-- Panel utama data mahasiswa -->
	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
<!-- form tampil data mahasiswa -->
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<div class="d-flex align-items-center">
						<h4 class="page-title">Data Mahasiswa</h4>
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#modalAddmahasiswa">
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
                                <th>NIM</th>
								<th>Nama Mahasiswa</th>
								<th>Kelas</th>
								<th>Email</th>
								<th>Password</th>
								<th>No Telepon</th>
                                <th>Foto</th>
								<th>Action</th>
							</tr>
						</thead>		
					<tbody>
						<?php
							$no = 1;
							$query = mysqli_query($conn, 'SELECT * from user;');
							while ($user = mysqli_fetch_array($query)) {
						?>
						<tr>
							<td><?php echo $no++ ?></td>
							<td><?php echo $user['nim'] ?></td>
							<td><?php echo $user['nama_lengkap'] ?></td>
							<td><?php echo $user['kelas'] ?></td>
							<td><?php echo $user['email']?></td>
                            <td><?php echo $user['password']?></td>
                            <td><?php echo $user['no_hp']?></td>
							<td><img src="../assets/img/imgmahasiswa/<?php echo $user['foto_mahasiswa']; ?>" alt="Foto mahasiswa" style="max-width: 100px; max-height: 100px;"></td>
							<td>
								<form action="" method="get" style="display:inline;" onclick="openEditModal(<?php echo $user['nim']; ?>)">
									<input type="hidden" name="id" value="<?php echo $user['nim']; ?>">
									<button type="button" class="warning-button">Edit</button>
								</form>
								<form action="" method="get" style="display:inline;" onclick="openHapusModal(<?php echo $user['nim']; ?>)">
									<input type="hidden" name="id" value="<?php echo $user['nim']; ?>">
									<button type="button" class="alert-button">Hapus</button>
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
<!-- form tambah data mahasiswa -->
	<div class="modal fade" id="modalAddmahasiswa" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Mahasiswa Baru</span>
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="master/akun/tambahmahasiswa.php">
					<div class="modal-body">
						<div class="form-group">
							<label>NIM</label>
							<input type="text" name="nim" class="form-control" placeholder="NIM Mahasiswa..." required="" >
						</div>
						<div class="form-group">
							<label>Nama Mahasiswa</label>
							<input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Mahasiswa..." required="">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input type="email" name="email" class="form-control" placeholder="Email..." required="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="text" name="password" class="form-control" placeholder="Password..." required="">
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input type="text" name="no_hp" class="form-control" placeholder="No telepon..." required="">
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<input type="text" name="kelas" class="form-control" placeholder="kelas..." required="">
						</div>
						<div class="form-group">
							<label>Foto</label>
							<input type="file" name="foto_mahasiswa"  class="form-control" placeholder required="">
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
<!-- form edit data mahasiswa -->	
	<?php 
		$p = mysqli_query($conn, 'SELECT * FROM user');
		while($d = mysqli_fetch_array($p)) {
	?>
		<div class="modal fade" id="modalEditmahasiswa<?php echo $d['nim']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
    		<div class="modal-dialog" role="document">
        		<div class="modal-content">
            		<div class="modal-header no-bd">
                		<h5 class="modal-title">
                   			<span class="fw-mediumbold">Edit Mahasiswa</span>
                		</h5>
                		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    		<span aria-hidden="true">&times;</span>
                		</button>
            		</div>
            	<form method="POST" enctype="multipart/form-data" action="master/akun/editmahasiswa.php">
					<div class="modal-body">
						<div class="form-group">
							<label>NIM</label>
							<input value="<?php echo $d['nim'] ?>" type="text" name="nim" class="form-control" placeholder="NIM Mahasiswa..." required="">
							<input value="<?php echo $d['nim'] ?>" type="hidden" name="nim_OLD" class="form-control" placeholder="NIM Mahasiswa..." required="">
						</div>
						<div class="form-group">
							<label>Nama Mahasiswa</label>
							<input value="<?php echo $d['nama_lengkap'] ?>" type="text" name="nama_lengkap" class="form-control" placeholder="Nama Mahasiswa..." required="">
						</div>
						<div class="form-group">
							<label>Kelas</label>
							<input value="<?php echo $d['kelas'] ?>" type="text" name="kelas" class="form-control" placeholder="Kelas Mahasiswa..." required="">
						</div>
						<div class="form-group">
							<label>Email</label>
							<input value="<?php echo $d['email'] ?>" type="email" name="email" class="form-control" placeholder="Email..." required="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input value="<?php echo $d['password'] ?>" type="text" name="password" class="form-control" placeholder="Password..." required="">
						</div>
						<div class="form-group">
							<label>No Telepon</label>
							<input value="<?php echo $d['no_hp'] ?>" type="text" name="no_hp" class="form-control" placeholder="No Telepon..." required="">
						</div>
						<div class="form-group">
							<label>Foto</label>
							<img src="../assets/img/imgmahasiswa/<?php echo $d['foto_mahasiswa']; ?>" alt="Foto mahasiswa" style="max-width: 100px; max-height: 100px;">
							<input type="file" name="foto_mahasiswa" class="form-control" placeholder="Pilih gambar...">
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
    	function openEditModal(nim) {
        $(`#modalEditmahasiswa${nim}`).modal('show');
    	}
	</script>

<!-- form hapus mahasiswa -->
	<?php 
		$c = mysqli_query($conn, 'SELECT * FROM user;');
		while($row = mysqli_fetch_array($c)) {
	?>
	<div class="modal fade" id="modalHapusmahasiswa<?php echo $row['nim']; ?>" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header no-bd">
					<h5 class="modal-title">
						<span class="fw-mediumbold">Hapus Mahasiswa</span> 
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="POST" enctype="multipart/form-data" action="master/akun/hapusmahasiswa.php">
					<div class="modal-body">
						<input type="hidden" name="nim" value="<?php echo $row['nim'] ?>">
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
    	function openHapusModal(nim) {
        $(`#modalHapusmahasiswa${nim}`).modal('show');
    	}
	</script>