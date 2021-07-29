<?php
include "../../lib/koneksi.php";
$date = date('Y-m-d');
session_start();

function invoice($panjang) {
	$karakter = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
	$string = '';
	for($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter[$pos];
	}
	return $string;
}

function alert($kod){
    header("Location:../bayar.php?err=$kod");
}

if (isset($_POST['submit'])) {
    $namaKamar  = $_POST['nama_kamar'];
    $method     = $_POST['method'];
    $jumlah     = $_POST['jumlah'];
    $username   = $_POST['username'];
    $invoice    = invoice(10);
    $checkreq   = mysqli_query($koneksi,"SELECT * FROM pembayaran WHERE username = '$username' AND status = 'Pending'");
    $countreq   = mysqli_num_rows($checkreq);

    $checkmethod = mysqli_query($koneksi,"SELECT * FROM method WHERE id_method = '$method'");
    $rows = mysqli_fetch_array($checkmethod,MYSQLI_ASSOC);

    if ($countreq >= 1) {
        alert("1");
    }elseif(empty($method)){
        alert("3");
    }else{
        $namamethod = $rows['nama_method'];
        $bayar      = $rows['payment'];
        $ddl        = "INSERT INTO pembayaran(invoice,username,nama_kamar,jenis,method,status,tanggal,jumlah) VALUES ('$invoice','$username', '$namaKamar','Pembayaran', '$namamethod', 'Pending', '$date', '$jumlah')";
        $insert     = mysqli_query($koneksi,$ddl) or die(mysqli_error($koneksi));
        if ($insert == TRUE ) {
            $_SESSION['invoice'] = $invoice;
            $_SESSION['bayar'] = $namamethod ." ". $bayar;
            $_SESSION['jumlah'] = $jumlah;
            alert("ok");
        }else{
            alert("2");
        }
    }
} else{
    header("location:../bayar.php");
}
?>
