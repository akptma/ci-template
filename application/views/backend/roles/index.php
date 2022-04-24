<section id="ordering">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><?= $title; ?></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a href="<?= base_url('role'); ?>" data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-sm-1 offset-sm-11">
                                <?php if ($acl->add === 'Y') : ?>
                                    <a href="<?= base_url('role/create') ?>" class="btn btn-primary btn-sm box-shadow-1"> Add Data</a>
                                <?php endif; ?>
                            </div>

                        </div>
                        <?php if ($acl->akses === 'Y') : ?>
                            <table class="table table-striped table-bordered tbl_roles">
                                <thead>
                                    <tr>
                                        <th>Nama Role</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($roles as $role) : ?>
                                        <tr>
                                            <td><?= html_escape(ucwords($role->nama_role)); ?></td>
                                            <td><span class="badge badge-<?= ($role->status == 1 ? 'primary' : 'danger'); ?>"><?= ($role->status == 1 ? 'Aktif' : 'Non-Aktif'); ?></span></td>
                                            <td>
                                                <?php if ($acl->detail === 'Y') : ?>
                                                    <a href="javascript:void(0);" onclick="detail('<?= encode($role->id); ?>')"><span class="badge badge-info">Detail</span></a>
                                                <?php endif; ?>
                                                <?php if ($acl->edit === 'Y') : ?>
                                                    <a href="<?= base_url('role/edit/' . encode($role->id)); ?>"><span class="badge badge-primary">Ubah</span></a>
                                                <?php endif; ?>
                                                <?php if ($acl->delete === 'Y') : ?>
                                                    <a onclick="destroy()"><span class="badge badge-danger">Hapus</span></a>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="detail_modal"></div>

<script>
    $(document).ready(() => {
        $('.tbl_roles').DataTable({
            "order": [
                [2, "desc"]
            ]
        });
        message_after_success();
    })

    var message_after_success = () => {
        let session_status = '<?= $this->session->flashdata('msg'); ?>';
        if (session_status === 'true_insert' | session_status === 'true_update' | session_status === 'true_destroy') {
            swal("Berhasil!", "", "success");
        } else if (session_status === 'false_insert' | session_status === 'false_update' | session_status === 'false_destroy') {
            swal("Gagal!", "", "error");
        }
    }

    // detail
    var detail = (param) => {
        var html = (res) => {
            $('.detail_modal').html(res);
        }
        $.get('<?= base_url('role/detail/'); ?>' + param, html);
    }

    // destroy 
    var destroy = () => {
        swal("PERINGATAN!", "Data tidak bisa dihapus, karena akan mempengaruhi semua users yang terkait pada role ", "error");
    }
</script>