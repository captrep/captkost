<?php
    include "../../lib/koneksi.php";

    $id = $_GET['id_kamar'];
    
    if (!empty($id)) {
        $queryHapus = mysqli_query($koneksi, "DELETE FROM kamar WHERE id_kamar ='$id'");

        if ($queryHapus) {
           header("Location:../list_kamar.php?err=ok");
        } else {
            header("Location:../list_kamar.php?err=ik");
        }
    }else{
        header("location:../list_kamar.php");
    }

?>