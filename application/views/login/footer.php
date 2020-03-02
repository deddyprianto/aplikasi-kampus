<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('asset/'); ?>jq/jquery.min.js"></script>
<script src="<?= base_url('asset/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Custom scripts for all pages-->
<script src="<?= base_url('asset/'); ?>js/sb-admin-2.min.js"></script>

<script src="<?= base_url('asset/'); ?>vendor/chart.js/Chart.bundle.min.js"></script>

<script src="<?= base_url('asset/'); ?>js/sweetalert2.all.min.js"></script>
<script src="<?= base_url('asset/'); ?>js/myscript.js"></script>

<script src="<?= base_url('asset/'); ?>js/particles.js"></script>
<script>
    window.onload = function() {
        Particles.init({
            selector: '.background',
            maxParticles: 250,
            sizeVariations: 5,
            speed: 1,
            color: "#ffffff",
            connectParticles: true,
            responsive: [{
                breakpoint: 425,
                options: {
                    speed: 0.5,
                    maxParticles: 80,
                    connectParticles: true
                }


            }]
        });
    };
</script>
</body>

</html>