<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Add Menu</h4>
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
                        <form action="<?= base_url('menu/store'); ?>" method="post" class="form">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> Menu Info</h4>
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama Menu</label>
                                            <input type="text" name="title_menu" id="title_menu" value="<?= set_value('title_menu'); ?>" class="form-control" required>
                                            <p class="text-danger"><?= (form_error('title_menu') !== null ? form_error('title_menu') : ''); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Icons</label>
                                            <input type="text" name="icons" id="icons" value="<?= set_value('icons'); ?>" class="form-control" required>
                                            <p class="text-danger"><?= (form_error('icons') !== null ? form_error('icons') : ''); ?></p>
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