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
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>admin/orders">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Detail Pemesanan</h5>
                            <hr>
                            <div class="mb-3">
                                <img src="/img/<?= $orders['bukti_pembayaran']; ?>" class="p-1 bg-primary mb-3" width="500">
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Nama Customer:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['nama_customer']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>No Telepon:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['no_telp']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Tanggal Pemesanan:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['tanggal_pemesanan']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Tanggal Layanan:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['tanggal_layanan']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Alamat Layanan:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['alamat_layanan']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Servis:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['service_id']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Total Harga:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['total_harga']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Status Order:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['status_order']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Technician ID:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['teknisi_id']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-9">

                                    </div>
                                    <div class="col-sm-3 text-right">
                                        <a href="/admin/konfirmasiOrder/<?= $orders['order_id']; ?>">
                                            <button class=" btn btn-primary rounded-3" title="Edit" <?php if ($orders['status_order'] == 'dikonfirmasi' || $orders['status_order'] == 'diproses') echo 'disabled'; ?>>Konfirmasi</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?= $this->endsection(); ?>