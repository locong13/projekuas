<?php
session_start();
if(!isset($_SESSION['sesi']) && $_SESSION['sesi']!='admin'){
  header("location:login.php");
  }else{
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
    <?php
      include("koneksi.php"); //memanggil file koneksi.php
      include("function.php"); //memanggil file function.php
      menu(); //memanggil prosedur menu
      
      if(isset($_GET['carimas '])){
        include("masyarakat.php");
      } else if(isset($_GET['caripeng'])){
        include("pengaduan.php");
      } else if(isset($_GET['hal'])){
        $hal=$_GET['hal'];
        if($hal=='masyarakat'){
          include("masyarakat.php");
        }else if($hal=='mastambah'){
          include("masyarakat_tambah.php");
        }else if($hal=='masedit'){
          include("masyarakat_edit.php");
        }else if($hal=='mashapus'){
          include("masyarakat_hapus.php");
        }else if($hal=='pengaduan'){
          include("pengaduan.php");
        }else if($hal=='pengtambah'){
          include("pengaduan_tambah.php");
        }else if($hal=='pengedit'){
          include("pengaduan_edit.php");
        }else if($hal=='penghapus'){
          include("pengaduan_hapus.php");
        }
      }else{
        beranda(); //memanggil prosedur beranda
      }

      footer(); //memanggil prosedur footer
    ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="bootstrap/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="bootstrap/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="bootstrap/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>

<?php }?>