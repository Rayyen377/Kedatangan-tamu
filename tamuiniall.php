<?php
include "koneksi.php";

// Query untuk mengambil data yang tanggalnya sesuai hari ini dan nama yang sesuai dengan user
$sql = $koneksi->query("SELECT * FROM datatamu where haritgl = CURDATE()");

$data = array();
while ($row = $sql->fetch_assoc()) {
    $data[] = $row;
}

// Kembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);

?>