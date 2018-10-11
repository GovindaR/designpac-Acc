$(function(){
 var btn = $('.action').not('.select').find('a'),
     nav = $('#steps').find('li'),cat,
     tab = $('ul.tab').find('a');
    
    $('[name="designCat"]').on("change",function(){
        cat = $(this).val();
    });
        
     
    btn.on("click",function(e){
        e.preventDefault();
        var target = $(this).attr("href");
        if(cat == "website"){
            $('#c').attr("disabled","disabled");
            $('.packs').eq(0).css("opacity","0.2");
        }
        if(cat == "mobile app"){
            $('#c').attr("disabled","disabled");
            $('#b').attr("disabled","disabled");
            $('.packs').eq(0).css("opacity","0.2");
            $('.packs').eq(1).css("opacity","0.2");
        }
        $("li"+target).addClass("active").siblings().removeClass("active");
        target = target.substr(5,target.length);
        nav.eq(target-1).addClass("active").siblings().removeClass("active");
    });
    
    tab.on("click",function(e){
        e.preventDefault();
        var target = $(this).attr("href");
        $(this).addClass("active").parent().siblings().find("a").removeClass("active");
        $(target).addClass('active').siblings().removeClass("active");
    });
    //var val = $('#pac').find(':selected').data('cat');
    $('#cat-0').fadeIn().siblings().fadeOut();
    /*$('#pac').on("change",function(){
    var val = $('#pac').find(':selected').data('cat');
    $('#'+val).fadeIn().siblings().fadeOut();
    });*/
    
//$('#img-logo').css("cursor","pointer");
$('#img-logo').on("click",function(){
window.location.href="http://www.designpac.net/";
});
});