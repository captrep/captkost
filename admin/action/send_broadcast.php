<?php
include "../../lib/koneksi.php";

if (isset($_POST['submit'])) {

    function alert($kod){
        header("Location:../broadcast.php?err=$kod");
    }

    function validasi($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    date_default_timezone_set('Asia/Jakarta');
    $date = date('Y-m-d');
    $time = date('G:i:s');
    $judul  = validasi($_POST['judul']);
    $konten = validasi($_POST['konten']);



    if (empty($judul)) {
        alert("1");
    }elseif(empty($konten)){
        alert("2");
    }else{
        $dml = "INSERT INTO informasi (tanggal,jam,judul,konten) VALUES ('$date','$time','$judul','$konten')";
        $insert = mysqli_query($koneksi,$dml);
        if ($insert) {
            alert("ok");
        } else {
            alert("3");
        }
    }
}else{
    header("location:../broadcast.php");
}
?>