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
    $namaMatkul1 = "Algoritma dan Struktur Data";
    $namaMatkul2 = "Agama";
    $namaMatkul3 = "Basis Data";
    $namaMatkul4 = "Sistem Informasi";
    $namaMatkul5 = "Pemrograman Web Dasar";
    $sksMatkul1 = 4;
    $sksMatkul2 = 2;
    $sksMatkul3 = 3;
    $sksMatkul4 = 3;
    $sksMatkul5 = 3;
    $nilaiHadir1 = 90;
    $nilaiHadir2 = 70; 
    $nilaiHadir3 = 85;
    $nilaiHadir4 = 92;
    $nilaiHadir5 = 69;
    $nilaiTugas1 = 60;
    $nilaiTugas2 = 50;
    $nilaiTugas3 = 78;
    $nilaiTugas4 = 88;
    $nilaiTugas5 = 80;
    $nilaiUTS1 = 80;
    $nilaiUTS2 = 60; 
    $nilaiUTS3 = 70;
    $nilaiUTS4 = 75; 
    $nilaiUTS5 = 90;
    $nilaiUAS1 = 70;
    $nilaiUAS2 = 80; 
    $nilaiUAS3 = 82; 
    $nilaiUAS4 = 78; 
    $nilaiUAS5 = 100;
    #Nilai Akhir = (0.1 * nilaiHadir) + (0.2 * nilaiTugas) + (0.3 * nilaiUTS) + (0.4 * nilaiUAS)
    $nilaiAkhir1 = (0.1 * $nilaiHadir1) + (0.2 * $nilaiTugas1) + (0.3 * $nilaiUTS1) + (0.4 * $nilaiUAS1); 
    $nilaiAkhir2 = (0.1 *  $nilaiHadir2) + (0.2 * $nilaiTugas2) + (0.3 * $nilaiUTS2) + (0.4 * $nilaiUAS2);
    $nilaiAkhir3 = (0.1 *  $nilaiHadir3) + (0.2 * $nilaiTugas3) + (0.3 * $nilaiUTS3) + (0.4 * $nilaiUAS3); 
    $nilaiAkhir4 = (0.1 *  $nilaiHadir4) + (0.2 * $nilaiTugas4) + (0.3 * $nilaiUTS4) + (0.4 * $nilaiUAS4);
    $nilaiAkhir5 = (0.1 *  $nilaiHadir5) + (0.2 * $nilaiTugas5) + (0.3 * $nilaiUTS5) + (0.4 * $nilaiUAS5);
    
    
     if ($nilaiAkhir1 >= 91 && $nilaiAkhir1 <= 100) {
    $grade1 = "A";
    $mutu1 = 4;
} elseif ($nilaiAkhir1 >= 81 && $nilaiAkhir1 <= 90) {
    $grade1 = "A-";
    $mutu1 = 3.7;
} elseif ($nilaiAkhir1 >= 76 && $nilaiAkhir1 <= 80) {
    $grade1 = "B+";
    $mutu1 = 3.3;
} elseif ($nilaiAkhir1 >= 71 && $nilaiAkhir1 <= 75) {
    $grade1 = "B";
    $mutu1 = 3;
} elseif ($nilaiAkhir1 >= 66 && $nilaiAkhir1 <= 70) {
    $grade1 = "B-";
    $mutu1 = 2.7;
} elseif ($nilaiAkhir1 >= 61 && $nilaiAkhir1 <= 65) {
    $grade1 = "C+";
    $mutu1 = 2.3;
} elseif ($nilaiAkhir1 >= 56 && $nilaiAkhir1 <= 60) {
    $grade1 = "C";
    $mutu1 = 2;
} elseif ($nilaiAkhir1 >= 51 && $nilaiAkhir1 <= 55) {
    $grade1 = "C-";
    $mutu1 = 1.7;
} elseif ($nilaiAkhir1 >= 36 && $nilaiAkhir1 <= 50) {
    $grade1 = "D";
    $mutu1 = 1;
} else {
    $grade1 = "E";
    $mutu1 = 0;
}

if ($nilaiAkhir2 >= 91 && $nilaiAkhir2 <= 100) {
    $grade2 = "A";
    $mutu2 = 4;
} elseif ($nilaiAkhir2 >= 81 && $nilaiAkhir2 <= 90) {
    $grade2 = "A-";
    $mutu2 = 3.7;
} elseif ($nilaiAkhir2 >= 76 && $nilaiAkhir2 <= 80) {
    $grade2 = "B+";
    $mutu2 = 3.3;
} elseif ($nilaiAkhir2 >= 71 && $nilaiAkhir2 <= 75) {
    $grade2 = "B";
    $mutu2 = 3;
} elseif ($nilaiAkhir2 >= 66 && $nilaiAkhir2 <= 70) {
    $grade2 = "B-";
    $mutu2 = 2.7;
} elseif ($nilaiAkhir2 >= 61 && $nilaiAkhir2 <= 65) {
    $grade2 = "C+";
    $mutu2 = 2.3;
} elseif ($nilaiAkhir2 >= 56 && $nilaiAkhir2 <= 60) {
    $grade2 = "C";
    $mutu2 = 2;
} elseif ($nilaiAkhir2 >= 51 && $nilaiAkhir2 <= 55) {
    $grade2 = "C-";
    $mutu2 = 1.7;
} elseif ($nilaiAkhir2 >= 36 && $nilaiAkhir2 <= 50) {
    $grade2 = "D";
    $mutu2 = 1;
} else {
    $grade2 = "E";
    $mutu2 = 0;
}

if ($nilaiAkhir3 >= 91 && $nilaiAkhir3 <= 100) {
    $grade3 = "A";
    $mutu3 = 4;
} elseif ($nilaiAkhir3 >= 81 && $nilaiAkhir3 <= 90) {
    $grade3 = "A-";
    $mutu3 = 3.7;
} elseif ($nilaiAkhir3 >= 76 && $nilaiAkhir3 <= 80) {
    $grade3 = "B+";
    $mutu3 = 3.3;
} elseif ($nilaiAkhir3 >= 71 && $nilaiAkhir3 <= 75) {
    $grade3 = "B";
    $mutu3 = 3;
} elseif ($nilaiAkhir3 >= 66 && $nilaiAkhir3 <= 70) {
    $grade3 = "B-";
    $mutu3 = 2.7;
} elseif ($nilaiAkhir3 >= 61 && $nilaiAkhir3 <= 65) {
    $grade3 = "C+";
    $mutu3 = 2.3;
} elseif ($nilaiAkhir3 >= 56 && $nilaiAkhir3 <= 60) {
    $grade3 = "C";
    $mutu3 = 2;
} elseif ($nilaiAkhir3 >= 51 && $nilaiAkhir3 <= 55) {
    $grade3 = "C-";
    $mutu3 = 1.7;
} elseif ($nilaiAkhir3 >= 36 && $nilaiAkhir3 <= 50) {
    $grade3 = "D";
    $mutu3 = 1;
} else {
    $grade3 = "E";
    $mutu3 = 0;
}

if ($nilaiAkhir4 >= 91 && $nilaiAkhir4 <= 100) {
    $grade4 = "A";
    $mutu4 = 4;
} elseif ($nilaiAkhir4 >= 81 && $nilaiAkhir4 <= 90) {
    $grade4 = "A-";
    $mutu4 = 3.7;
} elseif ($nilaiAkhir4 >= 76 && $nilaiAkhir4 <= 80) {
    $grade4 = "B+";
    $mutu4 = 3.3;
} elseif ($nilaiAkhir4 >= 71 && $nilaiAkhir4 <= 75) {
    $grade4 = "B";
    $mutu4 = 3;
} elseif ($nilaiAkhir4 >= 66 && $nilaiAkhir4 <= 70) {
    $grade4 = "B-";
    $mutu4 = 2.7;
} elseif ($nilaiAkhir4 >= 61 && $nilaiAkhir4 <= 65) {
    $grade4 = "C+";
    $mutu4 = 2.3;
} elseif ($nilaiAkhir4 >= 56 && $nilaiAkhir4 <= 60) {
    $grade4 = "C";
    $mutu4 = 2;
} elseif ($nilaiAkhir4 >= 51 && $nilaiAkhir4 <= 55) {
    $grade4 = "C-";
    $mutu4 = 1.7;
} elseif ($nilaiAkhir4 >= 36 && $nilaiAkhir4 <= 50) {
    $grade4 = "D";
    $mutu4 = 1;
} else {
    $grade4 = "E";
    $mutu4= 0;
}

if ($nilaiAkhir5 >= 91 && $nilaiAkhir5 <= 100) {
    $grade5 = "A";
    $mutu5 = 4;
} elseif ($nilaiAkhir5 >= 81 && $nilaiAkhir5 <= 90) {
    $grade5 = "A-";
    $mutu5 = 3.7;
} elseif ($nilaiAkhir5 >= 76 && $nilaiAkhir5 <= 80) {
    $grade5 = "B+";
    $mutu5 = 3.3;
} elseif ($nilaiAkhir5 >= 71 && $nilaiAkhir5 <= 75) {
    $grade5 = "B";
    $mutu5 = 3;
} elseif ($nilaiAkhir5 >= 66 && $nilaiAkhir5 <= 70) {
    $grade5 = "B-";
    $mutu5 = 2.7;
} elseif ($nilaiAkhir5 >= 61 && $nilaiAkhir5 <= 65) {
    $grade5 = "C+";
    $mutu5 = 2.3;
} elseif ($nilaiAkhir5 >= 56 && $nilaiAkhir5 <= 60) {
    $grade5 = "C";
    $mutu5 = 2;
} elseif ($nilaiAkhir5 >= 51 && $nilaiAkhir5 <= 55) {
    $grade5 = "C-";
    $mutu5 = 1.7;
} elseif ($nilaiAkhir5 >= 36 && $nilaiAkhir5 <= 50) {
    $grade5 = "D";
    $mutu5 = 1;
} else {
    $grade5 = "E";
    $mutu5 = 0;
}

    
    

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
   
    #Bobot = angkaMutu * sksMatkul
    $bobot1 =  $mutu1 * $sksMatkul1; 
    $bobot2 =  $mutu2 * $sksMatkul2;
    $bobot3 =  $mutu3 * $sksMatkul3; 
    $bobot4 =  $mutu4 * $sksMatkul4;
    $bobot5 =  $mutu5 * $sksMatkul5;
    /*
    Grade A, A-, B+, B, B-, C+, C, C- maka Status: LULUS
    Grade D, E maka Status: GAGAL
    */
    switch ($grade1): 
    case "A":  
        $status1 = "LULUS"; 
        break;
    case "A-":  
        $status1 = "LULUS"; 
        break;
    case "B+":  
        $status1 = "LULUS";
         break;
    case "B": 
         $status1 = "LULUS";
          break;
    case "B-":  
        $status1 = "LULUS"; 
        break;
    case "C+":  
        $status1 = "LULUS"; 
        break;
    case "C":  
        $status1 = "LULUS"; 
        break;
    case "C-": 
         $status1 = "LULUS"; 
         break;
    case "D":
        $status1 = "GAGAL";
    case "E":
        $status1 = "GAGAL"; 
        break;  
    endswitch;

     switch ($grade2):
    case "A": 
         $status2 = "LULUS"; 
         break;
    case "A-":  
        $status2 = "LULUS"; 
        break;
    case "B+":  
        $status2 = "LULUS"; 
        break;
    case "B":  
        $status2 = "LULUS"; 
        break;
    case "B-":  
        $status2 = "LULUS"; 
        break;
    case "C+":  
        $status2 = "LULUS"; 
        break;
    case "C":  
        $status2 = "LULUS"; 
        break;
    case "C-":  
        $status2 = "LULUS"; 
        break;
    case "D":
        $status2 = "GAGAL";
        break;
    case "E":
        $status2 = "GAGAL"; 
        break;
    endswitch;
    switch ($grade3): 
    case "A":  
        $status3 = "LULUS"; 
        break;
    case "A-":  
        $status3 = "LULUS"; 
        break;
    case "B+":  
        $status3 = "LULUS"; 
        break;
    case "B":  
        $status3 = "LULUS"; 
        break;
    case "B-":  
        $status3 = "LULUS"; 
        break;
    case "C+":  
        $status3 = "LULUS"; 
        break;
    case "C":  
        $status3 = "LULUS"; 
        break;
    case "C-":  
        $status3 = "LULUS"; 
        break;
    case "D":
    case "E":
        $status3 = "GAGAL"; 
        break;
    endswitch;
    switch ($grade4):
    case "A":  
        $status4 = "LULUS"; 
        break;
    case "A-":  
        $status4 = "LULUS"; 
        break;
    case "B+":  
        $status4 = "LULUS"; 
        break;
    case "B":  
        $status4 = "LULUS"; 
        break;
    case "B-":  
        $status4 = "LULUS"; 
        break;
    case "C+":  
        $status4 = "LULUS"; 
        break;
    case "C":  
        $status4 = "LULUS"; 
        break;
    case "C-":  
        $status4 = "LULUS"; 
        break;
    case "D":
    case "E":
        $status4 = "GAGAL"; 
        break;
    endswitch;
    switch ($grade5):
    case "A":  
        $status5 = "LULUS"; 
        break;
    case "A-":  
        $status5 = "LULUS"; 
        break;
    case "B+":  
        $status5 = "LULUS"; 
        break;
    case "B":  
        $status5 = "LULUS"; 
        break;
    case "B-":  
        $status5 = "LULUS"; 
        break;
    case "C+":  
        $status5 = "LULUS"; 
        break;
    case "C":  
        $status5 = "LULUS"; 
        break;
    case "C-":  
        $status5 = "LULUS"; 
        break;
    case "D":
    case "E":
        $status5 = "GAGAL"; 
        break;
    endswitch;

    
     ?>
    

        <h2>Nilai Saya</h2>
        <p><strong>Nama Matakuliah-1 : </strong><strong> <?php echo $namaMatkul1; ?> </strong></p>
        <p><strong>SKS :</strong> <?php echo $sksMatkul1; ?> </p>
        <p><strong>kehadiran :</strong> <?php echo $nilaiHadir1; ?> </p>
        <p><strong>Tugas :</strong> <?php echo $nilaiTugas1; ?></p>
        <p><strong>UTS :</strong> <?php echo $nilaiUTS1; ?></p>
        <p><strong>UAS :</strong>  <?php echo $nilaiUAS1; ?></p>
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
        <p><strong>UTS</strong>: <?php echo $nilaiUTS2; ?> </p>
        <p><strong>UAS</strong> : <?php echo $nilaiUAS2; ?></p>
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
        <p><strong>UTS</strong>: <?php echo $nilaiUTS3 ?></p>
        <p><strong>UAS</strong> : <?php echo $nilaiUAS3 ?></p>
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
        <p><strong>UTS</strong>:  <?php echo $nilaiUTS4 ?></p>
        <p><strong>UAS</strong> :  <?php echo $nilaiUAS4 ?></p>
        <p><strong>Nilai Akhir</strong> :  <?php echo $nilaiAkhir4 ?></p>
        <p><strong>Grade </strong>:  <?php echo $grade4 ?></p>
        <p><strong>Angka Mutu</strong> :  <?php echo $mutu4 ?></p>
        <p><strong>Bobot </strong>:<  <?php echo $bobot4 ?></p>
        <p><strong>Status </strong>:  <?php echo $status4 ?></p>

        <h2></h2>
        <p><strong>Nama Matakuliah-5 :</strong><strong>  <?php echo $namaMatkul5 ?></strong></p>
        <p><strong>SKS</strong>:  <?php echo $sksMatkul5 ?></p>
        <p><strong>kehadiran </strong>:  <?php echo $nilaiHadir5 ?></p>
        <p><strong>Tugas</strong>:  <?php echo $nilaiTugas5 ?></p>
        <p><strong>UTS</strong>:  <?php echo $nilaiUTS5 ?></p>
        <p><strong>UAS</strong> :  <?php echo $nilaiUAS5 ?></p>
        <p><strong>Nilai Akhir</strong> :  <?php echo $nilaiAkhir5 ?></p>
        <p><strong>Grade </strong>:  <?php echo $grade5 ?></p>
        <p><strong>Angka Mutu</strong> :  <?php echo $mutu5 ?></p>
        <p><strong>Bobot </strong>:<  <?php echo $bobot5 ?></p>
        <p><strong>Status </strong>:  <?php echo $status5 ?></p>

    <h2>Hasil IPK</h2>
<?php
$totalBobot = $bobot1 + $bobot2 + $bobot3 + $bobot4 + $bobot5;
$totalSKS    = $sksMatkul1 + $sksMatkul2 + $sksMatkul3 + $sksMatkul4 + $sksMatkul5;
$IPK = $totalBobot / $totalSKS;

echo "<p><strong>Total SKS : </strong> $totalSKS</p>";
echo "<p><strong>Total Bobot : </strong> $totalBobot</p>";
echo "<p><strong>IPK : </strong> $IPK</p>";
?>


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
