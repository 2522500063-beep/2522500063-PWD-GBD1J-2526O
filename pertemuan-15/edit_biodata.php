<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

// Ambil NIM dari GET
$nim = filter_input(INPUT_GET, 'nim', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if (!$nim) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('bio_mahasiswa.php');
  }

// Ambil data mahasiswa
$stmt = mysqli_prepare($conn, "SELECT * FROM tbl_mahasiswa (nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_orang_tua, nama_kakak, nama_adek)
                                WHERE nim = ? LIMIT 1");

  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('bio_mahasiswa.php');
  }

mysqli_stmt_bind_param($stmt, "i", $nim);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('bio_mahasiswa.php');
  }

// Prefill form
$namalengkap = $row['nama_lengkap'] ?? '';
$tempatlahir = $row['tempat_lahir'] ?? '';
$tanggallahir = $row['tanggal_lahir'] ?? '';
$hobi = $row['hobi'] ?? '';
$pasangan = $row['pasangan'] ?? '';
$pekerjaan = $row['pekerjaan'] ?? '';
$namaortu = $row['nama_orang_tua'] ?? '';
$namakakak = $row['nama_kakak'] ?? '';
$namaadek = $row['nama_adek'] ?? '';

// Ambil old input & flash error jika ada
$flash_error = $_SESSION['flash_error'] ?? '';
$old = $_SESSION['old'] ?? [];
unset($_SESSION['flash_error'], $_SESSION['old']);

if (!empty($old)) {
    $namalengkap = $old['nama_lengkap'] ?? $namalengkap;
    $tempatlahir = $old['tempat_lahir'] ?? $tempatlahir;
    $tanggallahir = $old['tanggal_lahir'] ?? $tanggallahir;
    $hobi = $old['hobi'] ?? $hobi;
    $pasangan = $old['pasangan'] ?? $pasangan;
    $pekerjaan = $old['pekerjaan'] ?? $pekerjaan;
    $namaortu = $old['nama_orang_tua'] ?? $namaortu;
    $namakakak = $old['nama_kakak'] ?? $namakakak;
    $namaadek = $old['nama_adek'] ?? $namaadek;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Biodata Mahasiswa</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h2>Edit Biodata Mahasiswa</h2>

<?php if (!empty($flash_error)): ?>
<div style="padding:10px; margin-bottom:10px; background:#f8d7da; color:#721c24; border-radius:6px;">
<?= $flash_error; ?>
</div>
<?php endif; ?>

<form action="proses_update_bio.php" method="POST">
    
<input type="hidden" name="nim" value="<?= (int)$nim ?>">

<label>Nama Lengkap:
    <input type="text" name="nama_lengkap" value="<?= htmlspecialchars($namalengkap) ?>" required>
</label>

<label>Tempat Lahir:
    <input type="text" name="tempat_lahir" value="<?= htmlspecialchars($tempatlahir) ?>" required>
</label>

<label>Tanggal Lahir:
    <input type="date" name="tanggal_lahir" value="<?= htmlspecialchars($tanggallahir) ?>" required>
</label>

<label>Hobi:
    <input type="text" name="hobi" value="<?= htmlspecialchars($hobi) ?>">
</label>

<label>Pasangan:
    <input type="text" name="pasangan" value="<?= htmlspecialchars($pasangan) ?>">
</label>

<label>Pekerjaan:
    <input type="text" name="pekerjaan" value="<?= htmlspecialchars($pekerjaan) ?>">
</label>

<label>Nama Orang Tua:
    <input type="text" name="nama_orang_tua" value="<?= htmlspecialchars($namaortu) ?>" required>
</label>

<label>Nama Kakak:
    <input type="text" name="nama_kakak" value="<?= htmlspecialchars($namakakak) ?>">
</label>

<label>Nama Adek:
    <input type="text" name="nama_adek" value="<?= htmlspecialchars($namaadek) ?>">
</label>

<button type="submit">Simpan</button>
<button type="reset">Batal</button>
</form>
<script src="script.js"></script>
</body>
</html>