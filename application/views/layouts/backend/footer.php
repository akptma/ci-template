</div>
</div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->
<footer class="footer footer-static footer-light navbar-border">
    <?php $nav = $this->db->get_where('config', ['id' => 1])->row(); ?>
    <p class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2">
        <span class="float-md-left d-block d-md-inline-block">Copyright &copy; 2022 <a class="text-bold-800 grey darken-2" href="<?= base_url(); ?>"><?= strtoupper($nav->nav_brand); ?> </a>, All rights reserved. </span>
        <span class="float-md-right d-block d-md-inline-blockd-none d-lg-block"><?= ucwords($nav->foo_brand); ?><i class="ft-heart pink"></i></span>
    </p>
</footer>
<!-- BEGIN PAGE VENDOR JS-->
<script src="<?= base_url('public/template/admin/') ?>app-assets/vendors/js/ui/headroom.min.js" type="text/javascript"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN MODERN JS-->
<script src="<?= base_url('public/template/admin/') ?>app-assets/js/core/app-menu.js" type="text/javascript"></script>
<script src="<?= base_url('public/template/admin/') ?>app-assets/js/core/app.js" type="text/javascript"></script>
<script src="<?= base_url('public/template/admin/') ?>app-assets/js/scripts/customizer.js" type="text/javascript"></script>
<!-- END MODERN JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->

<script>
    var logout = () => {
        swal({
                title: "Yakin Mau Udahan?",
                icon: "warning",
                buttons: {
                    cancel: {
                        text: "Enggak!",
                        value: null,
                        visible: true,
                        className: "",
                        closeModal: false,
                    },
                    confirm: {
                        text: "Ya, Logout!",
                        value: true,
                        visible: true,
                        className: "",
                        closeModal: false
                    }
                }
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    // swal("Logout!", "Anda akan diarahkan kehalaman login.", "success");
                    swal({
                        icon: "success",
                        title: "Logout!!",
                        text: "Anda akan diarahkan kehalaman login",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    setTimeout(() => {
                        window.location = '<?= base_url('auth'); ?>'
                    }, 2000);
                } else {
                    swal("Cancelled", "", "error");
                }
            });
    }
</script>
</body>

</html>