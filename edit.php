<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Mengedit Data</title>
  </head>
  <body 
  style="margin: 10px; background-image: url('background.jpg'); 
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%; ">
  
    <?php
        include "koneksi.php";
        $id = $_GET['id'];
        $query_mysqli = mysqli_query($kon,"SELECT * FROM mahasiswa WHERE id='$id'") or die(mysqli_error(''));
        while($row = mysqli_fetch_assoc($query_mysqli)){
        $dataor = explode(',',$row['olahraga']);
    ?>
  <div class = "card" style="margin-left: 400px; margin-right:400px;">
    <div class = "card-header">
      <h3 class="card-title" style="text-align: center; padding-bottom:40px;">Form Edit Data</h3>
    </div>
    <div class = "card-body">

    <form action="aksi_edit.php" method="POST" enctype="multipart/form-data" >
      <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      <div class="form-group">
        <label for="exampleFormControlInput1">NIM</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nim"  value="<?php echo $row['nim'] ?>">
      </div>

      <div class="form-group">
        <label for="exampleFormControlInput1">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama"  value="<?php echo $row['nama'] ?>">
      </div>
    
      <label for="exampleFormControlInput1">Jenis Kelamin</label>
      <br>
      <label><input type="radio"  name="jk" value="Laki - laki" <?php if($row['jk']=='Laki - laki') echo 'checked'?>>&nbsp;Laki - laki</label> 
      <label><input type="radio"  name="jk" value="Perempuan" <?php if($row['jk']=='Perempuan') echo 'checked'?>>&nbsp;Perempuan</label>

     
      <br>
      <div class="form-group">
        <label for="exampleFormControlSelect1">Agama</label>
        <select class="form-control" id="exampleFormControlSelect1" name="agama">
          <option value="Islam" <?php if($row['agama'] == 'Islam') {echo "selected";}?>>Islam</option>
          <option value="Kristen" <?php if($row['agama'] == 'Kristen') {echo "selected";}?>>Kristen</option>
          <option value="Budha" <?php if($row['agama'] == 'Budha') {echo "selected";}?>>Budha</option>
          <option value="Hindu" <?php if($row['agama'] == 'Hindu') {echo "selected";}?>>Hindu</option>
          <option value="Kong Hu Cu" <?php if($row['agama'] == 'Kong Hu Cu') {echo "selected";}?>>Kong Hu Cu</option>
        </select>
      </div>
      <br>
      <label for="exampleFormControlInput1">Hobi</label>
      <div class="form-check">
         <label><input type="checkbox"  name="olahraga[]" value="Sepak Bola" 
         <?php if (in_array("Sepak Bola", $dataor)) echo "checked";?>>&nbsp;Sepak Bola</label><br>

         <label><input type="checkbox"  name="olahraga[]" value="Bola Basket" 
         <?php if (in_array("Bola Basket", $dataor)) echo "checked";?> >&nbsp;Bola Basket</label><br>

         <label><input type="checkbox"  name="olahraga[]" value="Balap Mobil" 
         <?php if (in_array("Balap Mobil", $dataor)) echo "checked";?>>&nbsp;Balap Mobil</label><br>

         <label><input type="checkbox"  name="olahraga[]" value="Tenis" 
         <?php if (in_array("Tenis", $dataor)) echo "checked";?>>&nbsp;Tenis</label><br>

         <label><input type="checkbox"  name="olahraga[]" value="Esport" 
         <?php if (in_array("Esport", $dataor)) echo "checked";?>>&nbsp;Esport</label><br>
      </div>
   
      <br>
      <div class="form-group row">
          <label for="inputFoto" class="col-sm-2 col-form-label">Foto Lama</label>
          <div class="col-sm-10">
            <img width='200px' src='images/<?php echo $row['foto']; ?>'>
          </div>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Upload Foto</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
      </div> 
        <br>
        <button type="submit" name="submit" class="btn btn-success">Submit</button>
        <a href="index.php" ><button type="button" class="btn btn-light">Kembali</button></a>
        
      </div>
    </form>
        <?php } ?>
  </div>


    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</div>
</body>
</html>