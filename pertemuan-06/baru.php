<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Judul Halaman</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

function hitungNilaiAkhir($hadir, $tugas, $uts, $uas) {
    
    return (0.1 * $hadir) + (0.2 * $tugas) + (0.3 * $uts) + (0.4 * $uas);
}


function getGrade($nilaiAkhir) {
    if ($nilaiAkhir >= 86) return "A";
    if ($nilaiAkhir >= 81) return "A-";
    if ($nilaiAkhir >= 76) return "B+";
    if ($nilaiAkhir >= 71) return "B";
    if ($nilaiAkhir >= 66) return "B-";
    if ($nilaiAkhir >= 61) return "C+";
    if ($nilaiAkhir >= 56) return "C";
    if ($nilaiAkhir >= 45) return "D";
    return "E";
}


function getMutu($grade) {
    
    switch ($grade) {
        case "A": return 4.00;
        case "A-": return 3.70;
        case "B+": return 3.30;
        case "B": return 3.00;
        case "B-": return 2.70;
        case "C+": return 2.30;
        case "C": return 2.00;
        case "D": return 1.00;
        default: return 0.00; 
    }
}


function getStatus($grade) {
    if ($grade == 'E' || $grade == 'D') {
        return "Tidak Lulus";
    }
    return "Lulus";
}


$matkulData = [
    1 => [
        'nama' => "Algoritma dan Struktur Data", 'sks' => 4,
        'hadir' => 90, 'tugas' => 60, 'uts' => 80, 'uas' => 70
    ],
    2 => [
        'nama' => "Agama", 'sks' => 2,
        'hadir' => 70, 'tugas' => 50, 'uts' => 60, 'uas' => 80
    ],
    3 => [
        'nama' => "Basis Data", 'sks' => 3,
        'hadir' => 85, 'tugas' => 78, 'uts' => 70, 'uas' => 82
    ],
    4 => [
        'nama' => "Sistem Informasi", 'sks' => 3,
        'hadir' => 92, 'tugas' => 88, 'uts' => 75, 'uas' => 78
    ],
    5 => [
        'nama' => "Pemrograman Web Dasar", 'sks' => 3,
        'hadir' => 69, 'tugas' => 80, 'uts' => 90, 'uas' => 100
    ]
];

$totalBobot = 0;
$totalSks = 0;


foreach ($matkulData as $i => &$matkul) {
    $matkul['nilaiAkhir'] = hitungNilaiAkhir($matkul['hadir'], $matkul['tugas'], $matkul['uts'], $matkul['uas']);
    $matkul['grade'] = getGrade($matkul['nilaiAkhir']);
    $matkul['mutu'] = getMutu($matkul['grade']);
    $matkul['bobot'] = $matkul['mutu'] * $matkul['sks'];
    $matkul['status'] = getStatus($matkul['grade']);

    $totalBobot += $matkul['bobot'];
    $totalSks += $matkul['sks'];


   
    ${"namaMatkul$i"} = $matkul['nama'];
    ${"sksMatkul$i"} = $matkul['sks'];
    ${"nilaiHadir$i"} = $matkul['hadir'];
    ${"nilaiTugas$i"} = $matkul['tugas'];
    ${"nilaiUts$i"} = $matkul['uts'];
    ${"nilaiUas$i"} = $matkul['uas'];
    ${"nilaiAkhir$i"} = number_format($matkul['nilaiAkhir'], 2);
    ${"grade$i"} = $matkul['grade'];
    ${"mutu$i"} = number_format($matkul['mutu'], 2, ',', ''); 
    ${"bobot$i"} = number_format($matkul['bobot'], 2, ',', ''); 
    ${"status$i"} = $matkul['status'];
}
unset($matkul); 

$ipk = ($totalSks > 0) ? $totalBobot / $totalSks : 0;


$NIM = "2522500063";
$nama = "Anjelita Cahaya"; 
$tempat = "Pangkalpinang";
$tanggal = "27 Juli 2007";
$hobi = "olahraga";
$pasangan = "belum ada";
$pekerjaan = "belum";
$namaortu = "Sudarmaji dan Ibu Agus Fitriyanti";
$namakakak = "Feby Wulandari";
$namaadik = "-";
?>
 <header>
    <h1>Ini Header</h1>
    <button class="menu-toggle" id="menuToggle" aria-label="Toggle Navigation">
        &#9776;
    </button>
    <nav>
        <ul>
            <li><a href="#home">Beranda</a></li>
            <li><a href="#about">Tentang</a></li>
            <li><a href="#ipk">Nilai</a></li>
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
        <h2>Biodata Anjelita Cahaya</h2>
        <p><strong>NIM:</strong> <?php echo $NIM; ?> </p>
        <p><strong>Nama Lengkap:</strong> <?php echo $nama; ?> &#9786;</p>
        <p><strong>Tempat Lahir:</strong> <?php echo $tempat; ?> </p>
        <p><strong>Tanggal Lahir:</strong> <?php echo $tanggal; ?> </p>
        <p><strong>Hobi:</strong> <?php echo $hobi; ?> &hearts;</p> 
        <p><strong>Pasangan:</strong> <?php echo $pasangan ?> &hearts;</p>
        <p><strong>Pekerjaan:</strong> <?php echo $pekerjaan ?> &#128546;</p>
        <p><strong>Nama Orang Tua:</strong> <?php echo $namaortu ?> &hearts;</p>
        <p><strong>Nama Kakak:</strong> <?php echo $namakakak ?> &hearts;</p>
        <p><strong>Nama Adik:</strong> <?php echo $namaadik ?> </p>
    </section>
    
    <section id="ipk">
        <h2>Nilai Mata Kuliah</h2>
        
        <?php
       
        for ($i = 1; $i <= 5; $i++) {
            echo "<h3>" . ${"namaMatkul" . $i} . "</h3>";
            echo "<p><strong>SKS:</strong> " . ${"sksMatkul" . $i} . "</p>";
            echo "<p><strong>Kehadiran:</strong> " . ${"nilaiHadir" . $i} . "</p>";
            echo "<p><strong>Tugas:</strong> " . ${"nilaiTugas" . $i} . "</p>";
            echo "<p><strong>UTS:</strong> " . ${"nilaiUts" . $i} . "</p>";
            echo "<p><strong>UAS:</strong> " . ${"nilaiUas" . $i} . "</p>";
            echo "<p><strong>Nilai Akhir:</strong> " . ${"nilaiAkhir" . $i} . "</p>";
            echo "<p><strong>Grade:</strong> " . ${"grade" . $i} . "</p>";
            echo "<p><strong>Angka Mutu:</strong> " . ${"mutu" . $i} . "</p>";
            echo "<p><strong>Bobot:</strong> " . ${"bobot" . $i} . "</p>";
            echo "<p><strong>Status:</strong> " . ${"status" . $i} . "</p>";
            echo "<hr>";
        }
        ?>
        
        <h2>Rekapitulasi IPK</h2>
        <p><strong>Total SKS:</strong> <?php echo $totalSks; ?></p>
        <p><strong>Total Bobot:</strong> <?php echo number_format($totalBobot, 2, ',', ''); ?></p>
        <p><strong>Indeks Prestasi Kumulatif (IPK):</strong> <?php echo number_format($ipk, 2, ',', ''); ?></p>
        
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
    </section>
 </main>
 <footer>
    <p>&copy; 2025 Anjelita Cahaya 2522500063</p>
 </footer>

 <script src="script.js"></script>
</body>
</html>