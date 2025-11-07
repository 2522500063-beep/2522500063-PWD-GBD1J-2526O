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
        $sksMatkul1 = "4";
        $nilaiHadir1 = "90";
        $nilaiTugas1 = "60";
        $nilaiUts1 = "80";
        $nilaiUas1 = "70";
        $nilaiAkhir1 = "73";
        $grade1 = "";
        $mutu1 = "";
        $bobot1 = "";
        $status1 = "";
          
        $nilaiAkhir = (0.2*$nilaiHadir1)+(0.2*$nilaiTugas1)+(0.3*$nilaiUts1)+(0.4*$nilaiUas1);
        

         {
        if($nilaiAkhir >= 81) {$grade1 = "A-"; $mutu1 = "3,70";
        } elseif ($nilaiAkhir >= 76) {$grade1 = "B+"; $mutu1 = "3,30";
        } elseif ($nilaiAkhir >= 71) {$grade1 = "B"; $mutu1 = "3,00";
        } elseif ($nilaiAkhir >= 66) {$grade1 = "B-"; $mutu1 = "2,70";
        } else {$grade = "C"; $mutu1 = "2,00";}
        }

        
        $bobot1 = $mutu1*$sksMatkul1;

        if ($grade1 == 'A-' || $grade1 == 'C' || $grade1 == 'E') {$status1 = "lulus";
        } else {
            $status1 = "tidak lulus";
        }
        $namaMatkul2 = "Agama";
        $sksMatkul2 = "2";
        $nilaiHadir2 = "70";
        $nilaiTugas2 = "50";
        $nilaiUts2 = "60";
        $nilaiUas2 = "80";
        $nilaiAkhir2 = "67";
        $grade2 = "";
        $mutu2 = "";
        $bobot2 = "";
        $status2 = "";

        $nilaiAkhir = (0.2*$nilaiHadir2)+(0.2*$nilaiTugas2)+(0.3*$nilaiUts2)+(0.4*$nilaiUas2);

        if($nilaiAkhir >= 76) {$grade2 = "B+"; $mutu2 = "3,30";
        } elseif ($nilaiAkhir >= 71) {$grade2 = "B+"; $mutu2 = "3,00";
        } elseif ($nilaiAkhir >= 66) {$grade2 = "B-"; $mutu2 = "2,70";
        } elseif ($nilaiAkhir >= 61) {$grade2 = "C+"; $mutu2 = "2,30";
        } else {$grade = "C"; $mutu2 = "2,00";}

        $bobot2 = $mutu2*$sksMatkul2;

        if ($grade2 == 'B+' || $grade2 == 'C' || $grade2 == 'E') {$status2 = "lulus";
        } else {
            $status2 =  "tidak lulus";
        }

       
        
       
        $namaMatkul3 = "Basis Data";
        $sksMatkul3 = "3";
        $nilaiHadir3 = "85";
        $nilaiTugas3 = "78";
        $nilaiUts3 = "70";
        $nilaiUas3 = "82";
        $nilaiAkhir3 = "78";
        $grade3 = "";
        $mutu3 = "";
        $bobot3 = "";
        $status3 = "";

         $nilaiAkhir = (0.2*$nilaiHadir3)+(0.2*$nilaiTugas3)+(0.3*$nilaiUts3)+(0.4*$nilaiUas3);

         if($nilaiAkhir >= 81) {$grade3 = "A-"; $mutu3 = "3,70";
        } elseif ($nilaiAkhir >= 76) {$grade3 = "B+"; $mutu3 = "3,30";
        } elseif ($nilaiAkhir >= 71) {$grade3 = "B"; $mutu3 = "3,00";
        } elseif ($nilaiAkhir >= 66) {$grade3 = "B-"; $mutu3 = "2,70";
        } else {$grade = "C"; $mutu3 = "2,00";}

        $bobot3 = $mutu3*$sksMatkul3;

        if ($grade3 == 'A-' || $grade3 == 'C' || $grade3 == 'E') {$status3 = "lulus";
        } else {
            $status3 = "tidak lulus";
        }


        $namaMatkul4 = "Sistem Informasi";
        $sksMatkul4 = "3";
        $nilaiHadir4 = "92";
        $nilaiTugas4 = "88";
        $nilaiUts4 = "75";
        $nilaiUas4 = "78";
        $nilaiAkhir4 = "80";
        $grade4 = "";
        $mutu4 = "";
        $bobot4 = "";
        $status4 = "";

        $nilaiAkhir = (0.2*$nilaiHadir4)+(0.2*$nilaiTugas4)+(0.3*$nilaiUts4)+(0.4*$nilaiUas4);

        if($nilaiAkhir >= 81) {$grade4 = "A-"; $mutu4 = "3,70";
        } elseif ($nilaiAkhir >= 76) {$grade4 = "B+"; $mutu4 = "3,30";
        } elseif ($nilaiAkhir >= 71) {$grade4 = "B"; $mutu4 = "3,00";
        } elseif ($nilaiAkhir >= 66) {$grade4 = "B-"; $mutu4 = "2,70";
        } else {$grade = "C"; $mutu4 = "2,00";}

        $bobot4 = $mutu4*$sksMatkul4;

        if ($grade4 == 'A-' || $grade4 == 'C' || $grade4 == 'E') {$status4 = "lulus";
        } else {
            $status4 = "tidak lulus";
        }

        $namaMatkul5 = "Pemrograman Web Dasar";
        $sksMatkul5 = "3";
        $nilaiHadir5 = "69";
        $nilaiTugas5 = "80";
        $nilaiUts5 = "90";
        $nilaiUas5 = "100";
        $nilaiAkhir5 = "90";
        $grade5 = "";
        $mutu5 = "";
        $bobot5 = "";
        $status5 = "";

        $nilaiAkhir = (0.2*$nilaiHadir5)+(0.2*$nilaiTugas5)+(0.3*$nilaiUts5)+(0.4*$nilaiUas5);

        if($nilaiAkhir >= 91) {$grade5 = "A"; $mutu5 = "4,00";
        } elseif ($nilaiAkhir >= 81) {$grade5 = "A-"; $mutu5 = "3,70";
        } elseif ($nilaiAkhir >= 76) {$grade5 = "B+"; $mutu5 = "3,30";
        } elseif ($nilaiAkhir >= 71) {$grade5 = "B"; $mutu5 = "3,00";
        } else {$grade = "B-"; $mutu5 = "2,70";}

        $bobot5 = $mutu5*$sksMatkul5;

        if ($grade5 == 'A' || $grade5 == 'B-' || $grade5 == 'E') {$status5 = "lulus";
        } else {
            $status5 = "tidak lulus";
        }
        
        ?>
        <h2>Rekapitulasi IPK</h2>
        <p><strong>Total SKS:</strong> <?php echo $sksMatkul1, $sksMatkul2, $sksMatkul3, $sksMatkul4, $sksMatkul5; ?></p>
        <p><strong>Total Bobot:</strong> <?php echo $bobot1, $bobot2, $bobot3, $bobot4, $bobot5; ?></p>
        <p><strong>Indeks Prestasi Kumulatif (IPK):</strong> <?php echo  ($totalBobot/$totalSKS); ?></p>

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
