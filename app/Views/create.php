<?= $this->extend('template/index') ?>

<?= $this->section('page-content') ?>
<div class="card col-5 px-0" style="margin: auto;">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="m-0 mr-2">Tambah Data</h5>
        <a href="/home" class="btn btn-primary">Back</a>
    </div>
    <div class="card-body">
        <form action="/home/save" method="post">
            <?= csrf_field(); ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" id="username" name="username" aria-describedby="invalidFeedback" value="<?= old('username'); ?>">
                <div id="invalidFeedback" class="invalid-feedback">
                    <?= $validation->getError('username'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="email" name="email" aria-describedby="invalidFeedback" value="<?= old('email'); ?>">
                <div id="invalidFeedback" class="invalid-feedback">
                    <?= $validation->getError('email'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" id="password" name="password" aria-describedby="invalidFeedback" value="<?= old('password'); ?>">
                <div id="invalidFeedback" class="invalid-feedback">
                    <?= $validation->getError('password'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="no_telp">No.Telp</label>
                <input type="tel" class="form-control <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" id="no_telp" name="no_telp" aria-describedby="invalidFeedback" value="<?= old('no_telp'); ?>">
                <div id="invalidFeedback" class="invalid-feedback">
                    <?= $validation->getError('no_telp'); ?>
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address</label>
                <input type="text" class="form-control <?= ($validation->hasError('address')) ? 'is-invalid' : ''; ?>" id="address" name="address" aria-describedby="invalidFeedback" value="<?= old('address'); ?>">
                <div id="invalidFeedback" class="invalid-feedback">
                    <?= $validation->getError('address'); ?>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>