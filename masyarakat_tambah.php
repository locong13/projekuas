    <div class="alert alert-light" role="alert">
      <h2 align="center">Form Tambah Data Penerbit</h2>
      <form method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Penerbit</label>
          <input type="text" name="nama_penerbit" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Penerbit">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Tahun</label>
          <input type="number" name="tahun" required class="form-control" id="exampleInputPassword1" placeholder="Tahun Penerbit">
        </div>
        
        <input type="submit" name="simpan" class="btn btn-primary" value="Simpan">
        <a href="index.php?hal=penerbit" class="btn btn-secondary">Batal</a>
      </form>
    </div>

    <?php
      if(isset($_POST['simpan'])){ //proses simpan data penerbit
        $nama_penerbit = $_POST['nama_penerbit'];
        $tahun = $_POST['tahun'];

        $simpan = mysqli_query($koneksi, 'INSERT INTO penerbit(nama_penerbit,tahun) VALUES ("'.$nama_penerbit.'","'.$tahun.'")');
        if ($simpan){
          echo '
            <script>
              alert("Berhasil Menambah Data Penerbit");
              window.location="index.php?hal=penerbit"; //menuju ke halaman penerbit
            </script>
          ';
        }
      }
    ?>