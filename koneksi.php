<?php
    $host   = "sql309.epizy.com";
    $user   = "epiz_26777485";
    $psw    = "N5CtCQabwZny33";
    $db_name= "epiz_26777485_pabw";
    $kon = mysqli_connect($host,$user,$psw,$db_name);

    if (!$kon){
        die ('gagal terhubung dengan database:'.mysqli_connect_error());
    }

?>