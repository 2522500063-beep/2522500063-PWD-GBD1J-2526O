<?php
require 'koneksi.php';

$fieldBiodata = [
  "nim" => ["label" => "Nim:", "suffix" => ""],
  "nama_lengkap" => ["label" => "nama_lengkap:", "suffix" => ""],
  "tempat_lahir" => ["label" => "tempat_lahir:", "suffix" => ""],
  "tanggal_lahir" => ["label" => "tanggal_lahir:", "suffix" => ""],
  "hobi" => ["label" => "hobi:", "suffix" => ""],
  "pasangan" => ["label" => "pasangan:", "suffix" => ""],
  "pekerjaan" => ["label" => "pekerjaan:", "suffix" => ""],
  "nama_orang_tua" => ["label" => "nama_orang_tua:", "suffix" => ""],
  "nama_kakak" => ["label" => "nama_kakak:", "suffix" => ""],
  "nama_adik" => ["label" => "nama_adik:", "suffix" => ""],
];

$sql = "SELECT * FROM tbl_mahasiswa ORDER BY nim DESC";
$q = mysqli_query($conn, $sql);
if (!$q) {
  echo "<p>Gagal membaca data biodata: " . htmlspecialchars(mysqli_error($conn)) . "</p>";
} elseif (mysqli_num_rows($q) === 0) {
  echo "<p>Belum ada data biodata yang tersimpan.</p>";
} else {
  while ($row = mysqli_fetch_assoc($q)) {
    $arrBiodata = [
     $namalengkap = $row['nama_lengkap'] ?? '';
$tempatlahir = $row['tempat_lahir'] ?? '';
$tanggallahir = $row['tanggal_lahir'] ?? '';
$hobi = $row['hobi'] ?? '';
$pasangan = $row['pasangan'] ?? '';
$pekerjaan = $row['pekerjaan'] ?? '';
$namaortu = $row['nama_orang_tua'] ?? '';
$namakakak = $row['nama_kakak'] ?? '';
$namaadik = $row['nama_adik'] ?? '';
    ];
    echo tampilkanBiodata($fieldBiodata, $arrBiodata);
  }
}
?>
