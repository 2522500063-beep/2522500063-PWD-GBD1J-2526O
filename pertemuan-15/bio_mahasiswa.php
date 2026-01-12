<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM tbl_mahasiswa ORDER BY nim DESC";
  $q = mysqli_query($conn, $sql);
  if (!$q) {
    die("Query error: " . mysqli_error($conn));
  }
?>

<?php
  $flash_sukses = $_SESSION['flash_sukses'] ?? ''; #jika query sukses
  $flash_error  = $_SESSION['flash_error'] ?? ''; #jika ada error
  #bersihkan session ini
  unset($_SESSION['flash_sukses'], $_SESSION['flash_error']); 
?>

<?php if (!empty($flash_sukses)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#d4edda; color:#155724; border-radius:6px;">
          <?= $flash_sukses; ?>
        </div>
<?php endif; ?>

<?php if (!empty($flash_error)): ?>
        <div style="padding:10px; margin-bottom:10px; 
          background:#f8d7da; color:#721c24; border-radius:6px;">
          <?= $flash_error; ?>
        </div>
<?php endif; ?>

<table border="1" cellpadding="8" cellspacing="0">
  <tr>
    <th>No</th>
    <th>Aksi</th>
    <th>NIM</th>
    <th>Nama Lengkap</th>
    <th>Tempat Lahir</th>
    <th>Tanggal Lahir</th>
    <th>Hobi</th>
    <th>Pasangan</th>
    <th>Pekerjaan</th>
    <th>Nama orang tua</th>
    <th>Nama kakak</th>
    <th>Nama adik</th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?nim=<?= (int)$row['nim']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['nama_lengkap']); ?>?')" href="proses_delete_bio.php?nim=<?= (int)$row['nim']; ?>">Delete</a>
      </td>
      <td><?= $row['nim']; ?></td>
      <td><?= $row['nama_lengkap']; ?></td>
      <td><?= $row['tempat_lahir']; ?></td>
      <td><?= $row['tanggal_lahir']; ?></td>
      <td><?= $row['hobi']; ?></td>
      <td><?= $row['pasangan']; ?></td>
      <td><?= $row['pekerjaan']; ?></td>
      <td><?= $row['nama_orang_tua']; ?></td>
      <td><?= $row['nama_kakak']; ?></td>
      <td><?= $row['nama_adik']; ?></td>
    </tr>
  <?php endwhile; ?>
</table>