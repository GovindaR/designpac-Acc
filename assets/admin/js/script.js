$(document).ready(function () {

    //paste this code under the head tag or in a separate js file.
    // Wait for window load
    $(window).load(function () {
        // Animate loader off screen
        hideLoader();
    });

    $('.grid').masonry({
        // options
        itemSelector: '.grid-item'
    });

    $('[data-toggle="tooltip"]').tooltip();
    $("#chosen1").trigger("chosen:updated");
    $('.dataTables-example').DataTable({
        paginate: true,
        searching: true,
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]

    });

    var t = $('.yesPaginate').DataTable({
        "ordering": false,
        paginate: false,
        "columnDefs": [{
            "searchable": false,
            "orderable": false,
            "targets": 0
        }],
        "order": [[1, 'asc']]
    });
    t.on('order.dt search.dt', function () {
        t.column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
    $('.doctor-datatable').DataTable({
        searching: false,
        paging: false,
        info: false
    });
    $('.dataTables-example1').DataTable({
        paginate: true,
        buttons: [
            {extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {
                extend: 'print',
                customize: function (win) {
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                        .addClass('compact')
                        .css('font-size', 'inherit');
                }
            }
        ]

    });


//slidedown msg doctor-dashboard
//    $('li.list-group-item').click(function(e){
//        e.preventDefault();
//        if($(this).children().children().attr('value')=='show'){
//            ($(this).children().children().attr('value','hide'));
//            ($(this).children('.iboxcontent')).hide(700);
//            $(this).children().children().children('.fa').attr('class', 'fa fa-chevron-down')
//        }
//        else if($(this).children().children().attr('value')=='hide'){
//            ($(this).children().children().attr('value','show'));
//            ($(this).children('.iboxcontent')).show(700);
//            $(this).children().children().children('.fa').attr('class', 'fa fa-chevron-up')
//        }
//    });

    var url = document.location.toString();
    if (url.match('#')) {
        $('.nav-tabs a[class=' + url.split('#')[1] + ']').tab('show');
    }
// With HTML5 history API, we can easily prevent scrolling!
    $('.nav-tabs a').on('shown.bs.tab', function (e) {
        if (history.pushState) {
            history.pushState(null, null, e.target.hash);
        } else {
            window.location.hash = e.target.hash; //Polyfill for old browsers
        }
    });

    /* Init DataTables */
    var oTable = $('#editable').DataTable();

    /* Apply the jEditable handlers to the table */
    oTable.$('td').editable('../example_ajax.php', {
        "callback": function (sValue, y) {
            var aPos = oTable.fnGetPosition(this);
            oTable.fnUpdate(sValue, aPos[0], aPos[1]);
        },
        "submitdata": function (value, settings) {
            return {
                "row_id": this.parentNode.getAttribute('id'),
                "column": oTable.fnGetPosition(this)[2]
            };
        },

        "width": "90%",
        "height": "100%"
    });

    function fnClickAddRow() {
        $('#editable').dataTable().fnAddData([
            "Custom row",
            "New row",
            "New row",
            "New row",
            "New row"]);

    }

    $(document).ready(function () {
        $('.i-checks').iCheck({
            checkboxClass: 'icheckbox_square-green',
            radioClass: 'iradio_square-green'
        });
    });

    $(function () {
        $(".datepicker").datepicker({
            todayHighlight: true,
            autoclose: true,
            format: 'dd-mm-yyyy'

        });
    });

    $(function () {
        $(".datepicker3").datetimepicker({
            datepicker: true,
            format: 'Y-m-d H:i'
        });
    });
    $(function () {
        $(".datepicker2").datetimepicker({
            datepicker: false,
            format: 'H:i'
        });
    });

    $('.clockpicker').clockpicker({
        placement: 'top'
    });
    $('.input-daterange input').each(function () {
        $(this).datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true
        });
    });


    function getBlogSlug(e) {
        var title = $(e).val();
        $.ajax({
            type: "get",
            url: '/admin/get-blog-slug/' + title,
            //data: {'title':title},
            //cache: false,
            success: function (result) {

                $('#slug').val(result);
                $('#meta_title').val(title);
            }
        });
    }


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(100);
            };

            reader.readAsDataURL(input.files[0]);
            var img = document.getElementById("blah");
            img.style.visibility = "visible";
        }
    }

    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {allow_single_deselect: true},
        '.chosen-select-no-single': {disable_search_threshold: 10},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
        '.chosen-select-width': {width: "100%"}
    }
    for (var selector in config) {
        jQuery(selector).chosen(config[selector]);
    }
    $(".unclicked").click(function () {
        // Instead of directly editing CSS, toggle a class
        $(this).toggleClass("clicked");
    });


    var max_fields = 10; //maximum input boxes allowed
    var wrapper = $(".input_fields_wrap"); //Fields wrapper
    var add_button = $(".add_field_button"); //Add button ID
    var x = 1; //initlal text box count
    $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
            x++; //text box increment

            $(wrapper).append('<div class="col-md-6"><div class="form-group"><hr class="hr1"><label for="course" class="control-label">Course</label><input type="text" name="course[]" class="form-control" required><label for="university" class="control-label">University</label><input type="text" name="university[]" class="form-control" required><label for="year" class="control-label">Year</label><input type="text" name="year[]" class="form-control" required></div>' +
                '<a href="#" class="remove_field">Remove This Entry</a></div>');
        }
    });

    $(wrapper).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
    });

    var max_fields_1 = 10; //maximum input boxes allowed
    var wrapper_1 = $(".input_fields_wrap-1"); //Fields wrapper
    var add_button_1 = $(".add_field_button-1"); //Add button ID

    var x1 = 1; //initlal text box count
    $(add_button_1).click(function (e) { //on add input button click
        e.preventDefault();

        if (x1 < max_fields_1) { //max input box allowed
            x1++; //text box increment

            $(wrapper_1).append('<div class="col-md-6"><div class="form-group"><hr class="hr1"><label for="hospital" class="control-label">Hospital</label>' +
                '<input type="text" name="hospital[]" class="form-control" required><label for="department" class="control-label">Department</label>' +
                '<input type="text" name="department[]" class="form-control" required><label for="start_date_end_date" class="control-label">Start Date - End Date</label>' +
                '<div class="input-daterange input-group" id="datepicker"><input class="form-control datepicker" name="start_date[]" type="text" required="required">' +
                '<span class="input-group-addon">to</span>' +
                '<input class="form-control datepicker" name="end_date[]" type="text" required="required"></div>' +
                '<label for="details" class="control-label">Details</label><input type="text" name="details[]" class="form-control" required></div>' +
                '<a href="#" class="remove_field">Remove This Entry</a></div>');
            $('.input-daterange').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true
            });
        }

    });
    $(wrapper_1).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x1--;
    });


    var max_fields_2 = 10; //maximum input boxes allowed
    var wrapper_2 = $(".input_fields_wrap-2"); //Fields wrapper
    var add_button_2 = $(".add_field_button-2"); //Add button ID

    var x2 = 1; //initlal text box count
    $(add_button_2).click(function (e) { //on add input button click
        e.preventDefault();
        if (x2 < max_fields_2) { //max input box allowed
            x2++; //text box increment

            $(wrapper_2).append('<div class="col-md-6"><div class="form-group"><hr class="hr1">' +
                '<label for="hospital" class="control-label">Hospital</label>' +
                '<input type="text" name="hospital[]" class="form-control" required="">' +
                '<label for="title" class="control-label">Title</label>' +
                '<input type="text" name="title[]" class="form-control" required="">' +
                '<label for="time_period" class="control-label">Time Period</label>' +
                '<input type="text" name="time_period[]" class="form-control" required="">' +
                '<label for="details" class="control-label">Details</label>' +
                '<input type="text" name="details[]" class="form-control" required=""></div>' +
                '<a href="#" class="remove_field">Remove This Entry</a></div>');
        }
    });
    $(wrapper_2).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x2--;
    });

    var max_fields_3 = 10; //maximum input boxes allowed
    var wrapper_3 = $(".input_fields_wrap-3"); //Fields wrapper
    var add_button_3 = $(".add_field_button-3"); //Add button ID

    var x3 = 1; //initlal text box count
    $(add_button_3).click(function (e) { //on add input button click
        e.preventDefault();
        if (x3 < max_fields_3) { //max input box allowed
            x3++; //text box increment

            $(wrapper_3).append('<div class="col-md-6"><div class="form-group"><hr class="hr1">' +
                '<label for="title" class="control-label">Title</label>' +
                '<input type="text" name="title[]" class="form-control" required="">' +
                '<label for="published_year" class="control-label">Published Year</label>' +
                '<input type="text" name="published_year[]" class="form-control" required="">' +
                '<label for="details" class="control-label">Details</label>' +
                '<textarea name="details[]" class="form-control" required=""></textarea></div>' +
                '<a href="#" class="remove_field">Remove This Entry</a></div>');
        }
    });
    $(wrapper_3).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x3--;
    });

    var max_fields_4 = 10; //maximum input boxes allowed
    var wrapper_4 = $(".input_fields_wrap-4"); //Fields wrapper
    var add_button_4 = $(".add_field_button-4"); //Add button ID

    var x4 = 1; //initlal text box count
    $(add_button_4).click(function (e) { //on add input button click
        e.preventDefault();
        if (x4 < max_fields_4) { //max input box allowed
            x4++; //text box increment

            $(wrapper_4).append('<div class="col-md-6"><div class="form-group"><hr class="hr1">' +
                '<label for="info" class="control-label">Course Info</label>' +
                '<input type="text" name="info[]" value="" class="form-control" required="">' +
                '<label for="details" class="control-label">Details</label>' +
                '<input type="text" name="details[]" value="" class="form-control" required=""></div>' +
                '<a href="#" class="remove_field">Remove This Entry</a></div>');
        }
    });
    $(wrapper_4).on("click", ".remove_field", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x4--;
    });


    $('div.dismiss').delay(2000).slideUp(400);


    (function () {
        var bar = $('.personal-progress');
        var msg = $('.message-area-personal');

        //$('#personal-details-form').ajaxForm({
        //    beforeSend: function () {
        //        $(msg).hide();
        //    },
        //    uploadProgress: function () {
        //        bar.html('<i class="fa fa-refresh fa-spin fa-2x" style="color: #3c763d"></i>');
        //    },
        //    success: function () {
        //        bar.empty();
        //    },
        //    complete: function (xhr) {
        //        if (xhr.responseText != '') {
        //            bar.empty();
        //            $(msg).slideToggle();
        //        }
        //    }
        //});

    })();
    (function () {
        var bar = $('.qualifications-progress');
        var msg = $('.message-area-qualifications');

        $('#qualifications-form').ajaxForm({
            beforeSend: function () {
                $(msg).hide();
            },
            uploadProgress: function () {
                bar.html('<i class="fa fa-refresh fa-spin fa-2x" style="color: #3c763d"></i>');
            },
            success: function () {
                bar.empty();
            },
            complete: function (xhr) {
                if (xhr.responseText != '') {
                    bar.empty();
                    $(msg).slideToggle();
                }
            }
        });

    })();
    (function () {
        var bar = $('.emp-progress');
        var msg = $('.message-area-emp');

        $('#employment_history-form').ajaxForm({
            beforeSend: function () {
                $(msg).hide();
            },
            uploadProgress: function () {
                bar.html('<i class="fa fa-refresh fa-spin fa-2x" style="color: #3c763d"></i>');
            },
            success: function () {
                bar.empty();
            },
            complete: function (xhr) {
                if (xhr.responseText != '') {
                    bar.empty();
                    $(msg).slideToggle();
                }
            }
        });

    })();

    (function () {
        var bar = $('.med-exp-progress');
        var msg = $('.message-area-med-exp');

        $('#medical_experience-form').ajaxForm({
            beforeSend: function () {
                $(msg).hide();
            },
            uploadProgress: function () {
                bar.html('<i class="fa fa-refresh fa-spin fa-2x" style="color: #3c763d"></i>');
            },
            success: function () {
                bar.empty();
            },
            complete: function (xhr) {
                if (xhr.responseText != '') {
                    bar.empty();
                    $(msg).slideToggle();
                }
            }
        });

    })();
    (function () {
        var bar = $('.pub-progress');
        var msg = $('.message-area-pub');

        $('#publication-form').ajaxForm({
            beforeSend: function () {
                $(msg).hide();
            },
            uploadProgress: function () {
                bar.html('<i class="fa fa-refresh fa-spin fa-2x" style="color: #3c763d"></i>');
            },
            success: function () {
                bar.empty();
            },
            complete: function (xhr) {
                if (xhr.responseText != '') {
                    bar.empty();
                    $(msg).slideToggle();
                }
            }
        });
    })();

    (function () {
        var bar = $('.course-progress');
        var msg = $('.message-area-course');

        $('#course-form').ajaxForm({
            beforeSend: function () {
                $(msg).hide();
            },
            uploadProgress: function () {
                bar.html('<i class="fa fa-refresh fa-spin fa-2x" style="color: #3c763d"></i>');
            },
            success: function () {
                bar.empty();
            },
            complete: function (xhr) {
                if (xhr.responseText != '') {
                    bar.empty();
                    $(msg).slideToggle();
                }
            }
        });
    })();


    $('button.readbutton').on('click', function (event) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        event.preventDefault();
        val = $(this).attr('value');
        $myvalue = $(this);


        /*status = $(this).attr('status');*/
        $.ajax({
            type: "POST",
            url: "/doctor/markread/" + val,
            data: {value: val},
            success: function (data) {
                ($myvalue.parent().parent().parent().parent().remove());
                toastr.success('Marked!!');
            },
            error: function (data) {
                // console.log("failed");
            }
        }, "html");

        $("#request_form").validate();

    });


    tinymce.init({
        selector: 'textarea#contenttextarea',
        theme: 'modern',
        plugins: [
            'advlist autolink lists charmap hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            '  paste textcolor colorpicker  '
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | bullist numlist outdent indent | link image',

        height: 50,
        skin: 'lightgray',
        browser_spellcheck: true,
        menubar: false
    });
    tinymce.init({
        selector: 'textarea#first_column',
        theme: 'modern',
        plugins: [
            'advlist autolink lists charmap hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            '  paste textcolor colorpicker  '
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | bullist numlist outdent indent | link image',

        height: 100,
        skin: 'lightgray',
        browser_spellcheck: true,
        menubar: false
    });

    tinymce.init({
        selector: 'textarea#address',
        theme: 'modern',
        toolbar1: 'insertfile undo redo',
        height: 50,
        skin: 'lightgray',
        browser_spellcheck: true,
        menubar: false
    });

    tinymce.init({
        selector: 'textarea#contenttextarea2',
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        height: 250,
        skin: 'lightgray',
        browser_spellcheck: true,
    });

    tinymce.init({
        selector: 'textarea#contenttextarea3',
        theme: 'modern',
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        height: 350,
        menubar: false,
        skin: 'lightgray',
        browser_spellcheck: true,
    });

    $(function () {
        var roles = $('select[name="roles[]"]').bootstrapDualListbox({
            nonSelectedListLabel: 'Available roles',
            selectedListLabel: 'Assigned roles',
            preserveSelectionOnMove: 'moved',
            moveOnSelect: true
        });
    });

    toastr.options = {
        "closeButton": true,
        "debug": false,
        "progressBar": false,
        "preventDuplicates": true,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "400",
        "hideDuration": "800",
        "timeOut": "1500",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    <!--salaryrange-->

    $('button.awrfun').on('click', function (event) {
        event.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        val = $(this).attr('value');
        $myvalue = $(this);
        /*status = $(this).attr('status');*/

        if (($(this).hasClass("btn-primary"))) {

        }
        else if (($(this).attr('user')) == 'true' && ($(this).attr('aconf')) == '0') {
            $('#verification-error').modal('show');
        }
        else {
            $.ajax({
                type: "GET",
                url: "/doctor/apply/" + val,
                data: {value: val},
                success: function (data) {
                    $count = parseInt($("#xyz").children().children().children('span.jobli2').html()) + 1;
                    ($("#xyz").children().children().children('span.jobli2').html($count));
                    toastr.success('Applied!!');
                    $myvalue.children(".btnname").html('Applied');
                    $myvalue.toggleClass('btn-white');
                    $myvalue.toggleClass('btn-primary');
                    // console.log(data);
                },
                error: function () {
                    if (($(this).attr('user')) != 'true') {
                        $('input#status').attr('value', val);
                        $('input#btnname').attr('value', 'apply');
                        $('#login-form').modal('show');
                        toastr.warning('Please login');
                    }

                    else {
                        toastr.error('Some error!!');
                    }

                }
            }, "html");
        }
    });

    $('button.awrfun2').on('click', function (event) {
        event.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        val = $(this).attr('value');
        $myvalue = $(this);
        /*status = $(this).attr('status');*/
        if (($(this).hasClass("btn-success")) || ($(this).hasClass("btn-danger"))) {
            if (confirm("Are you sure?")) {
                $.ajax({
                    type: "GET",
                    url: "/doctor/removewish/" + val,
                    data: {value: val},
                    success: function (data) {
                        $count = parseInt($("#xyz").children().children().children('span.jobli3').html()) - 1;
                        ($("#xyz").children().children().children('span.jobli3').html($count));
                        toastr.warning('Removed!!');
                        $myvalue.children(".btnname").html('Wishlist');
                        $myvalue.toggleClass('btn-success');
                        $myvalue.toggleClass('btn-white');
                        if ($myvalue.hasClass("btn-danger")) {
                            $myvalue.parent().parent().parent().remove();
                        }
                        // console.log(data);
                    }
                }, "html");
            }
            return false;
        }
        else if (($(this).attr('user')) == 'true' && ($(this).attr('aconf')) == '0') {
            $('#verification-error').modal('show');
        }
        else {
            $.ajax({
                type: "GET",
                url: "/doctor/wish/" + val,
                data: {value: val},
                success: function (data) {
                    $count = parseInt($("#xyz").children().children().children('span.jobli3').html()) + 1;
                    ($("#xyz").children().children().children('span.jobli3').html($count));
                    toastr.success('Wished!!');
                    $myvalue.children(".btnname").html('Wished');
                    $myvalue.toggleClass('btn-white');
                    $myvalue.toggleClass('btn-success');
                    // console.log(data);
                },
                error: function () {
                    if (($(this).attr('user')) != 'true') {
                        $('input#status').attr('value', val);
                        $('input#btnname').attr('value', 'wish');
                        $('#login-form').modal('show');
                        toastr.warning('Please login');
                    }
                    else {
                        toastr.error('Some error!!');
                    }

                }
            }, "html");
        }
    });
    hideAllTabs();
    $('.nav-tabs').find('li').removeClass('active');

    var baseUrl = (window.location).href; // You can also use document.URL
    var koopId = baseUrl.substring(baseUrl.lastIndexOf('#'));
    if (koopId.startsWith('#')) {
        if (koopId == '#personal' || koopId == '#compliance' || koopId == '#direct_engagement')
            $('.profileinfo').show();
        else if (koopId == '#events')
            callForEvents();
        $('a[href="' + koopId + '"]').parent('li').addClass('active');
        $(koopId).show();
        if (koopId == '#personal') {
            $('#contact-histories-in-personal').show();
        }
        else {
            $('#contact-histories-in-personal').hide();
        }
    }
    else {
        $('.profileinfo').show();
        $('a[href="#personal"]').parent('li').addClass('active');
        $('div#personal').show();
        $('#contact-histories-in-personal').show();
    }

    function hideAllTabs() {
        $('.profileinfo').hide();
        $('#personal').hide();
        $('#compliance').hide();
        $('#compliance-audit').hide();
        $('#events').hide();
        $('#contact-history').hide();
        $('#direct_engagement').hide();
        $('#work_histories').hide();
        $('#references1').hide();
        $('#contact-histories-in-personal').hide();
    }

    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        var target = $(e.target).attr("href"); // activated tab
        hideAllTabs();
        if (target == '#personal' || target == '#compliance' || target == '#direct_engagement')
            $('.profileinfo').show();
        $(target).show();
        if (target == "#events") {
            callForEvents()
        }
        if (target == '#personal') {
            $('#contact-histories-in-personal').show();
        }
        else {
            $('#contact-histories-in-personal').hide();
        }
    });
    function callForEvents() {
        var e = document.location.toString();
        if (e.match('/candidates/profile')) {
            //Event Calendar
            $(document).ready(
                function () {
                    var zone = "05:30";

                    var currentMousePos = {
                        x: -1,
                        y: -1
                    };
                    jQuery(document).on("mousemove", function (event) {
                        currentMousePos.x = event.pageX;
                        currentMousePos.y = event.pageY;
                    });

                    /* initialize the external events
                     -----------------------------------------------------------------*/

                    $('#external-events .fc-event').each(function () {

                        // store data so the calendar knows to render an event upon drop
                        $(this).data('event', {
                            title: $.trim($(this).text()), // use the element's text as the event title
                            did: $(this).attr('did'),
                            stick: true // maintain when user navigates (see docs on the renderEvent method)
                        });
                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 999,
                            revert: true,      // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });
                    });

                    function fetchevent() {
                        var e = document.location.toString();
                        if (e.match('/candidates/profile')) {
                            var docid = ($('.tabs-container').attr('docid'));
                            $.ajax({
                                    url: '/event',
                                    type: 'get',
                                    data: 'type=fetch&docid=' + docid,
                                    async: false,
                                    success: function (s) {
                                        json_events = s;
                                    }
                                }
                            );
                            return json_events;
                        }
                    }

                    //fullcalendar
                    var calendar = $('#calendar').fullCalendar({
                        utc: true,
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        nextDayThreshold: "00:00:00",
                        editable: true,
                        droppable: true,
                        draggable: true,
                        slot_duration: 30,
                        viewRender: function (view, element, event) {
                            //The title isn't rendered until after this callback, so we need to use a timeout.
                            window.setTimeout(function () {
                                $("#calendar").find('.fc-toolbar > div > h2').empty().append(
                                    "<div> <h3>" + view.start.format('YYYY MMM Do [-] ') + view.end.format('MMM Do') + "</h3></div>"
                                );
                            }, 0);
                        },

                        events: JSON.parse(fetchevent()),
                        eventRender: function (event, element) {
                            element.find(".fc-time").html("<i class='fa fa-calendar' aria-hidden='true'></i>  ");
                            if (event.title == 'Booked') {
                                var new_description =
                                        moment(event.start).format("HH:mm") + '-'
                                        + moment(event.end).format("HH:mm") + '<br/>'
                                /*+ '<strong>Grade: </strong><br/>' + event.grade + '<br/>'
                                 + '<strong>Speciality: </strong><br/>' + event.speciality + '<br/>'*/
                                /*+ '<strong>References: </strong>' + event.references + '<br/>'*/
                                    ;
                            }

                            element.append(new_description);
                            if (event.status == 'Completed') {
                                element.css('background-color', '#1ab394');
                                element.css('border-color', '#1ab394');
                            }
                            else if (event.status == 'Cancelled') {
                                element.css('background-color', '#ED5565');
                                element.css('border-color', '#ED5565');
                            }
                            else if (event.status == 'Timesheet Approved') {
                                element.css('background-color', '#777777');
                                element.css('border-color', '#777777');
                            }
                            else {
                                if (event.title == 'Booked') {
                                    element.css('background-color', '#ED5565');
                                    element.css('border-color', '#ED5565');
                                }
                                else if (event.title == 'Not Available') {
                                    element.css('background-color', '#f8ac59');
                                    element.css('border-color', '#f8ac59');
                                }
                            }

                            element.bind('dblclick', function () {
                                $("#dialog").dialog("destroy");
                                var con = confirm('Are you sure to delete this event permanently?');
                                if (con == true) {
                                    $.ajax({
                                        url: '/event',
                                        data: 'type=remove&eventid=' + event.id,
                                        type: 'get',
                                        success: function (response) {
                                            // console.log(response);
                                            if ((JSON.parse(response)).status == 'success') {
                                                getFreshEvents();
                                            }
                                        },
                                        error: function (e) {
                                            alert('Error processing your request: ' + e.responseText);
                                        }
                                    });
                                }
                            });

                        },
                        eventReceive: function (event) {
                            $("#starttime").show();
                            $("#st").show();
                            $("#et").show();
                            $("#endtime").show();
                            var tips = $(".validateTips");
                            var dialog, form,
                                ftitle = $("#availability"),
                                fhospital = $("#hosbooked"),
                                fstart = $("#starttime"),
                                fend = $("#endtime"),
                                fpayrate = $("#pay_rate"),
                                fchargerate = $("#charge_rate"),
                                freference = $("#refrences"),
                                fcreatedby = $("#created_by"),
                                fcommission = $("#comission"),
                                fgrade = $("#grade"),
                                fspeciality = $("#speciality"),
                                fnotes = $("#notes"),
                                fstatus = $('#status'),
                                fbooked_by = $('#booked_by'),
                                fupdatedby = $('#updated_by');
                            fhospital.html('');
                            dialog = $("#dialog").dialog({
                                _allowInteraction: function (event) {
                                    return !!$(event.target).is(".select2-input") || this._super(event);
                                },
                                height: 550,
                                width: 450,
                                buttons: {
                                    "Add Event": addEvent,
                                    Cancel: function () {
                                        dialog.dialog("destroy");
                                        form[0].reset();
                                        getFreshEvents();
                                        fstart.removeClass("ui-state-error");
                                        fend.removeClass("ui-state-error");
                                        $(".validateTips").text('');
                                    }
                                },
                                close: function () {
                                    form[0].reset();
                                    dialog.dialog("destroy");
                                    getFreshEvents();
                                    fstart.removeClass("ui-state-error");
                                    fend.removeClass("ui-state-error");
                                    $(".validateTips").text('');
                                }
                            });
                            fstart.val(event.start.format("YYYY-MM-DD "));

                            form = dialog.find("form").on("submit", function (event) {
                                event.preventDefault();
                                addEvent();
                            });
                            function addEvent() {
                                if (ftitle.val() == 'Booked') {
                                    if (fstart.val() === '' || fend.val() === '') {
                                        tips
                                            .text('Please enter Start time and End time')
                                            .addClass("ui-state-highlight");
                                        setTimeout(function () {
                                            tips.removeClass("ui-state-highlight", 1500);
                                        }, 500);

                                        fstart.addClass("ui-state-error");
                                        fend.addClass("ui-state-error");
                                    }
                                    else {
                                        addmain();
                                    }

                                }
                                else if (ftitle.val() == ' ') {
                                    tips
                                        .text('Please select availability')
                                        .addClass("ui-state-highlight");
                                    setTimeout(function () {
                                        tips.removeClass("ui-state-highlight", 1500);
                                    }, 500);

                                    ftitle.addClass("ui-state-error");
                                }
                                else {
                                    addmain();
                                }
                                function addmain() {
                                    fstart.removeClass("ui-state-error");
                                    fend.removeClass("ui-state-error");
                                    var title = ftitle.val();
                                    var hospital = fhospital.val();
                                    var start = fstart.val();//event.start.format("YYYY-MM-DD[T]HH:MM:SS");
                                    var end = fend.val();
                                    var pay_rate = fpayrate.val();
                                    var charge_rate = fchargerate.val();
                                    var commission = fcommission.val();
                                    var grade = fgrade.val();
                                    var speciality = fspeciality.val();
                                    var reference = freference.val();
                                    var notes = fnotes.val();
                                    var created = fcreatedby.val();
                                    var did = event.did;
                                    var status = fstatus.val();
                                    var booked_by = fbooked_by.val();
                                    var updated = fupdatedby.val();
                                    $.ajax({
                                        url: '/event',
                                        data: 'type=new&title=' + title + '&did=' + did + '&startdate=' + start + '&zone=' + zone + '&hospital=' + hospital + '&enddate=' + end + '&pay_rate=' + pay_rate + '&charge_rate=' + charge_rate + '&commission=' + commission + '&reference=' + reference + '&notes=' + notes + '&created=' + created + '&status=' + status + '&grade=' + grade + '&speciality=' + speciality + '&updated=' + updated + '&booked_by=' + booked_by,
                                        type: 'get',
                                        success: function (response) {

                                            dialog.dialog("destroy");
                                            event.id = ((JSON.parse(response)).eventid);
                                            $('#calendar').fullCalendar('updateEvent', event);
                                            getFreshEvents();
                                        },
                                        error: function (e) {
                                            // console.log('Failed');
                                        }
                                    });
                                    $('#calendar').fullCalendar('refetchEvents');
                                }

                            }
                        },
                        eventDrop: function (event, delta, revertFunc) {
                            if ($('#drop-remove').is(':checked') || $('#drop-remove2').is(':checked')) {
                                var title = event.title;
                                var start = event.start.format();
                                var end = (event.end == null) ? start : event.end.format();
                                var hospital = event.hospital;
                                var pay_rate = event.pay_rate;
                                var charge_rate = event.charge_rate;
                                var commission = event.comission;
                                var grade = event.grade;
                                var speciality = event.speciality;
                                var reference = event.references;
                                var did = event.doctor_id;
                                var created = event.created_by;
                                var notes = event.notes;
                                var status = event.status;
                                var booked_by = event.booked_by;
                                var updated = $('#updated_by').val();
                                $.ajax({
                                    url: '/event',
                                    data: 'type=new&title=' + title + '&did=' + did + '&startdate=' + start + '&zone=' + zone + '&hospital=' + hospital + '&enddate=' + end + '&pay_rate=' + pay_rate + '&charge_rate=' + charge_rate + '&commission=' + commission + '&reference=' + reference + '&notes=' + notes + '&created=' + created + '&status=' + status + '&grade=' + grade + '&speciality=' + speciality + '&updated=' + updated + '&booked_by=' + booked_by,
                                    type: 'get',
                                    success: function (response) {
                                        event.id = ((JSON.parse(response)).eventid);
                                        $('#calendar').fullCalendar('updateEvent', event);
                                        getFreshEvents();
                                    },
                                    error: function (e) {
                                        // console.log('Failed');
                                    }
                                });
                            }
                            else {
                                var title = event.title;
                                var start = event.start.format();
                                var end = (event.end == null) ? start : event.end.format();
                                $.ajax({
                                    url: '/event',
                                    data: 'type=resetdate&title=' + title + '&startdate=' + start + '&enddate=' + end + '&eventid=' + event.id,
                                    type: 'get',
                                    success: function (response) {
                                        if ((JSON.parse(response)).status != 'success')
                                            revertFunc();
                                    },
                                    error: function (e) {
                                        revertFunc();
                                        alert('Error processing your request: ' + e.responseText);
                                    }
                                });
                            }

                        },
                        eventClick: function (event, jsEvent, view) {
                            var
                                ftitle = $("#availability"),
                                fhospital = $("#hosbooked"),
                                fstart = $("#starttime"),
                                fend = $("#endtime"),
                                fpayrate = $("#pay_rate"),
                                fchargerate = $("#charge_rate"),
                                freference = $("#refrences"),
                                fcreatedby = $("#created_by"),
                                fcommission = $("#comission"),
                                fgrade = $("#grade"),
                                fspeciality = $("#speciality"),
                                fnotes = $("#notes"),
                                fstatus = $('#status'),
                                fbooked_by = $('#booked_by'),
                                fupdatedby = $('#updated_by');
                            var dt = event.start;
                            var datetime = new Date(dt);
                            fcreatedby.val(event.created_by);
                            ftitle.val(event.title);
                            // fhospital.val(event.hospital);
                            fhospital.append('<option selected="selected" value="' + event.hospital + '">' + event.hospitalname + '</option>');
                            fstart.val(moment(event.start).format("YYYY-MM-DD HH:mm"));
                            fend.val(moment(event.end).format("YYYY-MM-DD HH:mm"));
                            fpayrate.val(event.pay_rate);
                            fchargerate.val(event.charge_rate);
                            freference.val(event.references);
                            fcommission.val(event.comission);
                            fgrade.val($('#grades-of-the-doctor').html());
                            fspeciality.val($('#specialities-of-the-doctor').html());
                            // fgrade.val(event.grade);
                            // fspeciality.val(event.speciality);
                            fnotes.val(event.notes);
                            fstatus.val(event.status);
                            fbooked_by.val(event.booked_by);
                            fupdatedby.val(event.updated_by);
                            fhospital.trigger('chosen:updated');
                            fstatus.trigger('chosen:updated');
                            fbooked_by.trigger('chosen:updated');
                            var form,
                                dialog = $("#dialog").dialog({
                                    height: 550,
                                    width: 450,

                                    buttons: {
                                        "Update Event": updateEvent,
                                        Cancel: function () {
                                            $("#form").trigger("reset");
                                            dialog.dialog("destroy");
                                            fstart.removeClass("ui-state-error");
                                            fend.removeClass("ui-state-error");
                                            $(".validateTips").text('');
                                        }
                                    },
                                    close: function () {
                                        $("#form").trigger("reset");
                                        dialog.dialog("destroy");
                                        fstart.removeClass("ui-state-error");
                                        fend.removeClass("ui-state-error");
                                        $(".validateTips").text('');
                                    }
                                });

                            function updateEvent() {
                                if (ftitle.val() == 'Booked') {
                                    if (fstart.val() === '' || fend.val() === '') {
                                        tips
                                            .text('Please enter Start time and End time')
                                            .addClass("ui-state-highlight");
                                        setTimeout(function () {
                                            tips.removeClass("ui-state-highlight", 1500);
                                        }, 500);

                                        fstart.addClass("ui-state-error");
                                        fend.addClass("ui-state-error");
                                    }
                                    else {
                                        updatemain();
                                    }

                                }
                                else if (ftitle.val() == ' ') {
                                    tips
                                        .text('Please select availability')
                                        .addClass("ui-state-highlight");
                                    setTimeout(function () {
                                        tips.removeClass("ui-state-highlight", 1500);
                                    }, 500);

                                    ftitle.addClass("ui-state-error");
                                }
                                else {
                                    updatemain();
                                }
                                function updatemain() {
                                    fstart.removeClass("ui-state-error");
                                    fend.removeClass("ui-state-error");
                                    var title = ftitle.val();
                                    var hospital = fhospital.val();
                                    var start = fstart.val();//event.start.format("YYYY-MM-DD[T]HH:MM:SS");
                                    var end = fend.val();
                                    var pay_rate = fpayrate.val();
                                    var charge_rate = fchargerate.val();
                                    var commission = fcommission.val();
                                    var reference = freference.val();
                                    var notes = fnotes.val();
                                    var created = fcreatedby.val();
                                    var did = event.did;
                                    var status = fstatus.val();
                                    var booked_by = fbooked_by.val();
                                    // console.log('type=changetitle&title=' + title + '&eventid=' + event.id);
                                    $.ajax({
                                        url: '/event',
                                        data: 'type=changetitle&title=' + title + '&startdate=' + start + '&zone=' + zone + '&hospital=' + hospital + '&enddate=' + end + '&pay_rate=' + pay_rate + '&charge_rate=' + charge_rate + '&commission=' + commission + '&reference=' + reference + '&notes=' + notes + '&created=' + created + '&status=' + status + '&eventid=' + event.id + '&grade=' + grade + '&speciality=' + speciality + '&booked_by=' + booked_by,

                                        type: 'get',
                                        success: function (response) {
                                            dialog.dialog("destroy");
                                            if (response.status == 'success')
                                                calendar.fullCalendar('updateEvent', event);
                                            getFreshEvents();

                                        },
                                        error: function (e) {
                                            alert('Error processing your request: ' + e.responseText);
                                        }
                                    });
                                }
                            }
                        },
                        eventResize: function (event, delta, revertFunc) {
                            alert(event.title + " ends " + event.end.format());
                            if (!confirm("is this okay?")) {
                                revertFunc();
                            }
                            var title = event.title;
                            var start = event.start.format();
                            var end = (event.end == null) ? start : event.end.format();
                            $.ajax({
                                url: '/event',
                                data: 'type=resetdate&title=' + title + '&startdate=' + start + '&enddate=' + end + '&eventid=' + event.id,
                                type: 'get',
                                success: function (response) {
                                    if ((JSON.parse(response)).status != 'success')
                                        revertFunc();
                                },
                                error: function (e) {
                                    revertFunc();
                                    alert('Error processing your request: ' + e.responseText);
                                }
                            });
                        },
                        eventDragStop: function (event, jsEvent, ui, view) {
                            if (isElemOverDiv()) {
                                var con = confirm('Are you sure to delete this event permanently?');
                                if (con == true) {
                                    $.ajax({
                                        url: '/event',
                                        data: 'type=remove&eventid=' + event.id,
                                        type: 'get',
                                        success: function (response) {
                                            // console.log(response);
                                            if ((JSON.parse(response)).status == 'success') {
                                                getFreshEvents();
                                            }
                                        },
                                        error: function (e) {
                                            alert('Error processing your request: ' + e.responseText);
                                        }
                                    });
                                }
                            }
                        },
                    });

                    function getFreshEvents() {
                        calendar.fullCalendar('removeEvents');
                        var docid = ($('.tabid2').attr('docid'));
                        $.ajax({
                            url: '/event',
                            type: 'get',
                            data: 'type=fetch&docid=' + docid,
                            async: false,
                            success: function (s) {
                                freshevents = s;
                            }
                        });
                        $('#calendar').fullCalendar('addEventSource', JSON.parse(freshevents));
                    }

                    function isElemOverDiv() {
                        var trashEl = jQuery('#trash');
                        var trashEl2 = jQuery('#trash2');
                        var ofs = trashEl.offset();
                        var ofs2 = trashEl2.offset();
                        var x1 = ofs.left;
                        var x2 = ofs.left + trashEl.outerWidth(true);
                        var y1 = ofs.top;
                        var y2 = ofs.top + trashEl.outerHeight(true);
                        var x21 = ofs2.left;
                        var x22 = ofs2.left + trashEl2.outerWidth(true);
                        var y21 = ofs2.top;
                        var y22 = ofs2.top + trashEl2.outerHeight(true);

                        if ((currentMousePos.x >= x1 && currentMousePos.x <= x2 &&
                            currentMousePos.y >= y1 && currentMousePos.y <= y2) || (currentMousePos.x >= x21 && currentMousePos.x <= x22 &&
                            currentMousePos.y >= y21 && currentMousePos.y <= y22)) {
                            return true;
                        }
                        return false;
                    }
                });
            //End of Event Calendar
        }
    }

//$(document).ready(function() {
//    $('#myDemoTable').fixedHeaderTable({
//        altClass : 'odd',
//        footer : true,
//        fixedColumns : 2,
//    });
//});


    $(document).ready(function () {
        $('#myDemoTable').DataTable({
            scrollY: "500px",
            scrollX: true,
            scrollCollapse: true,
            bSort: false,
            paging: false,
            fixedColumns: {
                leftColumns: 2
            }
        });
    });

    $(function () {
        var rows = $('tr.referencetr');
        rows.on('click', function (e) {
            var row = $(this);
            rows.removeClass('highlight');
            row.addClass('highlight');
            $temp = row.attr('id');
            $('#merge_reference').attr('href', '/reference/merge/' + $temp);
        });
    });
    $(function () {
        var rows = $('tr.work-historytr');
        rows.on('click', function (e) {
            var row = $(this);
            rows.removeClass('highlight');
            row.addClass('highlight');
            $temp = row.attr('id');
            $temp = $temp.split("-")[1];
            $('#merge_work_history').attr('href', $temp);
        });
    });
    $.validator.setDefaults({ignore: ":hidden:not(select)"})

    $('#referencemodalform').validate({
        rules: {chosen: "required"},
        message: {chosen: "Select an Option"}
    });
    $('#work-history-form').validate({
        rules: {chosen: "required"},
        message: {chosen: "Select an Option"}
    });

    $('#edit_reference').on('click', function () {
        var id = $('tr.highlight').attr('id');
        if (id != null) {
            $("#myModalLabel").html("Update");
            var from_date = $('tr.highlight td#from_date').html();
            var to_date = $('tr.highlight td#to_date').html();
            var hospital_name = $('tr.highlight td#hospital_name').html();
            var grade = $('tr.highlight td#grade').html();
            var speciality = $('tr.highlight td#speciality').html();
            var skills = $('tr.highlight td#skills').html();
            var type_of_position = $('tr.highlight td#type_of_position').attr('val');
            var add_to_send_out_cv = $('tr.highlight td#add_to_send_out_cv').html();
            var why_not = $('tr.highlight td#why_not_cv').html();
            var consultant_name = $('tr.highlight td#consultant_name').html();
            var consultant_position = $('tr.highlight td#consultant_position').html();
            var use_as_reference = $('tr.highlight td#use_as_reference').html();
            var date_requested = $('tr.highlight td#date_requested').html();
            var date_received = $('tr.highlight td#date_received').html();
            var doctor_name = $('tr.highlight td#doctor_name').attr('val');
            var position_applied = $('tr.highlight td#position_applied').html();
            var hospital_id = $('tr.highlight td#hospital_name').attr('val');
            var grade_id = $('tr.highlight td#grade').attr('val');
            var speciality_id = $('tr.highlight td#speciality').attr('val');
            var contact_person = $('tr.highlight td#contact_person').html();
            var secretary_email = $('tr.highlight td#secretary_email').html();
            var consultant_email = $('tr.highlight td#consultant_email').html();
            var notes = $('tr.highlight td#notes').html();
            $('input#from_date').val(from_date);
            $('input#to_date').val(to_date);
            $('select#hospital_name').append('<option selected="selected" value="' + hospital_id + '">' + hospital_name + '</option>');
            $('select#grade').val(grade).trigger("chosen:updated");
            $('select#speciality').val(speciality).trigger("chosen:updated");
            $('textarea#skills').val(skills);
            $('select#type_of_position').val(type_of_position);
            if (add_to_send_out_cv == 'Yes') {
                $("#add_yes").prop("checked", true);
                $('.why_not').slideUp();
                $("input[name='why_not']").val('');
            }
            else if (add_to_send_out_cv == 'No') {
                $('.why_not').slideDown();
                $("#add_no").prop("checked", true);
                $("input[name='why_not']").val(why_not);
            }
            else {
                $("#add_yes").prop("checked", false);
                $("#add_no").prop("checked", false);
                $('.why_not').slideUp();
                $("input[name='why_not']").val('');
            }
            $('input#consultant_name').val(consultant_name);
            $('input#consultant_position').val(consultant_position);
            if (use_as_reference == 'Yes') {
                $('input#use_as_reference').prop("checked", true);
                $('#reference-portion').slideDown();
            }
            else {
                $('input#use_as_reference').prop("checked", false);
                $('#reference-portion').slideUp();
            }

            $('.manually-added-hospital').slideUp();
            $('.manually-added-grade').slideUp();
            $('.manually-added-speciality').slideUp();
            $('input[name="other_hospital"]').val('');
            $('input[name="other_grade"]').val('');
            $('input[name="other_speciality"]').val('');
            if (hospital_id == '') {
                $('.manually-added-hospital').slideDown();
                $('input[name="other_hospital"]').val(hospital_name);
            }
            if (grade_id == '') {
                $('.manually-added-grade').slideDown();
                $('input[name="other_grade"]').val(grade);
            }
            if (speciality_id == '') {
                $('.manually-added-speciality').slideDown();
                $('input[name="other_speciality"]').val(speciality);
            }

            $('input#date_requested').val(date_requested);
            $('input#date_received').val(date_received);
            $('select#doctor_name').val(doctor_name).trigger("chosen:updated");
            $('input#position_applied').val(position_applied);
            $('input#contact_person').val(contact_person);
            $('input#secretary_email').val(secretary_email);
            $('input#consultant_email').val(consultant_email);
            $('textarea#notes').val(notes);

            $('input#updateid').val($('tr.highlight').attr('id'));
            $('#sublabel').attr("value", "Update");
            $("#new-reference").modal('show');
            $('#add_new_reference').slideDown();
        }
        else {
            errormsg();
        }
    });
    $('#delete_reference').on('click', function () {
        var id = $('tr.highlight').attr('id');
        if (id != null) {
            $(this).append(" <i class=\"fa fa-spinner fa-spin fa-fw\"></i>");
            if (confirm("Are you sure?")) {
                $.ajax({
                    type: "GET",
                    url: "/reference/delete/",
                    data: {id: id},
                    success: function (data) {
                        $('tr.highlight').hide();
                    }
                }, "html");

            }
            $(this).html('<i class="fa fa-times" aria-hidden="true"></i> &nbsp;&nbsp;Delete');
        }
        else {
            errormsg();
        }
    });



    $('#merge_reference').on('click', function (e) {
        var href = $(this).attr('href');
        if (href == ' ') {
            errormsg();
            return false;
        }
    });


    $('#new_reference').on('click', function () {
        $('input#from_date').val("");
        $('input#to_date').val("");
        $('select#hospital_name').append('<option selected="selected" value=""></option>');
        $('select#grade').val("0").trigger("chosen:updated");
        $('select#speciality').val("0").trigger("chosen:updated");
        $('textarea#skills').val("");
        $('select#type_of_position').val("");
        $("#add_yes").prop("checked", false);
        $("#add_no").prop("checked", false);
        $("input[name='why_not']").removeAttr('required').val('');
        $('.why_not').slideUp();
        $('input#consultant_name').val("");
        $('input#consultant_position').val("");
        $('input#use_as_reference').prop("checked", false);
        $('#reference-portion').slideUp();
        $('input#date_requested').val("");
        $('input#date_received').val("");
        $('select#doctor_name').val("0").trigger("chosen:updated");
        $('input#position_applied').val("");
        $('input#contact_person').val("");
        $('input#secretary_email').val("");
        $('input#consultant_email').val("");
        $('textarea#notes').val("");
        $("#myModalLabel").html("Add New");
        $('#sublabel').attr("value", "Save");
        $("#new-reference").modal('show');
        $('#add_new_reference').slideUp();
        $('.manually-added-hospital').slideUp();
        $('.manually-added-grade').slideUp();
        $('.manually-added-speciality').slideUp();
        $('input[name="other_hospital"]').val('');
        $('input[name="other_grade"]').val('');
        $('input[name="other_speciality"]').val('');
    });

    $("#contact-history-form").validate({
        rules: {
            document: {
                extension: "doc|docx|pdf"
            },
            upload_email: {
                extension: "doc|docx|pdf"
            }
        }
    });


    (function () {
        var msg = $('.contact-history-message').html();
        if (msg == 1) {
            $('#personal').hide();
            $('#compliance').hide();
            $('#compliance-audit').hide();
            $('#events').hide();
            $('#direct_engagement').hide();
            $('#work_histories').hide();
            $('#references1').hide();
            $('.profileinfo').hide();
            $('#contact-histories-in-personal').hide();
            $('.nav-tabs').find('li').removeClass('active');
            $('.cc-history').addClass('active');
            $('#contact-history').show();
        }
    })();
    (function () {
        var msg = $('.work-history-message').html();
        if (msg == 1) {
            $('#personal').hide();
            $('#compliance').hide();
            $('#compliance-audit').hide();
            $('#events').hide();
            $('#direct_engagement').hide();
            $('#contact-history').hide();
            $('#references1').hide();
            $('.profileinfo').hide();
            $('#contact-histories-in-personal').hide();
            $('.nav-tabs').find('li').removeClass('active');
            $('.wk-history').addClass('active');
            $('#work_histories').show();
        }
    })();

    $('#contact-history-form #type').change(function (e) {
        $('input[name="other_type"]').val("");
        if ($(this).val() == 21)
            $('#contact-history-form .other-type-wrapper').slideDown();
        else
            $('#contact-history-form .other-type-wrapper').slideUp();
    });
    $('.edit-contact-history').on('click', function () {
        $(".modal-title").html("Update Contact History");
        var _token = $('input[name="_token"]').val();
        var c_id = $(this).attr('data-id');
        $.ajax({
            beforeSend: function () {
                $('.this-is-form').slideUp();
                $('#loader').slideDown();
            },
            type: 'post',
            url: '/doctor-contact-history/fetch-contact-history',
            data: {
                id: c_id,
                _token: _token
            },

            success: function (response) {
                var data = $.parseJSON(response);
                var media = [];
                if (data.media != null) {
                    media = $.map(data.media.split(','), function (value) {
                        return parseInt(value, 10);
                    });
                }
                var branch = [];
                if (data.branch != null) {
                    branch = $.map(data.branch.split(','), function (value) {
                        return parseInt(value, 10);
                    });
                }
                var user = [];
                if (data.user != null) {
                    user = $.map(data.user.split(','), function (value) {
                        return parseInt(value, 10);
                    });
                }
                $('select[name="type"]').val(data.type);
                if (data.type == 21) {
                    $('#contact-history-form .other-type-wrapper').slideDown();
                    $('input[name="other_type"]').val(data.other_type);
                }
                else {
                    $('#contact-history-form .other-type-wrapper').slideUp();
                    $('input[name="other_type"]').val("");
                }
                $('select[name="in_out"]').val(data.in_out);
                $('select[name="media[]"]').val(media).trigger("chosen:updated");
                $('select[name="branch[]"]').val(branch).trigger("chosen:updated");
                $('select[name="regarding"]').val(data.regarding);
                if (data.regarding === '0' || data.regarding === '2') {
                    $('.hospital-name-2').slideDown();
                    $('select[name="hospital_name"]').val(data.hospital_name).trigger("chosen:updated");
                }
                else {
                    $('.hospital-name-2').slideUp();
                    $('select[name="hospital_name"]').val("").trigger("chosen:updated");
                }
                $('select[name="user[]"]').val(user).trigger("chosen:updated");
                $('input[name="created_by_consultant"]').val(data.created_by_consultant);
                $('select[name="result"]').val(data.result);
                if (data.completed === '1') {
                    $('input[id="completed1"]').prop("checked", true);
                    $('.cancelled-event').slideUp();
                }
                else if (data.completed === '0') {
                    $('input[id="completed2"]').prop("checked", true);
                    $('.cancelled-event').slideDown();
                }
                else {
                    $('input[id="completed1"]').prop("checked", false);
                    $('input[id="completed2"]').prop("checked", false);
                    $('.cancelled-event').slideUp();
                }
                $('input[name="reason"]').val(data.reason);
                $('textarea[name="notes"]').html(data.notes);
                if (data.email_and_add_to_task_diaries_of != null)
                    $('select[name="email_and_add_to_task_diaries_of"]').val(data.email_and_add_to_task_diaries_of);
                $('input[name="start_date"]').val(data.start_date);
                $('input[name="start_time"]').val(data.start_time);
                $('input[name="end_date"]').val(data.end_date);
                $('input[name="end_time"]').val(data.end_time);
                if (data.document != null) {
                    $('.document-upload a').attr('href', '/uploads/doctors/contact_history/' + data.document);
                    $('.document-upload').slideDown();
                }
                if (data.upload_email != null) {
                    $('.email-upload a').attr('href', '/uploads/doctors/contact_history/' + data.upload_email);
                    $('.email-upload').slideDown();
                }
                $('.btn-create-contact-history').val('Update Contact History');
                $('form[id="contact-history-form"]').attr('action', '/doctor-contact-history/update-contact-history/' + c_id);
            },
            complete: function () {
                $('#loader').slideUp();
                $('.this-is-form').slideDown();
            }
        });
    });
    $('.create-contact-history').on('click', function () {
        $(".modal-title").html("Add New");
        $('select[name="type"]').val("");
        $('#contact-history-form #other_type').val("");
        $('#contact-history-form .other-type-wrapper').slideUp();
        $('select[name="in_out"]').val("");
        $('select[name="media[]"]').val("").trigger("chosen:updated");
        $('select[name="branch[]"]').val("").trigger("chosen:updated");
        $('select[name="regarding"]').val("");
        $('.hospital-name-2').slideUp();
        $('select[name="user[]"]').val("").trigger("chosen:updated");
        $('input[name="created_by_consultant"]').val($('.logged-in-user').html());
        $('select[name="result"]').val("");
        $('input[id="completed1"]').prop("checked", false);
        $('input[id="completed2"]').prop("checked", false);
        $('textarea[name="notes"]').html("");
        $('input[name="reason"]').val("");
        $('.cancelled-event').slideUp();
        $('select[name="email_and_add_to_task_diaries_of"]').val("Mine");
        $('.document-upload a').attr('href', '#');
        $('.document-upload').slideUp();
        $('.email-upload a').attr('href', '#');
        $('.email-upload').slideUp();
        $('input[name="start_date"]').val(moment().format('DD-MM-YYYY'));
        $('input[name="start_time"]').val(moment().format('HH:mm'));
        $('input[name="end_date"]').val("");
        $('input[name="end_time"]').val("");
        $('.btn-create-contact-history').val("Create Contact History");
        $('form[id="contact-history-form"]').attr('action', '/doctor-contact-history/contact-history');
    });

    $('.btn-view-contact-history').on('click', function () {
        var _token = $('input[name="_token"]').val();
        var c_id = $(this).attr('data-id');
        $.ajax({
            beforeSend: function () {
                $('.this-is-table').slideUp();
                $('#loader-show').slideDown();
            },
            type: 'post',
            url: '/doctor-contact-history/fetch-contact-history-view',
            data: {
                id: c_id,
                _token: _token
            },
            success: function (response) {
                var data = $.parseJSON(response);
                $('tr.hospital').html('');
                $('tr.reason').html('');
                $('td.document').html('N/A');
                $('td.upload_email').html('N/A');
                if (data.other_type != null)
                    $('td.type').html(data.type + ' (' + data.other_type + ')');
                else
                    $('td.type').html(data.type);
                $('td.in_out').html(data.in_out);
                $('td.media').html(data.media);
                $('td.branch').html(data.branch);
                $('td.regarding').html(data.regarding);
                if (data.regarding == 'Hospital' || data.regarding == 'Hospital Locum')
                    $('tr.hospital').html('<th>Hospital</th><td class="hospital-name">' + data.hospital_name + '</td>');
                $('td.consultant').html(data.user);
                $('td.created_by').html(data.created_by_consultant);
                $('td.result').html(data.result);
                if (data.reason != '')
                    $('tr.reason').html('<th>Reason</th><td class="reason-data">' + data.reason + '</td>');
                $('td.notes').html(data.notes);
                if (data.document != null)
                    $('td.document').html('<a target="_blank" href="/uploads/doctors/contact_history/' + data.document + '" class="btn btn-sm btn-primary"><i class="fa fa-search-plus"></i>&nbsp;&nbsp;View</a>');
                if (data.upload_email != null)
                    $('td.upload_email').html('<a target="_blank" href="/uploads/doctors/contact_history/' + data.upload_email + '" class="btn btn-sm btn-primary"><i class="fa fa-search-plus"></i>&nbsp;&nbsp;View</a>');
                $('td.email_and_add_to_task_diaries_of').html(data.email_and_add_to_task_diaries_of);
                $('td.start_date').html(data.start_date + ' - ' + data.start_time);
                $('td.end_date').html(data.end_date + ' - ' + data.end_time);
            },
            complete: function () {
                $('#loader-show').slideUp();
                $('.this-is-table').slideDown();
            }
        });
    });

    $('#contact-history-form input[name="completed"]').click(function () {
        if ($(this).val() == 0)
            $('.cancelled-event').slideDown();
        else
            $('.cancelled-event').slideUp();
    });

    /*initials profile pic*/
    (function ($) {
        $.fn.initial = function (options) {

            // Defining Colors
            var colors = ["#1abc9c", "#16a085", "#f1c40f", "#f39c12", "#2ecc71", "#27ae60", "#e67e22", "#d35400", "#3498db", "#2980b9", "#e74c3c", "#c0392b", "#9b59b6", "#8e44ad", "#bdc3c7", "#34495e", "#2c3e50", "#95a5a6", "#7f8c8d", "#ec87bf", "#d870ad", "#f69785", "#9ba37e", "#b49255", "#b49255", "#a94136"];

            return this.each(function () {

                var e = $(this);
                var settings = $.extend({
                    // Default settings
                    name: 'Name',
                    seed: 0,
                    charCount: 1,
                    textColor: '#ffffff',
                    height: 46,
                    width: 46,
                    fontSize: 20,
                    fontWeight: 400,
                    fontFamily: 'HelveticaNeue-Light,Helvetica Neue Light,Helvetica Neue,Helvetica, Arial,Lucida Grande, sans-serif',
                    radius: 100
                }, options);

                // overriding from data attributes
                settings = $.extend(settings, e.data());

                // making the text object
                var c = settings.name.substr(0, settings.charCount).toUpperCase();
                var cobj = $('<text text-anchor="middle"></text>').attr({
                    'y': '50%',
                    'x': '50%',
                    'dy': '0.35em',
                    'pointer-events': 'auto',
                    'fill': settings.textColor,
                    'font-family': settings.fontFamily
                }).html(c).css({
                    'font-weight': settings.fontWeight,
                    'font-size': settings.fontSize + 'px',
                });

                var colorIndex = Math.floor((c.charCodeAt(0) + settings.seed) % colors.length);

                var svg = $('<svg></svg>').attr({
                    'xmlns': 'http://www.w3.org/2000/svg',
                    'pointer-events': 'none',
                    'width': settings.width,
                    'height': settings.height
                }).css({
                    'background-color': colors[colorIndex],
                    'width': settings.width + 'px',
                    'height': settings.height + 'px',
                    'border-radius': settings.radius + 'px',
                    '-moz-border-radius': settings.radius + 'px'
                });

                svg.append(cobj);
                // svg.append(group);
                var svgHtml = window.btoa(unescape(encodeURIComponent($('<div>').append(svg.clone()).html())));

                e.attr("src", 'data:image/svg+xml;base64,' + svgHtml);

            })
        };

    }(jQuery));

    $('.initialprofile').initial();


    /* Contact Histories for Hospitals */

    (function () {
        var msg = $('.contact-history-message-hospital').html();
        if (msg == 1) {
            $('.nav-tabs a:eq(1)').tab('show')
        }
    })();

    $('.edit-contact-history-hospital').on('click', function () {
        $(".modal-title").html("Update Contact History");
        var _token = $('input[name="_token"]').val();
        var c_id = $(this).attr('data-id');
        $.ajax({
            beforeSend: function () {
                $('.this-is-form').slideUp();
                $('#loader').slideDown();
            },
            type: 'post',
            url: '/hospital-contact-history/fetch-contact-history',
            data: {
                id: c_id,
                _token: _token
            },

            success: function (response) {
                var data = $.parseJSON(response);
                var media = [];
                if (data.media != null) {
                    media = $.map(data.media.split(','), function (value) {
                        return parseInt(value, 10);
                    });
                }
                var branch = [];
                if (data.branch != null) {
                    branch = $.map(data.branch.split(','), function (value) {
                        return parseInt(value, 10);
                    });
                }
                var user = [];
                if (data.user != null) {
                    user = $.map(data.user.split(','), function (value) {
                        return parseInt(value, 10);
                    });
                }
                $('select[name="type"]').val(data.type);
                $('select[name="in_out"]').val(data.in_out);
                $('select[name="contacted_person"]').val(data.contacted_person);
                $('select[name="media[]"]').val(media).trigger("chosen:updated");
                $('select[name="branch[]"]').val(branch).trigger("chosen:updated");
                $('select[name="regarding"]').val(data.regarding);
                if (data.regarding === '0' || data.regarding === '2') {
                    $('.hospital-name-2').slideDown();
                    $('select[name="hospital_name"]').val(data.hospital_name).trigger("chosen:updated");
                }
                else {
                    $('.hospital-name-2').slideUp();
                    $('select[name="hospital_name"]').val("").trigger("chosen:updated");
                }
                $('select[name="user[]"]').val(user).trigger("chosen:updated");
                $('input[name="created_by_consultant"]').val(data.created_by_consultant);
                $('select[name="result"]').val(data.result);
                if (data.completed === '1') {
                    $('input[id="completed1"]').prop("checked", true);
                    $('.cancelled-event').slideUp();
                }
                else if (data.completed === '0') {
                    $('input[id="completed2"]').prop("checked", true);
                    $('.cancelled-event').slideDown();
                }
                else {
                    $('input[id="completed1"]').prop("checked", false);
                    $('input[id="completed2"]').prop("checked", false);
                    $('.cancelled-event').slideUp();
                }
                $('input[name="reason"]').val(data.reason);
                $('textarea[name="notes"]').html(data.notes);
                if (data.email_and_add_to_task_diaries_of != null)
                    $('select[name="email_and_add_to_task_diaries_of"]').val(data.email_and_add_to_task_diaries_of);
                $('input[name="start_date"]').val(data.start_date);
                $('input[name="start_time"]').val(data.start_time);
                $('input[name="end_date"]').val(data.end_date);
                $('input[name="end_time"]').val(data.end_time);
                if (data.document != null) {
                    $('.document-upload a').attr('href', '/uploads/hospitals/contact_history/' + data.document);
                    $('.document-upload').slideDown();
                }
                if (data.upload_email != null) {
                    $('.email-upload a').attr('href', '/uploads/hospitals/contact_history/' + data.upload_email);
                    $('.email-upload').slideDown();
                }
                $('.btn-create-contact-history-hospital').val('Update Contact History');
                $('form[id="hospital-contact-history-form"]').attr('action', '/hospital-contact-history/update-contact-history/' + c_id);
            },
            complete: function () {
                $('#loader').slideUp();
                $('.this-is-form').slideDown();
            }
        });
    });
    $('.create-contact-history-hospital').on('click', function () {
        $(".modal-title").html("Add New");
        $('select[name="type"]').val("");
        $('select[name="in_out"]').val("");
        $('select[name="media[]"]').val("").trigger("chosen:updated");
        $('select[name="branch[]"]').val("").trigger("chosen:updated");
        $('select[name="regarding"]').val("");
        $('.hospital-name-2').slideUp();
        $('select[name="user[]"]').val("").trigger("chosen:updated");
        $('input[name="created_by_consultant"]').val($('.logged-in-user').html());
        $('select[name="result"]').val("");
        $('select[name="contacted_person"]').val("");
        $('input[id="completed1"]').prop("checked", false);
        $('input[id="completed2"]').prop("checked", false);
        $('textarea[name="notes"]').html("");
        $('input[name="reason"]').val("");
        $('.cancelled-event').slideUp();
        $('select[name="email_and_add_to_task_diaries_of"]').val("Mine");
        $('.document-upload a').attr('href', '#');
        $('.document-upload').slideUp();
        $('.email-upload a').attr('href', '#');
        $('.email-upload').slideUp();
        $('input[name="start_date"]').val(moment().format('DD-MM-YYYY'));
        $('input[name="start_time"]').val(moment().format('HH:mm'));
        $('input[name="end_date"]').val("");
        $('input[name="end_time"]').val("");
        $('.btn-create-contact-history-hospital').val("Create Contact History");
        $('form[id="hospital-contact-history-form"]').attr('action', '/hospital-contact-history/contact-history');
    });

    $('.btn-view-contact-history-hospital').on('click', function () {
        var _token = $('input[name="_token"]').val();
        var c_id = $(this).attr('data-id');
        var hospital_id = $('input[name="hospital_id"]').val();
        $.ajax({
            beforeSend: function () {
                $('.this-is-table').slideUp();
                $('#loader-show').slideDown();
            },
            type: 'post',
            url: '/hospital-contact-history/fetch-contact-history-view',
            data: {
                id: c_id,
                hospital_id: hospital_id,
                _token: _token
            },
            success: function (response) {
                var data = $.parseJSON(response);
                $('tr.hospital').html('');
                $('tr.reason').html('');
                $('td.document').html('N/A');
                $('td.upload_email').html('N/A');
                $('td.type').html(data.type);
                $('td.in_out').html(data.in_out);
                $('td.media').html(data.media);
                $('td.branch').html(data.branch);
                $('td.regarding').html(data.regarding);
                if (data.regarding == 'Hospital' || data.regarding == 'Hospital Locum')
                    $('tr.hospital').html('<th>Hospital</th><td class="hospital-name">' + data.hospital_name + '</td>');
                $('td.consultant').html(data.user);
                $('td.created_by').html(data.created_by_consultant);
                $('td.result').html(data.result);
                if (data.reason != '')
                    $('tr.reason').html('<th>Reason</th><td class="reason-data">' + data.reason + '</td>');
                $('td.contacted_person').html(data.contacted_person);
                $('td.notes').html(data.notes);
                if (data.document != null)
                    $('td.document').html('<a target="_blank" href="/uploads/hospitals/contact_history/' + data.document + '" class="btn btn-sm btn-primary"><i class="fa fa-search-plus"></i>&nbsp;&nbsp;View</a>');
                if (data.upload_email != null)
                    $('td.upload_email').html('<a target="_blank" href="/uploads/hospitals/contact_history/' + data.upload_email + '" class="btn btn-sm btn-primary"><i class="fa fa-search-plus"></i>&nbsp;&nbsp;View</a>');
                $('td.email_and_add_to_task_diaries_of').html(data.email_and_add_to_task_diaries_of);
                $('td.start_date').html(data.start_date + ' - ' + data.start_time);
                $('td.end_date').html(data.end_date + ' - ' + data.end_time);
            },
            complete: function () {
                $('#loader-show').slideUp();
                $('.this-is-table').slideDown();
            }
        });
    });

    $('#hospital-contact-history-form input[name="completed"]').click(function () {
        if ($(this).val() == 0)
            $('.cancelled-event').slideDown();
        else
            $('.cancelled-event').slideUp();
    });

    /* Contact Histories for Hospitals */

    /* Additional Contacts for Hospitals */
    $('a.more_hoscon').on('click', function () {
        $('#more_contacts').modal('show');
        $('#s_t_mh_c').val(null);
        $('.first_name_m').val(' ');
        $('.last_name_m').val(' ');
        $('.position_m').val(' ');
        $('#s_c1_mh_c').val(null);
        $('.contact1_m').val(' ');
        $('#s_c2_mh_c').val(null);
        $('.contact2_m').val(' ');
        $('#s_c3_mh_c').val(null);
        $('.contact3_m').val(' ');
        $('button.submit_m').html('Add');


    });
    delhoscon();
    function delhoscon() {
        $('button#d_m_h_c').on('click', function (e) {
            e.preventDefault();
            $(this).html("<i class=\"fa fa-spinner fa-spin fa-fw\"></i><span class=\"sr-only\">Loading...</span>");
            var con = confirm('Are you sure you want to delete this?');
            var temp = $(this);
            if (con) {
                $id = $(this).attr('h_id');
                $.ajax({
                    type: "get",
                    url: '/hospitals/removehospcontact/' + $id,
                    //data: {'title':title},
                    //cache: false,
                    success: function (result) {
                        var x = temp.parent().parent();
                        $(x).hide();
                    }
                });
            }
            else {
                $(this).html("<i class=\"fa fa-times-circle\"></i>");
            }
            return false;

        });
    }

    updhoscon();
    function updhoscon() {

        $('button#v_m_h_c').on('click', function (e) {
            e.preventDefault();
            $(this).html("<i class=\"fa fa-spinner fa-spin fa-fw\"></i><span class=\"sr-only\">Loading...</span>");
            $id = $(this).attr('h_id');
            $.ajax({
                type: "get",
                url: '/hospitals/gethospcontact/' + $id,
                success: function (result) {
                    $('button#v_m_h_c').html("<i class=\"fa fa-eye\" aria-hidden=\"true\"></i>");
                    $('#more_contacts').modal('show');
                    $('#s_t_mh_c').val(result.title);
                    $('.first_name_m').val(result.first_name);
                    $('.last_name_m').val(result.last_name);
                    $('.position_m').val(result.position);
                    $('#s_c1_mh_c').val(result.contact1_type);
                    $('.contact1_m').val(result.contact1);
                    $('#s_c2_mh_c').val(result.contact2_type);
                    $('.contact2_m').val(result.contact2);
                    $('#s_c3_mh_c').val(result.contact3_type);
                    $('.contact3_m').val(result.contact3);
                    $('button.submit_m').html('Update');
                    $('.h_m_id').val(result.id);
                }
            });
            return false;
        });

    }

    $('button.submit_m').on('click', function () {
        if ($(this).html() == "Add") {
            var type = 'add';
        }
        else {
            var type = 'update';
            var h_m_id = $('.h_m_id').val();
        }
        var thisButton = $(this);
        $(this).append(" <i class=\"fa fa-spinner fa-spin fa-fw\"></i>");
        var hid = $('#form_m').attr('hid');
        var tit = $('#s_t_mh_c').val();
        var f_name = $('.first_name_m').val();
        var l_name = $('.last_name_m').val();
        var position = $('.position_m').val();
        var con1_type = $('#s_c1_mh_c').val();
        var con1 = $('.contact1_m').val();
        var con2_type = $('#s_c2_mh_c').val();
        var con2 = $('.contact2_m').val();
        var con3_type = $('#s_c3_mh_c').val();
        var con3 = $('.contact3_m').val()
        $.ajax({
            url: '/hospitals/morecontacts',
            data: 'type=' + type + '&first_name=' + f_name + '&last_name=' + l_name + '&position=' + position + '&contact1_type=' + con1_type + '&contact1=' + con1 + '&contact2_type=' + con2_type + '&contact2=' + con2 + '&contact3_type=' + con3_type + '&contact3=' + con3 + '&h_m_id=' + h_m_id + '&hospital_id=' + hid + '&title=' + tit,
            type: 'get',
            success: function (response) {
                var temp = JSON.parse(response);
                $(thisButton).html(type);
                $('#more_contacts').modal('hide');
                if (type == 'update') {
                    $('li.m_h_c_' + temp.data['id']).hide();
                }

                $('ul.l_m_h_c').append('<li class="list-group-item m_h_c_' + temp.data['id'] + '"> <span class="pull-right"> <button class="btn btn-sm btn-primary" id="v_m_h_c" h_id=' + temp.data['id'] + '><i class="fa fa-eye" aria-hidden="true"></i></button> <button class="btn btn-sm btn-danger" id="d_m_h_c" h_id=' + temp.data['id'] + '><i class="fa fa-times-circle"></i></button> </span>' + temp.data['a_t'] + ' ' + temp.data['first_name'] + ' ' + temp.data['last_name'] + '</li>');

                if (temp.allData == 1) {
                    $('.g_h_c').html('More Contacts');
                }
                delhoscon();
                updhoscon();
            },
            error: function (e) {
                // console.log('Failed');
            }
        });

        return false;
    });
    /* Additional Contacts for Hospitals */

    /* Additional Contacts for Doctors */
    $('a.more_doccon').on('click', function () {
        $('#more_contacts').modal('show');
        $('.con_num_d').val('');
        $('.email_d').val('');
        $('button.submit_d').html('Add');
    });

    delcondoc();
    function delcondoc() {
        $('button#d_m_d_c').on('click', function () {
            $(this).html("<i class=\"fa fa-spinner fa-spin fa-fw\"></i><span class=\"sr-only\">Loading...</span>");
            var con = confirm('Are you sure you want to delete this?');
            var temp = $(this);
            if (con) {
                $id = $(this).attr('d_id');
                $.ajax({
                    type: "get",
                    url: '/candidates/removedoccontact/' + $id,
                    //data: {'title':title},
                    //cache: false,
                    success: function (result) {
                        var x = temp.parent().parent();
                        $(x).hide();
                    }
                });
            }
            else {
                $(this).html("<i class=\"fa fa-times-circle\"></i>");
            }
            return false;

        });
        return true;
    }

    upddoccon();
    function upddoccon() {
        $('button#v_m_d_c').on('click', function () {
            $(this).html("<i class=\"fa fa-spinner fa-spin fa-fw\"></i><span class=\"sr-only\">Loading...</span>");
            $id = $(this).attr('d_id');
            $.ajax({
                type: "get",
                url: '/candidates/getdoccontact/' + $id,
                success: function (result) {
                    $('button#v_m_d_c').html("<i class=\"fa fa-eye\" aria-hidden=\"true\"></i>");
                    $('#more_contacts').modal('show');
                    $('.con_num_d').val(result.contact_num);
                    $('.email_d').val(result.email);
                    $('button.submit_d').html('Update');
                    $('.d_m_id').val(result.id);
                }
            });
            return false;
        });
        return true;
    }

    $('button.submit_d').on('click', function () {
        if ($(this).html() == "Add") {
            var type = 'add';
        }
        else {
            var type = 'update';
            var d_m_id = $('.d_m_id').val();
        }
        var thisButton = $(this);
        $(this).append(" <i class=\"fa fa-spinner fa-spin fa-fw\"></i>");
        var contact_num = $('.con_num_d').val();
        var email = $('.email_d').val();
        var did = $('#form_d').attr('did');
        $.ajax({
            url: '/candidates/morecontacts',
            data: 'type=' + type + '&contact_num=' + contact_num + '&email=' + email + '&did=' + did + '&d_m_id=' + d_m_id,
            type: 'get',
            success: function (response) {
                var temp = JSON.parse(response);
                $(thisButton).html(type);
                $('#more_contacts').modal('hide');
                if (type == 'update') {
                    $('li.m_d_c_' + temp.data['id']).hide();
                }
                if (temp.contact_num != '') {
                    var label = temp.data['contact_num'];
                }
                else {
                    var label = temp.data['email'];
                }
                $('ul.l_m_d_c').append('<li class="list-group-item m_d_c_' + temp.data['id'] + '"> <span class="pull-right"> <button class="btn btn-sm btn-primary" id="v_m_d_c" d_id=' + temp.data['id'] + '><i class="fa fa-eye" aria-hidden="true"></i></button> <button class="btn btn-sm btn-danger" id="d_m_d_c" d_id=' + temp.data['id'] + '><i class="fa fa-times-circle"></i></button> </span>' + label + '</li>');
                // console.log(temp.allData);
                if (temp.allData == 1) {
                    $('.g_l_c').html('More Contacts');
                }
                delcondoc();
                upddoccon();
            },
            error: function (e) {
                // console.log('Failed');
            }
        });

        return false;
    });

    /* Additional Contacts for Doctors */


    /* Additional Address for Doctors */
    $('a.more_doc_address').on('click', function () {
        $('#more_doc_address').modal('show');
        $('.address_line_1').val('');
        $('.address_line_2').val('');
        $('.town').val('');
        $('.city').val('');
        $('.country').val('');
        $('.postcode').val('');
        $('button.submit_a').html('Add');
    });

    deldocadd();
    function deldocadd() {
        $('button#d_m_d_a').on('click', function () {
            $(this).html("<i class=\"fa fa-spinner fa-spin fa-fw\"></i><span class=\"sr-only\">Loading...</span>");
            var con = confirm('Are you sure you want to delete this?');
            var temp = $(this);
            if (con) {
                $id = $(this).attr('a_id');
                $.ajax({
                    type: "get",
                    url: '/candidates/removedocaddress/' + $id,
                    //data: {'title':title},
                    //cache: false,
                    success: function (result) {
                        var x = temp.parent().parent();
                        $(x).hide();
                    }
                });
            }
            else {
                $(this).html("<i class=\"fa fa-times-circle\"></i>");
            }
            return false;

        });
        return true;
    }

    upddocadd();
    function upddocadd() {
        $('button#v_m_d_a').on('click', function () {
            $(this).html("<i class=\"fa fa-spinner fa-spin fa-fw\"></i><span class=\"sr-only\">Loading...</span>");
            $id = $(this).attr('a_id');
            $.ajax({
                type: "get",
                url: '/candidates/getdocaddress/' + $id,
                success: function (result) {
                    $('button#v_m_d_c').html("<i class=\"fa fa-eye\" aria-hidden=\"true\"></i>");
                    $('#more_doc_address').modal('show');
                    $('.address_line_1').val(result.address_line_1);
                    $('.address_line_2').val(result.address_line_2);
                    $('.town').val(result.town);
                    $('.city').val(result.city);
                    $('.country').val(result.country);
                    $('.postcode').val(result.postcode);
                    $('button.submit_a').html('Update');
                    $('.d_a_id').val(result.id);
                }
            });
            return false;
        });
        return true;
    }

    $('button.submit_a').on('click', function () {
        if ($(this).html() == "Add") {
            var type = 'add';
        }
        else {
            var type = 'update';
            var d_a_id = $('.d_a_id').val();
        }
        var thisButton = $(this);
        $(this).append(" <i class=\"fa fa-spinner fa-spin fa-fw\"></i>");
        var address_line_1 = $('.address_line_1').val();
        var address_line_2 = $('.address_line_2').val();
        var town = $('.town').val();
        var city = $('.city').val();
        var country = $('.country').val();
        var postcode = $('.postcode').val();
        var did = $('#form_a').attr('did');
        $.ajax({
            url: '/candidates/moreaddress',
            data: 'type=' + type + '&address_line_1=' + address_line_1 + '&address_line_2=' + address_line_2 + '&town=' + town + '&city=' + city + '&country=' + country + '&postcode=' + postcode + '&doctor_id=' + did + '&d_a_id=' + d_a_id,
            type: 'get',
            success: function (response) {
                var temp = JSON.parse(response);
                $(thisButton).html(type);
                $('#more_doc_address').modal('hide');
                if (type == 'update') {
                    $('li.m_d_a_' + temp.data['id']).hide();
                }
                if (temp.address_line_1 != '') {
                    var label = temp.data['address_line_1'];
                }
                else if (temp.address_line_2 != '') {
                    var label = temp.data['address_line_2'];
                }
                else if (temp.town != '') {
                    var label = temp.data['town'];
                }
                else if (temp.city != '') {
                    var label = temp.data['city'];
                }
                else if (temp.country != '') {
                    var label = temp.data['country'];
                }
                else {
                    var label = temp.data['postcode'];
                }
                $('ul.l_m_d_a').append('<li class="list-group-item m_d_a_' + temp.data['id'] + '"> <span class="pull-right"> <button class="btn btn-sm btn-primary" id="v_m_d_a" a_id=' + temp.data['id'] + '><i class="fa fa-eye" aria-hidden="true"></i></button> <button class="btn btn-sm btn-danger" id="d_m_d_a" a_id=' + temp.data['id'] + '><i class="fa fa-times-circle"></i></button> </span>' + label + '</li>');
                if (temp.allData == 1) {
                    $('.g_l_a').html('More Address');
                }
                deldocadd();
                upddocadd();
            },
            error: function (e) {
                // console.log('Failed');
            }
        });

        return false;
    });
    /* Additional Address for Doctors */

    /* GMC Check for Doctors */

    $('#gmc-check-button').on('click', function () {
        var id = $('.tabs-container.tabid2').attr('docid');
        var url = $('.url').html();
        $.ajax({
            beforeSend: function () {
                $('.gmc-check-status').html('');
                $('#loader-show').slideDown();
            },
            type: 'get',
            url: '/gmc/doctors/gmc-check/' + id,
            success: function (response) {
                $('#loader-show').slideUp();
                if (response != 0) {
                    var data = $.parseJSON(response);
                    $('.gmc-check-status').html('<p><strong>GMC Status: </strong>' + data[11] + '</p>');
                    $('#gmc .status').val(data[11]);
                }
                else {
                    $('.gmc-check-status').html('<p>Please check the GMC number of the doctor.</p>');
                }
                $('#gmc .date_of_check').val(moment().format("DD-MM-YYYY"));
                $('.gmc-view').attr('href', url + '/uploads/doctors/gmc/' + id + '.pdf');
            }
            // complete: function(){
            //     $('#gmc-check-button').html('GMC Ok');
            // }
        })
        ;
    });
    /* GMC Check for Doctors */

    $(function () {
        $(".datepicker4").datetimepicker({
            datepicker: true,
            format: 'Y-m-d H:i:s'
        });
    });

    /*show all list*/
    $('a.show_all_btn').on('click', function () {
        $(this).append(" <i class=\"fa fa-spinner fa-spin fa-fw\"></i>");
        var id = $(this).attr('data_id');
        var thisButton = $(this);
        var url_data = $(this).attr('url_data');
        if (url_data == 'doc_cont') {
            var url = '/candidates/contacts/' + id;
        }
        else if (url_data == 'doc_addr') {
            var url = '/candidates/addresses/' + id;
        }

        else if (url_data == 'hosp_cont') {
            var url = '/hospitals/contacts/' + id;
        }
        $.ajax({
            type: 'get',
            url: url,
            success: function (response) {
                $(thisButton).html('<i class="fa fa-eye" aria-hidden="true"></i>&nbsp;&nbsp;Show All');
                var all_data = JSON.parse(response);
                $('#show_all').modal('show');
                $('.s_title').html(all_data.title);
                for (i = 0; i < all_data.fields.length; i++) {
                    $('.s_tr').append('<th class="sorting">' + all_data.fields[i] + '</th>');
                }
                var count = 1;
                $('.s_tbody').html(' ');
                $.each(all_data.datas, function (index, value) {
                    $('.s_tbody').append('<tr><td>' + (count++) + '</td></tr>');
                });

                $('.s_tbody tr').each(function (index, value) {
                    for (i = 0; i < all_data.fields.length; i++) {
                        $(this).append('<td>' + all_data.datas[index][all_data.f_n[i]] + '</td>');
                    }
                });
            }
        });

        $('#show_all').on('hidden.bs.modal', function () {
            $('.s_tr').html('<th class="sorting">S.N.</th>');
            $('.s_tbody').html(' ');
        })
    });
    /*show all list*/

    /* GMC File Upload Dashboard */

    (function () {
        var bar = $('.progress-bar');
        var percent = $('.percent');
        var status = $('#status');

        $('#gmc-large-file-upload').ajaxForm({
            beforeSend: function () {
                status.empty();
                var percentVal = '0%';
                bar.width(percentVal);
                $('.progress').slideDown();
                percent.slideDown();
                percent.html(percentVal);
            },
            uploadProgress: function (event, position, total, percentComplete) {
                var percentVal = (parseInt(percentComplete) - 1).toString() + '%';
                bar.width(percentVal);
                percent.html(percentVal);
            },
            success: function () {
                var percentVal = '99%';
                bar.width(percentVal);
                percent.html(percentVal);
                $('.alert-danger').slideUp();
            },
            complete: function (xhr) {
                status.slideDown();
                status.html(xhr.responseText);
                percent.html('100%');
                status.addClass('alert');
            }
        });

    })();

    /* GMC File Upload Dashboard */

    /*vacancy*/


    loadform();
    function loadform(sts) {
        $(".general").load("/vacancy/loadform", function (responseTxt, statusTxt, xhr) {
            geturl();
            $(".js-data-example-ajax").select2({
                placeholder: 'Search for a client',
                allowClear: true,
                ajax: {
                    url: "/hospitals/ajax-hospitals",
                    dataType: 'json',
                    allowClear: true,
                    delay: 250,
                    data: function (params) {
                        return {
                            q: params.term || '',
                            page: params.page || 1
                        };
                    },
                    cache: true
                },
                minimumInputLength: 2
            });


            var config = {
                '.chosen-select': {},
                '.chosen-select-deselect': {allow_single_deselect: true},
                '.chosen-select-no-single': {disable_search_threshold: 10},
                '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
                '.chosen-select-width': {width: "50%"}
            }


            for (var selector in config) {
                jQuery(selector).chosen(config[selector]);
            }
            getactiveclass($('.g_f_b'));
            $('a#next_vacancy_form').on('click', function () {

                //changes for rate start
                var jobs_family = $('#locum_rate_for_jobs_family').val();
                var jobs_title = $('#locum_rate_for_jobs_title').val();
                // changes for rate end
                $('.v_error_msg').hide();

                checkvalidity($(this));
                $.ajax({
                    url: '/vacancy/checked-job-rate',
                    data: 'job_family=' + jobs_family + '&jobs_title=' + jobs_title,
                    type: 'get',
                    success: function (sms) {
                        console.log(sms);
                    }

                })
            });

            if (sts == 'warning') {
                warninglabel([$('input#vacancy_ref'), $('input#client'), $('input#contract'), $('select#grade')]);//*//
            }
            var session_id = $('input#session_id').val();
            if (session_id != '') {
                getdata(session_id, 'general');
            }
            if ($('input#mode').val() == 'readonly') {
                $('.v_b_edit').show();
                readonly('#v_general_form');
            }
            $('.v_b_edit').on('click', function () {
                addloader($(this));
                $('input#mode').val('edit');
                loadform();
            });
        });
    }

    function loadvacancydetailform() {
        $(".general").load("/vacancy/vacancydetailform", function (responseTxt, statusTxt, xhr) {
            getactiveclass($('.v_d_b'));
            $(function () {
                $(".datepicker").datepicker({
                    todayHighlight: true,
                    autoclose: true,
                    format: 'dd-mm-yyyy'

                });
            });

            $(function () {
                $(".datepicker2").datetimepicker({
                    datepicker: false,
                    format: 'H:i'
                });
            });
            $('a#next_vacancy').on('click', function () {
                $s = checksts('sts_vac_det');
                getactiveclass($('.k_q_b'));
                loadkeyquestionform();
            });
            var session_id = $('input#session_id').val();

            if (session_id != '' && ($('input#sts_vac_det').val()) != '') {
                getdata(session_id, 'vac_detail');
            }
            if ($('input#mode').val() == 'readonly') {
                $('.v_b_edit').show();
                readonly('#v_det_form');
            }

            $('a#back_vacancy').on('click', function () {
                $s = checksts('sts_vac_det');
                loadform();
            });
            $('.v_b_edit').on('click', function () {
                addloader($(this));
                $('input#mode').val('edit');
                geturl();
                loadvacancydetailform();
            });
        });
    }

    function loadkeyquestionform() {
        $(".general").load("/vacancy/keyquestionform", function (responseTxt, statusTxt, xhr) {
            removeloader($('.k_q_b'));
            getactiveclass($('.k_q_b'));
            $('a#next_vacancy').on('click', function () {
                loadvacancyapprovalform();
            });

            if ($('input#mode').val() == 'readonly') {
                $('.v_b_edit').show();
                readonly('#k_q_form');
            }

            $('a#back_vacancy').on('click', function () {
                loadvacancydetailform();
            });

            $('.v_b_edit').on('click', function () {
                addloader($(this));
                $('input#mode').val('edit');
                geturl();
                loadkeyquestionform();
            });
        });
    }

    function loadvacancyapprovalform() {
        $(".general").load("/vacancy/vacancyapprovalform", function (responseTxt, statusTxt, xhr) {
            getactiveclass($('.v_a_b'));

            var session_id = $('input#session_id').val();

            $('a#save_final').on('click', function () {
                addloader($(this));
                $s = checksts('sts_vac_appr');
            });


            if (session_id != '') {
                getdata(session_id, 'vac_approval');
            }
            if ($('input#mode').val() == 'readonly') {
                $('.v_b_edit').show();
                readonly('#v_app_form');
            }
            $('a#back_vacancy').on('click', function () {
                $s = checksts('sts_vac_appr');
                loadkeyquestionform();
            });

            $('.v_b_edit').on('click', function () {
                addloader($(this));
                $('input#mode').val('edit');
                geturl();
                loadvacancyapprovalform();
            });

        });
    }

    function geturl() {
        if ($('input#mode').val() == 'readonly') {
            window.history.pushState("object", "Title", "/vacancy/view");
        }
        else if ($('input#mode').val() == 'edit') {
            window.history.pushState("object", "Title", "/vacancy/edit");
        }
        else {
            window.history.pushState("object", "Title", "/vacancy/create");
        }
    }

    function checkvalidity(temp) {
        var vac_ref = $('input#vacancy_ref');
        var client = $('input#client');
        var contract = $('input#contract');
        var grade = $('select#grade');
        var jobs_family = $('select#locum_rate_for_jobs_family');
        var jobs_title = $('select#locum_rate_for_jobs_title');
        var session_id = $('input#session_id');
        var mode = $('input#mode');
        if (session_id.val() == '' && (vac_ref.val() == '' || client.val() == '' || contract.val() == '' || grade.val() == '' || jobs_title.val() == '' || jobs_family.val() == '')) {
            $('.v_error_msg').show();
            warninglabel([vac_ref, client, contract, grade, jobs_family, jobs_title]);
            removeloader(temp);
        }
        else if (session_id.val() == '' && (($('ul.sidem > li.active').attr('val')) == 'v_l_3')) {
            loadform('warning');
            $('.v_error_msg').show();
            removeloader(temp);
        }

        else if (session_id.val() != '' && (mode.val() != 'edit' || (($('ul.sidem > li.active').attr('val')) == 'v_l_3'))) {
            removeloader(temp);
            if (temp.attr('val') == 'v_l_2') {
                loadvacancydetailform();
                getactiveclass($('.v_d_b'));
            }
            else if (temp.attr('val') == 'v_l_4') {
                loadvacancyapprovalform();
                getactiveclass(temp);
            }
        }
        else {
            savegeneraldata();
            removeloader(temp);
            if (temp.attr('val') == 'v_l_2') {
                loadvacancydetailform();
            }
            else if (temp.attr('val') == 'v_l_4') {
                loadvacancyapprovalform();
                getactiveclass(temp);
            }
        }
    }

    function checksts(temp) {
        var status = $('#' + temp).val();
        if (temp == 'sts_vac_det') {
            if (status == '' || (status != '' && $('input#mode').val() == 'edit')) {
                savevacancydetail(temp);
                return 1;
            }
        }
        else if (temp == 'sts_vac_appr') {
            if (status == '' || (status != '' && $('input#mode').val() == 'edit')) {
                storevacapproval(temp);
                return 1;
            }
        }
        else
            return 0;
    }

    function readonly(temp) {
        window.history.pushState("object", "Title", "/vacancy/view");
        var $inputs = $(temp + ' :input');
        $inputs.each(function (index, value) {
            value.disabled = true;
        });
        $('.chosen-select').prop('disabled', true).trigger("chosen:updated");
    }

    function addloader(temp) {
        temp.append(" <i class=\"fa fa-refresh fa-spin fa-1x fa-fw\"></i>");
    }

    function removeloader(temp) {
        temp.children("i.fa-refresh").remove();
    }

    function warninglabel(temp) {
        $.each(temp, function (index, value) {
            value.parent().children('label').children("i.v_war").remove();
            value.parent().children('label').append(' <i class="fa fa-exclamation-triangle v_war" aria-hidden="true"></i>');
        });
    }

    function getactiveclass(temp) {
        $('ul.sidem > li.active').removeClass('active');
        temp.addClass('active');
    }

    function getdata(temp, title) {
        $.ajax({
            url: "/vacancy/getdata",
            data: {title: title, id: temp},
            type: 'GET',
            datatype: 'JSON',
            success: function (resp) {
                var data = JSON.parse(resp);
                if (data.val != null) {
                    $.each(data.val, function (index, value) {
                        if (index != 'upload_document') {
                            $('#' + index).val(value);
                        }
                        if (index == 'upload_document' && value != null) {
                            // console.log(index + value);
                            $('#' + index).parent().parent().append('<a href="/vacancy/download/' + value + '"><button class="btn btn-xs btn-success btn-rounded" type="button"><i class="fa fa-eye"></i> View</button></a>');
                        }
                    });
                }
                if (title == 'vac_approval' && data.val != null) {
                    if (data.val['appr_rejec'] == 'Reject') {
                        $('#inlineRadio2').prop("checked", true);
                    }
                }
                if (title == 'vac_detail' && data.val != null) {
                    if (data.val['security_clearance'] == 'Yes') {
                        $('#inlineRadio1').prop("checked", true);
                    }
                    else {
                        $('#inlineRadio2').prop("checked", true);
                    }
                }

                // make client selected on client select box
                $(".js-data-example-ajax").empty() //empty select
                    .append($("<option/>") //add option tag in select
                        .val(data.client_id) //set value for option to post it
                        .text(data.client_name)) //set a text for show in select
                    .val(data.client_id) //select option of select2
                    .trigger("change"); //apply to select2
            }
        });
    }

    function savegeneraldata() {
        var mode = $('input#mode');
        var vac_id = null;
        if (mode.val() == 'edit') {
            var title = 'update';
            vac_id = $('input#session_id').val();
        }
        else {
            var title = 'new';
        }
        var token;
        //var data = $('#v_general_form').serialize();
        var data = $('form#v_general_form')[0];
        var formData = new FormData(data);
        formData.append("title", title);
        formData.append("vac_id", vac_id);
        token = $('meta[name="_token"]').attr('content');
        $.ajax({
            url: "/vacancy/storegeneral",
            headers: {'X-CSRF-TOKEN': token},
            data: formData,
            type: 'POST',
            processData: false,  // tell jQuery not to process the data
            contentType: false,  // tell jQuery not to set contentType
            //datatype: 'JSON',
            success: function (resp) {
                var t = JSON.parse(resp);
                $('input#session_id').val(t.vacancyid);
            }
        });

    }

    function savevacancydetail(temp) {
        var mode = $('input#mode');
        var vac_det_id = null;
        if (mode.val() == 'edit') {
            var title = 'update';
            vac_det_id = $('input#sts_vac_det').val();
        }
        else {
            var title = 'new';
        }
        var token;
        var session_id = $('input#session_id').val();
        var data = $('#v_det_form').serializeArray();
        data.push({"name": "vacancy_id", "value": session_id});
        data.push({"name": "title", "value": title});
        data.push({"name": "vac_det_id", "value": vac_det_id});

        token = $('input[name=_token]').val();
        $.ajax({
            url: "/vacancy/storevacdetail",
            headers: {'X-CSRF-TOKEN': token},
            data: data,
            type: 'POST',
            datatype: 'JSON',
            success: function (resp) {
                var data = JSON.parse(resp);
                $('#' + temp).val(data.vacancyid);
            }
        });
    }

    function storevacapproval(temp) {
        var mode = $('input#mode');
        var vac_appr_id = null;
        if (mode.val() == 'edit') {
            var title = 'update';
            vac_appr_id = $('input#sts_vac_appr').val();
        }
        else {
            var title = 'new';
        }
        var session_id = $('input#session_id').val();
        var token;
        var data = $('#v_app_form').serializeArray();
        data.push({"name": "vacancy_id", "value": session_id});
        data.push({"name": "title", "value": title});
        data.push({"name": "vac_appr_id", "value": vac_appr_id});

        token = $('meta[name="_token"]').attr('content');
        $.ajax({
            url: "/vacancy/storevacapproval",
            headers: {'X-CSRF-TOKEN': token},
            data: data,
            type: 'POST',
            datatype: 'JSON',
            success: function (resp) {
                removeloader($('a#save_final'));
                var data = JSON.parse(resp);
                $('#' + temp).val(data.vacancyid);
            }
        });
    }

    $('.g_f_b').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadform();
        removeloader($(this));
    });

    $('.v_d_b').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        checkvalidity($(this));
    });

    $('.k_q_b').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadkeyquestionform();
    });

    $('.v_a_b').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        checkvalidity($(this));
    });

    $(".detail_info").mouseover(function () {
        $(this).children(".v_description").show();
        var temp = $(this);
        var v_id = $(this).attr('v_i');
        $.ajax({
            url: "/vacancy/getdetail",
            data: {id: v_id},
            type: 'GET',
            datatype: 'JSON',
            success: function (resp) {
                var data = JSON.parse(resp);
                $(temp).children(".v_description").html('<div class="v_td_desc"><div class="v_td_title">Details</div><div class="row v_td_l"><div class="col-md-4">Grade</div> <div class="col-md-8 v_td_data">' + data.vacancy['grade'] + '</div> </div><div class="row v_td_l"><div class="col-md-4">Speciality</div> <div class="col-md-8 v_td_data">' + data.vac_det['speciality'] + '</div> </div><div class="row v_td_l"><div class="col-md-4">Location</div> <div class="col-md-8 v_td_data">' + data.vac_det['location'] + '</div> </div><div class="row v_td_l"><div class="col-md-4">Start Tme</div> <div class="col-md-8 v_td_data">' + data.vac_det['start_time'] + '</div> </div><div class="row v_td_l"><div class="col-md-4">End Time</div> <div class="col-md-8 v_td_data">' + data.vac_det['end_time'] + '</div> </div><div class="row v_td_l"><div class="col-md-4 v_td_label">Notes -Special Requirements</div> <div class="col-md-8 v_td_data">' + data.vacancy['description'] + '</div> </div> </div>');
            }
        });
    }).mouseout(function () {
        $(this).children(".v_description").hide();
    });

    /*vacancy*/


    /* doctor and hospital alphabetical order, items per page */
    $('.doctor-alphabetical').click(function () {
        if ($(this).hasClass('ascending')) {
            window.location.href = "/candidates/search?alph=asc";
        }
        else
            window.location.href = "/candidates/search?alph=desc";
    });

    $('.hospital-alphabetical').click(function () {
        if ($(this).hasClass('ascending')) {
            window.location.href = "/hospitals/search?alph=asc";
        }
        else
            window.location.href = "/hospitals/search?alph=desc";
    });

    $('#items_per_page').change(function () {
        $('#search-form').submit();
        $('#reference-search-form').submit();
    });
    /* doctor and hospital alphabetical order, items per page */


    $(".js-data-example-ajax").select2({
        placeholder: 'Search for a hospital',
        allowClear: true,
        ajax: {
            url: "/hospitals/ajax-hospitals",
            dataType: 'json',
            allowClear: true,
            delay: 250,
            data: function (params) {
                return {
                    q: params.term || '',
                    page: params.page || 1
                };
            },
            cache: true
        },
        minimumInputLength: 2
    });

    $(".js-data-candidate-ajax").select2({
        placeholder: 'Search for a candidate',
        allowClear: true,
        ajax: {
            url: "/candidates/ajax-doctors",
            dataType: 'json',
            allowClear: true,
            delay: 250,
            data: function (params) {
                return {
                    q: params.term || '',
                    page: params.page || 1
                };
            },
            cache: true
        },
        minimumInputLength: 2
    });


    /* vacancy from Puran */
    $('.v_assignments').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadassignment();
        removeloader($(this));
    });

    function loadassignment() {
        $(".general").load("/vacancy/assignments", function (responseTxt, statusTxt, xhr) {
            removeloader($('.v_assignments'));
            getactiveclass($('.v_assignments'));
            $('a#next_vacancy').on('click', function () {
                loadtimesheets();
            });

            $('a#back_vacancy').on('click', function () {
                loadvacancyapprovalform();
            });
        });
    }


    $('.v_timesheets').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadtimesheets();
        removeloader($(this));
    });

    function loadtimesheets() {
        $(".general").load("/vacancy/timesheets-form", function (responseTxt, statusTxt, xhr) {
            removeloader($('.v_timesheets'));
            getactiveclass($('.v_timesheets'));
            $('a#next_vacancy').on('click', function () {
                loadSearchAndSelect();
            });

            $('a#back_vacancy').on('click', function () {
                loadassignment();
            });
        });
    }

    $('.v_search_and_select').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadSearchAndSelect();
        removeloader($(this));
    });

    function loadSearchAndSelect() {
        $(".general").load("/vacancy/search-and-select-form", function (responseTxt, statusTxt, xhr) {
            $(".datepicker").datepicker({
                todayHighlight: true,
                autoclose: true,
                format: 'dd-mm-yyyy'

            });

            $(".multiple-chosen").select2();

            removeloader($('.v_search_and_select'));
            getactiveclass($('.v_search_and_select'));
            $('a#next_vacancy').on('click', function () {
                loadShortlist();
            });

            $('a#back_vacancy').on('click', function () {
                loadtimesheets();
            });


            $('#candidate-search-for-vacancy').submit(function (e) {
                e.preventDefault();
                $(".load-results-here").load("/vacancy/search-candidates?first_name=" + $('#first_name').val() + "&available_date=" + $('#available_date').val() + "&grade=" + $('#grade').val() + "&last_name=" + $('#last_name').val() + "&start_time=" + $('#start_time').val() + "&end_time=" + $('#end_time').val(), function (responseTxt, statusTxt, xhr) {
                    // $(".load-results-here").load("/vacancy/search-candidates?first_name="+$('#first_name').val()+"&available_date="+$('#available_date').val()+"&grade="+$('#grade').val()+"&last_name="+$('#last_name').val()+"&start_time="+$('#start_time').val()+"&end_time="+$('#end_time').val()+"&status="+$('#status').val()+"&speciality="+$('#speciality').val(), function (responseTxt, statusTxt, xhr) {

                    var p = $(".doc-popover").popover({
                        html: true,
                        content: function () {
                            var doc_id = $(this).attr('val');
                            return $(".popover-content-" + doc_id).html();
                        },
                        title: function () {
                            var doc_id = $(this).attr('val');
                            return $(".popover-title-" + doc_id).html();
                        }
                    });
                    $('.i-checks').iCheck({
                        checkboxClass: 'icheckbox_square-green',
                        radioClass: 'iradio_square-green'
                    });
                    $('.select-doctors').click(function (e) {
                        var doc_id = $(this).attr('doctor');
                        var compl = $('#is-compliant-' + doc_id).attr('compliant');
                        compl = $.trim(compl);
                        if (compl == 'no') {
                            console.log("here");
                            swal("Oops...", "The doctor is not compliant.", "error");
                            // e.preventDefault();
                        }
                    });

                    $('#search-and-select-form').ajaxForm({
                        complete: function (xhr) {
                            if (xhr.responseText != '') {
                                loadShortlist();
                            }
                        }
                    });
                });
            });
        });
    }

    $('.v_shortlist').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadShortlist();
        removeloader($(this));
    });

    function loadShortlist() {
        $(".general").load("/vacancy/shortlist", function (responseTxt, statusTxt, xhr) {
            removeloader($('.v_shortlist'));
            getactiveclass($('.v_shortlist'));
            $('a#next_vacancy').on('click', function () {
                loadCreateRate();
            });

            $('a#back_vacancy').on('click', function () {
                loadSearchAndSelect();
            });

            var p = $(".doc-popover").popover({
                html: true,
                content: function () {
                    var doc_id = $(this).attr('val');
                    return $(".popover-content-" + doc_id).html();
                },
                title: function () {
                    var doc_id = $(this).attr('val');
                    return $(".popover-title-" + doc_id).html();
                }
            });

            $('#shortlist-form').ajaxForm({
                complete: function (xhr) {
                    if (xhr.responseText != '') {
                        loadCreateRate();
                    }
                }
            });
        });
    }


    $('.v_review_candidate').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadReviewCandidate();
        removeloader($(this));
    });

    function loadReviewCandidate() {
        $(".general").load("/vacancy/review-candidate", function (responseTxt, statusTxt, xhr) {
            removeloader($('.v_review_candidate'));
            getactiveclass($('.v_review_candidate'));
            $('a#next_vacancy').on('click', function () {
                loadCreateAssignment();
            });

            $('a#back_vacancy').on('click', function () {
                loadCreateRate();
            });

            var p = $(".doc-popover").popover({
                html: true,
                content: function () {
                    var doc_id = $(this).attr('val');
                    return $(".popover-content-" + doc_id).html();
                },
                title: function () {
                    var doc_id = $(this).attr('val');
                    return $(".popover-title-" + doc_id).html();
                }
            });
        });
    }

    $('.v_create_assignment').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadCreateAssignment();
        removeloader($(this));
    });

    function loadCreateAssignment() {
        $(".general").load("/vacancy/create-assignment", function (responseTxt, statusTxt, xhr) {
            removeloader($('.v_create_assignment'));
            getactiveclass($('.v_create_assignment'));
            $(".datepicker").datepicker({
                todayHighlight: true,
                autoclose: true,
                format: 'dd-mm-yyyy'
            });
            $(".timepicker").datetimepicker({
                datepicker: false,
                format: 'H:i'
            });
            $('a#next_vacancy').on('click', function () {
                loadHistory();
            });

            $('a#back_vacancy').on('click', function () {
                loadReviewCandidate();
            });

            $('#create-assignment-form').ajaxForm({
                complete: function (xhr) {
                    if (xhr.responseText != '') {
                        $('.assignment-create').slideUp();
                        $('.hidethis').slideDown();
                        $('#success-msg').html(xhr.responseText);
                    }
                }
            });
        });
    }

    /* vacancy from Puran */
// create rate from sahodar
    $('.v_create_rate').on('click', function () {
        addloader($(this));
        $('.v_error_msg').hide();
        loadCreateRate();
        removeloader($(this));
    });
    function loadCreateRate() {
        $(".general").load("/vacancy/create-rate", function (responseTxt, statusTxt, xhr) {
            removeloader($('.v_create_rate'));
            getactiveclass($('.v_create_rate'));
            $('a#next_vacancy').on('click', function () {
                loadReviewCandidate();
            });

            $('a#back_vacancy').on('click', function () {
                loadShortlist();
            });
            $('#create-rate-form').ajaxForm({
                complete: function (xhr) {
                    if (xhr.responseText != '') {
                        $('.rate-create').slideUp();
                        $('.hidethis').slideDown();
                        $('#success-msg').html(xhr.responseText);
                    }
                }
            });
        });

    }

// script for company house api (check company) start sahodar
    $('#company-house-check').click(function (e) {
        var number = $('#company_number_chd').val();
        var email = $('#email_address_chd').val();
        var doctor_id = $('#doctor_id').val();
        if (number == null || number == "") {
            alert("Company Number field must be filled out");
            return false;
        } else if (email == null || email == "") {
            alert("Email address field must be filled out");
            return false;
        } else {

            //$('#company_name_chd').val(number);
            // alert( number);
            $.ajax({
                url: '/company-check',
                data: 'number=' + number + '&doctor_id=' + doctor_id,
                type: 'get',
                success: function (response) {
                    // console.log(response);
                    var respon = response;
                    if (respon.status == 'success') {
                        $('#company_name_chd').val(respon.profile.company_name),
                            $('#company_status_chd').val(respon.profile.company_status),
                            $('#registered_office_address_chd').val(respon.profile.registered_office_address.address_line_1),
                            $('#address_line_2_chd').val(respon.profile.registered_office_address.address_line_2),
                            $('#town_chd').val(respon.profile.registered_office_address.locality),
                            $('#county_district_chd').val(respon.profile.registered_office_address.region),
                            $('#postcode_chd').val(respon.profile.registered_office_address.postal_code)
                    }
                },
                error: function (e) {
                    var respon = JSON.parse(response);
                    alert('Error processing your request: ' + e.responseText);
                }
            });
        }
    });
// script for company house api (check company) end

    $('.select-contact-f1').click(function (e) {
        e.preventDefault();
        var contact_id = $(this).data('id');
        var title = $('.detail-data-f1-' + contact_id + ' #title').html();
        var first_name = $('.detail-data-f1-' + contact_id + ' #first_name').html();
        var last_name = $('.detail-data-f1-' + contact_id + ' #last_name').html();
        var position = $('.detail-data-f1-' + contact_id + ' #position').html();
        $('.title_f1').val(title);
        $('.first_name_f1').val(first_name);
        $('.last_name_f1').val(last_name);
        $('.position_f1').val(position);
        $('#all-contacts-f1').modal('hide');
    });
    $('.select-contact-f2').click(function (e) {
        e.preventDefault();
        var contact_id = $(this).data('id');
        var title = $('.detail-data-f2-' + contact_id + ' #title').html();
        var first_name = $('.detail-data-f2-' + contact_id + ' #first_name').html();
        var last_name = $('.detail-data-f2-' + contact_id + ' #last_name').html();
        var position = $('.detail-data-f2-' + contact_id + ' #position').html();
        $('.title_f2').val(title);
        $('.first_name_f2').val(first_name);
        $('.last_name_f2').val(last_name);
        $('.position_f2').val(position);
        $('#all-contacts-f2').modal('hide');
    });
    $('.select-contact-inv').click(function (e) {
        e.preventDefault();
        var contact_id = $(this).data('id');
        var title = $('.detail-data-inv-' + contact_id + ' #title').html();
        var first_name = $('.detail-data-inv-' + contact_id + ' #first_name').html();
        var last_name = $('.detail-data-inv-' + contact_id + ' #last_name').html();
        var position = $('.detail-data-inv-' + contact_id + ' #position').html();
        $('.title_inv').val(title);
        $('.first_name_inv').val(first_name);
        $('.last_name_inv').val(last_name);
        $('.position_inv').val(position);
        $('#all-contacts-inv').modal('hide');
    });


    function openNav(vac_id) {
        document.getElementById("mySidenav").style.width = "65%";
        // document.getElementById("main").style.marginLeft = "65%";

        $.ajax({
            url: '/vacancy/candidates/' + vac_id,
            type: 'get',
            success: function (response) {
                $('#candidate').html(response);
            },
            error: function (e) {
                var respon = JSON.parse(response);
                alert('Error processing your request: ' + e.responseText);
            }
        });
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
    }

    $('input[name="use_as_reference"]').click(function () {
        if ($(this).is(':checked'))
            $('#reference-portion').slideDown();
        else
            $('#reference-portion').slideUp();
    });

    $('input[name="add_to_send_out_cv"]').click(function () {
        if ($(this).val() == 'no') {
            $('input[name="why_not"]').attr('required', 'true');
            $('.why_not').slideDown();

        }
        else {
            $('.why_not').slideUp();
            $('input[name="why_not"]').removeAttr('required').val('');
        }
    });

    $('.merge_doctor_complete').click(function (e) {
        e.preventDefault();
        $('#doctor-merge-modal').modal('show');
        var doc_id = $(this).attr('href');
        $('#doctor-merge-form #doctor_id').val(doc_id);
    });

    $('#doctor-merge-form select[name="agency"]').change(function (e) {
        $(".se-pre-con").show();
        $('#doctor-merge-modal').modal('hide');
        $('#doctor-merge-form').submit();
        var interval = setInterval(isDownload, 1000);
    });

    $('#manually-add-hospital').click(function (e) {
        e.preventDefault();
        $('.manually-added-hospital').slideDown();
    });
    $('#manually-add-grade').click(function (e) {
        e.preventDefault();
        $('.manually-added-grade').slideDown();
    });
    $('#manually-add-speciality').click(function (e) {
        e.preventDefault();
        $('.manually-added-speciality').slideDown();
    });
    function hideLoader() {
        $(".se-pre-con").fadeOut("slow");
    }


    function isDownload() {
        $.ajax({
            type: 'GET',
            url: '/candidates/started',
            data: $(this).serialize(),
            dataType: 'json',
            success: function (data) {
                console.log(data.download);
                if (data.download == 'yes') {
                    hideLoader();
                    // clearInterval(interval);
                }
            }
        });
    }


    $('.work-histories-table tbody').sortable({
        placeholder: "ui-state-highlight",

        'containment': 'parent',
        'revert': true,
        helper: function (e, tr) {
            var $originals = tr.children();
            var $helper = tr.clone();
            $helper.children().each(function (index) {
                $(this).width($originals.eq(index).width());
            });
            return $helper;
        },
        // cancel: ".serial",
        // items: "td:not(.serial)",
        'handle': 'td',
        update: function (event, ui) {
            $('table tr').each(function () {
                $(this).children('td:first-child').html($(this).index() + 1)
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.post('/work-history/reposition', $(this).sortable('serialize'), function (data) {
                if (!data.success) {
                    alert('Whoops, something went wrong :/');
                }
            }, 'json');
        }
    });

    $(window).resize(function () {
        $('.work-histories-table tr').css('min-width', $('.testing').width());
    });


});


function errormsg() {
    swal({
        title: "Row not Selected!",
        text: "Please Select any row!",
        type: "warning"
    });
}