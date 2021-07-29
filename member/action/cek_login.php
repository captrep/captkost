<?php
include "../../lib/koneksi.php";

if (isset($_POST['login'])) {
    $username 	= $_POST['username'];
    $password	= $_POST['password'];
    
    $query = mysqli_query($koneksi, "SELECT * FROM penghuni WHERE username='$username'");
    $ketemu = mysqli_num_rows($query);
    $row    = mysqli_fetch_assoc($query);

	if (empty($_POST['username'])) {
        header("Location:../login.php?err=user");
	} else if (empty($_POST['password'])) {
        header("Location:../login.php?err=pass");
	} else if($ketemu==0){
        header("Location:../login.php?err=userpass");
        } else if ($row['status'] === "Inactive"){
                header("Location:../login.php?err=in");
        }else {
        session_start();
                if (password_verify($password,$row['password'])) {
                        $_SESSION['username'] = $row['username'];
                        $_SESSION['password'] = $row['password'];
                        $_SESSION['id_penghuni'] = $row['id_penghuni'];
                        $_SESSION['status'] = $row['status'];
                        header("location:../index.php");
                        
                }else{
                        header("Location:../login.php");
                }
        }
}

?>


