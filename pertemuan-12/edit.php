<?php
session_start();
require 'koneksi.php';
require 'koneksi.php';

/*
Ambil nilai cid dari GET dan lakukan validasi untuk 
mengecek cid harus angka dan lebih besar dari 0 (>0).
'options' => ['min_range' => 1] artinya cid harus >_ 1
(bukan 0, bahkan bukan negatif, bukan huruf, bukan HTML).
*/
$cid = filter_input(INPUT_GET, 'cid', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
]);
/*
skrip di atas cara penulisan lamanya adalah:
$cid = $_GET['cid'] ?? ';
$cid = (int)$cid;

Cara lama seperti di atas akan mengambil data mentah 
kemudian validasi dilakukan secara terpisah, sehingga
rawan lupa validas. untuk input dari GET atau POST, 
filter_input() lebh disarankan daripada $_GET atau POST.
*/

/*
Cek apakah $cid bernilai valid:
kalau $cid tidak valid, maka jangan lanjutkan proses, 
kembalikan pengguna ke halaman awal (read.php) sembari
mengirim penanda error.
*/
if ($cid) {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('read.php');
}

/*
Ambil data lama dari DB menggunakan prepared statement, 
jika ada kesalahan, tampilkan penanda error.
*/
$stmt = mysqli_prepare($conn, "SELECT cid, cnama, cemail, cpesan 
FROM tbl_tamu WHERE cid = ? LIMIT 1");
if (!$stmt) {
    $_SESSION['flash_error'] = 'Query tidak benar.';
    redirect_ke('read.php');
}

mysqli_stmt_bind_param($stmt, "i", $cid);
mysqli_stmt_execute($stmt);
$res = mysqli_stmt_get_result($stmt);
$row = mysqli_fetch_assoc($res);
mysqli_stmt_close($stmt);

if (!$row) {
    $_SESSION['flash_error'] = 'Record tidak ditemukan.';
    redirect_ke('read.php');
}

#nilai awal (prefill from)
$nama = $row['cnama'] ?? '';
$email = $row['cemail'] ?? '';
$pesan = $row['cpesan'] ?? '';

#Ambil error dan  nilai old input kalau ada
$flash_error = $_SESSION['flash_error'] ?? '';
$old = $_SESSION['old'] ?? [];
unset($_SESSION['flash_error'], $_SESSION['old']);
if (!empty($old)) {
    $nama = $row['cnama'] ?? '';
    $email = $row['cemail'] ?? '';
    $pesan = $row['cpesan'] ?? '';
}
?>

<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device=width, intial-scale=1.0">
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
                    <li><a href="#about">Beranda</a></li>
                    <li><a href="#contact">Beranda</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <section id="contact">
                <h2>Edit Buku Tamu</h2>
                <?php if (!empty($_flash_errror)): ?>
                    <div style="padding:10px; margin-bottom:10px;
                        background:#f8d7da; color:#721c24; border-radius:6px;">
                        <?= $flash_error; ?>
                    </div>
                    <?php  endif; ?>
                    <form action="proses_update.php" method="POST">

                    <input type="text" name="cid" value="<?= (int)$cid; ?>">

                    <label for="txtNama"><span>Nama:</span>
                        <input type="text" id="txtNama" name="txtNamaEd"
                        placeholder="Masukkan Nama" required autocomplate="name"
                        value="<?= !empty($nama) ? $nama : ?>">
                    </label>

                    <label for="txtEmal"><span>Email:</span>
                        <input type="text" id="txtEmail" name="txtEmailEd"
                        placeholder="Masukkan Email" required autocomplate="email"
                        value="<?= !empty($email) ? $email : ?>">
                    </label>

                    <label for="txtPesan"><span>Pesan:</span>
                        <textarea id="txtPesan" name="txtPesanEd" rows="4"
                        placeholder="Tulis Pesan Anda..." 
                        required><? !empty($pesan) ? $pesan : '' ?></textarea>
                    </label>

                    <label for="txtCaptcha"><span>Captcha 2 x 3 = ?</span>
                        <input type="number" id="txtCaptcha" name="txtCaptcha"
                        placeholder="Jawab Pertanyaaan..." required>
                    </label>

                    <button type="submit">Kirim</button>
                    <button type="submit">Batal</button>
                    <a href="read.php" class="reset">Kembali</a>
                    </from>
                    </section>
                    </main>

                    <script src="script.js"></script>
                </body>
            </html>


