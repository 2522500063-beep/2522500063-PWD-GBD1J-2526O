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
        echo "Halo Dunia";
        ?>
    </section>
    <section id="about">
        <h2>Biodata Anjelita Cahaya</h2>
        <p><strong>NIM:</strong> 2522500063</p>
        <p><strong>Nama Lengkap:</strong> Anjelita Cahaya &#9786;</p>
        <p><strong>Tempat Lahir:</strong> Pangkalpinang</p>
        <p><strong>Tanggal Lahir:</strong> 27 juli 2007</p>
        <p><strong>Hobi:</strong> olahraga &hearts;</p> 
        <p><strong>Pasangan:</strong> belum ada &hearts;</p>
        <p><strong>pekerjaan:</strong> Belum &#128546;</p>
        <p><strong>Nama Orang Tua:</strong> Sudarmaji dan Ibu Agus fitriyanti &hearts;</p>
        <p><strong>Nama Kakak:</strong> Feby Wulandari &hearts;</p>
        <p><strong>Nama Adik:</strong> Tidak Ada</p>
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
