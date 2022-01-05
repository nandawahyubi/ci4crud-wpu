<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="card col-6 px-0" style="margin: auto;">
    <div class="card-header d-flex align-items-center">
        <h5 class="m-0 mr-2">Detail User</h5>
        <a href="/home" class="btn btn-primary">Back</a>
    </div>
    <div class="card-body">
        <table class="table table-responsive d-table">
            <tr>
                <td><strong>Username</strong></td>
                <td>:</td>
                <td><?= $users['username']; ?></td>
            </tr>
            <tr>
                <td><strong>Email</strong></td>
                <td>:</td>
                <td><?= $users['email']; ?></td>
            </tr>
            <tr>
                <td><strong>Password</strong></td>
                <td>:</td>
                <td><?= $users['password']; ?></td>
            </tr>
            <tr>
                <td><strong>No.Telp</strong></td>
                <td>:</td>
                <td><?= $users['no_telp']; ?></td>
            </tr>
            <tr>
                <td><strong>Address</strong></td>
                <td>:</td>
                <td><?= $users['address']; ?></td>
            </tr>
        </table>

        <a href="/home/update/<?= $users['id']; ?>" class="btn btn-warning">
            <i class="bi bi-pencil-square"></i> Update
        </a>

        <form action="/home/<?= $users['id']; ?>" method="post" class="d-inline">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin ?')">
                <i class="bi bi-trash"></i> Delete
            </button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>