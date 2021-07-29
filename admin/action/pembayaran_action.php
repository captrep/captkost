<?php
include "../../lib/koneksi.php";
session_start();

function alert($kod){
    header("Location:../pembayaran.php?err=$kod");
}

if (isset($_GET['status'])) {
    $id = $_GET['id_pembayaran'];
    $status = $_GET['status'];
    $jenis = $_GET['jenis'];
    $qcs = mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE invoice = '$id' AND status = 'Pending'");
    $cs = mysqli_num_rows($qcs);
    $rows = mysqli_fetch_array($qcs,MYSQLI_ASSOC);
    if ($cs == 0) {
       alert("1");
    } else if ($status !== "Cancelled" AND $status !== "Success") {
       alert("2");
    }else if($jenis == "Pembayaran") {
        $username = $rows['username'];
        $update = mysqli_query($koneksi,"UPDATE pembayaran SET status = '$status' WHERE invoice = '$id'");
        if ($status == "Success") {
            $query = mysqli_query($koneksi,"SELECT * FROM penghuni WHERE username = '$username'");
            $rows = mysqli_fetch_array($query,MYSQLI_ASSOC);
            $tglExpLama = $rows['tgl_expired'];
            $tglExpBaru = date('Y-m-d', strtotime('+1 month', strtotime($tglExpLama)));      
            
            $updateDurasi = mysqli_query($koneksi,"UPDATE penghuni SET tgl_expired = '$tglExpBaru' WHERE username ='$username'");
        }
        if ($update == TRUE) {
            if ($status == "Success") {
                $_SESSION['penghuni'] = $username;
               alert("ok");
            } else {
               alert("ik");
            }
        } else {
            alert("3");
        }
    }else if ($jenis == "Pendaftaran"){
        $updatePembayaran = mysqli_query($koneksi,"UPDATE pembayaran SET status = '$status' WHERE invoice = '$id'");
        $usernamep = $rows['username'];
        if ($status == "Success") {
            // insert user to db penghuni
            $qpeng = mysqli_query($koneksi, "SELECT id_penghuni,id_kamar,tgl_daftar FROM penghuni WHERE username = '$usernamep'");
            $peng = mysqli_fetch_assoc($qpeng);
            $idp    = $peng['id_penghuni'];
            $idkamar = $peng['id_kamar'];
            $tglDaftar = $peng['tgl_daftar'];
            $tglExpUpdated = date('Y-m-d', strtotime('+1 month', strtotime($tglDaftar)));

            $insertUser = mysqli_query($koneksi,"UPDATE penghuni SET status = 'New', tgl_expired ='$tglExpUpdated' WHERE username ='$usernamep'");

            // insert penghuni to db kamar 
            $insertKamar = mysqli_query($koneksi, "UPDATE kamar SET id_penghuni = '$idp' WHERE id_kamar='$idkamar'");
        }else if($status == "Cancelled"){
            mysqli_query($koneksi, "DELETE FROM penghuni WHERE username = '$usernamep'");
        }

        if ($updatePembayaran == TRUE) {
            if ($status == "Success") {
                $_SESSION['penghuni'] = $usernamep;
               alert("okk");
            } else {
               alert("ik");
            }
        } else {
            alert("3");
        }
    }else {
        alert("3");
    }
}
?>