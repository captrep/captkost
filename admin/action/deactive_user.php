<?php
    include "../../lib/koneksi.php";

    function alert($kod){
        header("Location:../broadcast.php?err=$kod");
    }

    $id = $_GET['id_penghuni'];
    if (!empty($id)) {
        $querykamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE id_penghuni='$id'") or die(mysqli_error($koneksi));
        $kam = mysqli_fetch_assoc($querykamar) ;
        $idkam = $kam['id_kamar'];
        $deleteuser = mysqli_query($koneksi,"UPDATE PENGHUNI SET status='Deactivated' WHERE id_penghuni = '$id'");
        if ($deleteuser) {
            $deletekam = mysqli_query($koneksi,"UPDATE kamar SET id_penghuni='0' WHERE id_kamar ='$idkam'");
            alert("ok");
        }else{
            alert("ik");
        }
    }else{
        header("location:../list_kamar.php");
    }
            
            

?>