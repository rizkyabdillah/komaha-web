<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Ubah Data Kost</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= route_to('users-update-admin'); ?>" class="needs-validation form-simpan" novalidate="">
            <input type="hidden" name="_method" value="PUT" />
            <?= csrf_field(); ?>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="nama-kost">Nama Kost</label>
                    <input type="email" class="form-control" id="nama-kost" name="NAMA_KOST" placeholder="Masukkan Email" value="<?= $data[''] ?>" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="USERNAME" placeholder="Masukkan Username" value="<?= $data[''] ?>" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" class="form-control" id="name" name="NAMA_LENGKAP" placeholder="Masukkan Nama Lengkap" value="<?= $data[''] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="jk">Jenis Kelamin</label>
                    <?php
                    $option = [
                        'LAKI-LAKI'   => 'Laki - Laki',
                        'PEREMPUAN'     => 'Perempuan',
                    ];
                    $js = [
                        'class'         => 'form-control selectric',
                        'id'            => 'jk'
                    ];
                    echo form_dropdown('JENIS_KELAMIN', $option, $data[''], $js);
                    ?>
                </div>
                <div class="form-group col-md-4">
                    <label for="telepon">No. Telepon</label>
                    <input type="text" class="form-control numonly" id="telepon" name="TELEPON" placeholder="Masukkan Telepon" value="<?= $data[''] ?>" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="PASSWORD" placeholder="Masukkan Password" value="<?= $data[''] ?>" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="ALAMAT" required><?= $data[''] ?></textarea>
                </div>
            </div>

            <hr>

        </form>
        <div class="card-footer text-right">
            <button type="button" class="btn btn-primary btn-lg btn-simpan">
                <i class="fas fa-save"></i> Simpan
            </button>
        </div>

    </div>
    <div class="card-footer bg-whitesmoke">
        <i>Created By. Rizky</i>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('CSSModules') ?>
<link rel="stylesheet" href="<?= base_url() ?>/assets/modules/jquery-selectric/selectric.css">
<?= $this->endSection() ?>

<?= $this->section('JSModules') ?>
<script src="<?= base_url() ?>/assets/modules/jquery-selectric/jquery.selectric.min.js"></script>
<script src="<?= base_url() ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSSpecific') ?>
<?= $this->endSection() ?>

<?= $this->section('JSTemplate') ?>
<script text="text/javascript">
    $(document).on("click", ".btn-simpan", function(e) {
        $('.form-simpan').submit();
    });
</script>
<?= $this->endSection() ?>