<?php
  include "lib/koneksi.php";
  $date = date('Y-m-d');
  session_start();

  $username     = validasi($_POST['username']);
  $password     = mysqli_real_escape_string($koneksi,$_POST['password']);
  $repassword   = mysqli_real_escape_string($koneksi,$_POST['repassword']);
  $email        = validasi($_POST['email']);
  $method       = $_POST['method'];
  $jumlah       = $_POST['jumlah'];
  $id_kamar     = $_POST['id_kamar'];

function alert($kod){
    global $id_kamar;
    header("Location:register.php?id=$id_kamar&err=$kod");
}

function invoice($panjang) {
	$karakter = 'ABCDEFGHIJKLMNOPQRSTU1234567890';
	$string = '';
	for($i = 0; $i < $panjang; $i++) {
		$pos = rand(0, strlen($karakter)-1);
		$string .= $karakter[$pos];
	}
	return $string;
}

function validasi($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = strtolower($data);
    return $data;
} 

if (isset($_POST['submit'])) {

    $usedUsername = mysqli_num_rows (mysqli_query($koneksi,"SELECT username FROM penghuni WHERE username = '$username'"));
    if (empty($username) || empty($password) || empty($repassword) || empty($email) || empty($method)) {
        alert("2");
    }else if ($usedUsername > 0) {
        alert("1");
    }else if ($password !== $repassword){
        alert("3");
    }else if (strlen($password) < 6){
        alert("4");
    }else{
        $password = password_hash($password,PASSWORD_DEFAULT);
        $invoice = invoice(10);

        $qpenghuni = mysqli_query($koneksi, "INSERT INTO penghuni VALUES('','$username','$password','Inactive','$email','$date','','$id_kamar')");

        $qmethod = mysqli_query($koneksi,"SELECT * FROM method WHERE id_method = '$method'");
        $rowmet = mysqli_fetch_assoc($qmethod);
        $namamethod = $rowmet['nama_method'];
        $metpayment    = $rowmet['payment'];

        $qkamar = mysqli_query($koneksi, "SELECT nama_kamar FROM kamar where id_kamar = '$id_kamar'");
        $rowkam = mysqli_fetch_assoc($qkamar);
        $nama_kamar = $rowkam['nama_kamar'];
        

        if ($qpenghuni == TRUE) {
            $payment = mysqli_query($koneksi,"INSERT INTO pembayaran VALUES ('','$invoice','$username','$nama_kamar','Pendaftaran','$namamethod','Pending','$date','$jumlah')") or die(mysqli_error($koneksi));
            if ($payment == TRUE) {
                $_SESSION['invoice'] = $invoice;
                $_SESSION['bayar'] = $namamethod ." ". $metpayment;
                alert("ok");
            }
        }else{
            alert("5");
        }
    }
}else {
    header("location:index.php");
}







?>