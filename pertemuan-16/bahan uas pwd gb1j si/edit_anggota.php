<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  /*
    Ambil nilai cid dari GET dan lakukan validasi untuk 
    mengecek cid harus angka dan lebih besar dari 0 (> 0).
    'options' => ['min_range' => 1] artinya cid harus ≥ 1 
    (bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
  */
  $cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);
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
    kembalikan pengguna ke halaman awal (read.php) sembari 
    mengirim penanda error.
  */
  if (!$cid) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read_anggota.php');
  }

  /*
    Ambil data lama dari DB menggunakan prepared statement, 
    jika ada kesalahan, tampilkan penanda error.
  */
  $stmt = mysqli_prepare($conn, "SELECT cid, cnama_lengkap, cnim, cjurusan, calamat 
                                    FROM tbl_anggota WHERE cid = ? LIMIT 1");
  if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read_anggota.php');
  }

  mysqli_stmt_bind_param($stmt, "i", $cid);
  mysqli_stmt_execute($stmt);
  $res = mysqli_stmt_get_result($stmt);
  $row = mysqli_fetch_assoc($res);
  mysqli_stmt_close($stmt);

  if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read_anggota.php');
  }

  #Nilai awal (prefill form)
  $id_anggota  = $row['cid_anggota'] ?? '';
  $nama_lengkap = $row['cnama_lengkap'] ?? '';
  $jurusan = $row['cjurusan'] ?? '';
  $jalamat = $row['cjalamat'] ?? '';

  #Ambil error dan nilai old input kalau ada
  $flash_error = $_SESSION['flash_error'] ?? '';
  $old = $_SESSION['old'] ?? [];
  unset($_SESSION['flash_error'], $_SESSION['old']);
  if (!empty($old)) {
    $id_anggota  = $old['id_anggota'] ?? $id_anggota;
    $nama_lengkap = $old['nama_lengkap'] ?? $nama_lengkap;
    $jurusan = $old['jurusan'] ?? $jurusan;
    $alamat = $old['alamat'] ?? $alamat;
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
      <section id="anggota">
        <h2>Edit Buku anggota</h2>
        <?php if (!empty($flash_error)): ?>
          <div style="padding:10px; margin-bottom:10px; 
            background:#f8d7da; color:#721c24; border-radius:6px;">
            <?= $flash_error; ?>
          </div>
        <?php endif; ?>
        <form action="proses_update_anggota.php" method="POST">

          <input type="text" name="cid" value="<?= (int)$cid; ?>">

          <label for="txtNamaLengkap"><span>Nama Lengkap:</span>
            <input type="text" id="txtNamaLengkap" name="txtNamaLengkapEd" 
              placeholder="Masukkan nama lengkap" required autocomplete="name"
              value="<?= !empty($nama_lengkap) ? $nama_lengkap : '' ?>">
          </label>

          <label for="txtJurusan"><span>Jurusan:</span>
            <input type="jurusan" id="txtJurusan" name="txtJurusanEd" 
              placeholder="Masukkan jurusan" required autocomplete="jurusan"
              value="<?= !empty($ejurusan) ? $jurusan : '' ?>">
          </label>

          <label for="txtAlamat"><span>Alamat ?</span>
            <input type="date" id="txtAlamat" name="txtAlamat" 
               placeholder="Masukkan alamat" required autocomplete="alamat"
              value="<?= !empty($alamat) ? $alamat : '' ?>">
          </label>

          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
          <a href="read_anggota.php" class="reset">Kembali</a>
        </form>
      </section>
    </main>

    <script src="script.js"></script>
  </body>
</html>