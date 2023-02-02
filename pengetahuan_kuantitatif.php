<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<title>SNBT | PENGETAHUAN KUANTITATIF</title>
        <link
			href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
			rel="stylesheet"
			integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT"
			crossorigin="anonymous"
		/>
		<link rel="stylesheet" href="assets/styles/style.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
		<!-- Kita membutuhkan jquery, disini saya menggunakan langsung dari jquery.com, jquery ini bisa didownload dan ditaruh dilocal -->
		<script
			src="http://code.jquery.com/jquery-1.10.2.min.js"
			type="text/javascript"
		></script>

		<!-- Script Timer -->
		<script type="text/javascript">
			$(document).ready(function () {
				/** Membuat Waktu Mulai Hitung Mundur Dengan
				 * var detik = 0,
				 * var menit = 1,
				 * var jam = 1
				 */
				var detik = 0;
				var menit = 20;
				var jam = 0;

				/**
				 * Membuat function hitung() sebagai Penghitungan Waktu
				 */
				function hitung() {
					/** setTimout(hitung, 1000) digunakan untuk
					 * mengulang atau merefresh halaman selama 1000 (1 detik)
					 */
					setTimeout(hitung, 1000);

					/** Jika waktu kurang dari 10 menit maka Timer akan berubah menjadi warna merah */
					// if (menit < 1 && jam == 0) {
					// 	var peringatan = style="color:red";
					// }

					/** Menampilkan Waktu Timer pada Tag #Timer di HTML yang tersedia */
					$("#timer").html(
						// '<h6 align="right"' +
						// 	peringatan +
						// 	">Sisa waktu anda : &nbsp;&nbsp;&nbsp;" +
						// 	jam +
						// 	" jam : " +
						// 	menit +
						// 	" menit : " +
						// 	detik +
						// 	" detik</h6>"
							"Sisa waktu anda : &nbsp;&nbsp;&nbsp;" +
							jam +
							" jam : " +
							menit +
							" menit : " +
							detik +
							" detik"
					);

					/** Melakukan Hitung Mundur dengan Mengurangi variabel detik - 1 */
					detik--;

					/** Jika var detik < 0
					 * var detik akan dikembalikan ke 59
					 * Menit akan Berkurang 1
					 */
					if (detik < 0) {
						detik = 59;
						menit--;

						/** Jika menit < 0
						 * Maka menit akan dikembali ke 59
						 * Jam akan Berkurang 1
						 */
						if (menit < 0) {
							menit = 59;
							jam--;

							/** Jika var jam < 0
							 * clearInterval() Memberhentikan Interval dan submit secara otomatis
							 */
							if (jam < 0) {
								clearInterval();
								/** Variable yang digunakan untuk submit secara otomatis di Form */
								// var frmSoal = document.getElementById("frmSoal");
								var submitBtn = document.getElementById("submitBtn");
								submitBtn.click();

								// frmSoal.submit();
							}
						}
					}
				}
				/** Menjalankan Function Hitung Waktu Mundur */
				hitung();
			});
			// ]]>

		</script>
	</head>
	<body>
        <?php
      require_once "dbconfig.php";
			// Cek status login user 
			if (!$user->isLoggedIn()) {
			header("location: login.php"); //Redirect ke halaman login 
  		}
  		$currentUser = $user->getUser();

        ?>
				<p id="timer" align="right" class="text-light p-3 bg-dark fixed-top"></p>	
				<br>
        <br>
				<p align="center" class="mt-3"><b>PENGETAHUAN KUANTITATIF</b></p>

        <form action="literasi_indonesia.php" method="POST" id="frmSoal">
        <?php
            include "koneksi.php";
						// ORDER BY RAND() limit 15
            $query    = mysqli_query($koneksi, "SELECT * FROM pengetahuan_kuantitatif where terpilih=1 ORDER BY RAND()");
            $jumlah = mysqli_num_rows($query);
            $no = 0;
            while($data = mysqli_fetch_array($query)){
            $no++
            ?>
		
							<table border="0" class="m-3 p-2 bg-warning d-flex rounded">
        <tbody>    
                <input type="hidden" name="id[]" value="<?php echo $data['id']; ?>">
                <input type="hidden" name="jumlah" value="<?php echo $jumlah; ?>">
                <tr>
                    <td align="justify"><?php echo $no?>. <?php echo $data['soal'];?></td>
                    <td> </td>
                </tr>
                <?php
                    if(!empty($data['gambar'])){
                        echo "<tr><td><img src='assets/img/$data[gambar]' width='160' height='100'></td><td></td></tr>";
                    }
                ?>
                <tr>
                    <td align="justify"><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="A"> A. <?php echo $data['pilihan_a'];?></td>
                    <td> </td>
                </tr>
                <tr>
                    <td align="justify"><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="B"> B. <?php echo $data['pilihan_b'];?></td>
                    <td> </td>
                </tr>
                <tr>
                    <td align="justify"><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="C"> C. <?php echo $data['pilihan_c'];?></td>
                    <td> </td>
                </tr>
                <tr>
                    <td align="justify"><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="D"> D. <?php echo $data['pilihan_d'];?></td>
                    <td> </td>
                </tr>
                <tr>
                    <td align="justify"><input name="pilihan[<?php echo $data['id']?>]" type="radio" value="E"> E. <?php echo $data['pilihan_e'];?></td>
                    <td> </td>
                </tr>
								</tbody>
    </table>
		
                <div class="form-group">
				<input type="hidden" name="post_id" id="post_id" />
				<div id="autoSave"></div>
			    </div>
                <?php
                }
                  ?>
								<div align="center">
									<button class="btn btn-dark p-2 m-3" name="next" id='submitBtn' type="submit">Selanjutnya</button></td>  
								</div>
            </form>

						<!-- NILAI MEMAHAMI BACAAN MENULIS -->
						<?php
						  include "koneksi.php";

            	$score1   = 0;
						  $score2   = 0;
						  $benar1   = 0;
						  $benar2   = 0;
		
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
                          $query1  = mysqli_query($koneksi, "SELECT * FROM memahami_bacaan_menulis WHERE id='$nomor' AND jawaban='$jawaban' and bobot=40");
                          $cek1    =mysqli_num_rows($query1);
                          // bobot 40
                          if($cek1){
                            $benar1++;
                          }
                          else {
                              $salah++;
                          }

                          $query2  = mysqli_query($koneksi, "SELECT * FROM memahami_bacaan_menulis WHERE id='$nomor' AND jawaban='$jawaban' and bobot=60");
                          $cek2    =mysqli_num_rows($query2);
                          
                          // bobot 60
                          if($cek2){
                            $benar2++;
                          }
                          else {
                              $salah++;
                          }


                      }
                      $score1 = $benar1 * 40; 
                      $score2 = $benar2 * 60; 
                      
                      $hasil = $score1 + $score2; 

                      $id = $currentUser['id'];
                      $update = "update user set memahami_bacaan_menulis = '$hasil' where id = '$id'";
                      $sql    = mysqli_query($koneksi, $update);

                      

                      // if ($sql) {
                      //   $sukses = "Data berhasil diupdate";
                      //   } else {
                      //   $error  = "Data gagal diupdate";
                      // }
                    
                  }
              }
						?>

    <script
			src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
			crossorigin="anonymous"
		></script>
	</body>
</html>
