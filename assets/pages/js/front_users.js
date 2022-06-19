$(document).ready(function(){

    var grid = new Datatable();

    grid.init({
        src: $("#users-tbl"),
        onSuccess: function (grid, response) {
            // grid:        grid object
            // response:    json object of server side ajax response
            // execute some code after table records loaded
        },
        onError: function (grid) {
            // execute some code on network or other general error
        },
        onDataLoad: function(grid) {
            // execute some code on ajax data load
        },
        loadingMessage: 'Loading...',
        dataTable: { // here you can define a typical datatable settings from http://datatables.net/usage/options
            "processing": true,
            "serverSide": true,
            select: true,
            "ajax": {
                "url": $("#users-tbl").data('url')
            },
            "order": [
                [5, "desc"]
            ],
            "colReorder": {
                reorderCallback: function () {
                    console.log( 'callback' );
                }
            },
            buttons: [

//                { className: 'btn red  add_amenities', text: 'Add   ', action: function ( e, dt, node, config ) { } },

            ],
            "dom": "<'row cw-listactions'<'col-xs-6'f><'col-xs-6'B>><'table-scrollable'rt><'row cw-listnav'<'col-xs-6'il><'col-xs-6'p>>",
            "pagingType": "bootstrap_number",
            "language": { // language settings
                "info": "Found total _TOTAL_ records",
                "search": "Search : ",
            },
            "columnDefs": [
                {"className": "text-center", "targets": [6]},
                {"className": "text-left", "targets": "_all"},
//                { orderable: false, targets:  },
            ],
            "lengthMenu": [
                [5, 10, 15, 20, -1],
                [5, 10, 15, 20, "All"] // change per page values here
            ],
            "pageLength": 20,
        }
    });

    grid.setAjaxParam("customActionType", "group_action");
    grid.getDataTable().ajax.reload();
    grid.clearAjaxParams();


    $(document).on('click', '#con_del', function(){

        if(!confirm('Are you sure you want to delete this forever?')){
            return false;
        }

    });

    $('.date-picker_created').datetimepicker({
        format: 'MM/DD/YYYY',
        icons: {
            time: 'fa fa-clock-o',
            date: 'fa fa-calendar',
            up: 'fa fa-chevron-up',
            down: 'fa fa-chevron-down',
            previous: 'fa fa-chevron-left',
            next: 'fa fa-chevron-right',
            today: 'glyphicon glyphicon-screenshot',
            clear: 'fa fa-trash',
            close: 'fa fa-times'
        }
    });


    $(document).on('click', '.view_form', function(e){

        e.preventDefault();
        var $this = $(this);
        var $url = $this.data('url');
        var image_url = site_url+'files/media/loading_gif.gif';

        $('#view_model').modal();
        var loading = '<div class="gif_loading_wrap" align="center "><img class="loading_img" src="'+image_url+'"; ></div>';

        $('#view_model .modal-body').html(loading);

        $.ajax({
            type: 'GET',
            url: $url,
            dataType:'json',
            success:function( data ){
                console.log(data);
                $('#view_model .modal-body').html(data.html);
            }
        });

    });


});