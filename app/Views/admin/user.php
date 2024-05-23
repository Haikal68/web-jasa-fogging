<?= $this->extend('admin/layout/template'); ?>
<?= $this->section('content'); ?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Users</h1>
        </div>

        <div class="section-body">
            <a class="btn btn-primary" style="margin-bottom:20px" href="<?php echo base_url(); ?>admin/tambah_user">
                <i class=" fas fa-plus"></i>
                Tambah Users
            </a>
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
                            <h4>Data Users</h4>
                        </div>
                        <div class="col-4">
                            <a class="btn btn-primary" style="margin-bottom:20px" href="<?php echo base_url(); ?>/admin/printUser">
                                <i class=" fas fa-print"></i>
                                Print Data
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table-1">
                                    <thead>
                                        <tr>
                                            <th class="text-center">
                                                #
                                            </th>
                                            <th>Nama Lengkap</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Role/Group</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php foreach ($user as $j) : ?>

                                            <tr>
                                                <td>
                                                    <?= $i++; ?>
                                                </td>
                                                <td><?= $j['fullname']; ?></td>
                                                <td><?= $j['email']; ?></td>
                                                <td><?= $j['username']; ?></td>
                                                <td><?= $j['name']; ?></td>
                                                <td class="text-center">
                                                    <a href="/admin/resetpass/<?= $j['user_id']; ?>"><button class=" btn btn-warning btn-sm rounded-3" title="Edit"><i class="fas fa-key "></i>Reset Password</button></a>
                                                    <a class="btn-hapus" href="/admin/deleteuser/<?= $j['user_id']; ?>"><button class=" btn btn-danger btn-sm rounded-3" title="Delete"><i class="fas fa-trash "></i></button></a>
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