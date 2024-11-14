<?php
include "koneksi.php";

// Get the selected date from the URL
$haritgl = $_GET['haritgl'];

// Prepare the query to fetch data based on the selected date
$sql = $koneksi->query("SELECT 'instansi', COUNT('instansi') AS jumlah FROM 'datatamu' WHERE haritgl='$haritgl' GROUP BY 'instansi'");

$instansi = [];
$jumlah = [];

// Loop through the query result and store in arrays
while ($row = $sql->fetch_assoc()) {
    $instansi[] = $row['instansi'];
    $jumlah[] = $row['jumlah'];
}

// Return data as JSON
echo json_encode(['instansi' => $instansi, 'jumlah' => $jumlah]);
?>
