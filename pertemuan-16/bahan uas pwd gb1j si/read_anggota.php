<?php
  session_start();
  require 'koneksi.php';
  require 'fungsi.php';

  $sql = "SELECT * FROM anggota ORDER BY cid DESC";
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
    <th>ID anggota</th>
    <th>No Anggota</th>
    <th>Nama anggota</th>
    <th>Jabatan</th>
    <th>tanggal jadi</th>
    <th>skill</th>
    <th>gaji</th>
    <th>no wa</th>
    <th>batalion
    <th>berat badan</th>
    <th>tinggi badan</th>
    </th>
  </tr>
  <?php $i = 1; ?>
  <?php while ($row = mysqli_fetch_assoc($q)): ?>
    <tr>
      <td><?= $i++ ?></td>
      <td>
        <a href="edit.php?cid=<?= (int)$row['cid']; ?>">Edit</a>
        <a onclick="return confirm('Hapus <?= htmlspecialchars($row['cnama_anggota']); ?>?')" href="proses_delete.php?cid=<?= (int)$row['cid']; ?>">Delete</a>
      </td>
      <td><?= $row['cid']; ?></td>
      <td><?= htmlspecialchars($row['cnama_anggota']); ?></td>
      <td><?= htmlspecialchars($row['cnim']); ?></td>
      <td><?= nl2br(htmlspecialchars($row['cjurusan'])); ?></td>
    </tr>
  <?php endwhile; ?>
</table>