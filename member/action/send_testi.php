<?php
  include "../../lib/koneksi.php";

if (isset($_POST['submit'])) {

    function alert($kod){
        header("Location:../testimonial.php?err=$kod");
    }

    $username   = $_POST['username'];
    $nama       = $_POST['nama'];
    $foto       = $_POST['foto'];
    $isi        = $_POST['isi'];

    // check
    
    $qcheck     = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM testimonial WHERE username = '$username'"));
    if (empty($isi)) {
        alert("2");
    }elseif($qcheck > 0){
        alert("1");
    }else{
        $dml = "INSERT INTO testimonial (username,nama,isi,foto) VALUES ('$username','$nama','$isi','$foto')";
        $insert = mysqli_query($koneksi,$dml);
        if ($insert) {
            alert("ok");
        } else {
            alert("3");
        }
    }
}else{
    header("location:../testimonial.php");
}
?>