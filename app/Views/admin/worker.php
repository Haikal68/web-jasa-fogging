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
                                            <th>Tanggal Layanan</th>
                                            <th>Alamat</th>
                                            <th>Layanan</th>
                                            <th>No Telepon</th>
                                            <th>Status Order</th>
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
                                                <td><?= $j['nama_customer']; ?></td>
                                                <td><?= $j['tanggal_layanan']; ?></td>
                                                <td><?= $j['alamat_layanan']; ?></td>
                                                <td><?= $j['nama_layanan']; ?></td>
                                                <td><?= $j['no_telp']; ?></td>

                                                <td class="<?php if ($j['status_order'] == 'dikonfirmasi') echo 'text-success';
                                                            elseif ($j['status_order'] == 'pending') echo 'text-danger';
                                                            else echo 'text-warning' ?>"><?= $j['status_order']; ?></td>
                                                <td class="text-center">
                                                    <a href="/worker/prosesOrder"><button class=" btn btn-primary btn-sm rounded-3" title="Proses"><i class="far fa-sun"></i>Proses</button></a>
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