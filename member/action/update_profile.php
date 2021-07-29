<?php
    include "../../lib/koneksi.php";

    $id        =$_POST['id'];
    $nama      =validasi($_POST['nama']);
    $umur      =validasi($_POST['umur']);
    $agama     =validasi($_POST['agama']);
    $pekerjaan =validasi($_POST['pekerjaan']);
    $jalan     =validasi($_POST['jalan']);
    $desa      =validasi($_POST['desa']);
    $kecamatan =validasi($_POST['kecamatan']);
    $kabupaten =validasi($_POST['kabupaten']);
    $foto        =$_FILES['foto'] ['name'];
    $ukuran_file =$_FILES['foto'] ['size'];
    $ekstensi   = $_FILES ['foto'] ['type'];

    function alert($kod){
        global $id;
        header("Location:../profile.php?err=$kod");
    }

    function validasi($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($foto != "") {
        $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file foto yang bisa diupload 
        $x = explode('.', $foto); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['foto']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$foto; //menggabungkan angka acak dengan nama file sebenarnya
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if($ukuran_file <= 1000000)  {
                move_uploaded_file($file_tmp, '../img/fotouser/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                if (!preg_match("/^[a-z0-9A-Z ]*$/",$jalan)) {
                    alert("4");
                }elseif (!is_numeric($umur)) {
                    alert("2");
                }elseif (!preg_match("/^[a-z0-9A-Z ]*$/",$desa)) {
                    alert("4");
                }elseif (!preg_match("/^[a-z0-9A-Z ]*$/",$kecamatan)) {
                    alert("4");
                }elseif (!preg_match("/^[a-z0-9A-Z ]*$/",$kabupaten)) {
                    alert("4");
                }else{
                    $dml = "UPDATE identitas set nama='$nama', umur='$umur', pekerjaan='$pekerjaan', agama='$agama', jalan='$jalan', desa='$desa', kecamatan='$kecamatan', kabupaten='$kabupaten', foto='$nama_gambar_baru' WHERE id_penghuni='$id'";
                    $querySimpan = mysqli_query($koneksi, $dml) or die(mysqli_error($koneksi));
                    if ($querySimpan) {
                            alert("ok");
                        } else {
                            alert("5");
                        }
                }
            }else{ 
                alert("3");
            }
        }else{
            alert("1");
        }
    }else{
        if (!preg_match("/^[a-z0-9A-Z ]*$/",$jalan)) {
            alert("4");
        }elseif (!is_numeric($umur)) {
            alert("2");
        }elseif (!preg_match("/^[a-z0-9A-Z ]*$/",$desa)) {
            alert("4");
        }elseif (!preg_match("/^[a-z0-9A-Z ]*$/",$kecamatan)) {
            alert("4");
        }elseif (!preg_match("/^[a-z0-9A-Z ]*$/",$kabupaten)) {
            alert("4");
        }else{
            $dml = "UPDATE identitas SET nama='$nama', umur='$umur', pekerjaan='$pekerjaan', agama='$agama', jalan='$jalan', desa='$desa', kecamatan='$kecamatan', kabupaten='$kabupaten' WHERE id_penghuni='$id'";
            $querySimpan = mysqli_query($koneksi, $dml) or die(mysqli_error($koneksi));
            if ($querySimpan) {
                    alert("ok");
                } else {
                    alert("5");
                }
        }
    }


?>