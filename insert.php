<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <title>Tambah data mahasiswa</title>
</head>

<body 
style="margin: 10px; background-image: url('background.jpg'); background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%; ">
<div class = "card" style="margin-left: 400px; margin-right:400px;">
<div class = "card-header">
<h3 class="card-title" style="text-align: center; padding-bottom:40px;">Form tambah data baru</h3>    
</div>
<div class="card-body">


<form method="POST" enctype="multipart/form-data">


    <div class="form-group">
        <label for="exampleFormControlInput1">NIM</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nim" placeholder="J3C118053">
    </div>

    <div class="form-group">
        <label for="exampleFormControlInput1">Nama</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Bagus">
    </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Jenis Kelamin</label>
    <br>
    <label><input type="radio"  name="jk" value="Laki - laki">&nbsp; Laki - laki</label> 
    <label><input type="radio"  name="jk" value="Perempuan" >&nbsp; Perempuan</label>
    </div>
    <br>
   <div class="form-group">
    <label for="exampleFormControlSelect1">Agama</label>
    <select class="form-control" id="exampleFormControlSelect1" name="agama">
      <option value="Islam"> Islam</option>
      <option value="Kristen">Kristen</option>
      <option value="Budha">Budha</option>
      <option value="Hindu">Hindu</option>
      <option value="Kong Hu Cu">Kong Hu Cu</option>
    </select>
    </div>
   <br>
   <div class="form-group">
   <label for="exampleFormControlSelect1">Hobi</label>
    <div class="form-check">
         <label><input type="checkbox"  name="olahraga[]" value="Sepak Bola"> &nbsp;Sepak Bola</label><br>
         <label><input type="checkbox" name="olahraga[]" value="Bola Basket">&nbsp;Bola Basket</label><br>
         <label><input type="checkbox" name="olahraga[]" value="Balap Mobil">&nbsp;Balap Mobil</label><br>
         <label><input type="checkbox" name="olahraga[]" value="Tenis">&nbsp;Tenis</label><br>
         <label><input type="checkbox" name="olahraga[]" value="Esport">&nbsp;Esport</label><br>
    </div>
   </div>
   
    <br>
    <div class="form-group">
        <label for="exampleFormControlFile1">Upload Foto</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="foto">
    </div>


    <br>
    <button type="submit" name="submit" class="btn btn-success">Submit</button>
    <a href="index.php" ><button type="button" class="btn btn-light">Kembali</button></a>
    <?php
        
        if (isset($_POST['submit'])){
            include "koneksi.php";
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $jk = $_POST['jk'];
            $agama = $_POST['agama'];
            $olahraga = implode(",",$_POST['olahraga']);
            $foto = $_POST['foto'];
            
            
            // untuk upload foto
            $allow_format	= array('png','jpg', 'jpeg');
            $foto = $_FILES['foto']['name'];
            $x = explode('.', $foto);
            $format = strtolower(end($x));
            $file_tmp = $_FILES['foto']['tmp_name'];
      
            if(in_array($format, $allow_format) === true){
                move_uploaded_file($file_tmp, 'images/'.$foto);
                mysqli_query($kon," INSERT INTO `mahasiswa` (`nim`, `nama`, `jk`, `agama`, `olahraga`, `foto`) VALUES ('$nim','$nama','$jk','$agama','$olahraga','$foto')");
                header("location:index.php"); 
            }else{
                echo '<div class="alert alert-danger" role="alert">EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN</div>';
            }
        
            

               
    //echo '<META HTTP-EQUIV="Refresh" Content="0; URL=tampil_data.php">';
    //exit;
            
            };
            
    ?>

   
</form>
</div>
</div>
</body>
</html>