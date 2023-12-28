<!-- koneksi dan session -->
	<?php
		include '../koneksi.php';
		session_start();
		$r = mysqli_query($conn,'SELECT * from user');
		$d = mysqli_fetch_array($r);	
	?>
<!-- HTML Panel -->
	<!DOCTYPE html>
		<html lang="en">
			<head>
				<meta http-equiv="X-UA-Compatible" content="IE=edge" />
				<title>Inventory Mahasiswa</title>
				<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
				<link rel="icon" href="../assets/img/minilogo.png" type="image/x-icon"/>
				<!-- Fonts and icons -->
				<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
				<script>
					WebFont.load({
						google: {"families": ["Open+Sans:300,400,600,700"]},
						custom: {"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],urls: ['../assets/css/fonts.css']},
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
				<div class="wrapper" >
					<div class="main-header"style="background-color: #24327D;">
						<div class="logo-header" style="background-color: #1D2968;">
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
						<img width="50" height="50" src="../assets/img/imgmahasiswa/<?php echo $_SESSION['foto_mahasiswa'];?>" alt="User_Image" style="border-radius: 45%; position: absolute; top: 50%; right: 0; transform: translateY(-50%) translateX(-50%);">
						<!--	
							top: Menetapkan posisi vertikal 
    						right: Menetapkan posisi horizontal di tepi kanan 
    						transform: Menggunakan transformasi untuk memindahkan elemen
						-->
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
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a href="?view=datapinjambarang">
								<i class="fas fa-briefcase"></i>
								<p>Pinjam Barang</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?view=datariwayat">
								<i class="fas fa-clock"></i>
								<p>Riwayat</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="?view=akun">
								<i class="fas fa-user"></i>
								<p>Akun</p>
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
				if (@$_GET['view'] == '')
					include 'dashboard.php';
				elseif ($_GET['view'] == 'dashboard')
					include 'dashboard.php';
				// Tampilan Pinjam Barang
				elseif ($_GET['view'] == 'datapinjambarang')
					include 'peminjaman/barang/datapinjambarang.php';
				// Tampilan Riwayat
				elseif ($_GET['view'] == 'datariwayat')
					include 'peminjaman/riwayat/datariwayat.php';
				// Tampilan Akun
				elseif ($_GET['view'] == 'akun')
					include 'peminjaman/akun/datauser.php';
			?>
		</div>
		<!-- JS Files -->
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
		<script>
			$(document).ready(function() {
				$('#add-row').DataTable({});
			});
		</script>
	</body>
</html>