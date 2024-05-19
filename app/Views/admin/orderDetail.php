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
                                        <strong>Servis </strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['nama_layanan']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Total Harga:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        Rp <?= number_format($orders['total_harga'], 0, ',', '.') ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Status Order:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <span class=" badge <?php if ($orders['status_order'] == 'dikonfirmasi') echo 'badge-success';
                                                            elseif ($orders['status_order'] == 'pending') echo 'badge-danger';
                                                            else echo 'badge-warning' ?>"><?= $orders['status_order']; ?></span>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Worker Yang Mengerjakan:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $orders['fullname']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">

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