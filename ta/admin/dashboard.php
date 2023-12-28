<!-- koneksi -->
	<?php
		include('../koneksi.php');
		$query = mysqli_query($conn,'SELECT count(*) as barang from barang');
		$row = mysqli_fetch_array($query);
		$r = mysqli_query($conn,'SELECT count(*) as user from user');
		$d = mysqli_fetch_array($r);
	?>
<!-- Panel Utama -->
<div class="main-panel">
	<div class="content">
		<div class="page-inner">
			<div class="page-header">
				<h4 class="page-title">SELAMAT DATANG</h4>
			</div>
		<div class="row">
		<!-- logo data barang -->
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-box"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Data Barang</p>
									<h4 class="card-title"><?php echo $row['barang'] ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- logo data peminjaman -->
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<?php
							$nip = $_SESSION['nip'];
							$query = "SELECT count(*) id_peminjaman FROM pinjam_barang WHERE nip = '$nip'";
							$result = mysqli_query($conn, $query);
							if ($result) {
								$data = mysqli_fetch_assoc($result);
								$pinjambarang = $data['id_peminjaman'];
						?>
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-list"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Data Peminjaman</p>
                       				<h4 class="card-title"><?php echo $pinjambarang; ?></h4>
                   				</div>
							</div>
						</div>
						<?php
							} else {
								echo "Error: " . mysqli_error($conn);
							}
						?>
					</div>
				</div>
			</div>
		<!-- logo data user -->
			<div class="col-sm-6 col-md-3">
				<div class="card card-stats card-round">
					<div class="card-body ">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-users"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-category">Data User</p>
									<h4 class="card-title"><?php echo $d['user'] ?></h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<!-- logo data email -->
			<div class="col-sm-6 col-md-3">
					<a href="https://mail.google.com/mail/u/1/#drafts" target="_blank">
				<div class="card card-stats card-round">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col-icon">
								<div class="icon-big text-center icon-primary bubble-shadow-small">
									<i class="fas fa-envelope-open"></i>
								</div>
							</div>
							<div class="col col-stats ml-3 ml-sm-0">
								<div class="numbers">
									<p class="card-title">Pesan</p>
								</div>
							</div>
						</div>
					</div>
				</div>
					</a>
			</div>	
		<!-- logo data peminjaman di acc -->
			<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<?php
									$nip = $_SESSION['nip'];
									$query = "SELECT count(*) id_peminjaman FROM pinjam_barang WHERE nip = '$nip' AND status = 'Diterima'";
									$result = mysqli_query($conn, $query);
									if ($result) {
										$data = mysqli_fetch_assoc($result);
										$pinjambarang = $data['id_peminjaman'];
								?>
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-clipboard-check"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Peminjaman Diterima</p>
                            				<h4 class="card-title"><?php echo $pinjambarang; ?></h4>
                        				</div>
									</div>
								</div>
								<?php
									} else {
										echo "Error: " . mysqli_error($conn);
									}
								?>
							</div>
						</div>
					</div>
		<!-- logo data peminjaman Pending -->
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<?php
									$nip = $_SESSION['nip'];
									$query = "SELECT count(*) id_peminjaman FROM pinjam_barang WHERE nip = '$nip' AND status = 'Menunggu'";
									$result = mysqli_query($conn, $query);
									if ($result) {
										$data = mysqli_fetch_assoc($result);
										$pinjambarang = $data['id_peminjaman'];
								?>
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-clock"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Peminjaman Pending</p>
                            				<h4 class="card-title"><?php echo $pinjambarang; ?></h4>
                        				</div>
									</div>
								</div>
								<?php
									} else {
										echo "Error: " . mysqli_error($conn);
									}
								?>
							</div>
						</div>
					</div>
		<!-- logo data peminjaman Selesai -->
			<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<?php
									$nip = $_SESSION['nip'];
									$query = "SELECT COUNT(*) as id_peminjaman 
									FROM pinjam_barang 
									WHERE nip = '$nip' AND (status = 'Ditolak' OR status = 'Selesai');
									";
									$result = mysqli_query($conn, $query);
									if ($result) {
										$data = mysqli_fetch_assoc($result);
										$pinjambarang = $data['id_peminjaman'];
								?>
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-times-circle"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Peminjaman Selesai</p>
                            				<h4 class="card-title"><?php echo $pinjambarang; ?></h4>
                        				</div>
									</div>
								</div>
								<?php
									} else {
										// Handle the case when the query fails
										echo "Error: " . mysqli_error($conn);
									}
								?>
							</div>
						</div>
					</div>
		</div>
	</div>
</div>