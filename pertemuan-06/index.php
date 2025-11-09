<!DOCTYPE html>
<html lang="en">
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
    <section id="home">
        <h2>Selamat Datang</h2>
        <p>Ini contoh paragraf HTML.</p>
        <?php 
        echo "Halo Dunia!<br>";
        echo "Nama Saya Anjelita Cahaya";
        ?>
    </section>
    <section id="about">
        <?php
        $NIM = "2522500063";
        $nama = "Anjelita  Cahaya";
        $tempat = "Pangkalpinang";
        $tanggal = "27 juli 2007";
        $hobi = "olahraga";
        $pasangan = "belum ada";
        $pekerjaan = "belum";
        $namaortu = "sudarmaji dan ibu agus fitriyanti";
        $namakakak = "feby wulandari";
        $namaadik = "-";
        ?>
        <h2>Biodata Anjelita Cahaya</h2>
        <p><strong>NIM:</strong> <?php echo $NIM; ?> </p>
        <p><strong>Nama Lengkap:</strong> <?php echo $nama; ?> &#9786;</p>
        <p><strong>Tempat Lahir:</strong> <?php echo $tempat; ?> </p>
        <p><strong>Tanggal Lahir:</strong> <?php echo $tanggal; ?> </p>
        <p><strong>Hobi:</strong> <?php echo $hobi; ?> &hearts;</p> 
        <p><strong>Pasangan:</strong> <?php echo $pasangan ?> &hearts;</p>
        <p><strong>pekerjaan:</strong> <?php echo $pekerjaan ?> &#128546;</p>
        <p><strong>Nama Orang Tua:</strong> <?php echo $namaortu ?> &hearts;</p>
        <p><strong>Nama Kakak:</strong> <?php echo $namakakak ?> &hearts;</p>
        <p><strong>Nama Adik:</strong> <?php echo $namaadik ?> </p>
    </section>
    <section id="ipk">
        <?php
        $namaMatkul1 = "";
    $namaMatkul2 = "";
    $namaMatkul3 = "";
    $namaMatkul4 = "";
    $namaMatkul5 = "";
    $sksMatkul1 = "";
    $sksMatkul2 = "";
    $sksMatkul3 = "";
    $sksMatkul4 = "";
    $sksMatkul5 = "";
    $nilaiHadir1 = "";
    $nilaiHadir2 = ""; 
    $nilaiHadir3 = "";
    $nilaiHadir4 = "";
    $nilaiHadir5 = "";
    $nilaiTugas1 = "";
    $nilaiTugas2 = "";
    $nilaiTugas3 = "";
    $nilaiTugas4 = "";
    $nilaiTugas5 = "";
    $nilaiUTS1 = "";
    $nilaiUTS2 = ""; 
    $nilaiUTS3 = "";
    $nilaiUTS4 = ""; 
    $nilaiUTS5 = "";
    $nilaiUAS1 = "";
    $nilaiUAS2 = ""; 
    $nilaiUAS3 = ""; 
    $nilaiUAS4 = ""; 
    $nilaiUAS5 = "";
    #Nilai Akhir = (0.1 * nilaiHadir) + (0.2 * nilaiTugas) + (0.3 * nilaiUTS) + (0.4 * nilaiUAS)
    $nilaiAkhir1 = "(0.1 * $nilaiHadir1) + (0.2 * $nilaiTugas1) + (0.3 * $nilaiUTS1) + (0.4 * $nilaiUAS1)"; 
    $nilaiAkhir2 = "(0.1 *  $nilaiHadir2) + (0.2 * $nilaiTugas2) + (0.3 * $nilaiUTS2) + (0.4 * $nilaiUAS2)";
    $nilaiAkhir3 = "(0.1 *  $nilaiHadir3) + (0.2 * $nilaiTugas3) + (0.3 * $nilaiUTS3) + (0.4 * $nilaiUAS3)"; 
    $nilaiAkhir4 = "(0.1 *  $nilaiHadir4) + (0.2 * $nilaiTugas4) + (0.3 * $nilaiUTS4) + (0.4 * $nilaiUAS4)";
    $nilaiAkhir5 = "(0.1 *  $nilaiHadir5) + (0.2 * $nilaiTugas5) + (0.3 * $nilaiUTS5) + (0.4 * $nilaiUAS5)";
    $grade1 = "";
    $grade2 = "";
    $grade3 = "";
    $grade4 = "";
    $grade5 = "";
    #Nilai kehadiran < 70, otomatis Grade = E.
    if ($nilaiHadir1 < 70):
        $grade1 = "E";
    endif;
    if ($nilaiHadir2 < 70):
        $grade2 = "E";
    endif;
    if ($nilaiHadir3 < 70):
        $grade3 = "E";
    endif;
    if ($nilaiHadir4 < 70):
        $grade4 = "E";
    endif;
    if ($nilaiHadir5 < 70):
        $grade5 = "E";
    endif;
    $mutu1 = "";
    $mutu2 = ""; 
    $mutu3 = "";
    $mutu4 = "";
    $mutu5 = "";
    #Bobot = angkaMutu * sksMatkul
    $bobot1 = "Bobot = $mutu1 * $sksMatkul1"; 
    $bobot2 = "Bobot = $mutu2 * $sksMatkul2";
    $bobot3 = "Bobot = $mutu3 * $sksMatkul3"; 
    $bobot4 = "Bobot = $mutu4 * $sksMatkul4";
    $bobot5 = "Bobot = $mutu5 * $sksMatkul5";
    /*
    Grade A, A-, B+, B, B-, C+, C, C- maka Status: LULUS
    Grade D, E maka Status: GAGAL
    */
    switch ($grade1):
    case "A": = $status1 = "LULUS"; break;
    case "A-": = $status1 = "LULUS"; break;
    case "B+": = $status1 = "LULUS"; break;
    case "B": = $status1 = "LULUS"; break;
    case "B-": = $status1 = "LULUS"; break;
    case "C+": = $status1 = "LULUS"; break;
    case "C": = $status1 = "LULUS"; break;
    case "C-": = $status1 = "LULUS"; break;
    case "D":
    case "E":
        $status1 = "GAGAL"; 
        break;  
    endswitch;
     switch ($grade2):
    case "A": = $status2 = "LULUS"; break;
    case "A-": = $status2 = "LULUS"; break;
    case "B+": = $status2 = "LULUS"; break;
    case "B": = $status2 = "LULUS"; break;
    case "B-": = $status2 = "LULUS"; break;
    case "C+": = $status2 = "LULUS"; break;
    case "C": = $status2 = "LULUS"; break;
    case "C-": = $status2 = "LULUS"; break;
    case "D":
    case "E":
        $status2 = "GAGAL"; 
        break;
    endswitch;
    switch ($grade3):
    case "A": = $status3 = "LULUS"; break;
    case "A-": = $status3 = "LULUS"; break;
    case "B+": = $status3 = "LULUS"; break;
    case "B": = $status3 = "LULUS"; break;
    case "B-": = $status3 = "LULUS"; break;
    case "C+": = $status3 = "LULUS"; break;
    case "C": = $status3 = "LULUS"; break;
    case "C-": = $status3 = "LULUS"; break;
    case "D":
    case "E":
        $status3 = "GAGAL"; 
        break;
    endswitch;
    switch ($grade4):
    case "A": = $status4 = "LULUS"; break;
    case "A-": = $status4 = "LULUS"; break;
    case "B+": = $status4 = "LULUS"; break;
    case "B": = $status4 = "LULUS"; break;
    case "B-": = $status4 = "LULUS"; break;
    case "C+": = $status4 = "LULUS"; break;
    case "C": = $status4 = "LULUS"; break;
    case "C-": = $status4 = "LULUS"; break;
    case "D":
    case "E":
        $status4 = "GAGAL"; 
        break;
    endswitch;
    switch ($grade5):
    case "A": = $status5 = "LULUS"; break;
    case "A-": = $status5 = "LULUS"; break;
    case "B+": = $status5 = "LULUS"; break;
    case "B": = $status5 = "LULUS"; break;
    case "B-": = $status5 = "LULUS"; break;
    case "C+": = $status5 = "LULUS"; break;
    case "C": = $status5 = "LULUS"; break;
    case "C-": = $status5 = "LULUS"; break;
    case "D":
    case "E":
        $status5 = "GAGAL"; 
        break;
    endswitch; 
    $totalBobot = "";
    $totalSKS = "";
    $IPK = "";
        
        
        ?>


        <h2>Nilai Saya</h2>
        <p><strong>Nama Matakuliah-1 : </strong><strong> <?php echo $namaMatkul1; ?> </strong></p>
        <p><strong>SKS :</strong> <?php echo $sksMatkul1; ?> </p>
        <p><strong>kehadiran :</strong> <?php echo $nilaiHadir1; ?> </p>
        <p><strong>Tugas :</strong> <?php echo $nilaiTugas1; ?></p>
        <p><strong>UTS :</strong> <?php echo $nilaiUts1; ?></p>
        <p><strong>UAS :</strong>  <?php echo $nilaiUas1; ?></p>
        <p><strong>Nilai Akhir :</strong>  <?php echo $nilaiAkhir1; ?></p>
        <p><strong>Grade :</strong> <?php echo $grade1; ?></p>
        <p><strong>Angka Mutu :</strong>  <?php echo $mutu1; ?></p>
        <p><strong>Bobot :</strong> <?php echo $bobot1; ?></p>
        <p><strong>Status :</strong> <?php echo $status1; ?></p>

        <h2></h2>
        <p><strong>Nama Matakuliah-2 :</strong><strong> <?php echo $namaMatkul2; ?></strong></p>
        <p><strong>SKS</strong>: <?php echo $sksMatkul2; ?> </p>
        <p><strong>kehadiran </strong>: <?php echo $nilaiHadir2; ?></p>
        <p><strong>Tugas</strong>: <?php echo $nilaiTugas2; ?></p>
        <p><strong>UTS</strong>: <?php echo $nilaiUts2; ?> </p>
        <p><strong>UAS</strong> : <?php echo $nilaiUas2; ?></p>
        <p><strong>Nilai Akhir</strong> : <?php echo $nilaiAkhir2; ?></p>
        <p><strong>Grade </strong>: <?php echo $grade2; ?></p>
        <p><strong>Angka Mutu</strong> : <?php echo $mutu2; ?></p>
        <p><strong>Bobot </strong>:< <?php echo $bobot2; ?></p>
        <p><strong>Status </strong>: <?php echo $status2; ?></p>

        <h2></h2>
        <p><strong>Nama Matakuliah-3 :</strong><strong> <?php echo $namaMatkul3 ?></strong></p>
        <p><strong>SKS</strong>: <?php echo $sksMatkul3 ?></p>
        <p><strong>kehadiran </strong>: <?php echo $nilaiHadir3 ?> </p>
        <p><strong>Tugas</strong>: <?php echo $nilaiTugas3 ?></p>
        <p><strong>UTS</strong>: <?php echo $nilaiUts3 ?></p>
        <p><strong>UAS</strong> : <?php echo $nilaiUas3 ?></p>
        <p><strong>Nilai Akhir</strong> : <?php echo $nilaiAkhir3 ?></p>
        <p><strong>Grade </strong>: <?php echo $grade3 ?></p>
        <p><strong>Angka Mutu</strong> : <?php echo $mutu3 ?></p>
        <p><strong>Bobot </strong>:< <?php echo $bobot3 ?></p>
        <p><strong>Status </strong>: <?php echo $status3 ?></p>

        <h2></h2>
        <p><strong>Nama Matakuliah-4 :</strong><strong>  <?php echo $namaMatkul4 ?></strong></p>
        <p><strong>SKS</strong>:  <?php echo $sksMatkul4 ?></p>
        <p><strong>kehadiran </strong>:  <?php echo $nilaiHadir4 ?></p>
        <p><strong>Tugas</strong>:  <?php echo $nilaiTugas4 ?></p>
        <p><strong>UTS</strong>:  <?php echo $nilaiUts4 ?></p>
        <p><strong>UAS</strong> :  <?php echo $nilaiUas4 ?></p>
        <p><strong>Nilai Akhir</strong> :  <?php echo $nilaiAkhir ?></p>
        <p><strong>Grade </strong>:  <?php echo $grade4 ?></p>
        <p><strong>Angka Mutu</strong> :  <?php echo $mutu4 ?></p>
        <p><strong>Bobot </strong>:<  <?php echo $bobot4 ?></p>
        <p><strong>Status </strong>:  <?php echo $status4 ?></p>

        <h2></h2>
        <p><strong>Nama Matakuliah-5 :</strong><strong>  <?php echo $namaMatkul5 ?></strong></p>
        <p><strong>SKS</strong>:  <?php echo $sksMatkul5 ?></p>
        <p><strong>kehadiran </strong>:  <?php echo $nilaiHadir5 ?></p>
        <p><strong>Tugas</strong>:  <?php echo $nilaiTugas5 ?></p>
        <p><strong>UTS</strong>:  <?php echo $nilaiUts5 ?></p>
        <p><strong>UAS</strong> :  <?php echo $nilaiUas5 ?></p>
        <p><strong>Nilai Akhir</strong> :  <?php echo $nilaiAkhir5 ?></p>
        <p><strong>Grade </strong>:  <?php echo $grade5 ?></p>
        <p><strong>Angka Mutu</strong> :  <?php echo $mutu5 ?></p>
        <p><strong>Bobot </strong>:<  <?php echo $bobot5 ?></p>
        <p><strong>Status </strong>:  <?php echo $status5 ?></p>




    </section>
    <section id="contact">
        <h2>Kontak Saya</h2>
        <form action="" method="GET">
          <label for="txtNama"><span>Nama:</span>
          <input type="text" id="txtNama" name="txtName" placeholder="Masukkan nama" required autocomplete="name">
          </label>
          <label for="txtEmail"><span>Email:</span>
          <input type="email" id="txtEmail" name="txtEmail" placeholder="Masukkan email" required autocomplete="email">
          </label>
          <label for="txtPesan"><span>Pesan Anda:</span>
          <textarea id="txtPesan" name="txtPesan" rows="4" placeholder="Tulis pesan anda..." required></textarea>
          <small id="charCount">0/200 karakter</small>
          </label>
          <button type="submit">Kirim</button>
          <button type="reset">Batal</button>
        </form>
    <section>
 </main>
 <footer>
    <p>&copy; 2025 Anjelita Cahaya 2522500063</p>
 </footer>

 <script src="script.js"></script>
</body>
</html>
