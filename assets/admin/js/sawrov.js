$(document).ready(function () {


    /* Create CAT Validation */
    $("#cat_form").validate({
        rules: {
            doctor_id: "required"
        }
    });


    var wrapper = $('.wrapper');

    /*FOR FILE UPLOAD*/
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            //label = "Selected";
        input.trigger('fileselect', [numFiles, label]);
    });

    $(document).ready( function() {
        $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = numFiles > 1 ? numFiles + ' files selected' : label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
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

    $('.clockpicker').clockpicker();

    $('.input-daterange').datepicker({
        keyboardNavigation: false,
        forceParse: false,
        autoclose: true
    });

    var config = {
        '.chosen-select': {},
        '.chosen-select-deselect': {allow_single_deselect: true},
        '.chosen-select-no-single': {disable_search_threshold: 10},
        '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
        '.chosen-select-width': {width: "95%"}
    }
    for (var selector in config) {
        jQuery(selector).chosen(config[selector]);
    }


    tinymce.init({
        selector: 'textarea#details',
        theme: 'modern',
        menubar: false,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true,
        height: 200,
        skin: 'lightgray',
        browser_spellcheck: true
    });

    $("input[name='waiting_for_treatment']").change(function () {
        if ($(this).val() == 1)
            $('.further_details').slideDown();
        else {
            $('.further_details').slideUp();
            tinymce.activeEditor.setContent('');
        }
    });

    $("input[name='recent_contact_with_tb']").change(function () {
        if ($(this).val() == 1)
            $('.further_details_tb').slideDown();
        else {
            $('.further_details_tb').slideUp();
            $('.further_details_tb_area').val('');
        }
    });

    $("input[name='exposed_to_hiv_infection']").change(function () {
        if ($(this).val() == 1)
            $('.hiv_infection_details').slideDown();
        else {
            $('.hiv_infection_details').slideUp();
            tinymce.activeEditor.setContent('');
        }
    });
    $("input[name='convictions_cautions']").change(function () {
        if ($(this).val() == 1)
            $('.rehav_conv_details').slideDown();
        else {
            $('.rehav_conv_details').slideUp();
            $('.rehav_conv_details_area').val('');
        }
    });

    $("input[name='pay_detail']").change(function () {
        $('.list-box').slideUp();
        $('.list-box input').val('');
        if ($(this).val() == 'PAYE') {
            $('.paye-box').slideDown();
        }
        else if ($(this).val() == 'Umbrella') {
            $('.umbrella-box').slideDown();
        }
        else if ($(this).val() == 'Ltd') {
            $('.ltd_co-box').slideDown();
        }
        else {
            $('.self-box').slideDown();
        }
    });
    $(".file-upload").change(function () {
        if ($(this).val() != null) {
             //var filename = $(this).val().replace(/^.*\\/, "");
            filename = "Selected";
            $(this).prev().html(filename);

        }

    });

    //FOR ACCORDIAN EFFECT

    $(document).ready(function() {
        function close_accordion_section() {
            $('.accordion .accordion-section-title').removeClass('active');
            $('.accordion .accordion-section-content').slideUp(150).removeClass('open');
            $('.fa-gear').removeClass('fa-spin');
            $('.collapse1').slideUp();
            $('.expand').slideDown();
        }



        $('.expand').click(function(e){
                e.preventDefault();


                $('.accordion-section a').addClass('active');
                $('.accordion-section .accordion-section-content').addClass('open').css('display', 'block');
                $('.expand').slideToggle();
                $('.collapse1').slideToggle();





        });
        $('.collapse1').click(function(e){
            e.preventDefault();


            $('.accordion-section a').removeClass('active');
            $('.accordion-section .accordion-section-content').removeClass('open').css('display', 'none');
            $('.expand').slideToggle();
            $('.collapse1').slideToggle();





        });




        $('.accordion-section-title').click(function(e) {
            // Grab current anchor value
            var currentAttrValue = $(this).attr('href');

            if($(e.target).is('.active')) {
                close_accordion_section();
            }else {
                close_accordion_section();

                // Add active class to section title
                $(this).addClass('active');
                $(this).find('.fa-gear').addClass('fa-spin');




                // Open up the hidden content panel
                $('.accordion ' + currentAttrValue).slideDown(100).addClass('open');
            }

            e.preventDefault();
        });
    });

    $("input[name='fitness_to_practise']").click(function(e){

         var tempcheck = $(this).val();


         if(tempcheck == 1)
         {
             $('.toggle_class').slideDown(100);

         }
         else{
             $('.toggle_class').slideUp(100);


         }


    });
    $("input[name='international_medical_council_registration']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.toggle_class2').slideDown(100);

        }
        else{
            $('.toggle_class2').slideUp(100);


        }


    });

    $("input[name='license_to_practise']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.toggle_class3').slideDown(100);

        }
        else{
            $('.toggle_class3').slideUp(100);


        }


    });


    //automatic expiry date for cv

    $('.add-cv').on('change',"input[name='cv_date[]']",function(e){

        var rd = $(this).val();
        rd = rd.split("-");
        rd = rd[1]+'/'+rd[0]+'/'+rd[2];
        var testdate = new Date(rd);


        testdate.setMonth(testdate.getMonth()+3);
        var y = testdate.getFullYear();
        var m = testdate.getMonth();
        var d = testdate.getDate().toString();
        m++;
        if(d<10)
        {
            d = "0"+d;
        }
        if(m<10)
        {
            m = "0"+m;
        }
        display  = d+"-"+m+"-"+y;
        if(display === "NaN-NaN-NaN")
        {
            display = null;
        }
        $(this).parent().parent().siblings().find("input[name='cv_expiry_date[]']").val(display);

    });



    //automatic expiry date for reference

    $('.add-reference').on('change',"input[name='reference_date[]']",function(e){

        var rd = $(this).val();
        rd = rd.split("-");
        rd = rd[1]+'/'+rd[0]+'/'+rd[2];
        var testdate = new Date(rd);
        testdate.setYear(testdate.getFullYear()+1);
        var y = testdate.getFullYear();
        var m = testdate.getMonth();
        var d = testdate.getDate().toString();
        m++;
        if(d<10)
        {
            d = "0"+d;
        }
        if(m<10)
        {
            m = "0"+m;
        }
        display  = d+"-"+m+"-"+y;

        if(display === "NaN-NaN-NaN")
        {
            display = null;
        }
        $(this).parent().parent().siblings().find("input[name='reference_expiry_date[]']").val(display);


    });


    //add and remove for cv
    var cv_i=1;
    if($('.cv_count').html()!=0){

        cv_i=$('.cv_count').html();


    }
    var inc = cv_i;

    $(wrapper).on("click", ".add_more_cv", function (e){
        var i= cv_i;
        e.preventDefault();
        var inc=1;

        if(inc<50)
        {
            $('.more-cv').find('.parent_cv').find('input').attr('name', 'cv_certificate[' + inc + ']');
            $('.more-cv').find('.parent_certificate_upload').find('input').attr('name', 'cv_certificate_doc[]');

        }
        inc++;


        var htt = $('.more-cv').html();
            $('.add-cv').append(htt);
            $('.datepicker').datepicker({
                keyboardNavigation: false,
                forceParse: false,
                autoclose: true,
                format: 'dd-mm-yyyy'
            })
        var str = 'chosen-select'+i;

        var config = {
            str: {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "95%"}
        }
        for (var selector in config) {
            jQuery(selector).chosen(config[selector]);
        }

        $(".file-upload").change(function () {
            if ($(this).val() != null) {
                //var filename = $(this).val().replace(/^.*\\/, "");
                filename = "Selected";
                $(this).prev().html(filename);

            }

        });



    });

    $(wrapper).on("click", ".remove_cv", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
    });


    //add and remove for reference
    var index_number = 3;
    if($('.ref_count').html() > 3){

        index_number=$('.ref_count').html();

    }

    $(wrapper).on("click", ".add_more_references", function (e){
        e.preventDefault();
        var print = parseInt(index_number) + 1;
        var make_index = print-1;

        $('.more-references').find('.parent_reference').find('input').attr('name', 'ref_certificate[' + make_index + ']');
        $('.more-references').find('.parent_reference_upload').find('input').attr('name', 'ref_certificate_docs[]');


        $('.more-references').find('.name_more').html('Additional Reference  '+ print);
        var htt = $('.more-references').html();
        $('.add-reference').append(htt);
        //$('.name_more:eq('+name_more_index+')').html('Reference '+index_number);
        index_number++;

        $('.datepicker').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: 'dd-mm-yyyy'
        });




    });
    $(wrapper).on("click", ".remove_reference", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        index_number--;
        //$('.name_more:eq('+name_more_index+')').html('Reference '+index_number);

    });


    var qualification_number = 1;
    if($('.qual_count').html() > 1){

        qualification_number=$('.qual_count').html();

    }
    $(wrapper).on("click", ".add_more_qualification", function (e){
        e.preventDefault();
        //console.log(i);
        //j++
        $('.more-qualifications').find('.name_qualification').html('Additional Qualification  '+ qualification_number);
        var htt = $('.more-qualifications').html();
        $('.add-qualification').append(htt);
        qualification_number++;

        $('.datepicker').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: 'dd-mm-yyyy'
        });

        $(document).on('change', '.btn-file :file', function() {
            var input = $(this),
                numFiles = input.get(0).files ? input.get(0).files.length : 1,
                label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            //label = "Selected";
            input.trigger('fileselect', [numFiles, label]);
        });

        $(document).ready( function() {
            $('.btn-file :file').on('fileselect', function(event, numFiles, label) {

                var input = $(this).parents('.input-group').find(':text'),
                    log = numFiles > 1 ? numFiles + ' files selected' : label;

                if( input.length ) {
                    input.val(log);
                } else {
                    if( log ) alert(log);
                }

            });
        });

        $(".file-upload").change(function () {
            if ($(this).val() != null) {
                //var filename = $(this).val().replace(/^.*\\/, "");
                filename = "Selected";
                $(this).prev().html(filename);

            }

        });

        //$('.other_qualifications:eq('+i+')').html('Qualification '+j);

        //i++;
    });

    $(wrapper).on("click", ".remove_qualification", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        qualification_number--;

        //j-=2;
    });

    //Add and remove identity
    var id = 1;
    if($('.identity_count').html() > 1){

        id=parseInt($('.identity_count').html());

    }
    $(wrapper).on("click", ".add_more_identity", function (e){
        e.preventDefault();
        if(id < 100)
        {
            //$('.more-identity').find('.parent_photo').find('input').attr('name', 'identity_photo[' + id + ']');
            $('.more-identity').find('.parent_ni').find('input').attr('name', 'ni_number_check[' + id + ']');
            $('.more-identity').find('.parent_doc').find('input').attr('name', 'ni_number_doc[' + id + ']');

            var htt = $('.more-identity').html();
            $('.identity').append(htt);
            id++;
        }

        $('.datepicker').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: 'dd-mm-yyyy'
        });
        //$('.other_qualifications:eq('+i+')').html('Qualification '+j);

        //i++;


    });

    $(wrapper).on("click", ".remove_identity", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        //j-=2;
    });



    //Toggle GMC Annual Certificate

    $("input[name='gmc_annual_certificate']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.toggle_gmc').slideDown(150);

        }
        else{
            $('.toggle_gmc').slideUp(150);


        }


    });

    //Expiry For Annual Certificate

    $('.gmc').on('change',"input[name='gmc_annual_certificate_date']",function(e){


        var rd = $(this).val();
        rd = rd.split("-");
        rd = rd[1]+'/'+rd[0]+'/'+rd[2];
        var testdate = new Date(rd);
        testdate.setYear(testdate.getFullYear()+1);
        var y = testdate.getFullYear();
        var m = testdate.getMonth();
        var d = testdate.getDate().toString();
        m++;
        if(d<10)
        {
            d = "0"+d;
        }
        if(m<10)
        {
            m = "0"+m;
        }
        display  = d+"-"+m+"-"+y;

        if(display === "NaN-NaN-NaN")
        {
            display = null;
        }
        $("input[name='gmc_annual_certificate_expiry_date']").val(display);


    });

    //Expiry for Fitness To Practise

    $('.add-occ-health').on('change',"input[name='fitness_to_practise_date']",function(e){


        var rd = $(this).val();
        rd = rd.split("-");
        rd = rd[1]+'/'+rd[0]+'/'+rd[2];
        var testdate = new Date(rd);
        testdate.setYear(testdate.getFullYear()+1);
        var y = testdate.getFullYear();
        var m = testdate.getMonth();
        var d = testdate.getDate().toString();
        m++;
        if(d<10)
        {
            d = "0"+d;
        }
        if(m<10)
        {
            m = "0"+m;
        }
        display  = d+"-"+m+"-"+y;

        if(display === "NaN-NaN-NaN")
        {
            display = null;
        }
        $("input[name='fitness_to_practise_expiry_date']").val(display);


    });

    //Auto Expiry for Photo

    $('.add-registration').on('change',"input[name='photo_date']",function(e){
    //$('.identity').on('change',"input[name='cv_date[]']",function(e){

        var rd = $(this).val();
        rd = rd.split("-");
        rd = rd[1]+'/'+rd[0]+'/'+rd[2];
        var testdate = new Date(rd);
        testdate.setYear(testdate.getFullYear()+2);
        var y = testdate.getFullYear();
        var m = testdate.getMonth();
        var d = testdate.getDate().toString();
        m++;
        if(d<10)
        {
            d = "0"+d;
        }
        if(m<10)
        {
            m = "0"+m;
        }
        display  = d+"-"+m+"-"+y;

        if(display === "NaN-NaN-NaN")
        {
            display = null;
        }
        $(this).parent().parent().siblings().find("input[name='photo_expiry_date']").val(display);



    });

    //Toggle for Identity

    $("input[name='registration_photo']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.photo_toggle').slideDown(150);

        }
        else{
            $('.photo_toggle').slideUp(150);


        }


    });
    // for(var i=0;i<100;i++)
    // {
    //     $('.identity').on('change',"input[name='ni_number_check["+i+"]']",function(e){
    //         var tempcheck = $(this).val();
    //
    //
    //         if(tempcheck == 1)
    //         {
    //             $(this).parent().parent().parent().parent().siblings('.ni_toggle').slideDown(0);
    //
    //         }
    //         else{
    //             $(this).parent().parent().parent().parent().siblings('.ni_toggle').slideUp(0);
    //
    //         }
    //
    //
    //     });
    //
    // }

    //visa toggle
    $("input[name='visa_required']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.visa').slideDown(0);

        }
        else{
            $('.visa').slideUp(0);


        }


    });
    //id badge toggle
    $("input[name='id_badge']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.id_badge').slideDown(0);

        }
        else{
            $('.id_badge').slideUp(0);


        }


    });

    //Fitness to practise toggle

    $("input[name='fitness_to_practise']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.fitness').slideDown(10);

        }
        else{
            $('.fitness').slideUp(10);

        }


    });
    //ni number toggle
    $("input[name='ni_number_check']").click(function(e){

        var tempcheck_ni = $(this).val();


        if(tempcheck_ni == 1)
        {
            $('.ni_toggle').slideDown(0);

        }
        else{
            $('.ni_toggle').slideUp(0);


        }


    });

    //specialist_ReFgistration toggle

    $("input[name='specialist_registration']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.specialist_registration').slideDown(0);

        }
        else{
            $('.specialist_registration').slideUp(0);

        }


    });


    $("input[name='gmc_login']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.login_display').slideDown(0);

        }
        else{
            $('.login_display').slideUp(0);

        }


    });

    //photo Id toggle

    for(var i=0;i<10;i++)
    {
        $('.identity').on('change',"input[name='identity_photo["+i+"]']",function(e){
            var tempcheck = $(this).val();


                if(tempcheck == 1)
                {
                    $(this).parent().parent().parent().parent().siblings('.photo_toggle').slideDown(0);

                }
                else{
                    $(this).parent().parent().parent().parent().siblings('.photo_toggle').slideUp(0);

                }


        });

    }

    //Toggle for Certificates
    $("input[name='certificates']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.certificate_toggle').slideDown(0);

        }
        else{
            $('.certificate_toggle').slideUp(0);

        }


    });




    $("input[name='mandatory_training']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.mandatory_training').slideDown(0);

        }
        else{
            $('.mandatory_training').slideUp(0);

        }


    });

    $("input[name='gmc_original_certificate']").click(function(e){

        var tempcheck = $(this).val();


        if(tempcheck == 1)
        {
            $('.gmc_original').slideDown(0);

        }
        else{
            $('.gmc_original').slideUp(0);

        }


    });

    $(wrapper).on("click", ".view_training_certificates", function (e) { //user click on remove text
        e.preventDefault()

        if($('.check_this').hasClass('fa fa-chevron-circle-down'))
        {
            $('.check_this').removeClass('fa-chevron-circle-down').addClass('fa-chevron-circle-up');
            $('.training-certificates').slideDown(150);

        }
        else{

            $('.check_this').removeClass('fa-chevron-circle-up').addClass('fa-chevron-circle-down');
            $('.training-certificates').slideUp(150);

        }



        //j-=2;
    });


    //trying to scroll to specific div

    //$('#thisisnewid').click(function(e){
    //    var pixel = $('#occupational_health').offset().top;
    //    console.log(pixel);
    //    $(window).scrollTop(pixel);
    //
    //});


    //For new additional work


    // cv


    for(var i=0;i<10;i++)
    {
        $('.add-cv').on('change',"input[name='cv_certificate["+i+"]']",function(e){
            var tempcheck = $(this).val();
            console.log("this is me");


            if(tempcheck == 1)
            {
                $(this).parent().parent().parent().parent().siblings('.cv_certificate_toggle').slideDown(0);

            }
            else{
                $(this).parent().parent().parent().parent().siblings('.cv_certificate_toggle').slideUp(0);

            }


        });


    }
    $("input[name='cv_certificate[0]']").click(function(e){

        var tempcheck = $(this).val();

        if(tempcheck == 1)
        {
            $('.cv_certificate_toggle1').slideDown(0);

        }
        else{
            $('.cv_certificate_toggle1').slideUp(0);

        }


    });


    // toggle for reference certificate
    //
    // $("input[name='ref_certificate[0]']").click(function(e){
    //
    //    var tempcheck = $(this).val();
    //
    //    if(tempcheck == 1)
    //    {
    //        $('.ref_certificate_toggle').slideDown(0);
    //
    //    }
    //    else{
    //        $('.ref_certificate_toggle').slideUp(0);
    //
    //    }
    //
    //
    // });

    for(var i=0;i<10;i++)
    {
        $('.add-reference').on('change',"input[name='ref_certificate["+i+"]']",function(e){
            var tempcheck = $(this).val();
            console.log("hey baby");
            if(tempcheck == 1)
            {
                $(this).parent().parent().parent().parent().siblings('.ref_certificate_toggle').slideDown(0);

            }
            else{
                $(this).parent().parent().parent().parent().siblings('.ref_certificate_toggle').slideUp(0);

            }


        });


    }

    //revalidation and appraisale toggle

    $("input[name='appraisal']").click(function(e){

        var tempcheck = $(this).val();

        if(tempcheck == 1)
        {
            $('.appraisal_toggle').slideDown(0);

        }
        else{
            $('.appraisal_toggle').slideUp(0);

        }


    });


    //valid passport check identity
    $("input[name='passport_check']").click(function(e){

        var tempcheck = $(this).val();

        if(tempcheck == 1)
        {
            $('.valid_passport_toggle').slideDown(0);

        }
        else{
            $('.valid_passport_toggle').slideUp(0);

        }


    });

    //occ document check toggle

    $("input[name='occ_document_check']").click(function(e){

        var tempcheck = $(this).val();

        if(tempcheck == 1)
        {
            $('.occ_toggle').slideDown(0);

        }
        else{
            $('.occ_toggle').slideUp(0);

        }


    });

    $("input[name='insurance_check']").click(function(e){

        var tempcheck = $(this).val();

        if(tempcheck == 1)
        {
            $('.insurance_toggle').slideDown(0);

        }
        else{
            $('.insurance_toggle').slideUp(0);

        }


    });

    //registration toggles

    $("input[name='staff_handbook_version']").click(function(e){

        var tempcheck = $(this).val();

        if(tempcheck == 1)
        {
            $('.handbook_toggle').slideDown(0);

        }
        else{
            $('.handbook_toggle').slideUp(0);

        }


    });
    $("input[name='equal_opportunity_form']").click(function(e){

        var tempcheck = $(this).val();

        if(tempcheck == 1)
        {
            $('.equal_opportunity_toggle').slideDown(0);

        }
        else{
            $('.equal_opportunity_toggle').slideUp(0);

        }


    });

    $("input[name='terms_and_condition_accept']").click(function(e){
        //console.log("test for  term and condition");
        var tempcheck = $(this).val();

        if(tempcheck == 1)
        {
            $('.terms_and_condition_toggle').slideDown(0);

        }
        else{
            $('.terms_and_condition_toggle').slideUp(0);

        }


    });

   // console.log($("input[name='terms_and_condition_accept_additional']").val());

    //var values = [];
    // $("#terms-and-condition-accept-additional").click(function(e) {
    //     var test = $(this).val();
    //     console.log("tetsd");
    // });





    // add and remove terms and conditions
    // var term_condition_count=1;
    // $(wrapper).on("click", ".add_more_terms_and_conditions", function (e){
    //     var htt = $('.more-terms-and-condition').html();
    //     $('.add-terms-and-conditions').append(htt);
    //
    //
    // })

    var index_number_term = 0;
    if($('.additional_term_and_condition_count').html() > 0){

        index_number_term=$('.additional_term_and_condition_count').html();
    //console.log(index_number_term);
    }

    $(wrapper).on("click", ".add_more_terms_and_conditions", function (e){
        console.log("test from additional");
        e.preventDefault();
        var print = parseInt(index_number_term) + 1;
        var make_index = print-1;

        $('.more-terms-and-condition').find('.parent_term_accept').find('input').attr('name', 'terms_and_condition_accept_additional[' + make_index + ']');
        $('.more-terms-and-condition').find('.parent_term_upload').find('input').attr('name', 'terms_and_condition_doc_additional[]');


        // $('.more-references').find('.name_more').html('Additional Reference  '+ print);
        var htt = $('.more-terms-and-condition').html();
        $('.add-terms-and-conditions').append(htt);
        //$('.name_more:eq('+name_more_index+')').html('Reference '+index_number);
        index_number_term++;
    });


    $(wrapper).on("click", ".remove_term_and_condition", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        index_number_term--;
        //j-=2;
    });

    //toggle for additional term and condition

    // $("input[name='terms_and_condition_accept_additional[0]']").click(function(e){
    //
    //     var tempcheck = $(this).val();
    //
    //     if(tempcheck == 1)
    //     {
    //         $('.terms_and_condition_additional_toggle').slideDown(0);
    //
    //     }
    //     else{
    //         $('.terms_and_condition_additional_toggle').slideUp(0);
    //
    //     }
    //
    //
    // });
    for(var i=0;i<10;i++)
    {
        $('.add-terms-and-conditions').on('change',"input[name='terms_and_condition_accept_additional["+i+"]']",function(e){
            var tempcheck = $(this).val();
            console.log("hey baby");
            if(tempcheck == 1)
            {
                $(this).parent().parent().parent().parent().siblings('.terms_and_condition_additional_toggle').slideDown(0);

            }
            else{
                $(this).parent().parent().parent().parent().siblings('.terms_and_condition_additional_toggle').slideUp(0);

            }


        });}


    // for cpr training and certificate
    var index_number_crp_training = 0;
    //if($('.additional_term_and_condition_count').html() > 0){

    //index_number_crp_training=$('.additional_term_and_condition_count').html();
    //console.log(index_number_crp_training);
    // }

    $(wrapper).on("click", ".add_more_cpr_trainings", function (e){
        e.preventDefault();
        var print = parseInt(index_number_crp_training) + 1;
        var make_cpr_index = print-1;
       // console.log(make_cpr_index);

           // $('.more-cpr-training').find('.parent_cpr_training_qualification').find('input').attr('name', 'cpr_training_qualification[' +make_cpr_index + ']');
            //$('.more-terms-and-condition').find('.parent_term_upload').find('input').attr('name', 'terms_and_condition_doc_additional[]');



        // $('.more-references').find('.name_more').html('Additional Reference  '+ print);
        var htt = $('.more-cpr-training').html();
        $('.add-cpr-training').append(htt);
        $('.datepicker').datepicker({
            keyboardNavigation: false,
            forceParse: false,
            autoclose: true,
            format: 'dd-mm-yyyy'
        })
        //$('.name_more:eq('+name_more_index+')').html('Reference '+index_number);
        index_number_crp_training++;
    });
    $(wrapper).on("click", ".remove_crp_training", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        index_number_crp_training--;
        //j-=2;
    });

// for disclosure bar in complaince tab ( member of ds pvg scheme)
    $("input[name='member_of_pvs_scheme']").click(function(e){

        var tempcheck1 = $(this).val();

        if(tempcheck1 == 1)
        {
            $('.member_of_pvs_scheme1').slideDown(0);
            $('.member_of_pvs_scheme2').slideDown(0);

        }
        else{
            $('.member_of_pvs_scheme1').slideUp(0);
            $('.member_of_pvs_scheme2').slideUp(0);


        }


    });

    // for disclosure bar in complaince tab ( member of dbs update)
    $("input[name='member_of_dbs_update']").click(function(e){

        var tempcheck2 = $(this).val();

        if(tempcheck2 == 1)
        {
            $('.member_of_dbs_update').slideDown(0);


        }
        else{
            $('.member_of_dbs_update').slideUp(0);

        }


    });

    // for gp_details

    $("#gp_status_register").click(function (e) {
        var test_gp_status=$(this).val();
        if(test_gp_status == 1){
            $('.gp_starus_detail').slideDown(0);
        }else{
            $('.gp_starus_detail').slideUp(0);
        }


    });

    //for id scan details

    $("input[name='id_scan_verified']").click(function(e){

        var tempidscan = $(this).val();

        if(tempidscan == 1)
        {
            $('.iscan_training').slideDown(0);


        }
        else{
            $('.iscan_training').slideUp(0);

        }


    });

    //gmc ielts
    $("input[name='ilets_certificate_check']").click(function(e){

        var ieltscheck = $(this).val();


        if(ieltscheck == 1)
        {
            $('.ilets_certificate').slideDown(0);

        }
        else{
            $('.ilets_certificate').slideUp(0);

        }


    });

    //gmc plabs

    $("input[name='PLABS_certificate_check']").click(function(e){

        var plabscheck = $(this).val();


        if(plabscheck == 1)
        {
            $('.PLABS_certificate').slideDown(0);

        }
        else{
            $('.PLABS_certificate').slideUp(0);

        }


    });

    //registration_form

    $("input[name='registration_form_accept']").click(function(e){

        var registration_form_check = $(this).val();


        if(registration_form_check == 1)
        {
            $('.registration_form_toggle').slideDown(0);

        }
        else{
            $('.registration_form_toggle').slideUp(0);

        }


    });

    //medical questionaire 

    $("input[name='medical_questionaire_accept']").click(function(e){

        var medical_questionaire_accept_check = $(this).val();


        if(medical_questionaire_accept_check == 1)
        {
            $('.medical_questionaire_toggle').slideDown(0);

        }
        else{
            $('.medical_questionaire_toggle').slideUp(0);

        }


    });

    //terms of engagement

    $("input[name='terms_of_engagement_accept']").click(function(e){

        var terms_of_engagement_accept_check = $(this).val();


        if(terms_of_engagement_accept_check == 1)
        {
            $('.terms_of_engagement_toggle').slideDown(0);

        }
        else{
            $('.terms_of_engagement_toggle').slideUp(0);

        }


    });

    //terms of engagement ( for other type of term of engagement)

    $(".terms_of_engagement_type").click(function(e){

        var terms_of_engagement_free_box_check = $(this).val();


        if(terms_of_engagement_free_box_check == 4)
        {
            $('.terms_of_engagement_free_box_toggel').slideDown(0);

        }
        else{
            $('.terms_of_engagement_free_box_toggel').slideUp(0);

        }


    });
    //face to face interview

    $("input[name='face_to_face_interview_accept']").click(function(e){

        var face_to_face_interview_accept_check = $(this).val();


        if(face_to_face_interview_accept_check == 1)
        {
            $('.face_to_face_interview_toggle').slideDown(0);

        }
        else{
            $('.face_to_face_interview_toggle').slideUp(0);

        }


    });


});