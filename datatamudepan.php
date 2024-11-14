<?php

session_start();
include "koneksi.php";

$user = $_SESSION['username'];

// Query untuk mengambil data yang tanggalnya sesuai hari ini dan nama yang sesuai dengan user
$sql = $koneksi->query("SELECT * FROM datatamu WHERE namatemu='$user' and validasi<>'menunggu' AND haritgl > CURDATE()");

$data = array();
while ($row = $sql->fetch_assoc()) {
    $data[] = $row;
}

// Kembalikan data dalam format JSON
header('Content-Type: application/json');
echo json_encode($data);
?>