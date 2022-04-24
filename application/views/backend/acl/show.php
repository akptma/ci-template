<section id="ordering">
    <div class="row">
        <div class="col-12">
            <div class="card" id="card_maximaze">
                <?php if ($user->status == 0) : ?>
                    <div class="card-header">
                        <!-- <div class="text-primary"></div> -->
                        <h4 class="card-title"><span class="text-primary">Akses Menu</span> - <?= $user->nama; ?> - Tidak Diizinkan</h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    </div>
                <?php else : ?>
                    <div class="card-header">
                        <!-- <div class="text-primary"></div> -->
                        <h4 class="card-title"><span class="text-primary">Akses Menu</span> - <?= $user->nama; ?></h4>
                        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <input type="hidden" name="user_id" id="user_id" value="" readonly>
                                <input type="text" name="user_nama" id="user_nama" value="" disabled>
                                <button class="btn btn-info btn-sm box-shadow-1" onclick="open_usr_sync()">Search</button>
                                <a onclick="duplicate('<?= encode($user->id); ?>')" class="btn btn-warning btn-sm box-shadow-1 text-white"> Duplicate Data</a>
                                <a href="<?= base_url('acl/store/' . encode($user->id)) ?>" class="btn btn-primary btn-sm box-shadow-1"> Sync Akses</a>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show" id="minimaze_show_hide">

                        <div class="card-body card-dashboard">
                            <form action="<?= base_url('acl/update/' . encode($user->id)); ?>" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered tbl_show_acl">
                                        <thead>
                                            <tr>
                                                <th>Menu</th>
                                                <th>Akses</th>
                                                <th>Add</th>
                                                <th>Edit</th>
                                                <th>Detail</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no = 0;
                                            foreach ($akses as $ak) :
                                                $no++;
                                            ?>
                                                <tr>
                                                    <td>
                                                        <input type="hidden" name="id_menu<?= $no; ?>" value="<?= $ak->id; ?>">
                                                        <?= ($ak->nama_menu == '#' ? '<b>' . ucwords($ak->title_menu) . '</b>' : ucwords($ak->nama_menu)) ?>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="akses<?= $no; ?>" value="<?= ($ak->akses == 'N' ? 'N' : 'Y') ?>">
                                                        <input type="checkbox" name="akses<?= $no; ?>" id="akses<?= $no; ?>" <?= ($ak->akses == 'N' ? '' : 'checked') ?>>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="add<?= $no; ?>" value="<?= ($ak->add == 'N' ? 'N' : 'Y') ?>">
                                                        <input type="checkbox" name="add<?= $no; ?>" id="add<?= $no; ?>" <?= ($ak->add == 'N' ? '' : 'checked') ?>>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="edit<?= $no; ?>" value="<?= ($ak->edit == 'N' ? 'N' : 'Y') ?>">
                                                        <input type="checkbox" name="edit<?= $no; ?>" id="edit<?= $no; ?>" <?= ($ak->edit == 'N' ? '' : 'checked') ?>>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="detail<?= $no; ?>" value="<?= ($ak->detail == 'N' ? 'N' : 'Y') ?>">
                                                        <input type="checkbox" name="detail<?= $no; ?>" id="detail<?= $no; ?>" <?= ($ak->detail == 'N' ? '' : 'checked') ?>>
                                                    </td>
                                                    <td>
                                                        <input type="hidden" name="delete<?= $no; ?>" value="<?= ($ak->delete == 'N' ? 'N' : 'Y') ?>">
                                                        <input type="checkbox" name="delete<?= $no; ?>" id="delete<?= $no; ?>" <?= ($ak->delete == 'N' ? '' : 'checked') ?>>
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="cekall<?= $no; ?>" id="cekall<?= $no; ?>" <?= ($ak->akses == 'Y' && $ak->add && $ak->edit && $ak->detail && $ak->delete ? 'checked' : '') ?> onclick="cek_all('<?= $no; ?>')">
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <input type="hidden" name="baris" value="<?= $no; ?>">
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm box-shadow-1">Save</button>
                            </form>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<span class="usr_sync_modal"></span>

<script>
    var cek_all = (param) => {
        let akses = '#akses' + param;
        let add = '#add' + param;
        let edit = '#edit' + param;
        let detail = '#detail' + param;
        let del = '#delete' + param;
        let check_all = '#cekall' + param;

        if ($(check_all).is(":checked")) {
            $(akses).prop("checked", true);
            $(add).prop("checked", true);
            $(edit).prop("checked", true);
            $(detail).prop("checked", true);
            $(del).prop("checked", true);
        } else {
            $(akses).prop("checked", false);
            $(add).prop("checked", false);
            $(edit).prop("checked", false);
            $(detail).prop("checked", false);
            $(del).prop("checked", false);
        }

    }

    var open_usr_sync = () => {
        var html = (res) => {
            $('.usr_sync_modal').html(res);
        }
        $.get('<?= base_url('acl/duplicate_sync'); ?>', html);
    }

    var duplicate = (user_id) => {
        let user_id_duplicate = $('#user_id').val();
        $.get('<?= base_url('acl/duplicate_store/'); ?>' + user_id + '/' + user_id_duplicate);

        setTimeout(() => {
            window.location.href = '<?= base_url('acl'); ?>'
        }, 200);
    }
</script>