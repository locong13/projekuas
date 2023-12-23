    <?php  
      $id     = $_GET['id'];
      $tampil = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE id_masyarakat='$id'");
      $data   = mysqli_fetch_array($tampil);
    ?>

    <div class="alert alert-light" role="alert">
      <h2 align="center">Form Ubah Data masyarakat</h2>
      <form method="POST">
        <div class="form-group">
          <input type="hidden" name="id_masyarakat" value="<?php echo $id ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
          <label for="exampleInputEmail1">Nama masyarakat</label>
          <input type="text" name="nama_masyarakat" value="<?php echo $data['nama_masyarakat'] ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">alamat</label>
          <input type="number" name="alamat" value="<?php echo $data['alamat'] ?>" required class="form-control" id="exampleInputPassword1" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">email</label>
          <input type="number" name="email" value="<?php echo $data['email'] ?>" required class="form-control" id="exampleInputPassword1" placeholder="">
        </div>
        
        <input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
        <a href="index.php?hal=masyarakat" class="btn btn-secondary">Batal</a>
      </form>
    </div>

    <?php
      if(isset($_POST['ubah'])){ //proses simpan perubahan data masyarakat
        $id_masyarakat   = $_POST['id_masyarakat'];
        $nama_masyarakat = $_POST['nama_masyarakat'];
        $alamat       = $_POST['alamat'];
        $tahun         = $_POST['email'];
        $tahun         = $_POST['password'];

        $ubah = mysqli_query($koneksi, 'UPDATE masyarakat SET nama_masyarakat="'.$nama_masyarakat.'",alamat="'.$alamat.'",alamat="'.$alamat.'" WHERE id_masyarakat="'.$id_masyarakat.'"');
        if ($ubah){
          echo '
            <script>
              alert("Berhasil Mengubah Data masyarakat");
              window.location="index.php?hal=masyarakat"; //menuju ke halaman masyarakat
            </script>
          ';
        }
      }
    ?>