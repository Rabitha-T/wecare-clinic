$(document).ready(function(){

    document.addEventListener("DOMContentLoaded", function(event) {

        function OTPInput() {
            const inputs = document.querySelectorAll('#otp > *[id]');
            for (var i = 0; i < inputs.length; i++) { inputs[i].addEventListener('keydown', function(event) { if (event.key==="Backspace" ) { inputs[i].value='' ; if (i !==0) inputs[i - 1].focus(); } else { if (i===inputs.length - 1 && inputs[i].value !=='' ) { return true; } else if (event.keyCode> 47 && event.keyCode < 58) { inputs[i].value=event.key; if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } else if (event.keyCode> 64 && event.keyCode < 91) { inputs[i].value=String.fromCharCode(event.keyCode); if (i !==inputs.length - 1) inputs[i + 1].focus(); event.preventDefault(); } } }); } } OTPInput(); });


//    if(is_otp_verified == 0){
//        $('#view_model').modal();
//    }





    $(document).on('click', '.validate', function(e){

        e.preventDefault();
        var $this = $(this);
        var $url = base_url+'vendor/dashboard/validate_otp';
        var $otp = $('#first').val();
        var image_url = site_url+'files/media/loading_gif.gif';

        $('#view_model').modal();

        $.ajax({
            type: 'POST',
            url: $url+'/'+$otp,
            contentType: "application/json",
            success:function( data ){

                var arr = $.parseJSON(data);


                console.log(arr);

                if(arr.status == 1){
                    window.location.href = site_url+'vendors-edit-profile';
                }else{


                    $('#alert_box_text').text(arr.message);
                    $('#alert_box').show();
                }
            },
            error: function (request, error) {
                console.log(arguments);
                alert(" Can't do because: " + error);
            }
        });

    })



});