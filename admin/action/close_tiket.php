<?php
    include "../../lib/koneksi.php";

    function alert($kod){
        header("Location:../tiket.php?err=$kod");
    }

    $id = $_GET['id_ticket'];
    if (!empty($id)) {
        $closetiket = mysqli_query($koneksi,"UPDATE ticket SET status='Closed' WHERE id_ticket = '$id'");
        if ($closetiket) {
            alert("ok");
        }else{
            alert("ik");
        }
    }else{
        header("location:../tiket.php");
    }
            
            

?>