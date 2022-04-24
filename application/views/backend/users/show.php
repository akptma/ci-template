<!-- Modal -->
<div class="modal fade text-left" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18"><i class="la la-tree"></i> Detail User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        <center>
                            <figure class="col-lg-3 col-md-6 col-12" itemprop="associatedMedia" itemscope="" itemtype="http://schema.org/ImageObject">
                                <img class="img-thumbnail img-fluid" src="<?= base_url('public/data/backend/img-user/' . $user->img); ?>" itemprop="thumbnail">
                            </figure>
                        </center>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class=" form-group">
                            <label for="projectinput1">User Name</label>
                            <input type="text" value="<?= $user->username; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Role</label>
                            <input type="text" value="<?= ucwords($user->nama_role); ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" value="<?= ucwords($user->nama); ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="text" value="<?= ucwords($user->email); ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dibuat</label>
                            <input type="text" value="<?= $user->created_at; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Diperbarui</label>
                            <input type="text" value="<?= ($user->updated_at != null ? $user->updated_at : '-'); ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Dihapus</label>
                            <input type="text" value="<?= ($user->deleted_at != null ? $user->deleted_at : '-'); ?>" class="form-control" readonly>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view('backend/users/script/script-show'); ?>