<section id="ordering">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Config Menu dan Sub-menu</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified">
                            <li class="nav-item">
                                <a class="nav-link active" id="active-tab" data-toggle="tab" href="#menu" aria-controls="menu" aria-expanded="true">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="link-tab" data-toggle="tab" href="#sub-menu" aria-controls="sub-menu" aria-expanded="false">Sub-menu</a>
                            </li>
                        </ul>
                        <div class="tab-content px-1 pt-1">
                            <div role="tabpanel" class="tab-pane active" id="menu" aria-labelledby="menu-tab" aria-expanded="true">
                                <form action="<?= base_url('menu-config/update'); ?>" method="post">
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Menu</th>
                                                    <th>Urutan Sekarang</th>
                                                    <th>Rubah Urutan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($menu as $m) : $no++; ?>
                                                    <tr>
                                                        <td>
                                                            <input type="hidden" value="<?= $m->id; ?>" name="id_menu<?= $no; ?>">
                                                            <input type="text" value="<?= ucwords($m->title_menu); ?>" class="form-control" readonly>
                                                        </td>
                                                        <td><?= $m->urutan; ?></td>
                                                        <td><input type="text" value="<?= $m->urutan; ?>" name="urutan<?= $no; ?>" class="form-control"></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <input type="hidden" value="<?= $no; ?>" name="baris_menu">
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                </form>
                            </div>
                            <div class="tab-pane" id="sub-menu" role="tabpanel" aria-labelledby="sub-menu-tab" aria-expanded="false">
                                <form action="<?= base_url('menu-config/update'); ?>" method="post">
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Parent</th>
                                                    <th>Sub-Menu</th>
                                                    <th>Urutan Sekarang</th>
                                                    <th>Rubah Urutan</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 0;
                                                foreach ($submenu as $sm) : $no++; ?>
                                                    <tr>
                                                        <td><?= $sm->kode_menu; ?></td>
                                                        <td>
                                                            <input type="hidden" value="<?= $sm->id; ?>" name="id_menu<?= $no; ?>">
                                                            <input type="text" value="<?= ucwords($sm->nama_menu); ?>" class="form-control" readonly>
                                                        </td>
                                                        <td><?= $sm->urutan; ?></td>
                                                        <td><input type="text" value="<?= $sm->urutan; ?>" name="urutan<?= $no; ?>" class="form-control"></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                                <input type="hidden" value="<?= $no; ?>" name="baris_menu">
                                            </tbody>
                                        </table>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-sm">Save</button>
                                </form>
                            </div>
                        </div>
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
        if (session_status === 'true_update') {
            swal("Berhasil!", "", "success");
        } else if (session_status === 'false_update') {
            swal("Gagal!", "", "error");
        }
    }
</script>