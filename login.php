<?php
session_start();
if (isset($_SESSION['sesi']) && $_SESSION['sesi']=='admin'){
	header("location:index.php");
}else{
	include("koneksi.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Pengaduan Masyarakat</title>
  </head>
  <body>
  <section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
  <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
      <div class="card shadow-2-strong" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <h3 class="mb-5">Halaman Login</h3>
			<form method="post">
            <div class="form-outline mb-4">
              <input type="email" name="email" id="typeEmailX-2" placeholder="Email" class="form-control form-control-lg" />
            </div>

            <div class="form-outline mb-4">
              <input type="password" name="password" id="typePasswordX-2" placeholder="Password" class="form-control form-control-lg" />
            </div>

            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Login</button>
            </form>
            <hr class="my-4">

           

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php 
if (isset($_POST['submit'])) {
	$email    	= $_POST['email'];
	$password 	= $_POST['password'];
    $agent 		= @$_SERVER['HTTP_USER_AGENT'];
    $ip 		= @$_SERVER['REMOTE_ADDR'];
    $date 		= Date("Y-m-d H:i:s");

    $login       = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE email='". $email."' AND password='".$password."'  LIMIT 1");
	$data        = mysqli_fetch_array($login);
	
	if($login){
		$_SESSION['sesi']='admin';
		$_SESSION['id_masyarakat']=$data['id_masyarakat'];
        $id_masyarakat = $_SESSION['id_masyarakat'];

        function log_activity($id_masyarakat,$agent,$ip,$date , $koneksi){
            $sql = "INSERT INTO log_activity(id_masyarakat,agent,ip,waktu) VALUES ('$id_masyarakat','$agent','$ip' ,'$date')";
            mysqli_query($koneksi,$sql);
        }
        log_activity($id_masyarakat,$agent,$ip,$date,$koneksi);


		echo '
		   <script>
		        alert("Anda Berhasil Login dan Menuju ke Halaman Utama");
		        window.location = "index.php";
		   </script>
		';
      }else{
      	  echo '
      	    <script>
      	         alert("Maaf Email atau Password tidak sesuai!");
      	         window.location = "index.php";
      	    </script>
      	  ';
      }
} 
?>

</html>

<?php }?>