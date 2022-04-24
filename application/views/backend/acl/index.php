<section id="ordering">
    <div class="row">
        <div class="col-12">
            <div class="card" id="card_maximaze">
                <div class="card-header">
                    <h4 class="card-title"><?= $title; ?></h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse" onclick="minimaze()"><i class="ft-minus" id="icons-change"></i></a></li>
                            <li><a href="<?= base_url('acl'); ?>" data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand" onclick="maximize()"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show" id="minimaze_show_hide">
                    <input type="hidden" value="0" id="bug_show_hide">
                    <input type="hidden" value="0" id="maximaze_show_hide">
                    <div class="card-body card-dashboard">
                        <div class="row">
                            <div class="col-sm-1 offset-sm-11">
                                <?php if ($acl->add === 'Y') : ?>
                                    <a href="<?= base_url('acl/create/') ?>" class="btn btn-primary btn-sm box-shadow-1"> Add Data</a>
                                <?php endif; ?>
                            </div>

                        </div>
                        <?php if ($acl->akses === 'Y') : ?>
                            <table class="table table-striped table-bordered tbl_acl">
                                <thead>
                                    <tr>
                                        <th width="2px;">No</th>
                                        <th>Nama</th>
                                        <th>E-mail</th>
                                        <th width="250px;">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $key => $usr) : ?>
                                        <tr>
                                            <td><?= ($key + 1) ?></td>
                                            <td><a onclick="show_akses('<?= encode($usr->id); ?>')" class="text-primary"><?= $usr->nama; ?></a></td>
                                            <td><?= $usr->email; ?></td>
                                            <td>
                                                <span class="badge badge-<?= ($usr->status ? 'primary' : 'danger'); ?>"><?= ($usr->status ? 'Aktif' : 'Non-Aktif'); ?></span>
                                                <span class="badge badge-info"><?= $usr->nama_role; ?></span>
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

<div class="show_access"></div>

<script>
    $(document).ready(() => {
        $('.tbl_acl').DataTable();
        message_after_success();
    })

    var minimaze = () => {
        let bug_show_hide = $('#bug_show_hide').val();
        if (bug_show_hide == '1') {
            $('#minimaze_show_hide').addClass('show');
            $('#icons-change').addClass('ft-minus')
            $('#icons-change').removeClass('ft-plus')
            $('#bug_show_hide').val(0);
        } else {
            $('#minimaze_show_hide').removeClass('show');
            $('#icons-change').removeClass('ft-minus')
            $('#icons-change').addClass('ft-plus')
            $('#bug_show_hide').val(1);
        }
    }

    var maximize = () => {
        let maximaze_show_hide = $('#maximaze_show_hide').val();
        if (maximaze_show_hide == '1') {
            $('#card_maximaze').removeClass('card-fullscreen')
            $('#maximaze_show_hide').val(0);
        } else {
            $('#card_maximaze').addClass('card-fullscreen')
            $('#maximaze_show_hide').val(1);
        }
    }

    var message_after_success = () => {
        let session_status = '<?= $this->session->flashdata('msg'); ?>';
        if (session_status === 'true_insert' | session_status === 'true_update' | session_status === 'true_destroy') {
            swal("Berhasil!", "", "success");
        } else if (session_status === 'false_insert' | session_status === 'false_update' | session_status === 'false_destroy') {
            swal("Gagal!", "", "error");
        }
    }

    var show_akses = (param) => {
        var html = (res) => {
            $('.show_access').html(res);
        }
        $('.show_access').html('<img src="<?= base_url('public/template/admin/assets/img/loading.gif') ?>">');
        $.get('<?= base_url('acl/detail/'); ?>' + param, html);
    }

    // destroy 
    var destroy = () => {
        swal("PERINGATAN!", "Data tidak bisa dihapus, karena akan mempengaruhi semua users yang terkait pada Sub-Menu ", "error");
    }
</script>