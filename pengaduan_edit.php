    <?php  
      $id      = $_GET['id'];
      $tampil2 = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku='$id'");
      $data2   = mysqli_fetch_array($tampil2);
    ?>

    <div class="alert alert-light" role="alert">
      <h2 align="center">Form Ubah Data Buku</h2>
      <form method="POST">
         <div class="form-group">
          <label for="exampleFormControlSelect1">Nama Penerbit</label>
            <select name="id_penerbit" class="form-control" id="exampleFormControlSelect1">
              <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM penerbit");
              while($data=mysqli_fetch_array($tampil)){
                if($data['id_penerbit']==$data2['id_penerbit'])
                {
                  echo '<option selected="selected" value="'.$data[id_penerbit].'">'.$data[nama_penerbit].'</option>';
                } else {
                  echo '<option value="'.$data[id_penerbit].'">'.$data[nama_penerbit].'</option>';
                }        
              }?>
            </select>
        </div>
        <div class="form-group">
          <input type="hidden" name="id_buku" value="<?php echo $id ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ID Buku">
          <label for="exampleInputEmail1">Judul Buku</label>
          <input type="text" name="judul_buku" value="<?php echo $data2['judul_buku'] ?>" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Buku">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Jumlah</label>
          <input type="number" name="jumlah" value="<?php echo $data2['jumlah'] ?>" required class="form-control" id="exampleInputPassword1" placeholder="Jumlah Buku">
        </div>
        
        <input type="submit" name="ubah" class="btn btn-primary" value="Simpan Perubahan">
        <a href="index.php?hal=buku" class="btn btn-secondary">Batal</a>
      </form>
    </div>

    <?php
      if(isset($_POST['ubah'])){ //proses simpan perubahan data penerbit
        $id_buku     = $_POST['id_buku'];
        $id_penerbit = $_POST['id_penerbit'];
        $judul_buku  = $_POST['judul_buku'];
        $jumlah      = $_POST['jumlah'];

        $ubah = mysqli_query($koneksi, 'UPDATE buku SET id_penerbit="'.$id_penerbit.'",judul_buku="'.$judul_buku.'",jumlah="'.$jumlah.'" WHERE id_buku="'.$id_buku.'"');
        if ($ubah){
          echo '
            <script>
              alert("Berhasil Mengubah Data Buku");
              window.location="index.php?hal=buku"; //menuju ke halaman buku
            </script>
          ';
        }
      }
    ?>