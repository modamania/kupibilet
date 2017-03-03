$(document).ready(function() {
    $('.elSlider').owlCarousel({
        navigation : true, // показывать кнопки next и prev
        nav:true,
        navText: ["<img src='images/slider/left.png'>","<img src='images/slider/right.png'>"],

        slideSpeed : 300,
        paginationSpeed : 400,

        items : 1,
        itemsDesktop : false,
        itemsDesktopSmall : false,
        itemsTablet: false,
        itemsMobile : false
    });
    $(".eng-popap-btn").fancybox({
        maxWidth	: 800,
        maxHeight	: '100%',
        fitToView	: false,
        padding     : 0,
        width		: '400',
        height		: '600',
        autoSize	: true,
        closeClick	: false,
    });
});
$(function() {
    var pull 		= $('#engNav-btn');
    menu 		= $('nav ul');
    menuHeight	= menu.height();

    $(pull).on('click', function(e) {
        e.preventDefault();
        menu.slideToggle();
    });

    $(window).resize(function(){
        var w = $(window).width();
        if(w > 320 && menu.is(':hidden')) {
            menu.removeAttr('style');
        }
    });
});
$( function() {

    $.datepicker.setDefaults($.datepicker.regional['ru']);
    $('#engDate-picter').datepicker({
        defaultDate: "+5y"
    });
} );
//           Перевод
( function( factory ) {
    if ( typeof define === "function" && define.amd ) {

        // AMD. Register as an anonymous module.
        define( [ "../widgets/datepicker" ], factory );
    } else {

        // Browser globals
        factory( jQuery.datepicker );
    }
}( function( datepicker ) {

    datepicker.regional.ru = {
        closeText: "Закрыть",
        prevText: "&#x3C;Пред",
        nextText: "След&#x3E;",
        currentText: "Сегодня",
        monthNames: [ "Январь","Февраль","Март","Апрель","Май","Июнь",
            "Июль","Август","Сентябрь","Октябрь","Ноябрь","Декабрь" ],
        monthNamesShort: [ "Янв","Фев","Мар","Апр","Май","Июн",
            "Июл","Авг","Сен","Окт","Ноя","Дек" ],
        dayNames: [ "воскресенье","понедельник","вторник","среда","четверг","пятница","суббота" ],
        dayNamesShort: [ "вск","пнд","втр","срд","чтв","птн","сбт" ],
        dayNamesMin: [ "Вс","Пн","Вт","Ср","Чт","Пт","Сб" ],
        weekHeader: "Нед",
        dateFormat: "dd.mm.yy",
        firstDay: 1,
        isRTL: false,
        showMonthAfterYear: false,
        yearSuffix: "" };
    datepicker.setDefaults( datepicker.regional.ru );

    return datepicker.regional.ru;

} ) );
