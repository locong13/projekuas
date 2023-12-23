    <?php  
      $id     = $_GET['id'];
      $tampil = mysqli_query($koneksi, "SELECT * FROM masyarakat WHERE id_masyarakat='$id'");
      $data   = mysqli_fetch_array($tampil);
    ?>

    <div class="alert alert-light" role="alert">
      <h2 align="center">Hapus Data masyarakat</h2>
      <form method="POST">
        <div class="form-group">
          <div class="alert alert-danger" role="alert">
          <h6>Yakin Akan Menghapus Data masyarakat <b><?php echo $data['nama_masyarakat'] ?></b> ?</h6>
          <input type="hidden" name="id_masyarakat" value="<?php echo $id ?>" required class="form-control">
          <input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
          <a href="index.php?hal=masyarakat" class="btn btn-secondary">Batal</a>
          </div>
        </div>
      </form>
    </div>

    <?php
      if(isset($_POST['hapus'])){ //proses hapus data masyarakat
        $id_masyarakat   = $_POST['id_masyarakat'];

        $ubah = mysqli_query($koneksi, 'DELETE FROM masyarakat WHERE id_masyarakat="'.$id_masyarakat.'"');
        if ($ubah){
          echo '
            <script>
              alert("Berhasil Menghapus Data masyarakat");
              window.location="index.php?hal=masyarakat"; //menuju ke halaman masyarakat
            </script>
          ';
        }
      }
    ?>