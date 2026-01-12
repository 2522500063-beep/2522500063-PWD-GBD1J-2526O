<?php
session_start();
require __DIR__ . './koneksi.php';
require_once __DIR__ . '/fungsi.php';

#cek method form, hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
  $_SESSION['flash_error'] = 'Akses tidak valid.';
  redirect_ke('index.php#biodata');
}

#ambil dan bersihkan nilai dari form
$namalengkap = bersihkan($_POST['txtnimEd'] ?? '');
 $namalengkap = bersihkan($_POST['txtNmLengkapEd'] ?? '');
$tempatlahir = bersihkan($_POST['txtT4LhrEd' ?? '']);
$tanggal_ahir = bersihkan($_POST['txtTglLhrEd' ?? '']);
$hobi = bersihkan($_POST['txtHobiEd'] ?? '');
$pasangan = bersihkan($_POST['txtPasanganEd'] ?? '');
$pekerjaan = bersihkan($_POST['txtkerjaEd']) ?? '';
$namaorangtua = bersihkan($_POST['txtNmOrtuEd'] ?? '');
$namakakak = bersihkan($_POST['txtNmKakakEd'] ?? '');
$namaadek = bersihkan($_POST['txtNmAdekEd'] ?? '');

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

if ($namaadek === '') {
  $errors[] = 'nama adek wajib diisi.';
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
    'nama_adek' => $namaadek,
  ];


  $_SESSION['flash_error'] = implode('<br>', $errors);
  redirect_ke('index.php#biodata');
}

#menyiapkan query INSERT dengan prepared statement
$sql = "INSERT INTO tbl_mahasiswa (nim, nama_lengkap, tempat_lahir, tanggal_lahir, hobi, pasangan, pekerjaan, nama_orang_tua, nama_kakak, nama_adek) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_prepare($conn, $sql);

if (!$stmt) {
  #jika gagal prepare, kirim pesan error ke pengguna (tanpa detail sensitif)
  $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
  redirect_ke('index.php#biodata');
}
#bind parameter dan eksekusi (s = string)
mysqli_stmt_bind_param($stmt, "sssssssss", $namalengkap, $tempatlahir, $tanggallahir, $hobi, $pasangan, $pekerjaan, $namaortu, $namakakak, $namaadek, $nim);

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
    'nama_adek' => $namaadek,
  ];
  $_SESSION['flash_error'] = 'Data gagal disimpan. Silakan coba lagi.';
  redirect_ke('index.php#biodata');
}
#tutup statement
mysqli_stmt_close($stmt);

$arrBiodata = [
  "nim" => $_POST["txtNim"] ?? "",
  "nama" => $_POST["txtNmLengkap"] ?? "",
  "tempat" => $_POST["txtT4Lhr"] ?? "",
  "tanggal" => $_POST["txtTglLhr"] ?? "",
  "hobi" => $_POST["txtHobi"] ?? "",
  "pasangan" => $_POST["txtPasangan"] ?? "",
  "pekerjaan" => $_POST["txtKerja"] ?? "",
  "ortu" => $_POST["txtNmOrtu"] ?? "",
  "kakak" => $_POST["txtNmKakak"] ?? "",
  "adik" => $_POST["txtNmAdik"] ?? ""
];
$_SESSION["biodata"] = $arrBiodata;

header("location: index.php#about");


