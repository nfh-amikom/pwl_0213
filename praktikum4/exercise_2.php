<?php
$kategoribuku = ["Teknologi", "Filosofi", "Politik"];

echo "<strong>Daftar Kategori Buku: </strong><br>";
for ($i=0; $i < sizeof($kategoribuku); $i++) {
    echo "Nama Buku $i : " . $kategoribuku[$i] . "<br>";
}
?>
