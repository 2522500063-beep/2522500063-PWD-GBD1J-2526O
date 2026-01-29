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
$stmt = mysqli_prepare($conn, "SELECT  nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_orang_tua, nama_kakak, nama_adik
                                FROM tbl_mahasiswa WHERE nim = ? LIMIT 1");

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
$namaadik = $row['nama_adik'] ?? '';

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
    $namaadik = $old['nama_adik'] ?? $namaadik;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Judul Halaman</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
      <h1>Ini Header</h1>
      <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
      </button>
      <nav>
        <ul>
          <li><a href="#home">Beranda</a></li>
          <li><a href="#about">Tentang</a></li>
          <li><a href="#contact">Kontak</a></li>
        </ul>
      </nav>
    </header>

    <main>
<section id="about">
        <h2>Edit Biodata Mahasiswa</h2>
        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>
<form action="proses_update_bio.php" method="POST">
    
<label for="txtNim"><span>NIM:</span>
          <input type="text" name="nim" value="<?= (int)$nim; ?>">
        

        <label for="txtNmLengkap"><span>Nama Lengkap:</span>
          <input type="text" id="txtNmLengkap" name="txtNmLengkap"  placeholder="Masukkan Nama Lengkap" 
          value="<?= !empty($namalengkap) ? $namalengkap : '' ?>">
        </label>

        <label for="txtT4Lhr"><span>Tempat Lahir:</span>
          <input type="text" id="txtT4Lhr" name="txtT4Lhr" placeholder="Masukkan Tempat Lahir" 
          value="<?= !empty($tempatlahir) ? $tempatlahir : '' ?>">
        </label>

        <label for="txtTglLhr"><span>Tanggal Lahir:</span>
          <input type="date" id="txtTglLhr" name="txtTglLhr" placeholder="Masukkan Tanggal Lahir"
          value="<?= !empty($tanggallahir) ? $tanggallahir : '' ?>"> 
        </label>

        <label for="txtHobi"><span>Hobi:</span>
          <input type="text" id="txtHobi" name="txtHobi" placeholder="Masukkan Hobi" 
          value="<?= !empty($hobi) ? $hobi : '' ?>">
        </label>

        <label for="txtPasangan"><span>Pasangan:</span>
          <input type="text" id="txtPasangan" name="txtPasangan" placeholder="Masukkan Pasangan" 
          value="<?= !empty($pasangan) ? $pasangan : '' ?>">
        </label>

        <label for="txtKerja"><span>Pekerjaan:</span>
          <input type="text" id="txtKerja" name="txtKerja" placeholder="Masukkan Pekerjaan"
          value="<?= !empty($pekerjaan) ? $pekerjaan : '' ?>"> 
        </label>

        <label for="txtNmOrtu"><span>Nama Orang Tua:</span>
          <input type="text" id="txtNmOrtu" name="txtNmOrtu" placeholder="Masukkan Nama Orang Tua"
          value="<?= !empty($namaortu) ? $namaortu : '' ?>"> 
        </label>

        <label for="txtNmKakak"><span>Nama Kakak:</span>
          <input type="text" id="txtNmKakak" name="txtNmKakak" placeholder="Masukkan Nama Kakak"
          value="<?= !empty($namakakak) ? $namakakak: '' ?>"> 
        </label>

        <label for="txtNmAdik"><span>Nama Adik:</span>
          <input type="text" id="txtNmAdik" name="txtNmAdik" placeholder="Masukkan Nama Adik"
          value="<?= !empty($namaadik) ? $namaadik : '' ?>"> 
        </label>

        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        <a href="bio_mahasiswa.php" class="reset">Kembali</a>
</form>
<script src="script.js"></script>
</body>
</html>