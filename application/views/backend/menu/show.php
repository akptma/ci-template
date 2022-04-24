<!-- Modal -->
<div class="modal fade text-left" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18"><i class="la la-tree"></i> Detail Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="projectinput1">Nama Menu</label>
                            <input type="text" value="<?= ucwords($header->title_menu); ?>" class="form-control" readonly>
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
                <h5>Sub-Menu Terkait</h5>
                <table class="table table-striped table-bordered tbl_sub_menu">
                    <thead>
                        <tr>
                            <th>Sub-Menu</th>
                            <th>Urutan</th>
                            <th>Routes</th>
                            <th>Status</th>
                            <th>Dibuat/Diperbarui</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($body as $b) : ?>
                            <tr>
                                <td><?= html_escape(ucwords($b->nama_menu)); ?></td>
                                <td><?= $b->urutan; ?></td>
                                <td><?= html_escape($b->routes); ?></td>
                                <td><span class="badge badge-<?= ($b->status == 1 ? 'primary' : 'danger'); ?>"><?= ($b->status == 1 ? 'Aktif' : 'Non-Aktif'); ?></span></td>
                                <td>
                                    <span class="badge badge-info"><?= $b->created_at; ?></span>
                                    <span class="badge badge-primary"><?= $b->updated_at; ?></span>
                                </td>
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