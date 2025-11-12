<?php
    include("config.php");
    $event_id = $_POST["event_id"];
    $nama = $_POST["nama_pembeli"];
    $email = $_POST["email_pembeli"];
    $jumlah = $_POST["jumlah"];  

    $query = mysqli_query($config, "SELECT kuota FROM events WHERE id = '$event_id'");
    $data = mysqli_fetch_assoc($query);

    if ($jumlah > $data['kuota']) {
        echo "<p>Kuota tidak cukup! Sisa kuota: {$data['kuota']}</p>";
        echo '<br><a href="index.php">Kembali ke Daftar Event</a>';
        exit;
    }

    function generateKodeTiket($length = 6) {
        $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $kode = '';
        for ($i = 0; $i < $length; $i++) {
            $kode .= $chars[rand(0, strlen($chars) - 1)];
        }
        return 'TKT-' . $kode;
    }

    $kode_tiket = generateKodeTiket();

    $sql_insert = "INSERT INTO pembelian (event_id, nama_pembeli, email_pembeli, kode_tiket, total_tiket)
            VALUES ('$event_id', '$nama', '$email', '$kode_tiket', '$jumlah');";

    $hasil_insert = mysqli_query($config, $sql_insert);

    $sql_update = "UPDATE events SET kuota = kuota - $jumlah WHERE id = '$event_id'";

    $hasil_update = mysqli_query($config, $sql_update);

    if ($hasil_insert && $hasil_update) echo "Pembelian berhasil! Kode Tiket Anda: <b>$kode_tiket</b>";
    else echo "Pembelian gagal!";
?>

<br>Kembali ke <a href="index.php">Daftar Event</a>