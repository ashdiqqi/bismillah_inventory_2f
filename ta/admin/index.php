<!-- koneksi dan session -->
	<?php
		include '../koneksi.php';
		session_start();
		$sessionNIP = isset($_SESSION['nip']) ? $_SESSION['nip'] : null;
	?>
<!-- HTML Panel -->
	<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta http-equiv="X-UA-Compatible" content="IE=edge" />
				<title>Inventory Admin</title>
				<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
				<link rel="icon" href="../assets/img/minilogo.png" type="image/x-icon"/>
				<!-- Fonts and icons -->
				<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
				<script>
					WebFont.load({
						google: {"families":["Open+Sans:300,400,600,700"]},
						custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
						active: function() {
							sessionStorage.fonts = true;
						}
					});
				</script>
				<!-- CSS Files -->
				<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
				<link rel="stylesheet" href="../assets/css/azzara.min.css">
				<link rel="stylesheet" href="../assets/css/style.css">
			</head>
			<body>
				<!-- logo, navbar, header -->
				<div class="wrapper">
					<div class="main-header" data-background-color="purple">
						<div class="logo-header">
    						<a href="#" class="logo">
								<img width="30" height="30" src="../assets/img/minilogo.png" alt="logo"><img src="../assets/img/newlogo.svg" alt="navbar brand" class="navbar-brand">
    						</a>
							<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon">
									<i class="fa fa-bars"></i>
								</span>
							</button>
							<div class="navbar-minimize">
								<button class="btn btn-minimize btn-rounded">
									<i class="fa fa-bars"></i>
								</button>
							</div>
						</div>
					</div>
				<!-- Sidebar -->
				<div class="sidebar">
					<div class="sidebar-wrapper scrollbar-inner">
						<div class="sidebar-content">
							<ul class="nav">
								<li class="nav-item">
									<a href="?view=dashboard">
										<i class="fas fa-home"></i>
										<p>Dashboard</p>
									</a>
								</li>
								<li class="nav-section">
									<span class="sidebar-mini-icon">
										<i class="fa fa-ellipsis-h"></i>
									</span>
								</li>
								<li class="nav-item">
									<a data-toggle="collapse" href="#base">
										<i class="fas fa-layer-group"></i>
										<p>Data Master</p>
										<span class="caret"></span>
									</a>
									<div class="collapse" id="base">
										<ul class="nav nav-collapse">
											<li>
												<a href="?view=databarang">
													<i class="fas fa-box"></i>
													<p>Barang</p>
												</a>
											</li>
											<li>
												<a href="?view=datamahasiswa">
													<i class="fas fa-users"></i>
													<p>Mahasiswa</p>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="nav-item">
									<a href="?view=datapinjambarang">
										<i class="fas fa-list"></i>
										<p>Peminjaman Barang</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="../logout.php">
										<i class="fas fa-lock"></i>
										<p>Logout</p>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
					<?php
						// Dashboard
						if(@$_GET['view']== '')
							include 'dashboard.php';
						elseif($_GET['view']=='dashboard')
							include 'dashboard.php';
						// Data Barang
						elseif($_GET['view']=='databarang')
							include 'master/barang/databarang.php';
						// Data Mahasiswa
						elseif($_GET['view']=='datamahasiswa')
							include 'master/akun/datamahasiswa.php';
						// Data Peminjaman
						elseif($_GET['view']=='datapinjambarang')
							include 'peminjaman/datapinjambarang.php';
					?>
				</div>
				<!--   JS Files   -->
				<script src="../assets/js/core/jquery.3.2.1.min.js"></script>
				<script src="../assets/js/core/popper.min.js"></script>
				<script src="../assets/js/core/bootstrap.min.js"></script>
				<!-- jQuery UI -->
				<script src="../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
				<script src="../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
				<!-- Bootstrap Toggle -->
				<script src="../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
				<!-- jQuery Scrollbar -->
				<script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
				<!-- Datatables -->
				<script src="../assets/js/plugin/datatables/datatables.min.js"></script>
				<!-- Azzara JS -->
				<script src="../assets/js/ready.min.js"></script>
				<!-- Azzara DEMO methods, don't include it in your project! -->
				<script src="../assets/js/setting-demo.js"></script>
				<script >
					$(document).ready(function() {
						$('#add-row').DataTable({
						});
					});
				</script>
			</body>
	</html>