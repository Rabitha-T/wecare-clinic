
<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/vendor/vendor/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/vendor/vendor/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<script id="rendered-js" >
    $(document).ready(function () {

        $('.sign_in').click(function () {

            $('.login').addClass('active');
            $('.welcome').addClass('active');
            $('.sign_in').addClass('active');
            $('.btn').addClass('active');
            $('.sign_up').addClass('active');
        });
        $('.btn').click(function () {
            $('.sign_up').removeClass('active');
            $('.login').removeClass('active');
            $('.welcome').removeClass('active');
            $('.sign_up').removeClass('active');
            $('.btn').removeClass('active');
            $('.sign_in').removeClass('active');
        });




    });
    //# sourceURL=pen.js
</script>


<?php if($type == 'login') { ?>

    <script>

        $(document).ready(function () {

            $( ".sign_in" ).trigger( "click" );

        });


    </script>

<?php  } ?>

</body>
</html>