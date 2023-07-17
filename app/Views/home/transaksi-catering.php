<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport" />
    <title>Layout &rsaquo; Top Navigation &mdash; Stisla</title>
    <?= $this->include('part/PartCSS') ?>
    <?= $this->include('part/GtagsManager') ?>
</head>

<body class="layout-3">
    <div id="app">
        <div class="main-wrapper container">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <a href="index.html" class="navbar-brand sidebar-gone-hide">KOMAHA</a>
                <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
            </nav>

            <nav class="navbar navbar-secondary navbar-expand-lg">
                <div class="container">
                    <ul class="navbar-nav"></ul>
                    <div class="section-header-back"></div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="section-body">

                        <?php if (session()->getFlashData('pesan')) : ?>
                            <div class="alert alert-danger alert-has-icon">
                                <div class="alert-icon"><i class="fas fa-times"></i></div>
                                <div class="alert-body">
                                    <div class="alert-title">Danger</div>
                                    <?= session()->getFlashData('pesan'); ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <h2 class="section-title">FORM TRANSAKSI</h2>
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Ringkasan Catering Yang Dipilih</h4>
                            </div>
                            <div class="card-body">
                                <ul class="list-unstyled list-unstyled-border list-unstyled-noborder">
                                    <li class="media">
                                        <img alt="image" class="mr-3" width="70" src="<?= base_url() ?>/assets/foto/<?= $data['GAMBAR'] ?>">
                                        <div class="media-body">
                                            <div class="media-right">
                                                <div class="text-primary"><?= "Rp " . number_format($data['HARGA'], 2, ',', '.') . ' per kotak / box' ?></div>
                                            </div>
                                            <div class="media-title mb-1"><?= $data['NAMA_MENU'] ?></div>
                                            <div class="text-time"><?= 'MENU ' . $data['KATEGORI'] ?></div>
                                            <?php
                                            $ARR_DESKRIPSI = explode('|', $data['DESKRIPSI']);
                                            ?>
                                            <div class="media-description text-muted">Deskripsi : <?= $ARR_DESKRIPSI[0] ?></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="section-body">
                        <div class="card">
                            <div class="card-header">
                                <h4>Lengkapi data berikut!</h4>
                            </div>
                            <div class="card-body">

                                <form method="POST" action="<?= route_to('tr-catering-store-user'); ?>" class="needs-validation form-simpan" novalidate="">
                                    <?= csrf_field(); ?>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="tanggal">Tanggal Pengiriman Catering</label>
                                            <input type="hidden" name="ID_CATERING" value="<?= $data['ID_CATERING'] ?>">
                                            <input type="hidden" name="ID_USER" value="<?= session('ID_USER') ?>">
                                            <input type="hidden" name="TOTAL" id="total_" value="<?= $data['HARGA'] ?>">
                                            <input type="text" class="form-control  datepicker" id="tanggal" name="TANGGAL_PENGIRIMAN" placeholder="Pilih Tanggal Awal Masuk" required>
                                            <small>
                                                Usahakan tanggal pengiriman harus diatas H+1 dari tanggal pemesanan
                                            </small>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="tanggal">Banyak Pesanan</label>
                                            <input type="text" class="form-control numonly" id="quantity" name="QUANTITY" placeholder="Masukkan Banyak Pesanan" value="1" required>
                                            <small>
                                                Minimal banyaknya pesanan adalah 1 dan maksimal adalah 200
                                            </small>
                                        </div>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-12">
                                            <label for="tanggal">Pilih Bank Pembayaran</label>
                                            <div class="selectgroup w-100">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="BANK_PEMBAYARAN" value="BRI" class="selectgroup-input" checked>
                                                    <span class="selectgroup-button">BANK BRI</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="BANK_PEMBAYARAN" value="BNI" class="selectgroup-input">
                                                    <span class="selectgroup-button">BANK BNI</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="BANK_PEMBAYARAN" value="MANDIRI" class="selectgroup-input">
                                                    <span class="selectgroup-button">BANK MANDIRI</span>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="BANK_PEMBAYARAN" value="BCA" class="selectgroup-input">
                                                    <span class="selectgroup-button">BANK BCA</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <hr>

                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="tanggal">Total Pembayaran</label>
                                        <div class="display-4" id="total"><?= "Rp " . number_format($data['HARGA'], 2, ',', '.') ?></div>
                                    </div>
                                </div>

                                <hr>

                            </div>

                            <div class="card-footer text-right">
                                <button type="button" class="btn btn-primary btn-lg btn-simpan">
                                    <i class="fas fa-money-check-alt"></i> Lanjut Pembayaran
                                </button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?= $this->include('part/Footer') ?>
        </div>
    </div>

    <?= $this->include('part/PartJS') ?>
    <script src="<?= base_url(); ?>/assets/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
    <script>
        const harga = '' + <?= $data['HARGA'] ?>;

        $(document).on("keydown", "#tanggal", function(e) {
            e.preventDefault();
            return false;
        });

        $(document).on("click", ".btn-simpan", function(e) {
            $('.form-simpan').submit();

        });

        $(document).on("input", "#quantity", function(e) {
            const value = $('#quantity').val();
            const quantity = (value == null) ? 0 : value;
            $('#total').text(getCurrencyFormat(quantity * harga));
            $('#total_').val(quantity * harga);
        });

        function getCurrencyFormat(total) {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(total);
        }
    </script>
</body>

</html>