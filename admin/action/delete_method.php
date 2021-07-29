<?php
    include "../../lib/koneksi.php";

    $id_method = $_GET['id_method'];

    if (!empty($id_method)) {
        $queryHapus = mysqli_query($koneksi, "DELETE FROM method WHERE id_method ='$id_method'") or die(mysqli_error($koneksi));

        if ($queryHapus) {
           header("Location:../method_pembayaran.php?err=ok");
        } else {
            header("Location:../method_pembayaran.php?err=ik");
        }
    }else{
        header("location:../method_pembayaran.php");
    }

?>