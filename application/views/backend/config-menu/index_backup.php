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
                            <li><a href="<?= base_url('menu-config'); ?>" data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body card-dashboard">
                        <?php if ($acl->akses === 'Y') : ?>
                            <form action="<?= base_url('menu-config/update'); ?>" method="post">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                                <div id="expanded-treeview" class="treeview">
                                    <ul class="list-group">
                                        <?php $no = 0;
                                        foreach ($menu as $m) : ?>
                                            <li class="list-group-item node-expanded-treeview" data-nodeid="<?= $no++; ?>">
                                                <p class="text-primary"><?= ucwords($m->title_menu); ?></p>
                                                <div class="row">
                                                    <div class="col-sm-2">
                                                    </div>
                                                    <div class="col-sm-2">
                                                        Urutan : <?= $m->urutan; ?>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        Rubah Urutan : <input type="text" value="<?= $m->urutan; ?>">
                                                    </div>
                                                </div>
                                            </li>
                                            <?php foreach ($this->Menu_model->show(encode($m->id))['body'] as $sm) : ?>
                                                <li class="list-group-item node-expanded-treeview" data-nodeid="<?= $no++; ?>">
                                                    <p class="text-primary"><?= ucwords($sm->nama_menu); ?></p>

                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                        </div>
                                                        <div class="col-sm-2">
                                                            Urutan : <?= $sm->urutan; ?>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            Rubah Urutan : <input type="text" value="<?= $sm->urutan; ?>">
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; ?>
                                        <?php endforeach; ?>
                                    </ul>
                                    <input type="text" value="<?= $no; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary btn-sm box-shadow-1">Save</button>
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(() => {
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

    // show sub menu
    var append = (param) => {
        var html = (res) => {
            $('.sub-menu-conf').html(res);
        }
        $('.sub-menu-conf').html('<img src="<?= base_url('public/template/admin/assets/img/loading.gif') ?>">');
        $.get('<?= base_url('menu-config/show/'); ?>' + param, html);
    }
</script>