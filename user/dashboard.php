<!-- koneksi -->
	<?php
		include('../koneksi.php');
		$query = mysqli_query($conn,'SELECT count(*) as barang from barang');
		$row = mysqli_fetch_array($query);
		$r = mysqli_query($conn,'SELECT count(*) as pinjambarang from pinjam_barang');
		$d = mysqli_fetch_array($r);
	?>
<!-- Panel Utama -->
	<div class="main-panel">
		<div class="content">
			<div class="page-inner">
				<div class="row">
		<!-- logo data barang -->
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-briefcase"></i>
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
		<!-- logo data peminjaman di acc -->
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<?php
									$nim = $_SESSION['nim'];
									$query = "SELECT count(*) id_peminjaman FROM pinjam_barang WHERE nim = '$nim' AND status = 'di acc'";
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
											<p class="card-category">Peminjaman Di ACC</p>
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
		<!-- logo data peminjaman pending -->
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<?php
									$nim = $_SESSION['nim'];
									$query = "SELECT count(*) id_peminjaman FROM pinjam_barang WHERE nim = '$nim' AND status = 'pending'";
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
										// Handle the case when the query fails
										echo "Error: " . mysqli_error($conn);
									}
								?>
							</div>
						</div>
					</div>
		<!-- logo data peminjaman di tolak -->
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<?php
									$nim = $_SESSION['nim'];
									$query = "SELECT count(*) id_peminjaman FROM pinjam_barang WHERE nim = '$nim' AND status = 'di tolak'";
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
											<p class="card-category">Peminjaman Di Tolak</p>
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
		<!-- logo data total barang yang dipinjam -->
					<div class="col-sm-6 col-md-3">
						<div class="card card-stats card-round">
							<div class="card-body ">
								<?php
									$nim = $_SESSION['nim'];
									$query = "SELECT count(*) id_peminjaman FROM pinjam_barang WHERE nim = '$nim'";
									$result = mysqli_query($conn, $query);
									if ($result) {
										$data = mysqli_fetch_assoc($result);
										$pinjambarang = $data['id_peminjaman'];
								?>
								<div class="row align-items-center">
									<div class="col-icon">
										<div class="icon-big text-center icon-primary bubble-shadow-small">
											<i class="fas fa-newspaper"></i>
										</div>
									</div>
									<div class="col col-stats ml-3 ml-sm-0">
										<div class="numbers">
											<p class="card-category">Pinjam Barang</p>
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
	</div>