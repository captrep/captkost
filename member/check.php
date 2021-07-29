<?php
include("../lib/koneksi.php");
function denda($durasi,$username){
        global $koneksi;
        if ($durasi == "0") {
            $denda = 0;
            return $denda;
          }else if($durasi == "-1"){
            $denda = 10000;
            return $denda;
          }else if($durasi == "-2"){
            $denda = 20000;
            return $denda;
          }else if($durasi == "-3"){
            $denda = 30000;
            return $denda;
          }else if($durasi == "-4"){
            $denda = 40000;
            return $denda;
          }else if($durasi == "-5"){
            $denda = 50000;
            return $denda;
          }else if($durasi == "-6"){
            $denda = 60000;
            return $denda;
          }else if($durasi == "-7"){
            $denda = 70000;
            return $denda;
          }else if($durasi == "-8"){
            $denda = 80000;
            return $denda;
          }else if($durasi == "-9"){
            $denda = 90000;
            return $denda;
          }else if($durasi == "-10"){
            $denda = 100000;
            return $denda;
          }else if($durasi == "-11"){
            $query = mysqli_query($koneksi,"SELECT * FROM penghuni WHERE username = '$username'");
            $row = mysqli_fetch_assoc($query) or die(mysqli_error($koneksi));
            $id = $row['id_penghuni'];

            $querykamar = mysqli_query($koneksi,"SELECT * FROM kamar WHERE id_penghuni='$id'") or die(mysqli_error($koneksi));
            $kam = mysqli_fetch_assoc($querykamar) ;
            $idkam = $kam['id_kamar'];

            $deletekam = mysqli_query($koneksi,"UPDATE kamar SET id_penghuni='0' WHERE id_kamar ='$idkam'");
            $deleteuser = mysqli_query($koneksi,"UPDATE PENGHUNI SET status='Deactivated' WHERE username = '$username'");
          }else{
            $denda = 0;
            return $denda;
          }
          
    }
?>