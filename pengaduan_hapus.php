    <?php  
      $id     = $_GET['id'];
      $tampil = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
      $data   = mysqli_fetch_array($tampil);
    ?>

    <div class="alert alert-light" role="alert">
      <h2 align="center">Hapus Data Buku</h2>
      <form method="POST">
        <div class="form-group">
          <div class="alert alert-danger" role="alert">
          <h6>Yakin Akan Menghapus Data Buku <b><?php echo $data['judul_buku'] ?></b> ?</h6>
          <input type="hidden" name="id_buku" value="<?php echo $id ?>" required class="form-control">
          <input type="submit" name="hapus" class="btn btn-primary" value="Hapus">
          <a href="index.php?hal=buku" class="btn btn-secondary">Batal</a>
          </div>
        </div>
      </form>
    </div>

    <?php
      if(isset($_POST['hapus'])){ //proses simpan perubahan data penerbit
        $id_buku   = $_POST['id_buku'];

        $ubah = mysqli_query($koneksi, 'DELETE FROM buku WHERE id_buku="'.$id_buku.'"');
        if ($ubah){
          echo '
            <script>
              alert("Berhasil Menghapus Data Buku");
              window.location="index.php?hal=buku"; //menuju ke halaman buku
            </script>
          ';
        }
      }
    ?>