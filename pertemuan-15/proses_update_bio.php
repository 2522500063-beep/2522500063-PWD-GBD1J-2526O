<?php
session_start();
require __DIR__ . '/koneksi.php';
require_once __DIR__ . '/fungsi.php';

// Pastikan method POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('bio_mahasiswa.php');
}

// Ambil dan validasi NIM
$nim = filter_input(INPUT_POST, 'nim', FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]);
if (!$nim) {
    $_SESSION['flash_error'] = 'NIM tidak valid.';
    redirect_ke('edit_biodata.php?nim='. (int)$nim);
}

// Ambil & sanitasi input
$namalengkap = bersihkan($_POST['txtnimEd'] ?? '');
 $namalengkap = bersihkan($_POST['txtNmLengkapEd'] ?? '');
$tempatlahir = bersihkan($_POST['txtT4LhrEd'] ?? '');
$tanggal_ahir = bersihkan($_POST['txtTglLhrEd'] ?? '');
$hobi = bersihkan($_POST['txtHobiEd'] ?? '');
$pasangan = bersihkan($_POST['txtPasanganEd'] ?? '');
$pekerjaan = bersihkan($_POST['txtkerjaEd'] ?? '');
$namaorangtua = bersihkan($_POST['txtNmOrtuEd'] ?? '');
$namakakak = bersihkan($_POST['txtNmKakakEd'] ?? '');
$namaadek = bersihkan($_POST['txtNmAdekEd'] ?? '');

// Validasi sederhana
$errors = []; #ini array untuk menampung semua error yang ada

 if ($nim === '') {
  $errors[] = 'NIM wajib diisi.';
}

  if ($namalengkap === '') {
  $errors[] = 'Nama lengkap wajib diisi.';
}

if ($tempatlahir === '') {
  $errors[] = 'Tempat lahir wajib diisi.';
} 

if ($tanggallahir === '') {
  $errors[] = 'tanggal lahir wajib diisi.';
}

if ($hobi === '') {
  $errors[] = 'hobi wajib diisi.';
}

if (mb_strlen($namalengkap) < 3) {
  $errors[] = 'Nama  minimal 3 karakter.';
}

if ($pasangan === '') {
  $errors[] = 'pasangan wajib wajib diisi.';
}

if ($pekerjaan === '') {
  $errors[] = 'pekerjaan wajib diisi.';
}

if ($namorangtua === '') {
  $errors[] = 'nama orang tua wajib diisi.';
}

if ($namakakak === '') {
  $errors[] = 'nama kakak wajib diisi.';
}

if ($namaadek === '') {
  $errors[] = 'nama adek wajib diisi.';
}

if (!empty($errors)) {
  $_SESSION['old'] = [
     'nim'  => $nim,
    'nama_lengkap' => $namalengkap,
    'tempat_lahir' => $tempatlahir,
    'tanggal_lahir' => $tanggallahir,
    'hobi' => $hobi,
    'pasangan' => $pasangan,
    'pekerjaan' => $pekerjaan,
    'nama_orang_tua' => $namaorangtua,
    'nama_kakak' => $namakakak,
    'nama_adek' => $namaadek,
  ];

$_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit_biodata.php?nim='. (int)$nim);
  }

// Prepared statement update
$stmt = mysqli_prepare($conn, "UPDATE tbl_mahasiswa 
                               SET nama_lengkap=?, tempat_lahir=?, tanggal_lahir=?, hobi=?, pasangan=?, pekerjaan=?, nama_orang_tua=?, nama_kakak=?, nama_adek=?
                               WHERE nim=?");

    if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_biodata.php?nim='. (int)$nim);
  }

mysqli_stmt_bind_param($stmt, "sssssssssi",
    $namalengkap, $tempatlahir, $tanggallahir, $hobi, $pasangan, $pekerjaan, $namaorangtua, $namakakak, $namaadek, $nim
);

if (mysqli_stmt_execute($stmt)) {
    unset($_SESSION['old']);

    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('bio_mahasiswa.php'); #pola PRG: kembali ke data dan exit()
  } else { #jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old'] = [
     'nim'  => $nim,
    'nama_lengkap' => $namalengkap,
    'tempat_lahir' => $tempatlahir,
    'tanggal_lahir' => $tanggallahir,
    'hobi' => $hobi,
    'pasangan' => $pasangan,
    'pekerjaan' => $pekerjaan,
    'nama_orang_tua' => $namaorangtua,
    'nama_kakak' => $namakakak,
    'nama_adek' => $namaadek,
    ];

    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_biodata.php?nim='. (int)$nim);
  }

mysqli_stmt_close($stmt);