<?php
include("../lib/koneksi.php");

 function durasi($username){
    global $koneksi;
   
    $query = mysqli_query($koneksi,"SELECT * FROM penghuni WHERE username = '$username'");
    $rows=mysqli_fetch_assoc($query);
    $sekarang = date('Y-m-d');
    $tgl = $rows['tgl_expired'];
    $awal = strtotime($sekarang);
    $akhir = strtotime($tgl);
    $sisa = $akhir - $awal;
    $durasi = floor($sisa / (60 * 60 * 24));
    return $durasi;
 }

?>