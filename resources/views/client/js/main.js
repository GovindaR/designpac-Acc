$('#passive-package').click(function() {
    $(this).addClass('active-package');
    $('#table-package1').show(500);
    $('#table-package2').hide(500);
    $('#active-package').removeClass('active-package');
});
$('#active-package').click(function() {
    $(this).addClass('active-package');
    $('#table-package1').hide(500);
    $('#table-package2').show(500);
    $('#passive-package').removeClass('active-package');
});

jQuery(document).ready(function() {
    var tabs = $('.tabs');
    var items = $('.tabs').find('a').length;
    var selector = $(".tabs").find(".selector");
    var activeItem = tabs.find('.active');
    var activeWidth = activeItem.innerWidth();
    $(".selector").css({
        "left": activeItem.position.left + "px",
        "width": activeWidth + "px"
    });

    $(".tabs").on("click", "a", function() {
        $('.tabs a').removeClass("active");
        $(this).addClass('active');
        var activeWidth = $(this).innerWidth();
        var itemPos = $(this).position();
        $(".selector").css({
            "left": itemPos.left + "px",
            "width": activeWidth + "px"
        });
    });
});
jQuery(document).ready(function() {
    "use strict";
    $(".order-item").click(function() {
        $('.popup1').removeClass("zoomOut");
        $('.popup1').addClass("zoomIn");
    });
    $(".times-card").click(function() {
        $('.popup1').addClass("zoomOut");
        $('.popup1').removeClass("zoomIn");
        $('.onclick-bill').addClass("zoomOut");
        $('.onclick-bill').css('display', 'none');
        $('.onclick-bill').removeClass("zoomIn");
        $('.billing').css("display", 'block');
    });
});
jQuery(document).ready(function() {
    "use strict";
    $(".billing").click(function() {
        $(this).css("display", 'none');
        $('.bill-address').css('margin-top', '0');
        $('.onclick-bill').removeClass("zoomOut");
        $('.onclick-bill').css('display', 'inline-block');
        $('.onclick-bill').addClass("zoomIn");
    });
});

jQuery(document).ready(function() {
    "use strict";
    $(".popup2 .billing").click(function() {
        $(".popup2 .bfh-selectbox-options").prepend('<input type="text" class="bfh-selectbox-filter">');
    });
});
jQuery(document).ready(function() {
    "use strict";
    $(".popup1 .billing").click(function() {
        $(".popup1 .bfh-selectbox-options").prepend('<input type="text" class="bfh-selectbox-filter">');
    });
});


jQuery(document).ready(function() {
    "use strict";
    $(".edit-visa").click(function() {
        $('.popup2').removeClass("zoomOut");
        $('.popup2').addClass("zoomIn");
    });
    $(".times-card").click(function() {
        $('.popup2').addClass("zoomOut");
        $('.popup2').removeClass("zoomIn");
        $('.onclick-bill').addClass("zoomOut");
        $('.onclick-bill').css('display', 'none');
        $('.onclick-bill').removeClass("zoomIn");
        $('.billing').css("display", 'block');
        $(".bfh-selectbox-filter").remove();
    });
});

jQuery(document).ready(function() {
    "use strict";
    $(".buy-button").click(function() {
        $('.popup3').removeClass("zoomOut");
        $('.popup3').addClass("zoomIn");
    });
    $(".times-card").click(function() {
        $('.popup3').addClass("zoomOut");
        $('.popup3').removeClass("zoomIn");
    });
});
jQuery(document).ready(function() {
    "use strict";
    $(".design-btn").click(function() {
        $.getJSON("package.json", function(nData) {
            var html = '';
            for (var i = 0; i < nData.Design.length; i++) {

                html += '<a href="#" class="col-sm-6">\
                                  <input id="frontend' + i + '" type="radio" name="product" value="' + nData.Design[i].planID + '">\
                <label for="frontend' + i + '">\
                                <div class="as-service">\
                                    <span class="merket-number">\
                                        ' + (i + 1) + '\
                              </span>\
                              <p>' + nData.Design[i].name + '</p>\
                              <small>$' + parseFloat(nData.Design[i].amount / 100).toFixed(2) + '</small>\
                                </div>\
                                </label>\
                            </a>';


            }

            $('.container-service').html(html);

        });
        $('.popup4').removeClass("zoomOut");
        $('.popup4').addClass("zoomIn");
        $('.popup3').addClass("zoomOut");
        $('.popup3').removeClass("zoomIn");
    });
    $(".times-card").click(function() {
        $('.popup4').addClass("zoomOut");
        $('.popup4').removeClass("zoomIn");
    });
});
jQuery(document).ready(function() {
    "use strict";
    $(".design-btn1").click(function() {
        $.getJSON("package.json", function(mData) {
            var html = '';
            for (var i = 0; i < mData.Development.length; i++) {

                html += '<a href="#" class="col-sm-4">\
                                  <input id="frontend' + i + '" type="radio" name="product" value="' + mData.Development[i].planID + '">\
                <label for="frontend' + i + '">\
                                <div class="as-service">\
                                    <span class="merket-number">\
                                        ' + (i + 1) + '\
                              </span>\
                              <p>' + mData.Development[i].name + '</p>\
                              <small>$' + parseFloat(mData.Development[i].amount / 100).toFixed(2) + '</small>\
                                </div>\
                                </label>\
                            </a>';


            }

            $('.container-service').html(html);

        });
        $('.popup4').removeClass("zoomOut");
        $('.popup4').addClass("zoomIn");
        $('.popup3').addClass("zoomOut");
        $('.popup3').removeClass("zoomIn");
    });
    $(".times-card").click(function() {
        $('.popup4').addClass("zoomOut");
        $('.popup4').removeClass("zoomIn");
    });
});
jQuery(document).ready(function() {
    "use strict";
    $(".design-btn2").click(function() {
        $.getJSON("package.json", function(oData) {
            var html = '';
            for (var i = 0; i < oData.Marketing.length; i++) {

                html += '<a href="#" class="col-sm-4">\
                                  <input id="frontend' + i + '" type="radio" name="product" value="' + oData.Marketing[i].planID + '">\
                <label for="frontend' + i + '">\
                                <div class="as-service">\
                                    <span class="merket-number">\
                                        ' + (i + 1) + '\
                              </span>\
                              <p>' + oData.Marketing[i].name + '</p>\
                              <small>$' + parseFloat(oData.Marketing[i].amount / 100).toFixed(2) + '</small>\
                                </div>\
                                </label>\
                            </a>';


            }

            $('.container-service').html(html);

        });
        $('.popup4').removeClass("zoomOut");
        $('.popup4').addClass("zoomIn");
        $('.popup3').addClass("zoomOut");
        $('.popup3').removeClass("zoomIn");
    });
    $(".times-card").click(function() {
        $('.popup4').addClass("zoomOut");
        $('.popup4').removeClass("zoomIn");
    });
});

function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("section")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "block";
        } else {
            li[i].style.display = "none";
        }
    }
}
jQuery(document).ready(function() {
    "use strict";
    $(".cancel-btn").click(function() {
        swal({
                title: "Are you sure?",
                text: "Once deleted, you will not be able to recover this  file!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $(this).closest("tr").hide();
                    swal("Poof! Your file has been deleted!", {
                        icon: "success",
                    });
                } else {
                    swal("Your file is safe!");
                }
            });
    });
});
jQuery(document).ready(function() {
    "use strict";
    $(".pay-now").click(function() {
        $('.popup5').removeClass("zoomOut");
        $('.popup5').addClass("zoomIn");
        $('.popup4').addClass("zoomOut");
        $('.popup4').removeClass("zoomIn");
    });
    $(".times-card").click(function() {
        $('.popup5').addClass("zoomOut");
        $('.popup5').removeClass("zoomIn");
    });
});
// jQuery(document).ready(function() {
//     "use strict";
//     $("#myInput").blur(function() {
//         $('#myUL li').css('display', 'none');
//     });
// });