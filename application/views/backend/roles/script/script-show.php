<script>
    $(document).ready(() => {
        $('.tbl_users_role').DataTable({
            "order": [
                [2, "desc"]
            ],
            "lengthChange": false,
            searching: false,
        });
        $('#detail_modal').modal('show');
    })
</script>