<!-- Modal -->
<div class="modal fade text-left" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18"><i class="la la-tree"></i> Detail Role</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="projectinput1">Nama Role</label>
                            <input type="text" value="<?= $header->nama_role; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" value="<?= ($header->status == 1 ? 'Active' : 'Non-Aktif'); ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dibuat</label>
                            <input type="text" value="<?= $header->created_at; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diperbarui</label>
                            <input type="text" value="<?= ($header->updated_at !== null ? $header->updated_at : '-'); ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <hr>
                <h5>Users Terkait</h5>
                <table class="table table-striped table-bordered tbl_users_role">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($body as $b) : ?>
                            <tr>
                                <td><?= html_escape(ucwords($b->username)); ?></td>
                                <td><?= html_escape(ucwords($b->nama)); ?></td>
                                <td><?= html_escape(ucwords($b->email)); ?></td>
                                <td><span class="badge badge-<?= ($b->status == 1 ? 'primary' : 'danger'); ?>"><?= ($b->status == 1 ? 'Aktif' : 'Non-Aktif'); ?></span></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/roles/script/script-show'); ?>