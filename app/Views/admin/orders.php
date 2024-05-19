<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pemesanan</h1>
        </div>

        <div class="section-body">
            <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data Pemesanan</h4>
                        </div>
                        <div class="card-body">
                            <?php if (in_groups('manager')) : ?>
                                <form action="<?= base_url('admin/filterOrders'); ?>" method="POST" class="form-inline">
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="tglAwal" class="sr-only">Tanggal Awal</label>
                                        <input type="date" name="tglAwal" id="tglAwal" class="form-control" required>
                                    </div>
                                    <div class="form-group mx-sm-3 mb-2">
                                        <label for="tglAkhir" class="sr-only">Tanggal Akhir</label>
                                        <input type="date" name="tglAkhir" id="tglAkhir" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mb-2"><i class="fas fa-print"></i>Print</button>
                                </form>
                            <?php endif; ?>
                            <div class="table-responsive mt-3">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>Kode Pemesanan</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Layanan</th>
                                            <th>Alamat</th>
                                            <th>Layanan</th>
                                            <th>Total Harga</th>
                                            <th>Status Order</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (empty($orders)) : ?>
                                            <tr>
                                                <td colspan="9" class="text-center">Tidak ada data yang ditemukan</td>
                                            </tr>
                                        <?php else : ?>
                                            <?php $i = 1; ?>
                                            <?php foreach ($orders as $j) : ?>
                                                <tr>
                                                    <td><?= $i++; ?></td>
                                                    <td><?= $j['order_id']; ?></td>
                                                    <td><?= $j['nama_customer']; ?></td>
                                                    <td><?= $j['tanggal_layanan']; ?></td>
                                                    <td><?= $j['alamat_layanan']; ?></td>
                                                    <td><?= $j['nama_layanan']; ?></td>
                                                    <td>Rp <?= number_format($j['total_harga'], 0, ',', '.'); ?></td>
                                                    <td>
                                                        <span class="badge <?= $j['status_order'] == 'paid' ? 'badge-success' : ($j['status_order'] == 'diproses' ? 'badge-warning' : ($j['status_order'] == 'selesai' ? 'badge-info' : 'badge-danger')) ?>">
                                                            <?= $j['status_order']; ?>
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="/admin/detailorder/<?= $j['order_id']; ?>"><button class="btn btn-primary btn-sm rounded-3" title="Konfirmasi"><i class="far fa-eye"></i> Lihat</button></a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection(); ?>