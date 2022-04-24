<script>
    $(document).ready(() => {
        $('.tbl_sub_menu').DataTable({
            "order": [
                [2, "desc"]
            ],
            "lengthChange": false,
            searching: false,
        });
        $('#detail_modal').modal('show');
    })
</script>