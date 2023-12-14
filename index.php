<?php
session_start();
include 'dbconnect.php';

if(isset($_SESSION['role'])){
	header("location:stock");
}

if(isset($_GET['pesan'])){
		if($_GET['pesan'] == "gagal"){
			echo "Username atau Password salah!";
		}else if($_GET['pesan'] == "logout"){
			echo "Anda berhasil keluar dari sistem";
		}else if($_GET['pesan'] == "belum_login"){
			echo "Anda harus Login";
		}else if($_GET['pesan'] == "noaccess"){
			echo "Akses Ditutup";
	}
}


if(isset($_POST['btn-login']))
{
 $uname = mysqli_real_escape_string($conn,$_POST['username']);
 $upass = mysqli_real_escape_string($conn,md5($_POST['password']));

 // menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($conn,"select * from slogin where username='$uname' and password='$upass';");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
 if($data['role']=="stock"){
		// buat session login dan username
		$_SESSION['user'] = $data['nickname'];
		$_SESSION['user_login'] = $data['username'];
		$_SESSION['id'] = $data['id'];
		$_SESSION['role'] = "stock";
		header("location:stock");

 }
 else
 {
  header("location:index.php?pesan=gagal");
 	  }
    }
  }
?>



<!--  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  Global site tag (gtag.js) - Google Analytics
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-144808195-1"></script>

    <script src="jquery.min.js"></script>
  
  <link rel="icon"  type="image/png" href="favicon.png"> -->

<!-- 
  <body>
  
  <div align="center">
  <img src="logo_pt_dak.png" width="50%" style="margin-top:5%" \>

	<br \><br \>
			<div class="container">
					<div style="color:white">
					<label>Login</label><br \>
					</div>
                <form method="post">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Username" name="username" autofocus>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary" name="btn-login">Masuk</button>
			
                </form>
			
			<br \>
        </div></div>
  </body> -->
<!DOCTYPE html>
<html lang="en">
  <!-- <head> -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | PT DAK</title>

  </head>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="stock/assets/images/icon/icon.png" rel="icon">
  <link href="stock/assets/images/icon/icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="stock/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="stock/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="stock/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="stock/assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="stock/assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="stock/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="stock/assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="stock/assets/css/style.css" rel="stylesheet">

</head>


<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="d-flex justify-content-center py-4">
                <a href="index.html" class="logo d-flex align-items-center w-auto">
                  <img src="stock/assets/images/ptdak.png">
                  <!-- <span class="d-none d-lg-block">IT Support</span> -->
                </a>
              </div><!-- End Logo -->

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" novalidate method="post">

                    <div class="col-12">
                      <label for="yourUsername" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="username" class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                    </div>

                    <div class="col-12">
                      <!-- <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div> -->
                    </div>
                    <div class="col-12">
                      <button class="btn btn-primary w-100" type="submit" name="btn-login">Login</button>
                    </div>
                    <!-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="register/register.php/">Create an account</a></p>
                    </div> -->
                  </form>

                </div>
              </div>

              <div class="credits">
               
                SDM & IT  <a href="https://instagram.com/rimajlnti?igshid=NGVhN2U2NjQ0Yg==">PT DAK</a>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="stock/assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="stock/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="stock/assets/vendor/chart.js/chart.umd.js"></script>
  <script src="stock/assets/vendor/echarts/echarts.min.js"></script>
  <script src="stock/assets/vendor/quill/quill.min.js"></script>
  <script src="stock/assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="stock/assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="stock/assets/vendor/php-email-form/validate.js"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'UA-144808195-1');
	</script>
  <!-- Template Main JS File -->
  <script src="stock/assets/js/main.js"></script>

</body>

</html>