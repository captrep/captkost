<?php
    include "../../lib/koneksi.php";
    $method = validasi($_POST['method']);
    $payment = validasi($_POST['payment']);

    function validasi($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($method=="") {
        header("Location:../add_method.php?err=1");
    }elseif($payment==""){
        header("Location:../add_method.php?err=2");
    }else{
        $cekdata    = mysqli_num_rows (mysqli_query($koneksi,"SELECT * FROM method WHERE nama_method ='$method' AND payment = '$payment'"));
        if ($cekdata > 0 ) {
            header("Location:../add_method.php?err=3");
        }else{
            $dml = "INSERT INTO method (nama_method,payment) VALUES ('$method','$payment')";
            $querySimpan = mysqli_query($koneksi,$dml) or die ($koneksi);
            if ($querySimpan) {
                header("Location:../add_method.php?err=ok");
            }else{
                header("Location:../add_method.php?err=4");
            }
        }
       
    }
    
    
?>

