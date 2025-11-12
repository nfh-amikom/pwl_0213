<!DOCTYPE html>
<html>
<head>
    <title>Daftar Event</title>
</head>

<body>
    <h3>Daftar Event</h3>
    <table width="720" border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th width="30"> No. </th>
            <th width="30"> Nama Event </th>
            <th width="30"> Harga </th>
            <th width="30"> Kuota </th>
            <th width="150"> Aksi </th>
        </tr>
        <?php
        include "config.php";
        $sql = "SELECT id, nama_event, harga, kuota FROM events ORDER BY nama_event";
        $hasil = mysqli_query($config, $sql);
        $no = 1;
        while ($data = mysqli_fetch_array($hasil)) {
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data['nama_event']; ?></td>
                <td><?php echo $data['harga']; ?></td>
                <td><?php echo $data['kuota']; ?></td>
                <td align="center">
                <?php
                if ($data['kuota'] > 0) {
                    echo '<a href="beli.php?event_id=' . $data['id'] . '">Beli</a>';
                } else {
                    echo '<span style="color:red;">Kuota Habis</span>';
                }
                ?>
            </td>
            </tr>
            <?php
            $no++;
        }
        echo "</table>";
        ?>
</body>

</html>