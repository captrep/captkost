<?php
    include "../../lib/koneksi.php";
    $id             = $_POST['id_kamar'];
    $namaKamar      =validasi($_POST['nama_kamar']);
    $fasilitas      =$_POST['fasilitas'];
    $harga          =validasi($_POST['harga_kamar']);
    $deskripsi      =validasi($_POST['deskripsi']);
    $gambar         =$_FILES ['gambar'] ['name'];
    $penghuni       =$_POST ['id_penghuni'];
    $ukuran_file    =$_FILES ['gambar'] ['size'];

    function alert($kod){
        global $id;
        header("Location:../edit_kamar.php?id_kamar=$id&err=$kod");
    }

    function validasi($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if($gambar != "") {
        $ekstensi_diperbolehkan = array('png','jpg','jpeg'); //ekstensi file gambar yang bisa diupload 
        $x = explode('.', $gambar); //memisahkan nama file dengan ekstensi yang diupload
        $ekstensi = strtolower(end($x));
        $file_tmp = $_FILES['gambar']['tmp_name'];   
        $angka_acak     = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$gambar; //menggabungkan angka acak dengan nama file sebenarnya
        if($ukuran_file <= 1000000) {
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {
                move_uploaded_file($file_tmp, '../img/'.$nama_gambar_baru); //memindah file gambar ke folder gambar
                if (empty($namaKamar)) {
                    alert("1");
                }elseif (!is_numeric($harga)) {
                    alert("2");
                }elseif ($deskripsi=="") {
                    alert("3");
                }else{
                    $dml = "UPDATE kamar set nama_kamar='$namaKamar', fasilitas='$fasilitas', harga_kamar='$harga', deskripsi='$deskripsi', gambar='$nama_gambar_baru', id_penghuni='$penghuni' WHERE id_kamar='$id'";
                    $querySimpan = mysqli_query($koneksi, $dml);
                    if ($querySimpan) {
                            alert("ok");
                        } else {
                            alert("4");
                        }
                }
            }else{ 
                alert("5");
            }
        }else{
            alert("6");
        }
    }else{
        if (empty($namaKamar)) {
            alert("1");
        }elseif (!is_numeric($harga)) {
            alert("2");
        }elseif ($deskripsi=="") {
            alert("3");
        }else{
            $dml = "UPDATE kamar set nama_kamar='$namaKamar', fasilitas='$fasilitas', harga_kamar='$harga', deskripsi='$deskripsi', id_penghuni='$penghuni' WHERE id_kamar='$id'";
            $querySimpan = mysqli_query($koneksi, $dml);
            if ($querySimpan) {
                    alert("ok");
                } else {
                    alert("4");
                }
        }
    }


?>