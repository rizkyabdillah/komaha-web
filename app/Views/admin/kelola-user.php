<?= $this->extend('part/Master') ?>

<?= $this->section('Content') ?>
<div class="card card-primary">
    <div class="card-header">
        <i class="fas fa-user-friends"></i>&nbsp;&nbsp;&nbsp;
        <h4>Kelola Data Pengguna</h4>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table-1">
                <thead>
                    <tr>
                        <th class="text-center"> No </th>
                        <th>Email</th>
                        <th>Username</th>
                        <th>Nama Lengkap</th>
                        <th>Jenis Kelamin</th>
                        <th>Telepon</th>
                        <th>Alamat</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    foreach ($data as $val) :
                    ?>
                        <tr>
                            <td class="text-center"><?= $i++ ?></td>
                            <td><?= $val['EMAIL'] ?></td>
                            <td><?= $val['USERNAME'] ?></td>
                            <td><?= $val['NAMA_LENGKAP'] ?></td>
                            <td><?= $val['JENIS_KELAMIN'] ?></td>
                            <td><?= $val['TELEPON'] ?></td>
                            <td><?= $val['ALAMAT'] ?></td>
                            <td class="text-center">
                                <a href="<?= route_to('users-edit-index-admin', $val['ID_USER']); ?>" class="btn btn-primary btn-action" data-toggle="tooltip" data-original-title="Ubah">
                                    <i class="fas fa-pencil-alt"></i> Edit
                                </a>
                                <a data-id="<?= $val['ID_USER']; ?>" class="btn btn-danger btn-action ml-1 swal-confirm" data-toggle="tooltip" data-original-title="Hapus">
                                    <form action="<?= route_to('users-delete-admin', $val['ID_USER']); ?>" method="POST" id="hapus<?= $val['ID_USER']; ?>" class="">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE" />
                                    </form>
                                    <i class="fas fa-trash"></i> Hapus
                                </a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="card-footer bg-whitesmoke">
        <i>Copyright By KOMAHA TEAM</i>
    </div>
</div>
<?= $this->endSection() ?>


<?= $this->section('CSSModules') ?>
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="<?= base_url(); ?>/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">
<?= $this->endSection() ?>

<?= $this->section('JSModules') ?>
<script src="<?= base_url(); ?>/assets/modules/datatables/datatables.min.js"></script>
<script src="<?= base_url(); ?>/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSSpecific') ?>
<script src="<?= base_url(); ?>/assets/js/page/modules-datatables.js"></script>
<?= $this->endSection() ?>

<?= $this->section('JSTemplate') ?>
<script>
    $(document).on("click", ".swal-confirm", function(e) {
        var id = $(this).data('id');
        swal({
                title: 'Apakah kamu yakin?',
                text: 'Disaat kamu menghapus, data yang terhapus tidak dapat dikembalikan lagi!',
                icon: 'warning',
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $('#hapus'.concat(id)).submit();
                }
            });
    });

    <?php if (session()->getFlashData('pesan')) : ?>
        swal('Sukses', '<?= session()->getFlashData('pesan'); ?>', 'success', {
            buttons: false,
            timer: 1200,
        });
    <?php endif ?>
</script>
<?= $this->endSection() ?>