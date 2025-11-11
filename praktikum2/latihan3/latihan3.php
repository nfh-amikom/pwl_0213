<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aritmatika</title>
</head>
<body>
    <form action="latihan3.php" method="POST">
        <table>
            <tr>
                <td>Masukkan Nama Anda</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Masukkan Angka Pertama (1-10)</td>
                <td>:</td>
                <td><input type="number" name="angka1"></td>
            </tr>
            <tr>
                <td>Masukkan Angka Kedua (1-10)</td>
                <td>:</td>
                <td><input type="number" name="angka2"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" name="kirim" value="sent"></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST['kirim'])) {
        $angka1 = $_POST['angka1'];
        $angka2 = $_POST['angka2'];

        echo "<br><h1>Perhitungan Aritmatika</h1><br>";
        
        if ($angka1 > 0 && $angka1 < 11) {
            if ($angka2 > 0 && $angka2 < 11) {
                echo $angka1. "+" . $angka2. "=" . $angka1 + $angka2 . "<br>";
                echo $angka1. "-" . $angka2. "=" . $angka1 - $angka2 . "<br>";
                echo $angka1. "*" . $angka2. "=" . $angka1 * $angka2 . "<br>";
                echo $angka1. "/" . $angka2. "=" . $angka1 / $angka2 . "<br>";
                echo $angka1. "%" . $angka2. "=" . $angka1 % $angka2 . "<br>";
            }  

            else {
                echo "Angka 2 tidak dalam range";
            }
        }

        else {
                echo "Angka 1 tidak dalam range";
        }
    }
    ?>
</body>
</html>