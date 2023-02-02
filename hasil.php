<?php
      require_once "dbconfig.php";
			// Cek status login user 
			if (!$user->isLoggedIn()) {
			header("location: login.php"); //Redirect ke halaman login 
  		}
  		$currentUser = $user->getUser();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>SNBT | HASIL</title>
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
    <!-- NILAI PENALARAN MATEMATIKA -->
		<?php
            include "koneksi.php";
            	$score1   = 0;
						  $score2   = 0;
						  $score3   = 0;
						  $score4   = 0;
						  $score5   = 0;
						  $score6   = 0;
						  $score7   = 0;
						  $benar1   = 0;
						  $benar2   = 0;
						  $benar3   = 0;
						  $benar4   = 0;
						  $benar5   = 0;
						  $benar6   = 0;
						  $benar7   = 0;
						  $salah    = 0;
						  $hasil    = 0;
						  $error = "";
						  $sukses = "";
                  if(isset($_POST['next'])){
                    if(empty($_POST['pilihan'])){
                      $_POST["pilihan"] = "";
                  ?>
                  
                      <!-- <script language="JavaScript">
                          alert('Oops! Serius. Anda tidak mengerjakan soal apapun ...');
                          document.location='./';
                      </script> -->
                  <?php
                  }
                  $pilihan    =$_POST["pilihan"];
                  $id_soal    =$_POST["id"];
                  $jumlah     =$_POST["jumlah"];

                  for($i=0;$i<$jumlah;$i++){
                      $nomor    =$id_soal[$i];
                      
                      // jika peserta tidak memilih jawaban
                      if(empty($pilihan[$nomor])){
                          $salah++;
                      }
                      // jika memilih
                      else {
                          $jawaban  = $pilihan[$nomor];
                          // cocokan kunci jawaban dengan database
                          $query1  = mysqli_query($koneksi, "SELECT * FROM penalaran_matematika WHERE id='$nomor' AND jawaban='$jawaban' and bobot=20");
                          $cek1    =mysqli_num_rows($query1);
                          // bobot 20
                          if($cek1){
                            $benar1++;
                          }
                          else {
                              $salah++;
                          }

                          $query2  = mysqli_query($koneksi, "SELECT * FROM penalaran_matematika WHERE id='$nomor' AND jawaban='$jawaban' and bobot=30");
                          $cek2    =mysqli_num_rows($query2);
                          
                          // bobot 30
                          if($cek2){
                            $benar2++;
                          }
                          else {
                              $salah++;
                          }

                          $query3  = mysqli_query($koneksi, "SELECT * FROM penalaran_matematika WHERE id='$nomor' AND jawaban='$jawaban' and bobot=40");
                          $cek3    =mysqli_num_rows($query3);
                          
                          // bobot 40
                          if($cek3){
                            $benar3++;
                          }
                          else {
                              $salah++;
                          }

                          $query4  = mysqli_query($koneksi, "SELECT * FROM penalaran_matematika WHERE id='$nomor' AND jawaban='$jawaban' and bobot=50");
                          $cek4    =mysqli_num_rows($query4);
                          
                          // bobot 50
                          if($cek4){
                            $benar4++;
                          }
                          else {
                              $salah++;
                          }

                          $query5  = mysqli_query($koneksi, "SELECT * FROM penalaran_matematika WHERE id='$nomor' AND jawaban='$jawaban' and bobot=60");
                          $cek5    =mysqli_num_rows($query5);
                          
                          // bobot 60
                          if($cek5){
                            $benar5++;
                          }
                          else {
                              $salah++;
                          }

                          $query6  = mysqli_query($koneksi, "SELECT * FROM penalaran_matematika WHERE id='$nomor' AND jawaban='$jawaban' and bobot=70");
                          $cek6    =mysqli_num_rows($query6);
                          
                          // bobot 70
                          if($cek6){
                            $benar6++;
                          }
                          else {
                              $salah++;
                          }

                          $query7  = mysqli_query($koneksi, "SELECT * FROM penalaran_matematika WHERE id='$nomor' AND jawaban='$jawaban' and bobot=80");
                          $cek7    =mysqli_num_rows($query7);
                          
                          // bobot 80
                          if($cek7){
                            $benar7++;
                          }
                          else {
                              $salah++;
                          }

                          
                      }
                      $score1 = $benar1 * 20; 
                      $score2 = $benar2 * 30; 
                      $score3 = $benar3 * 40;
                      $score4 = $benar4 * 50;
                      $score5 = $benar5 * 60;
                      $score6 = $benar6 * 70;
                      $score7 = $benar7 * 80;
                      
                      $hasil = $score1 + $score2 + $score3 + $score4 + $score5 + $score6 + $score7; 

                      $id = $currentUser['id'];
                      $update = "update user set penalaran_matematika = '$hasil' where id = '$id'";
                      $sql    = mysqli_query($koneksi, $update);

                      

                      // if ($sql) {
                      //   $sukses = "Data berhasil diupdate";
                      //   } else {
                      //   $error  = "Data gagal diupdate";
                      // }
                    
                  }
              }
						$id = $currentUser['id'];
						
						$query = mysqli_query($koneksi, "SELECT * FROM user where id='$id'");
						$data = mysqli_fetch_array($query);
      ?>	
			<div align="center">
		  <!-- <div
			class="position-absolute top-50 start-50 translate-middle bg-dark rounded text-light p-3"
		  > -->
      <div
			class=" bg-warning rounded p-3 m-3"
		  >
      <p><b>Hasil Tryout UTBK-SNBT</b></p>
			<p><b>Nama : <?php echo $data['nama'] ?></b></p>
			<table class="table">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Subtes</th>
						<th scope="col">Score</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<th scope="row">1</th>
						<td>Kemampuan Penalaran Umum</td>
						<td><?php echo $data['penalaran_umum'] ?>/1030</td>
					</tr>
					<tr>
						<th scope="row">2</th>
						<td>Pengetahuan & Pemahaman Umum</td>
						<td><?php echo $data['pengetahuan_pemahaman'] ?>/1000</td>
					</tr>
					<tr>
						<th scope="row">3</th>
						<td>Kemampuan Memahami Bacaan & Menulis</td>
						<td><?php echo $data['memahami_bacaan_menulis'] ?>/1000</td>
					</tr>
					<tr>
						<th scope="row">4</th>
						<td>Pengetahuan Kuantitatif</td>
						<td><?php echo $data['pengetahuan_kuantitatif'] ?>/860</td>
					</tr>
					<tr>
						<th scope="row">5</th>
						<td>Literasi dalam Bahasa Indonesia</td>
						<td><?php echo $data['literasi_indonesia'] ?>/900</td>
					</tr>
					<tr>
						<th scope="row">6</th>
						<td>Literasi dalam Bahasa Inggris</td>
						<td><?php echo $data['literasi_inggris'] ?>/950</td>
					</tr>
					<tr>
						<th scope="row">7</th>
						<td>Penalaran Matematika</td>
						<td><?php echo $data['penalaran_matematika'] ?>/1070</td>
					</tr>
				</tbody>
			</table>
      </div>
      <a href="index.php" class="btn btn-dark text-light mb-3">Home</a>
		</div>

    <script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
			crossorigin="anonymous"
		></script>
		
	</body>
</html>
