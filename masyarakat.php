  <h2 align="center">Data masyarakat</h2>
      
  <form action="index.php?hal=masyarakat&" method="get">
  <div class="form-row align-items-center">
    <div class="col-sm-3 my-1">
      <label class="sr-only" for="inlineFormInputName">Name</label>
      <input type="text" name="carimas" class="form-control" id="inlineFormInputName" placeholder="Pencarian Nama masyarakat">
    </div>
    <div class="col-auto my-1">
      <button type="submit" class="btn btn-success">Cari masyarakat</button>
    </div>
    <div class="col-sm-3 my-1">
      <a href="index.php?hal=mastambah" class="btn btn-primary">Tambah masyarakat</a>
    </div>
  </div>
  </form>

  <?php 
      if(isset($_GET['carimas'])){
      $cari = $_GET['carimas'];
      echo "<b>Hasil pencarian : ".$cari."</b>";
      }
      ?>

      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID masyarakat</th>
            <th scope="col">Nama masyarakat</th>
            <th scope="col">alamat</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php
          if(isset($_GET['carimas'])){
            $cari = $_GET['carimas'];
            $tampil = mysqli_query($koneksi,"SELECT * FROM masyarakat WHERE nama_masyarakat like '%".$cari."%'");       
          }else{
            $tampil = mysqli_query($koneksi,"SELECT * FROM masyarakat ORDER BY nama_masyarakat");
          }
          while ($data = mysqli_fetch_array($tampil)){
        ?>
        <tbody>
          <tr>
            <th scope="row"><?php echo $data['id_masyarakat']; ?></th>
            <td><?php echo $data['nama_masyarakat']; ?></td>
            <td><?php echo $data['alamat']; ?></td>
            <td><?php echo $data['email']; ?></td>
            <td><?php echo $data['password']; ?></td>
            <td>
              <?php
              echo'
                <a href="index.php?hal=masedit&id='.$data['id_masyarakat'].'" class="btn btn-warning">Edit</a>
                <a href="index.php?hal=mashapus&id='.$data['id_masyarakat'].'" class="btn btn-danger">Hapus</a>
              ';?>
            </td>
          </tr>
        </tbody>
        <?php
          }
        ?>
      </table>