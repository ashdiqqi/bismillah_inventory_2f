<?php
include '../koneksi.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Peminjaman Inventaris JTI</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../assets/img/icon.ico" type="image/x-icon" />

	<!-- Fonts and icons -->
	<script src="../assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {
				"families": ["Open+Sans:300,400,600,700"]
			},
			custom: {
				"families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"],
				urls: ['../assets/css/fonts.css']
			},
			active: function () {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/azzara.min.css">
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../assets/css/demo.css">
</head>

<body>
	<div class="wrapper">
		<!--
				Tip 1: You can change the background color of the main header using: data-background-color="blue | purple | light-blue | green | orange | red"
		-->
		<div class="main-header" data-background-color="blue">
			<!-- Logo Header -->
			<div class="logo-header">

				<a href="#" class="logo">
					<img src="../assets/img/.svg" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse"
					data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="fa fa-bars"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="fa fa-ellipsis-v"></i></button>
				<div class="navbar-minimize">
					<button class="btn btn-minimize btn-rounded">
						<i class="fa fa-bars"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
				</div>
			</nav>
			<!-- End Navbar -->
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
							<a href="?view=riwayat">
								<i class="fas fa-history"></i>
								<p>Riwayat</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="?view=akun">
								<i class="fas fa-user"></i>
								<p>Akun Saya</p>
							</a>
						</li>

						<li class="nav-item">
							<a href="../logout.php">
								<i class="fas fa-power-off"></i>
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

		// Data Pinjam Barang
		
		?>
		<!-- End Custom template -->

	</div>
	<script>
		$(document).ready(function () {
			$('#add-row').DataTable({});
		});
	</script>

</body>

</html>