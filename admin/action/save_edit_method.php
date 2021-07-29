<?php
    include "../../lib/koneksi.php";
    $id = $_POST['id_method'];
    $method = validasi($_POST['method']);
    $payment = validasi($_POST['payment']);

    function validasi($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($method=="") {
        header("Location:../edit_method.php?id_method=$id&err=1");
    }elseif($payment==""){
        header("Location:../edit_method.php?id_method=$id&err=2");
    }else{
        $cekdata    = mysqli_num_rows (mysqli_query($koneksi,"SELECT * FROM method WHERE nama_method ='$method' AND payment = '$payment'"));
        if ($cekdata > 0 ) {
            header("Location:../edit_method.php?id_method=$id&err=3");
        }else{
            $dml = "UPDATE method SET nama_method='$method', payment='$payment' WHERE id_method ='$id'";
            $querySimpan = mysqli_query($koneksi,$dml) or die ($koneksi);
            if ($querySimpan) {
                header("Location:../edit_method.php?id_method=$id&err=ok");
            }else{
                header("Location:../edit_method.php?id_method=$id&err=4");
            }
        }
       
    }
    
    
?>

