<!DOCTYPE html>
<?php

  // Lampirkan dbconfig 

  require_once "dbconfig.php";

  // Cek status login user 

  if (!$user->isLoggedIn()) {

    header("location: login.php"); //Redirect ke halaman login 

  }
  // Ambil data user saat ini 
  $currentUser = $user->getUser();
?>

<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>MULAI SNBT</title>
		<link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="assets/styles/style.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
	</head>
	<body>
<nav class="navbar navbar-expand-lg bg-dark navbar-dark">
			<div class="container-fluid">
				<b class="navbar-brand p-2 text-secondary" href="#">
						<img
							src="assets/img/tes.jpeg"
							alt="Logo"
							width="40"
							height="35"
							class="d-inline-block rounded"
						/>
						RanuPrima<b class="teks text-warning">College</b></b
					>
				<button
					class="navbar-toggler"
					type="button"
					data-bs-toggle="collapse"
					data-bs-target="#navbarSupportedContent"
					aria-controls="navbarSupportedContent"
					aria-expanded="false"
					aria-label="Toggle navigation"
				>
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" href="mulai_snbt.php">SNBT</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="mulai_cat.php">CAT</a>
						</li>
					</ul>
					<ul class="navbar-nav ms-auto">
						<li class="nav-item dropdown">
							<a
								class="nav-link dropdown-toggle"
								href="#"
								role="button"
								data-bs-toggle="dropdown"
								aria-expanded="false"
								><i class="bi bi-person-circle"></i> <?php echo $currentUser['nama']?>
							</a>
							<ul class="dropdown-menu">
								<li>
									<hr class="dropdown-divider" />
								</li>
								<li>
									<form action="logout.php" method="POST">
										<button type="submit" class="dropdown-item">
											<i class="bi bi-box-arrow-right"></i> Logout
										</button>
									</form>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</nav>
		<div
			class="mx-4 mt-3 text-center"
		  >
		<p align="center"><b>Rincian Subtes UTBK-SNBT </b></p>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Subtes</th>
						<th scope="col">Jumlah Soal</th>
						<th scope="col">Waktu Pengerjaan</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Kemampuan Penalaran Umum</td>
						<td>30</td>
						<td>30 Menit</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>Pengetahuan & Pemahaman Umum</td>
						<td>20</td>
						<td>15 Menit</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>Kemampuan Memahami Bacaan & Menulis</td>
						<td>20</td>
						<td>25 Menit</td>
					</tr>
					<tr>
						<th scope="row">4</th>
						<td>Pengetahuan Kuantitatif</td>
						<td>20</td>
						<td>20 Menit</td>
					</tr>
					<tr>
						<th scope="row">5</th>
						<td>Literasi dalam Bahasa Indonesia</td>
						<td>30</td>
						<td>45 Menit</td>
					</tr>
					<tr>
						<th scope="row">6</th>
						<td>Literasi dalam Bahasa Inggris</td>
						<td>20</td>
						<td>30 Menit</td>
					</tr>
					<tr>
						<th scope="row">7</th>
						<td>Penalaran Matematika</td>
						<td>20</td>
						<td>30 Menit</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- <div class="mt-4 text-center">
			<p>Kerjakan Soal Tryout dengan jujur, bersungguh-sungguh, dan tepat waktu.</p>
			<b>Good Luck!</b>
		</div> -->
	<div class="p-2 text-center">
    <form action="penalaran_umum.php" method="get">
			<input class="btn btn-warning text-light text-center" type="submit" value="MULAI">
		</form>
	</div>
		<script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
			crossorigin="anonymous"
		></script>
		<script src="assets/scripts/script.js"></script>
	</body>
</html>
