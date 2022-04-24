<section id="basic-form-layouts">
    <div class="row match-height">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-form">Add User</h4>
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
                        <form action="<?= base_url('user/store'); ?>" method="post" class="form">
                            <div class="form-body">
                                <h4 class="form-section"><i class="ft-user"></i> Personal Info</h4>
                                <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>">
                                <input type="hidden" name="img" value="default.png">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class=" form-group">
                                            <label for="projectinput1">User Name</label>
                                            <input type="text" name="username" id="username" value="<?= set_value('username'); ?>" class="form-control" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role_id" id="role_id" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority" data-original-title="" title="">
                                                <?php foreach ($roles as $role) : ?>
                                                    <option value="<?= $role->id; ?>" <?= ($role->id == 1 ? 'checked' : ''); ?>><?= ucwords($role->nama_role); ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" id="nama" value="<?= set_value('nama'); ?>" class="form-control" required>
                                            <p class="text-danger"><?= (form_error('nama') !== null ? form_error('nama') : ''); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>E-mail</label>
                                            <input type="text" name="email" id="email" value="<?= set_value('email'); ?>" onchange="uname(this.value)" class="form-control" required>
                                            <p class="text-danger"><?= (form_error('email') !== null ? form_error('email') : ''); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" name="password" id="password" class="form-control" required>
                                            <p class="text-danger"><?= (form_error('password') !== null ? form_error('password') : ''); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <a href="<?= base_url('user'); ?>" class="btn btn-warning mr-1">
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

<?php $this->load->view('backend/users/script/script-add'); ?>