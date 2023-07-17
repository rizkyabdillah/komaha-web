<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>

<h2 class="section-title">DETAIL TRANSAKSI KOST</h2>
<div class="card card-primary">
    <div class="card-header">
        <h4>Rincian Transaksi</h4>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-striped" id="sortable-table">
                <thead>
                    <tr>
                        <th class="text-center">#</th>
                        <th>Nama Kost</th>
                        <th>Jenis Kost</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Tanggal Penempatan</th>
                        <th>Gambar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">-</td>
                        <td><?= $dataKost['NAMA_KOST'] ?></td>
                        <td>Kos <?= ucfirst(strtolower($dataKost['JENIS_KOST'])) ?></td>
                        <td><?= "Rp " . number_format($dataKost['HARGA'], 2, ',', '.') . ' per ' . strtolower($dataKost['PERIODE']) ?></td>
                        <td><?= $dataKost['ALAMAT'] . ', Kec. ' .  ucfirst(strtolower($dataKost['AREA'])) ?>, Kota Malang</td>
                        <td class="text-center">-</td>
                        <td><a href="#" class="btn btn-primary">Lihat Gambar</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<hr>

<div class="card">
    <div class="card-header">
        <h4>Rincian Pembayaran</h4>
    </div>
    <div class="card-body">
        <p>- STATUS PEMBAYARAN : <span class="badge badge-danger">BELUM BAYAR</span></p>
        <p>- METODE PEMBAYARAN : <b>Transfer BANK BRI</b></p>

        <hr>

        <div class="form-row">
            <div class="form-group col-md-12">
                <label for="tanggal">Total Pembayaran</label>
                <div class="display-4"><?= "Rp " . number_format($dataKost['HARGA'], 2, ',', '.') ?></div>
            </div>
        </div>

        <hr>

        <p>Silahkan melakukan pembayaran dengan nominal diatas menggunakan metode <b>TRANSFER</b> menggunakan <b>BANK BRI</b>, sebelum tanggal <b>(2023-08-20)</b> dengan informasi pembayaran sebagai berikut :</p>
        <p><b>1. </b> Nomor Rekening : <b>7746 8382 2255 03</b></p>
        <p><b>2. </b> Nama penerima : <b>KELVIN ANDIKA PRAKOSO</b></p>


        <button type="button" class="btn btn-danger btn-lg btn-simpan">
            <i class="fas fa-file-invoice-dollar"></i> Upload Bukti Pembayaran
        </button>
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