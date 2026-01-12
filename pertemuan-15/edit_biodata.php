<?php

  session_start();
  require 'koneksi.php';

  /*
    Ambil nilai cid dari GET dan lakukan validasi untuk 
    mengecek cid harus angka dan lebih besar dari 0 (> 0).
    'options' => ['min_range' => 1] artinya cid harus ≥ 1 
    (bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
  */
  $cnim = filter_input(INPUT_GET, 'cnim', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  $cnim = filter_input(INPUT_POST, 'cnim', FILTER_VALIDATE_INT);

$namalengkap  = bersihkan($_POST['namalengkap'] ?? '');
$tempatlahir = bersihkan($_POST['tempatlahir'] ?? '');
$tanggallahir = bersihkan($_POST['tanggallahir'] ?? '');
$hobi = bersihkan($_POST['hobi'] ?? '');
$pasangan = bersihkan($_POST['pasangan'] ?? '');
$pekerjaan = bersihkan($_POST['pekerjaan'] ?? '');
$namaortu = bersihkan($_POST['namaortu'] ?? '');
$namakakak = bersihkan($_POST['namakakak'] ?? '');
$namaadek = bersihkan($_POST['namaadek'] ?? '');

if (!$cnim) {
  $_SESSION['flash_error'] = 'NIM tidak valid.';
  redirect_ke('bio_mahasiswa.php');
}
  /*
    Skrip di atas cara penulisan lamanya adalah:
    $cid = $_GET['cid'] ?? '';
    $cid = (int)$cid;

    Cara lama seperti di atas akan mengambil data mentah 
    kemudian validasi dilakukan secara terpisah, sehingga 
    rawan lupa validasi. Untuk input dari GET atau POST, 
    filter_input() lebih disarankan daripada $_GET atau $_POST.
  */

  /*
    Cek apakah $cid bernilai valid:
    Kalau $cid tidak valid, maka jangan lanjutkan proses, 
    kembalikan pengguna ke halaman awal (bio_mahasiswa.php) sembari 
    mengirim penanda error.
  */
  if (!$cnim) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('bio_mahasiswa.php');
  }

  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
  $stmt = mysqli_prepare($conn, "SELECT cnim,cnamalengkap, ctempatlahir, ctanggallahir, chobi, cpasangan, pekerjaan, cnamaortu, cnamakakak, cnamaadek
                                    FROM tbl_mahasiswa WHERE nim = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('bio_mahasiswa.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $cnim);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('bio_mahasiswa.php');
  }

  #Nilai awal (prefill form)
  $nim  = $row['cnim'] ?? '';
  $namalengkap = $row['cnamalengkap'] ?? '';
  $tempatlahir= $row['ctempatlahir'] ?? '';
  $tanggallahir = $row['ctanggallahir'] ?? '';
  $hobi = $row['chobi'] ?? '';
  $pasangan = $row['cpasangan'] ?? '';
  $pekerjaan = $row['cpekerjaan'] ?? '';
  $namaortu = $row['cnamaortu'] ?? '';
  $namakakak = $row['cnamakakak'] ?? '';
   $namaadek = $row['cnamaadek'] ?? '';

  #Ambil error dan nilai old input kalau ada
  $flash_error = $_SESSION['flash_error'] ?? '';
  $old = $_SESSION['old'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old']);
  if (!empty($old)) {
    $nim  = $old['nim'] ?? $nim;
    $namalengkap = $old['namalengkap'] ?? $namalengkap;
    $tempatlahir = $old['tempatlahir'] ?? $tempatlahir;
    $tanggallahir = $old['tanggallahir'] ?? $tanggallahir;
    $hobi = $old['hobi'] ?? $hobi;
    $pasangan = $old['pasangan'] ?? $pasangan;
    $pekerjaan = $old['pekerjaan'] ?? $pekerjaan;
    $namaortu = $old['namaortu'] ?? $namaortu;
    $namakakak = $old['namakakak'] ?? $namakakak;
    $namaadek = $old['namaadek'] ?? $namaadek;
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
     <section id="biodata">
      <h2>Biodata Sederhana Mahasiswa</h2>
       <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>
        
      <form action="proses_update_bio.php" method="POST">
<input type="hidden" name="cnim" value="<?= $nim ?>">

<input type="text" name="namalengkap" value="<?= $namalengkap ?>">
<input type="text" name="tempatlahir" value="<?= $tempatlahir ?>">
<input type="text" name="tanggallahir" value="<?= $tanggallahir ?>">
<input type="text" name="hobi" value="<?= $hobi ?>">
<input type="text" name="pasangan" value="<?= $pasangan ?>">
<input type="text" name="pekerjaan" value="<?= $pekerjaan ?>">
<input type="text" name="namaortu" value="<?= $namaortu ?>">
<input type="text" name="namakakak" value="<?= $namakakak ?>">
<input type="text" name="namaadek" value="<?= $namaadek ?>">




        <button type="submit">Kirim</button>
        <button type="reset">Batal</button>
        
      </form>
       
      </section>
    </main>

   
    
  </body>
</html>

