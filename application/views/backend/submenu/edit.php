<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Edit Role</h4>
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
                        <form action="<?= base_url('submenu/update/' . encode($submenu->id)); ?>" method="post" class="form">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> Role Info</h4>
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Sub-Menu</label>
                                            <input type="text" name="nama_menu" id="nama_menu" value="<?= ucwords($submenu->nama_menu); ?>" class="form-control" required>
                                            <p class="text-danger"><?= (form_error('nama_menu') !== null ? form_error('nama_menu') : ''); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Route</label>
                                            <input type="text" name="routes" id="routes" value="<?= $submenu->routes; ?>" class="form-control" required>
                                            <p class="text-danger"><?= (form_error('routes') !== null ? form_error('routes') : ''); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <a href="<?= base_url('menu'); ?>" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> Cancel
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> Save
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>