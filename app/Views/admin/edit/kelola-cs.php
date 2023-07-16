<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <h4>Ubah Data Cleaning Service</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="<?= route_to('cs-update-admin', $data['ID_CLEANING_SERVICE']); ?>" class="needs-validation form-simpan" novalidate="" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="PUT" />
            

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="nama-service">Nama Service</label>
                    <input type="text" class="form-control" id="nama-service" name="NAMA_SERVICE" placeholder="Masukkan Nama Service" onkeyup="this.value = this.value.toUpperCase()" value="<?= $data['NAMA_SERVICE'] ?>" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="durasi">Durasi (Jam)</label>
                    <input type="text" class="form-control numonly" id="durasi" name="DURASI" placeholder="Masukkan Durasi" value="<?= $data['DURASI'] ?>" required>
                    <small>
                        Durasi berupa lamanya waktu cleaning service dalam melayani pelanggan, masukkan input berupa <strong>" angka 1 sampai 24."</strong>
                    </small>
                </div>

                <div class="form-group col-md-3">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control numonly" id="harga" name="HARGA" placeholder="Masukkan Harga" value="<?= $data['HARGA'] ?>" required>
                </div>
            </div>

            <div class=" form-row">
                    <div class="form-group col-md-12">
                        <label for="fasilitas">Deskripsi</label>
                        <textarea class="form-control" id="fasilitas" name="DESKRIPSI" required><?= $data['DESKRIPSI'] ?></textarea>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Pisahkan antar item dengan karakter | <strong>"Pipeline"</strong> tanpa menggunakan <strong>Enter</strong>
                        </small>
                        <small id="passwordHelpBlock" class="form-text text-muted">
                            Contoh : Harga untuk per 1 kotak/box|Pemesanan minimal H-1|Isi dalam box berupa Nasi, Ayam Goreng, Sambal, Lalapan, Acar.|dst..
                        </small>
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