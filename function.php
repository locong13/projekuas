<?php
// prosedur menampilkan menu
function menu(){
?>
 	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <img src="media/Logo.png" height="40" width="40">
      <a class="navbar-brand" href="index.php"><i>App pengaduan_masyarakat</i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Beranda <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?hal=masyarakat">masyarakat</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
<?php
}

//procedure untuk menampilkan halaman beranda
function beranda(){
?>
	<div class="alert alert-light" role="alert">
    
     
        
      <br><br><b><i>TUGAS UAS TOOL TI 2023</i></b>
  </div>
<?php
}

//prosedur untuk menampilka footer
function footer(){
?>
	<div class="alert alert-secondary" role="alert" align="center">
      CREATED BY RYAN!
    </div>
<?php
}
?>