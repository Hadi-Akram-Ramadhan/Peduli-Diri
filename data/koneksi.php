<?php
        $servername = "localhost";
        $username = "Hadooyy";
        $password = "123";
        $dbname = "peduli_diri";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Mengecek koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }
        echo "Koneksi berhasil";
?>
