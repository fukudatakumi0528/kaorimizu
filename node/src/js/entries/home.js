class ScrollAddClass {
    init() {
        //console.log("Scroll class start");
        $(window).on('scroll load', function () {

            const target = $('.js-scroll');
            const isAnimate = '-isView';

            target.each(function () {

                let elemOffset = $(this).offset().top;
                let scrollPos = $(window).scrollTop();
                let wh = $(window).height();

                if (scrollPos > elemOffset - wh + (wh / 4)) {
                    $(this).addClass(isAnimate);
                }
            });

        });
    }
}


const scrollClass = new ScrollAddClass();
scrollClass.init();

