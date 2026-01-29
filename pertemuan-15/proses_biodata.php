<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
 die('Akses tidak valid');
}

#ambil dan bersihkan nilai dari form
$nim = bersihkan($_POST['txtNim'] ?? '');
 $namalengkap = bersihkan($_POST['txtNmLengkap'] ?? '');
$tempatlahir = bersihkan($_POST['txtT4Lhr' ?? '']);
$tanggallahir = bersihkan($_POST['txtTglLhr' ?? '']);
$hobi = bersihkan($_POST['txtHobi'] ?? '');
$pasangan = bersihkan($_POST['txtPasangan'] ?? '');
$pekerjaan = bersihkan($_POST['txtkerja']) ?? '';
$namaorangtua = bersihkan($_POST['txtNmOrtu'] ?? '');
$namakakak = bersihkan($_POST['txtNmKakak'] ?? '');
$namaadik = bersihkan($_POST['txtNmAdik'] ?? '');

#Validasi sederhana
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

if ($namaadik === '') {
  $errors[] = 'nama adik wajib diisi.';
}

/*
kondisi di bawah ini hanya dikerjakan jika ada error, 
simpan nilai lama dan pesan error, lalu redirect (konsep PRG)
*/
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
    'nama_adik' => $namaadik,
  ];


  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO tbl_mahasiswa (nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_orang_tua, nama_kakak, nama_adik) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "isssssssss", $namalengkap, $tempatlahir, $tanggallahir, $hobi, $pasangan, $pekerjaan, $namaortu, $namakakak, $namaadik, $nim);

if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value, beri pesan sukses
  unset($_SESSION['old']);
  $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah tersimpan.';
  redirect_ke('index.php#biodata'); #pola PRG: kembali ke form / halaman home
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
    'nama_adik' => $namaadik,
  ];
  $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#biodata');
}
#tutup statement
mysqli_stmt_close($stmt);




