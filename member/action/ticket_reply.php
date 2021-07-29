<?php
 include "../../lib/koneksi.php";
date_default_timezone_set('Asia/Jakarta');
$date = date('Y-m-d');
$time = date('G:i:s');

if (isset($_POST['submit'])) {

    $id_ticket = $_POST['id_ticket'];
    $foto      = $_POST['gambar'];
    $nama      = $_POST['username'];
    $reply     = $_POST['reply'];

    function alert($kod){
        global $id_ticket;
        header("Location:../balastiket.php?id_ticket=$id_ticket&err=$kod");
    }

    if (empty($reply)) {
        alert("1");
    }else{
        $dml = "INSERT INTO ticket_reply (id_ticket,reply,pembalas,date,time,gambar) VALUES ('$id_ticket','$reply','$nama','$date','$time','$foto')";
        $insert = mysqli_query($koneksi,$dml) or die(mysqli_error($koneksi));
        if ($insert) {
            alert("ok");
        } else {
            alert("2");
        }
    }
}else{
    header("location:../submitted.php");
}
?>