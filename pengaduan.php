  <h2 align="center">Data pengaduan</h2>

  <form action="index.php?hal=pengaduan" method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inlineFormInputName">Name</label>
      <input type="text" name="caripeng" class="form-control" id="inlineFormInputName" placeholder="Pencarian Judul pengaduan">
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-success">Cari pengaduan</button>
    </div>
    <div class="col-sm-3 my-1">
      <a href="index.php?hal=pengtambah" class="btn btn-primary">Tambah pengaduan</a>
    </div>
  </div>
  </form>

      <?php 
      if(isset($_GET['caripeng'])){
      $cari = $_GET['caripeng'];
      echo "<b>Hasil pencarian : ".$cari."</b>";
      }
      ?>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID pengaduan</th>
            <th scope="col">Judul pengaduan</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Nama Penerbit</th>
            <th scope="col">Tahun</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php
          if(isset($_GET['caripeng'])){
            $cari = $_GET['caripeng'];
            $tampil = mysqli_query($koneksi,"SELECT * FROM viewrelasi WHERE judul_pengaduan LIKE '%".$cari."%' ORDER BY id_pengaduan DESC");
          }else{
            $tampil = mysqli_query($koneksi,"SELECT * FROM viewrelasi ORDER BY id_pengaduan DESC");
          }
          while ($data = mysqli_fetch_array($tampil)){
        ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $data['id_pengaduan']; ?></th>
            <td><?php echo $data['judul_pengaduan']; ?></td>
            <td><?php echo $data['jumlah']; ?></td>
            <td><?php echo $data['nama_penerbit']; ?></td>
            <td><?php echo $data['tahun']; ?></td>
            <td>
              <?php
              echo'
                <a href="index.php?hal=pengedit&id='.$data['id_pengaduan'].'" class="btn btn-warning">Edit</a>
                <a href="index.php?hal=penghapus&id='.$data['id_pengaduan'].'" class="btn btn-danger">Hapus</a>
              ';?>
            </td>
          </tr>
        </tbody>
        <?php
          }
        ?>
      </table>