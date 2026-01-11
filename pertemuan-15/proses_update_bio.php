<?php
  session_start();
  require __DIR__ . '/koneksi.php';
  require_once __DIR__ . '/fungsi.php';

  #cek method form, hanya izinkan POST
  if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    $_SESSION['flash_error'] = 'Akses tidak valid.';
    redirect_ke('bio_mahasiswa.php');
  }

  #validasi cid wajib angka dan > 0
  $cid = filter_input(INPUT_POST, 'nim', FILTER_VALIDATE_INT, [
    'options' => ['min_range' => 1]
  ]);

  if (!$cnim) {
    $_SESSION['flash_error'] = 'NIM Tidak Valid.';
    redirect_ke('edit.php?cid='. (int)$nim);
  }

  #ambil dan bersihkan (sanitasi) nilai dari form
  $nim  = bersihkan($_POST['txtNimEd']  ?? '');
  $namalengkap = bersihkan($_POST['txtNamalengkapEd'] ?? '');
  $tempatlahir = bersihkan($_POST['txtTempatlahirEd'] ?? '');
  $tanggallahir = bersihkan($_POST['txtTanggallahir'] ?? '');
  $hobi  = bersihkan($_POST['txtHobiEd']  ?? '');
  $pasangan  = bersihkan($_POST['txtPasanganEd']  ?? '');
  $pekerjaan  = bersihkan($_POST['txtPekerjaanEd']  ?? '');
  $namaortu  = bersihkan($_POST['txtNamaortuEd']  ?? '');
  $namakakak  = bersihkan($_POST['txtNamakakakEd']  ?? '');
  $namaadek  = bersihkan($_POST['txtNamaadekEd']  ?? '');
  

  #Validasi sederhana
  $errors = []; #ini array untuk menampung semua error yang ada

 if ($nim === '') {
  $errors[] = 'NIM wajib diisi.';
}

  if ($nama === '') {
  $errors[] = 'Nama wajib diisi.';
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

if (mb_strlen($nama) < 3) {
  $errors[] = 'Nama minimal 3 karakter.';
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

    $_SESSION['flash_error'] = implode('<br>', $errors);
    redirect_ke('edit.php?cid='. (int)$cid);
  }

  /*
    Prepared statement untuk anti SQL injection.
    menyiapkan query UPDATE dengan prepared statement 
    (WAJIB WHERE cid = ?)
  */
  $stmt = mysqli_prepare($conn, "UPDATE tbl_mahasiswa 
                                SET cnamalengkap = ?, ctempatlahir = ?, ctanggallahir = ?, chobi = ?, cpasangan = ?, pekerjaan = ?, cnamaortu = ?, cnamakakak = ?, cnamaadek = ?
                                WHERE cnim = ?");
  if (!$stmt) {
    #jika gagal prepare, kirim pesan error (tanpa detail sensitif)
    $_SESSION['flash_error'] = 'Terjadi kesalahan sistem (prepare gagal).';
    redirect_ke('edit.php?cid='. (int)$cid);
  }

  #bind parameter dan eksekusi (s = string, i = integer)
  mysqli_stmt_bind_param($stmt, "sssi", $nim, $namalengkap, $tempatlahir, $tanggallahir, $hobi, $pasangan, $pekerjaan, $namaortu, $namakakak, $namaadek);

  if (mysqli_stmt_execute($stmt)) { #jika berhasil, kosongkan old value
    unset($_SESSION['old']);
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
    redirect_ke('edit.php?cid='. (int)$cid);
  }
  #tutup statement
  mysqli_stmt_close($stmt);

  redirect_ke('edit.php?cid='. (int)$cid);



