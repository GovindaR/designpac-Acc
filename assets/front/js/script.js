$(document).ready(function () {
    $(".chosen-select").chosen({disable_search_threshold: 10});
    $('#from').change(function () {

        var val = $(this).val();
        $('.hospital-name').slideUp();
        $('.doctor-name').slideUp();
        $('.consultant-name').slideUp();
        $('.hospital-contact-name').slideUp().val('');

        if (val == '0') {
            $('.hospital-name').slideDown().css('display', 'inline');
        }
        else if (val == '1') {
            $('.doctor-name').slideDown();
        }
        else if (val == '2') {
            $('.consultant-name').slideDown();
        }
    });

    $("form select[name=hospital_name]").change(function () {

        var val = $(this).val();

        if (val != '') {

            var token = $("form input[name=_token]").val();
            $.ajax({
                url: '/ajax/hospital',
                data: 'hospital=' + val + '&_token=' + token,
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    $('.hospital-contact-name').slideDown().val(response['data']);
                }
            });
        }
        else {
            $('.hospital-contact-name').slideUp();
        }
    });

    $('#regarding').change(function () {

        var val = $(this).val();
        $('.hospital-name-2').slideUp();
        $('.doctor-name-2').slideUp();
        $('.hospital-contact-name-2').slideUp().val('');

        if (val == '0' || val == '2') {
            $('.hospital-name-2').slideDown().css('display', 'inline');
        }
        else if (val == '1') {
            $('.doctor-name-2').slideDown();
        }

    });

    $("form select[name=hospital_name_2]").change(function () {

        var val = $(this).val();

        if (val != '') {

            var token = $("form input[name=_token]").val();
            $.ajax({
                url: '/ajax/hospital',
                data: 'hospital=' + val + '&_token=' + token,
                type: 'post',
                dataType: 'json',
                success: function (response) {
                    $('.hospital-contact-name-2').slideDown().val(response['data']);
                }
            });
        }
        else {
            $('.hospital-contact-name-2').slideUp();
        }
    });

    $("#create-hospital").validate({
        rules: {
            code: "required",
            name: "required",
            status: "required",
            branch: "required"
        }
    });


});