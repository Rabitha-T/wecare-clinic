
Dropzone.autoDiscover = false;

$(document).ready(function(){




    $(function() {

        var url = site_url+'vendor/profile/create';
        //Dropzone class
        var myDropzone = new Dropzone(".dropzone", {
            url: url,
            paramName: "file",
            parallelUploads : 10,
            maxFilesize: 10,
            addRemoveLinks: true,
            maxFiles: 1,
            acceptedFiles: "image/*,application/pdf",
            autoProcessQueue: false
        });

        myDropzone.on("queuecomplete", function() {
            //Redirect URL
            window.location.href = site_url+'vendors-edit-profile';
        });

        $('#submit_form').click(function(e){
            e.preventDefault();

            var url_name = site_url+'vendor/profile/create_profile';

            var form = $('#edit_form')[0];
            var formData = new FormData(form);


            var error = false;

            $( ".required_field" ).each(function() {

                if($(this).val() == '' ){

                    error = true;
                    $(this).closest( ".form-group").addClass('has-error');
                }else{
                    $(this).closest( ".form-group").removeClass('has-error');
                }

            });



            if( !error ){

                $('#submit_form').attr('disabled', true);

                $('#myModal').modal();


                $.ajax({
                    type:'POST',
                    url: url_name,
                    data:formData,
                    dataType:'json',
                    enctype: 'multipart/form-data',
                    processData: false,  // Important!
                    contentType: false,
                    success:function( data ){
                        console.log(data.id);
                        url = url+'/'+data.id;

                        if (myDropzone.getQueuedFiles().length > 0) {

                            const acceptedFiles = myDropzone.getAcceptedFiles();
                            for (let i = 0; i < acceptedFiles.length; i++) {
                                setTimeout(function () {
                                    myDropzone.processFile(acceptedFiles[i])
                                }, i * 2000)
                            }
                            
//                            myDropzone.processQueue();
                        } else {
                            window.location.href = site_url+'vendors-edit-profile';
                        }


                    }
                });
            }


        });
    });










});

