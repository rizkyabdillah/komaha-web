<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>

<!-- SUMMARY SEGMENT -->
<div class="row">
    <!-- PRODUK COUNT -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 card-primary">
            <div class="card-icon bg-primary">
                <i class="fas fa-folder-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Transaksi</h4>
                </div>
                <div class="card-body">
                    0
                </div>
            </div>
        </div>
    </div>
    <!-- TRANSAKSI COUNT -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 card-primary">
            <div class="card-icon bg-primary">
                <i class="fas fa-shopping-basket"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pemesanan Kost</h4>
                </div>
                <div class="card-body">
                    0
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <!-- PRODUK COUNT -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 card-primary">
            <div class="card-icon bg-primary">
                <i class="fas fa-folder-open"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pemesanan Cleaning Service</h4>
                </div>
                <div class="card-body">
                    0
                </div>
            </div>
        </div>
    </div>
    <!-- TRANSAKSI COUNT -->
    <div class="col-lg-6 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1 card-primary">
            <div class="card-icon bg-primary">
                <i class="fas fa-shopping-basket"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Total Pemesanan Catering</h4>
                </div>
                <div class="card-body">
                    0
                </div>
            </div>
        </div>
    </div>
</div>



<?= $this->endSection() ?>


<?= $this->section('CSSModules') ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/fullcalendar/fullcalendar.min.css">
<?= $this->endSection() ?>

<?= $this->section('JSModules') ?>
<script src="<?= base_url(); ?>/assets/modules/fullcalendar/fullcalendar.min.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSSpecific') ?>
<script src="<?= base_url(); ?>/assets/js/page/modules-calendar.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSTemplate') ?>
<script>
    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Sukses', '<?= session()->getFlashData('pesan'); ?>', 'success', {
            buttons: false,
            timer: 1200,
        });
    <?php endif ?>
</script>
<?= $this->endSection() ?>