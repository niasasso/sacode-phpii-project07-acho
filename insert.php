<?php

    // menyertakan file configurasi
    require_once('config.php');

    // cek data yang dikirim dari form
    if(isset($_POST['nama_lengkap']) && $_POST['nama_lengkap'] != ''){

        // buat variable data
        $nama_lengkap = $_POST['nama_lengkap'];
        $alamat_email = $_POST['alamat_email'];
        $kata_sandi = $_POST['kata_sandi'];


        // buat permintaan ke database untuk tambah data
        $sql = "INSERT INTO `anggota` (`nama_lengkap`, `alamat_email`, `kata_sandi`) VALUES ('$nama_lengkap', '$alamat_email', '$kata_sandi')";

        // periksa apakah data permintaan berhasil atau gagal
        if($koneksi->query($sql) === TRUE){

            // memulai seasson
            session_start();

            // membuat session untuk simpan data pendaftar
            $_SESSION['nama_lengkap'] = $nama_lengkap;
            $_SESSION['alamat_email'] = $alamat_email;

            // jika berhasil tampilkan halaman dasbor.php
            header('location: dasbor.php');

        
        } else{
            echo "Gagal! Maaf, silahkan coba lagi";
        }


    } else {
        echo "Silahkan lengkapi data!";
    }

            // jika proses gagal, tampilkan halaman gagal.php

?>