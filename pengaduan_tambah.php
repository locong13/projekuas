    <div class="alert alert-light" role="alert">
      <h2 align="center">Form Tambah Data Buku</h2>
      <form method="POST">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Nama Penerbit</label>
            <select name="id_penerbit" class="form-control" id="exampleFormControlSelect1">
              <?php
              $tampil = mysqli_query($koneksi, "SELECT * FROM penerbit");
              while($data=mysqli_fetch_array($tampil))
              {
              ?>
              <option value="<?php echo $data['id_penerbit'] ?>"><?php echo $data['nama_penerbit'] ?></option>
              <?php } ?>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Judul Buku</label>
          <input type="text" name="judul_buku" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Judul Buku">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Jumlah</label>
          <input type="number" name="jumlah" required class="form-control" id="exampleInputPassword1" placeholder="Jumlah Buku">
        </div>
        
        <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
        <a href="index.php?hal=buku" class="btn btn-secondary">Batal</a>
      </form>
    </div>

    <?php
      if(isset($_POST['simpan'])){ //proses simpan data penerbit
        $id_penerbit= $_POST['id_penerbit'];
        $judul_buku = $_POST['judul_buku'];
        $jumlah     = $_POST['jumlah'];

        $simpan = mysqli_query($koneksi, 'INSERT INTO buku(id_penerbit,judul_buku,jumlah) VALUES ("'.$id_penerbit.'","'.$judul_buku.'","'.$jumlah.'")');
        if ($simpan){
          echo '
            <script>
              alert("Berhasil Menambah Data Buku");
              window.location="index.php?hal=buku"; //menuju ke halaman buku
            </script>
          ';
        }
      }
    ?>