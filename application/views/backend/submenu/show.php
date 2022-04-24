<!-- Modal -->
<div class="modal fade text-left" id="detail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel18" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel18"><i class="la la-tree"></i> Detail Sub-Menu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class=" form-group">
                            <label for="projectinput1">Nama Sub-Menu</label>
                            <input type="text" value="<?= ucwords($header->nama_menu); ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Routes</label>
                            <input type="text" value="<?= $header->routes; ?>" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn grey btn-outline-secondary btn-block" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('#detail_modal').modal('show');
    })
</script>