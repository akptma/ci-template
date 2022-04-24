<script>
    // USERNAME GENERATOR
    var uname = (val) => {
        let petjah = val.split('@')[0];
        let random = Math.floor(Math.random() * 100);
        let user_count = (Number('<?= $user_count; ?>') + 1);
        let result = petjah + random + user_count;
        $('#username').val(result);
    }
</script>