<?php
include "../../lib/koneksi.php";

if (isset($_POST['login'])) {
    $username 	= $_POST['useradmin'];
    $password	= md5($_POST['passadmin']);
    
    $query = mysqli_query($koneksi, "SELECT * FROM admin WHERE useradmin='$username' AND passadmin ='$password'");
    $ketemu = mysqli_num_rows($query);
    $row    = mysqli_fetch_assoc($query);

	if (empty($_POST['useradmin'])) {
        header("Location:../login.php?err=user");
	} else if (empty($_POST['passadmin'])) {
        header("Location:../login.php?err=pass");
	} else if($ketemu==0){
        header("Location:../login.php?err=userpass");
	} else {
        session_start();
        $id = $row['id_admin'];
        $_SESSION['useradmin'] = $row['useradmin'];
        $_SESSION['passadmin'] = $row['passadmin'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['id_admin'] = $id;
        
        header("location:../index.php");
        }
}

?>


