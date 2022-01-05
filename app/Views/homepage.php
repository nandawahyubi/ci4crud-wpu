<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="card">
    <div class="card-header d-flex align-items-center">
        <h5 class="m-0 mr-2">Semua Data</h5>
        <a href="/home/create" class="btn btn-primary">Add</a>
    </div>
    <div class="card-body">
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Selamat !</strong> <?= session()->getFlashdata('pesan'); ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        <table class="table table-responsive table-hover d-table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Password</th>
                    <th scope="col" width="120" class="text-center">Details</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1 ?>
                <?php foreach ($users as $u) : ?>
                    <tr>
                        <th class="align-middle"><?= $no++; ?></th>
                        <td class="align-middle"><?= $u['username']; ?></td>
                        <td class="align-middle"><?= $u['email']; ?></td>
                        <td class="align-middle"><?= $u['password']; ?></td>
                        <td class="text-center">
                            <a href="/home/<?= $u['id']; ?>" class="btn btn-info">
                                <i class="bi bi-exclamation-circle"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>