<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Hitung Diskon</h2>
    <form action="exercise_3.php" method="POST">
        <table>
        <tr>
            <td>Harga Satuan</td>
            <td>:</td>
            <td><input type="number" name="harga" required></td>
        </tr>
        <tr>
            <td>Jumlah Barang</td>
            <td>:</td>
            <td><input type="number" name="jumlah" required></td>
        </tr>
        <tr>
            <td>Member</td>
            <td>:</td>
            <td><input type="checkbox" name="member"></td>
        </tr>
        <tr>
            <td colspan = 3>
                <input type="submit" value="kirim" name="kirim">
                <input type="reset" value ="reset">
            </td>
        </tr>

        
        </table>
    </form>
    

    <?php
        function hitungDiskon($totalHarga, $isMember) {
            if ($isMember == "Yes") {
                    if ($totalHarga > 100000) {
                        return $totalHarga * (20/100);
                    } else {
                        return $totalHarga * (10/100);
                    }
                } else {
                    if ($totalHarga > 100000) {
                        return $totalHarga * (10/100);
                    } 
                }
        }

        

        if (isset($_POST['kirim'])) {
            $harga = $_POST['harga'];
            $jumlah = $_POST['jumlah'];
            $member = isset($_POST['member']) ? "Yes" : "No";

            $total = $harga * $jumlah;
            $harga_diskon = 0;

            $harga_diskon = hitungDiskon($total, $member);

            $bayar = $total - $harga_diskon;

            $summary = [
                "Harga Satuan" => $harga, 
                "Jumlah Barang" => $jumlah, 
                "Member" => $member, 
                "Total Pembelian" => $total, 
                "Diskon" => $harga_diskon, 
                "Bayar" => $bayar
            ];

            echo "<h2>Total Pembayaran Adalah :</h2><br>";
            echo "<table>";
            foreach ($summary as $topic => $content) {
                echo "<tr>
                    <td>
                        $topic
                    </td>
                    <td>:</td>
                    <td>
                        $content
                    </td>
                </tr>";
            }
            echo "</table>";
        }
    ?>
</body>
</html>