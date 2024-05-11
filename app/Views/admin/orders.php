<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Pemesanan</h1>
        </div>

        <div class="section-body">
            <!-- <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?> -->

            <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Data orders</h4>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Kode Pemesanan</th>
                                            <th>Nama Customer</th>
                                            <th>Tanggal Pemesanan</th>
                                            <th>Layanan</th>
                                            <th>Total Harga</th>
                                            <th>Status Pembayaran</th>
                                            <th>Status Order</th>
                                            <th>Worker</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($orders as $j) : ?>

                                            <tr>
                                                <td>
                                                    <?= $i++; ?>
                                                </td>
                                                <td><?= $j['order_id']; ?></td>
                                                <td><?= $j['customer_id']; ?></td>
                                                <td><?= $j['tanggal_pemesanan']; ?></td>
                                                <td><?= $j['tanggal_layanan']; ?></td>
                                                <td><?= $j['alamat_layanan']; ?></td>
                                                <td><?= $j['service_id']; ?></td>
                                                <td>Rp <?= number_format($j['total_harga'], 0, ',', '.') ?></td>
                                                <td><?= $j['status_pembayaran']; ?></td>
                                                <td><?= $j['status_order']; ?></td>
                                                <td><?= $j['teknisi_id']; ?></td>


                                                <td class="text-center">
                                                    <a href="/admin/editorders/<?= $j['service_id']; ?>"><button class=" btn btn-primary btn-sm rounded-3" title="Edit"><i class="fas fa-edit "></i></button></a>
                                                    <a class="btn-hapus" href="/admin/deleteorders/<?= $j['service_id']; ?>"><button class=" btn btn-danger btn-sm rounded-3" title="Delete"><i class="fas fa-trash "></i></button></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
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

<?= $this->endsection(); ?>