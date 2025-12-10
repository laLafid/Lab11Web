<?php
require_once __DIR__ . '/../../class/db.php'; // path ke class/db.php
if (!isset($_SESSION['login'])) {
    header("Location: " . BASE_URL . "auth/login");
    exit;
}
$db = new Database();
$barang = $db->getAll('data_barang');
?>
 
<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3">Data Barang</h1>
        <a href="<?= BASE_URL ?>artikel/tambah" class="btn btn-primary">
            + Tambah Barang
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th width="100">Gambar</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Harga Jual</th>
                    <th>Harga Beli</th>
                    <th>Stok</th>
                    <th width="150">Aksi</th>
                </tr>
            </thead>
            <tbody> 
                <?php if ($barang && $barang->num_rows > 0): ?>
                    <?php while ($b = $barang->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center">
                                <?php if ($b['gambar'] && file_exists(ROOT . 'gambar/' . basename($b['gambar']))): ?>
                                    <img src="<?= BASE_URL ?>gambar/<?= basename($b['gambar']) ?>" 
                                         width="80" class="img-thumbnail">
                                <?php else: ?>
                                    <img src="<?= BASE_URL ?>gambar/no-image.jpg" width="80" class="img-thumbnail">
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($b['nama']) ?></td>
                            <td><?= htmlspecialchars($b['kategori']) ?></td>
                            <td>Rp <?= number_format($b['harga_jual']) ?></td>
                            <td>Rp <?= number_format($b['harga_beli']) ?></td>
                            <td class="text-center"><?= $b['stok'] ?></td>
                            <td>
                                <a href="<?= BASE_URL ?>artikel/ubah?id=<?= $b['id_barang'] ?>" 
                                   class="btn btn-sm btn-warning">Ubah</a>
                                <a href="<?= BASE_URL ?>artikel/hapus?id=<?= $b['id_barang'] ?>" 
                                   class="btn btn-sm btn-danger" 
                                   onclick="return confirm('Yakin hapus <?= htmlspecialchars($b['nama']) ?>?')">
                                    Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            Belum ada data barang. <a href="<?= BASE_URL ?>artikel/tambah">Tambah sekarang</a>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>