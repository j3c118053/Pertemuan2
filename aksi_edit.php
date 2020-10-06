<?php 
 
    include 'koneksi.php';
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jk = $_POST['jk'];
    $agama = $_POST['agama'];
    $olahraga = implode(",",$_POST['olahraga']);
    $foto = $_POST['foto'];


if(!empty($_FILES['foto']['name']))
    {
    $allow_format	= array('png','jpg', 'jpeg');
    $foto = $_FILES['foto']['name'];
    $x = explode('.', $foto);
    $format = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];

    if(in_array($format, $allow_format) === true){
        //hapus foto
        @unlink('images/'.$row['foto']);
        //upload foto baru
        move_uploaded_file($file_tmp, 'images/'.$foto);
        //update query
        mysqli_query($kon,"UPDATE `mahasiswa` SET `nim` = '$nim', `nama` = '$nama', `jk` = '$jk', `agama` = '$agama', `olahraga` = '$olahraga', `foto` = '$foto' WHERE `id` = ".$id);
        header('location: index.php');
    }else{
        echo '<div class="alert alert-danger" role="alert">EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN</div>';
    }
}else{
    mysqli_query($kon,"UPDATE `mahasiswa` SET `nim` = '$nim', `nama` = '$nama', `jk` = '$jk', `agama` = '$agama', `olahraga` = '$olahraga' WHERE `id` = ".$id);
    header('location: index.php');
}

?>  