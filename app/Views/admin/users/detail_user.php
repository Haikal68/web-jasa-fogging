<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Users</h1>
        </div>

        <div class="section-body">
            <!-- <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?> -->

            <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
            <a class="btn btn-danger" style="margin-bottom:20px" href="<?php echo base_url(); ?>admin/workers">
                <i class="fas fa-long-arrow-alt-left"></i>
                Kembali
            </a>
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow">
                        <div class="card-body">
                            <h5 class="card-title">Detail User</h5>
                            <hr>
                            <div class="mb-3">
                                <div class="row mb-5">
                                    <div class="col-sm-3">

                                    </div>
                                    <div class="col-sm-4">
                                        <img src="<?= base_url(); ?>/assets/img/avatar/<?= $worker['user_image']; ?>" class="p-1  rounded-circle" width="200">

                                    </div>
                                    <div class="col-sm-4">
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Nama Worker:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $worker['fullname']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Username:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $worker['username']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Role/Group:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?= $worker['username']; ?>
                                    </div>
                                </div>
                                <div class="row mb-2">
                                    <div class="col-sm-3">
                                        <strong>Bergabung Pada:</strong>
                                    </div>
                                    <div class="col-sm-9">
                                        <?php
                                        $date = new DateTime($worker['created_at']);
                                        echo $date->format('d-m-Y');
                                        ?>
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