<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Config-Apps </h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="card-body">
                        <?php if ($acl->akses === 'Y') : ?>
                            <form method="post" class="form" action="<?= base_url('app-config/' . encode($config->id)); ?>" enctype="multipart/form-data">
                                <div class="form-body">
                                    <h4 class="form-section"><i class="ft-user"></i> Config Info</h4>
                                    <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Navbar Brand</label>
                                                <input type="text" name="nav_brand" id="nav_brand" value="<?= ucwords($config->nav_brand); ?>" class="form-control" required>
                                                <p class="text-danger"><?= (form_error('nav_brand') !== null ? form_error('nav_brand') : ''); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Footer Brand</label>
                                                <input type="text" name="foo_brand" id="foo_brand" value="<?= ucwords($config->foo_brand); ?>" class="form-control" required>
                                                <p class="text-danger"><?= (form_error('foo_brand') !== null ? form_error('foo_brand') : ''); ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <fieldset class="form-group">
                                                <label>Logo</label>
                                                <input type="file" name="nav_logo" id="nav_logo" onchange="upload_logo()" class="form-control">
                                                <input type="hidden" name="upload" id="upload" value="0">
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a href="<?= base_url('app-config'); ?>" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i> Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="la la-check-square-o"></i> Save
                                    </button>
                                </div>
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

    var upload_logo = () => {
        $('#upload').val(1);
    }
</script>