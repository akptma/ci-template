<table class="table table-striped table-bordered tbl_submenu">
    <thead>
        <tr>
            <th>Nama Menu</th>
            <th>Urutan Sekarang</th>
            <th>Rubah Urutan </th>
        </tr>
    </thead>
    <tbody>
    <tbody>
        <?php $no = 0;
        foreach ($submenu as $sm) : $no++; ?>
            <tr>
                <td>
                    <input type="hidden" name="id_submenu<?= $no; ?>" value="<?= $sm->id; ?>">
                    <input type="hidden" name="kode_menu<?= $no; ?>" value="<?= $sm->kode_menu; ?>">
                    <a onclick="append('<?= encode($sm->id); ?>')" class="text-primary"><?= ucwords($sm->nama_menu); ?></a>
                </td>
                <td width="2px;"><?= $sm->urutan; ?></td>
                <td width="2px;"><input type="text" name="urutan_submenu<?= $no; ?>" id="urutan_submenu<?= $no; ?>" value="<?= $sm->urutan; ?>" class="form-control" required></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <input type="hidden" name="baris_submenu" value="<?= $no; ?>">
    </tbody>
</table>