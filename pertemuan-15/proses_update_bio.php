<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  <form action="proses_update_bio.php"
  method="POST">

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('bio_mahasiswa.php');
  }

  #validasi nim wajib angka dan > 0
  $cnim = filter_input(INPUT_POST, 'cnim', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cnim) {
    $_SESSION['flash_error'] = 'NIM Tidak Valid.';
    redirect_ke('edit_biodata.php?cnim='. (int)$cnim);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  $namalengkap = bersihkan($_POST['namalengkap']);
$tempatlahir = bersihkan($_POST['tempatlahir']);
$tanggallahir = bersihkan($_POST['tanggallahir']);
$hobi = bersihkan($_POST['hobi']);
$pasangan = bersihkan($_POST['pasangan']);
$pekerjaan = bersihkan($_POST['pekerjaan']);
$namaortu = bersihkan($_POST['namaortu']);
$namakakak = bersihkan($_POST['namakakak']);
$namaadek = bersihkan($_POST['namaadek']);
  

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

if ($namaortu === '') {
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
    'namalengkap' => $namalengkap,
    'tempatlahir' => $tempatlahir,
    'tanggallahir' => $tanggallahir,
    'hobi' => $hobi,
    'pasangan' => $pasangan,
    'pekerjaan' => $pekerjaan,
    'namaoratu' => $namaortu,
    'namakakak' => $namakakak,
    'namaadek' => $namaadek,
  ];

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit_biodata.php?cnim='. (int)$cnim);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn,"
UPDATE tbl_mahasiswa SET
  cnamalengkap=?,
  ctempatlahir=?,
  ctanggallahir=?,
  chobi=?,
  cpasangan=?,
  pekerjaan=?,
  cnamaortu=?,
  cnamakakak=?,
  cnamaadek=?
WHERE cnim=?
");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit_biodata.php?cnim='. (int)$cnim);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param(
    $stmt,
     "sssssssssi", 
    $namalengkap,
    $tempatlahir, 
    $tanggallahir, 
    $hobi, 
    $pasangan, 
    $pekerjaan, 
    $namaortu, 
    $namakakak, 
    $namaadek,
    $cnim
    );

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old']);

    header("Location: bio_mahasiswa.php");
exit;
    /*
      Redirect balik ke read.php dan tampilkan info sukses.
    */
    $_SESSION['flash_sukses'] = 'Terima kasih, data Anda sudah diperbaharui.';
    redirect_ke('bio_mahasiswa.php'); #pola PRG: kembali ke data dan exit()
  } else { #jika gagal, simpan kembali old value dan tampilkan error umum
    $_SESSION['old'] = [
      'nim'  => $nim,
    'nama lengkap' => $namalengkap,
    'tempat lahir' => $tempatlahir,
    'tanggal lahir' => $tanggallahir,
    'hobi' => $hobi,
    'pasangan' => $pasangan,
    'pekerjaan' => $pekerjaan,
    'nama orang tua' => $namaortu,
    'nama kakak' => $namakakak,
    'nama adek' => $namaadek,
  ];
    $_SESSION['flash_error'] = 'Data gagal diperbaharui. Silakan coba lagi.';
    redirect_ke('edit_biodata.php?cnim='. (int)$cnim);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit_biodata.php?cnim='. (int)$cnim);



