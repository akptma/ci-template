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
                            <li><a href="<?= base_url('menu'); ?>" data-action="reload"><i class="ft-rotate-cw"></i></a></li>
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
                                <a href="<?= base_url('submenu/create/' . $kode_menu) ?>" class="btn btn-primary btn-sm box-shadow-1"> Add Data</a>
                            </div>

                        </div>
                        <table class="table table-striped table-bordered tbl_submenu">
                            <thead>
                                <tr>
                                    <th>Urutan Sub-Menu</th>
                                    <th>Nama Sub-Menu</th>
                                    <th>Route</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($submenu as $s) : ?>
                                    <tr>
                                        <td><?= $s->urutan; ?></td>
                                        <td><?= html_escape(ucwords($s->nama_menu)); ?></td>
                                        <td><?= html_escape($s->routes); ?></td>
                                        <td><span class="badge badge-<?= ($s->status == 1 ? 'primary' : 'danger'); ?>"><?= ($s->status == 1 ? 'Aktif' : 'Non-Aktif'); ?></span></td>
                                        <td>
                                            <a href="javascript:void(0);" onclick="detail_submenu('<?= encode($s->id); ?>')"><span class="badge badge-info">Detail</span></a>
                                            <a href="<?= base_url('submenu/edit/' . encode($s->id)); ?>"><span class="badge badge-primary">Ubah</span></a>
                                            <a onclick="destroy()"><span class="badge badge-danger">Hapus</span></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="detail_modal"></div>

<script>
    $(document).ready(() => {
        $('.tbl_submenu').DataTable();
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

    // detail
    var detail_submenu = (param) => {
        var html = (res) => {
            $('.detail_modal').html(res);
        }
        $.get('<?= base_url('submenu/detail/'); ?>' + param, html);
    }



    // destroy 
    var destroy = () => {
        swal("PERINGATAN!", "Data tidak bisa dihapus, karena akan mempengaruhi semua users yang terkait pada Sub-Menu ", "error");
    }
</script>