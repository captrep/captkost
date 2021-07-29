<?php
    include "../../lib/koneksi.php";
    $id = $_GET['id'];

    if (!empty($id)) {
        $queryHapus = mysqli_query($koneksi, "DELETE FROM testimonial WHERE id ='$id'");

        if ($queryHapus) {
           header("Location:../managetesti.php?err=ok");
        } else {
            header("Location:../managetesti.php?err=ik");
        }
    }else{
        header("location:../managetesti.php");
    }


?>