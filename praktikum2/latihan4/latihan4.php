<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aritmatika</title>
</head>

<body>
    <form action="latihan4.php" method="POST">
        <table>
            <tr>
                <td>Nama Anda</td>
                <td>:</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><input type="email" name="email" required></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td>
                    <input type="radio" name="gender" value="perempuan" required><label for="gender">Perempuan</label>
                    <input type="radio" name="gender" value="laki-laki" required><label for="gender">Laki-laki</label>
                </td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>:</td>
                <td><input type="text" name="nim" required></td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td><input type="date" name="tgllahir" required></td>
            </tr>
            <tr>
                <td><label for="prodi">Prodi</label></td>
                <td>:</td>
                <td>
                    <select name="prodi" required>
                        <option value="Sistem Informasi">SI</option>
                        <option value="Manajemen Informatika">MI</option>
                        <option value="Informatika">IF</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="kirim" value="sent"></td>
            </tr>
        </table>
    </form>

    <?php
    if (isset($_POST['kirim'])) {
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $nim = $_POST['nim'];
        $tgllahir = new DateTime($_POST['tgllahir']);
        $prodi = $_POST['prodi'];

        $sekarang = new DateTime();
        $usia = $sekarang->diff($tgllahir)->y;
        
        echo "<br><h1>Hasilnya : </h1><br>";

        echo "Hallo, " . $nama . "<br>";
        echo "Email anda adalah " . $email . "<br>";
        echo "Anda " . $gender . "<br>";
        echo "NIM anda " . $nim . "<br>";
        echo "Tanggal Lahir anda " . $tgllahir->format("Y-m-d") . "<br>";
        echo "Prodi anda " . $prodi . "<br>";
        echo "Usia anda saat ini adalah " . $usia . " tahun" . "<br>";
    }
    ?>
</body>
</html>