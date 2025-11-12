<?php
include "config.php";
if (!isset($_GET['event_id'])) {
    die("ID event tidak ditemukan!");
}
$event_id = $_GET['event_id'];
$sql = "SELECT * FROM events WHERE id = $event_id";
$hasil = mysqli_query($config, $sql);
$event = mysqli_fetch_assoc($hasil);

if (!$event) die("Event tidak ditemukan!");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Halaman Form Pembelian</title>
</head>

<body>
    <h3>Beli Tiket</h3>
    <h4><?php echo $event['nama_event']; ?></h4>
    <form method="POST" action="proses.php">
        <input type="hidden" name="event_id" value="<?php echo $event['id']; ?>">
        <table>
            <tr>
                <td>Nama Pembeli</td>
                <td>:</td>
                <td><input type="text" name="nama_pembeli" required></td>
            </tr>
            <tr>
                <td>Email Pembeli</td>
                <td>:</td>
                <td><input type="email" name="email_pembeli" required></td>
            </tr>
            <tr>
                <td>Jumlah Tiket</td>
                <td>:</td>
                <td><input type="number" name="jumlah" min="1" required></td>
            </tr>
            <tr>
                <td colspan=2>
                    <input type="submit" value="Beli">
                    <input type="reset" value="Kosongkan">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>