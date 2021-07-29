<?php
  include "../../lib/koneksi.php";

  date_default_timezone_set('Asia/Jakarta');
  $date = date('Y-m-d');
  $time = date('G:i:s');

if (isset($_POST['submit'])) {

    function alert($kod){
        header("Location:../buat_tiket.php?err=$kod");
    }

    $username   = $_POST['username'];
    $subjek       = $_POST['subjek'];
    $pesan       = $_POST['isi'];
    $foto       = $_POST['foto'];

    if (empty($subjek) || empty($pesan)) {
        alert("1");
    }else{
        $dml = "INSERT INTO ticket (subjek,isi,pembuat,tanggal,jam,foto) VALUES ('$subjek','$pesan','$username','$date','$time','$foto')";
        $insert = mysqli_query($koneksi,$dml) or die(mysqli_error($koneksi));
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