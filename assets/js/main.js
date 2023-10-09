/** ===============

.. Preloader
.. header_search
.. Fixed-header
.. Menu
.. Number rotator
.. Skillbar
.. Tab
.. Accordion
.. Isotope
.. Prettyphoto
.. share-icon_btn
.. Slick_slider
.. Back to top 

 =============== */



jQuery(function ($) {

    "use strict";

    /*------------------------------------------------------------------------------*/
    /* Preloader
    /*------------------------------------------------------------------------------*/
    // makes sure the whole site is loaded
    $(window).on("load", function () {
        $(".loader-blob").fadeOut(), $("#preloader").delay(300).fadeOut("slow", function () { $(this).remove() })
    })


    /*------------------------------------------------------------------------------*/
    /* header_search
    /*------------------------------------------------------------------------------*/

    $(".header_search").each(function () {
        $(".search_btn", this).on("click", function (e) {
            e.preventDefault();
            $(".header_search_content").toggleClass("on");
        });

        $(".header_search_content_inner .close_btn").on("click", function (e) {
            e.preventDefault();
            $(".header_search_content").removeClass("on");
        });
    });


    /*------------------------------------------------------------------------------*/
    /* Fixed-header
    /*------------------------------------------------------------------------------*/

    $(window).on("scroll", function () {


        if (matchMedia('only screen and (min-width: 1200px)').matches) {
            if ($(window).scrollTop() >= 50) {
                $('.prt-stickable-header').addClass('fixed-header');
            }
            else {
                $('.prt-stickable-header').removeClass('fixed-header');
            }
        }
    });


    var themetechmount_coverimgbox = function () {

        jQuery('.tm_coverimgbox_wrapper').each(function () {
            var parentDiv = jQuery(this);

            parentDiv.children('.tm_coverbox_contents').on(function () {
                parentDiv.find('.tm_coverbox_img').removeClass('active');
                jQuery(this).next('.tm_coverbox_img').addClass('active');
            });
        });
    };

    /*------------------------------------------------------------------------------*/
    /* Menu
    /*------------------------------------------------------------------------------*/

    var menu = {
        initialize: function () {
            this.Menuhover();
        },

        Menuhover: function () {
            var getNav = $("nav.main-menu"),
                getWindow = $(window).width(),
                getHeight = $(window).height(),
                getIn = getNav.find("ul.menu").data("in"),
                getOut = getNav.find("ul.menu").data("out");

            if (matchMedia('only screen and (max-width: 1200px)').matches) {

                // Enable click event
                $("nav.main-menu ul.menu").each(function () {

                    // Dropdown Fade Toggle
                    $("a.mega-menu-link", this).on('click', function (e) {
                        e.preventDefault();
                        var t = $(this);
                        t.toggleClass('active').next('ul').toggleClass('active');
                    });

                    // Megamenu style
                    $(".megamenu-fw", this).each(function () {
                        $(".col-menu", this).each(function () {
                            $(".title", this).off("click");
                            $(".title", this).on("click", function () {
                                $(this).closest(".col-menu").find(".content").stop().toggleClass('active');
                                $(this).closest(".col-menu").toggleClass("active");
                                return false;
                                e.preventDefault();

                            });

                        });
                    });

                });
            }
        },
    };

    $('.btn-show-menu-mobile').on('click', function (e) {
        $(this).toggleClass('is-active');
        $('.menu-mobile').toggleClass('show');
        return false;
        e.preventDefault();
    });

    var $nav = $('.btn-show-menu-mobile');
    $nav.click(function () {
        $('.site-navigation').toggleClass('nav-open');
    });

    // Initialize
    $(document).ready(function () {
        menu.initialize();

    });

    var $menu = $('#menu'), $menulink = $('#menu-toggle-form'), $menuTrigger = $('.has-submenu > a');
    $menulink.on('click', function (e) {

        $menulink.toggleClass('active');
        $menu.toggleClass('active');
    });

    $menuTrigger.on('click', function (e) {
        e.preventDefault();
        var t = $(this);
        t.toggleClass('active').next('ul').toggleClass('active');
    });

    $('ul li:has(ul)');
    $(document).ready(function () {
        // var e = '<div class="prt_floting_customsett">' +
        //     '<a href="https://support.preyantechnosys.com/" class="tmtheme_fbar_icons"><i class="fa fa-headphones"></i><span>Support</span></a>' +
        //     '<a href="https://preyantechnosys.com/" class="tmtheme_fbar_icons"><i class="themifyicon themifyicon ti-pencil"></i><span>Customization</span></a>' +
        //     '<a href="https://1.envato.market/EamoZP" class="tmtheme_fbar_icons"><i class="themifyicon ti-shopping-cart"></i><span class="buy_link">Buy<span></span></span></a>' +
        //     '<div class="clearfix"></div>' +
        //     '</div>';

        // $('body').append(e);
    });


    /*------------------------------------------------------------------------------*/
    /* Animation on scroll: Number rotator
    /*------------------------------------------------------------------------------*/

    $("[data-appear-animation]").each(function () {
        var self = $(this);
        var animation = self.data("appear-animation");
        var delay = (self.data("appear-animation-delay") ? self.data("appear-animation-delay") : 0);

        if ($(window).width() > 959) {
            self.html('0');
            self.waypoint(function (direction) {
                if (!self.hasClass('completed')) {
                    var from = self.data('from');
                    var to = self.data('to');
                    var interval = self.data('interval');
                    self.numinate({
                        format: '%counter%',
                        from: from,
                        to: to,
                        runningInterval: 2000,
                        stepUnit: interval,
                        onComplete: function (elem) {
                            self.addClass('completed');
                        }
                    });
                }
            }, { offset: '85%' });
        } else {
            if (animation == 'animateWidth') {
                self.css('width', self.data("width"));
            }
        }
    });

    jQuery(".prt-circle-box").each(function () {

        var circle_box = jQuery(this);
        var fill_val = circle_box.data("fill");
        var emptyFill_val = circle_box.data("emptyfill");
        var thickness_val = circle_box.data("thickness");
        var linecap_val = circle_box.data("linecap")
        var fill_gradient = circle_box.data("gradient");
        var startangle_val = (-Math.PI / 4) * 1.5;
        if (fill_gradient != "") {
            fill_gradient = fill_gradient.split("|");
            fill_val = { gradient: [fill_gradient[0], fill_gradient[1]] };
        }
        if (typeof jQuery.fn.circleProgress == "function") {
            var digit = circle_box.data("digit");
            var before = circle_box.data("before");
            var after = circle_box.data("after");
            var digit = Number(digit);
            var short_digit = digit / 100;
            var size_val = circle_box.data("size");
            jQuery(".prt-circle", circle_box)
                .circleProgress({
                    value: 0, duration: 8000, size: size_val, startAngle: startangle_val,
                    thickness: thickness_val, linecap: linecap_val, emptyFill: emptyFill_val, fill: fill_val
                })
                .on("circle-animation-progress", function (event, progress, stepValue) {

                    circle_box.find(".prt-fid-number").html(before + Math.round(stepValue * 100) + after);
                });
        }
        circle_box.waypoint(
            function (direction) {

                if (!circle_box.hasClass("completed")) {
                    if (typeof jQuery.fn.circleProgress == "function") {
                        jQuery(".prt-circle", circle_box).circleProgress({ value: short_digit });
                    }
                    circle_box.addClass("completed");
                }
            },
            { offset: "90%" }
        );
    });

    /* listimgbox */

    jQuery(document).on('ready', function (e) {

        jQuery('.prt_listimgbox_wrapper .prt_listimgbox_wrap').on('hover', function (e) {
            jQuery('.prt_listimgbox_wrapper .prt_listimgbox_wrap').removeClass("active");
            jQuery(this).addClass("active");
        });
    });

    /* footer_customheading */
    jQuery(window).on('load', function (e) {
        var $li = jQuery('.footer_customheading span');
        $li.hide().first().show().addClass('active');

        function footerloop() {
            jQuery('.footer_customheading .active').each(function (index) {
                var $this = jQuery(this);
                var $next = $this.next().length > 0 ? $this.next() : $li.first();

                $this.hide().removeClass('active');
                $next.show().addClass('active');

                if ($next.index() == 0) {
                    // clearInterval(myTimer);
                    setTimeout(function () {
                    }, 3000);
                }
            });
        }

        setInterval(function () { footerloop() }, 2000);//timer running every 2 seconds


    });

    /*------------------------------------------------------------------------------*/
    /* Skillbar
    /*------------------------------------------------------------------------------*/

    $('.prt-progress-bar').each(function () {
        $(this).find('.progress-bar').width(0);
    });

    $('.prt-progress-bar').each(function () {

        $(this).find('.progress-bar').animate({
            width: $(this).attr('data-percent')
        }, 2000);
    });


    // Part of the code responsible for loading percentages:

    $('.progress-bar-percent[data-percentage]').each(function () {

        var progress = $(this);
        var percentage = Math.ceil($(this).attr('data-percentage'));

        $({ countNum: 0 }).animate({ countNum: percentage }, {
            duration: 2000,
            easing: 'linear',
            step: function () {
                // What todo on every count
                var pct = '';
                if (percentage == 0) {
                    pct = Math.floor(this.countNum) + '%';
                } else {
                    pct = Math.floor(this.countNum + 1) + '%';
                }
                progress.text(pct);
            }
        });
    });

    /*------------------------------------------------------------------------------*/
    /* Tab
    /*------------------------------------------------------------------------------*/
    $('.prt-tabs').each(function () {
        $(this).children('.content-tab').children().hide();
        $(this).children('.content-tab').children().first().show();
        $(this).find('.tabs').children('li').on('click', function (e) {
            var liActive = $(this).index(),
                contentActive = $(this).siblings().removeClass('active').parents('.prt-tabs').children('.content-tab').children().eq(liActive);
            contentActive.addClass('active').fadeIn('slow');
            contentActive.siblings().removeClass('active');
            $(this).addClass('active').parents('.prt-tabs').children('.content-tab').children().eq(liActive).siblings().hide();
            e.preventDefault();
        });
    });

    $(document).on('ready', function (e) {
        $('.prt-tabs.slider-tab > .tabs').children('li').on('click', function (e) {
            var tab = $(this).closest('.prt-tabs > .tabs > .tab'),
                index = $(this).closest('.prt-tabs > .tabs > li').index();
            $(this).parents('.prt-tabs').children(' .tabs').children('li.active ').removeClass('active');
            $(this).addClass('active');
            $(this).addClass('active').parents('.prt-tabs').children('.content-tab').find('.content-inner').not('.content-inner:eq(' + index + ')').slideUp();
            $(this).addClass('active').parents('.prt-tabs').children('.content-tab').find('.content-inner:eq(' + index + ')').slideDown();
            e.preventDefault();
        });
    });


    /*------------------------------------------------------------------------------*/
    /* Accordion
    /*------------------------------------------------------------------------------*/

    var allPanels = $('.accordion > .toggle').children('.toggle-content').hide();

    $('.toggle-title').on('click', function (e) {

        e.preventDefault();
        var $this = $(this);
        $this.parent().parent().find('.toggle .toggle-title a').removeClass('active');

        if ($this.next().hasClass('show')) {

            $this.next().removeClass('show');
            $this.next().slideUp('easeInExpo');

        } else {
            $this.parent().parent().find('.toggle .toggle-content').removeClass('show');
            $this.parent().parent().find('.toggle .toggle-content').slideUp('easeInExpo');
            $this.next().toggleClass('show');
            $this.next().removeClass('show');
            $this.next().slideToggle('easeInExpo');
            $this.next().parent().children().children().addClass('active');

        }

    });


    /*------------------------------------------------------------------------------*/
    /* Isotope
    /*------------------------------------------------------------------------------*/

    $(function () {

        if ($().isotope) {
            var $container = $('.isotope-project');
            $container.imagesLoaded(function () {
                $container.isotope({
                    itemSelector: '.project_item',
                    transitionDuration: '1s',
                    layoutMode: 'fitRows'
                });
            });

            $('.portfolio-filter li').on('click', function () {
                var selector = $(this).find("a").attr('data-filter');
                $('.portfolio-filter li').removeClass('active');
                $(this).addClass('active');
                $container.isotope({ filter: selector });
                return false;
            });
        };

    });



    /*------------------------------------------------------------------------------*/
    /* Prettyphoto
    /*------------------------------------------------------------------------------*/
    $(function () {

        // Normal link
        jQuery('a[href*=".jpg"], a[href*=".jpeg"], a[href*=".png"], a[href*=".gif"]').each(function () {
            if (jQuery(this).attr('target') != '_blank' && !jQuery(this).hasClass('prettyphoto') && !jQuery(this).hasClass('modula-lightbox')) {
                var attr = $(this).attr('data-gal');
                if (typeof attr !== typeof undefined && attr !== false && attr != 'prettyPhoto') {
                    jQuery(this).attr('data-rel', 'prettyPhoto');
                }
            }
        });

        jQuery('a[data-gal^="prettyPhoto"]').prettyPhoto();
        jQuery('a.prt_prettyphoto').prettyPhoto();
        jQuery('a[data-gal^="prettyPhoto"]').prettyPhoto();
        jQuery("a[data-gal^='prettyPhoto']").prettyPhoto({ hook: 'data-gal' })

    });


    /*------------------------------------------------------------------------------*/
    /* share-icon_btn
    /*------------------------------------------------------------------------------*/
    jQuery(".prt-blog-classic").each(function (t) {
        var e = jQuery(this);
        e.find(".prt-social-share-icon_btn").on("click", function () {
            return e.find(".social-icons").toggleClass("show"), !1
        })
    });

    /*------------------------------------------------------------------------------*/
    /* twentytwenty[data-orientation]
    /*------------------------------------------------------------------------------*/

    $(function () {
        $(".twentytwenty-container[data-orientation!='vertical']").twentytwenty({ default_offset_pct: 0.5 });
        $(".twentytwenty-container[data-orientation='vertical']").twentytwenty({ default_offset_pct: 0.3, orientation: 'vertical' });
    });


    /*------------------------------------------------------------------------------*/
    /* Slick_slider
    /*------------------------------------------------------------------------------*/
    $(".slick_slider").slick({
        speed: 1000,
        infinite: true,
        arrows: false,
        dots: false,
        autoplay: false,
        centerMode: false,

        responsive: [{

            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 992,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        },
        {
            breakpoint: 768,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 576,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 420,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
    /*------------------------------------------------------------------------------*/
    /* Double_Slick_slider
    /*------------------------------------------------------------------------------*/
    var testinav = jQuery('.testimonials-nav', this);
    var testiinfo = jQuery('.testimonials-info', this);

    jQuery('.testimonials-info', this).slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        fade: false,
        arrows: false,
        asNavFor: testinav,
        adaptiveHeight: true,
        speed: 1500,
        autoplay: true,
        autoplaySpeed: 1500,
        infinite: true,
    });

    jQuery('.testimonials-nav', this).slick({

        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: testiinfo,
        centerMode: true,
        centerPadding: 0,
        focusOnSelect: true,
        autoplay: true,
        autoplaySpeed: 1500,
        speed: 1500,
        arrows: true,
        dots: false,
        variableWidth: true,
        infinite: true,


    });

    /*------------------------------------------------------------------------------*/
    /*  testimonial vertical slider
    /*------------------------------------------------------------------------------*/

    $('.vertical_slider.testimonial-vertical').slick({
        slidesToShow: 2,
        slidesToScroll: 1,
        autoplay: true,
        dots: false,
        vertical: true,
        verticalSwiping: true,
        arrows: false,
        focusOnSelect: true,
        responsive: [
            {
                breakpoint: 767,
                settings: "unslick"
            }
        ]
    });

    /*------------------------------------------------------------------------------*/
    /* Custom select
    /*------------------------------------------------------------------------------*/

    $('#selectbox').each(function () {
        var $this = $(this), numberOfOptions = $(this).children('option').length;

        $this.addClass('select-hidden');
        $this.wrap('<div class="select"></div>');
        $this.after('<div class="select-styled"></div>');

        var $styledSelect = $this.next('div.select-styled');
        $styledSelect.text($this.children('option').eq(0).text());

        var $list = $('<ul />', {
            'class': 'select-options'
        }).insertAfter($styledSelect);

        for (var i = 0; i < numberOfOptions; i++) {
            $('<li />', {
                text: $this.children('option').eq(i).text(),
                rel: $this.children('option').eq(i).val()
            }).appendTo($list);
        }

        var $listItems = $list.children('li');

        $styledSelect.on("click", function (e) {
            e.stopPropagation();
            $('div.select-styled.active').not(this).each(function () {
                $(this).removeClass('active').next('ul.select-options').hide();
            });
            $(this).toggleClass('active').next('ul.select-options').toggle();
        });

        $listItems.on("click", function (e) {
            e.stopPropagation();
            $styledSelect.text($(this).text()).removeClass('active');
            $this.val($(this).attr('rel'));
            $list.hide();
            //console.log($this.val());
        });

        $(document).on("click", function (e) {
            $styledSelect.removeClass('active');
            $list.hide();
        });

    });

    /*------------------------------------------------------------------------------*/
    /* Back to top
    /*------------------------------------------------------------------------------*/

    // ===== Scroll to Top ==== 
    jQuery('#totop').hide();

    $(window).on("scroll", function () {
        if (jQuery(this).scrollTop() >= 500) {        // If page is scrolled more than 50px
            jQuery('#totop').fadeIn(200);    // Fade in the arrow
            jQuery('#totop').addClass('top-visible');
        } else {
            jQuery('#totop').fadeOut(200);   // Else fade out the arrow
            jQuery('#totop').removeClass('top-visible');
        }
    });

    jQuery('#totop').on("click", function () {      // When arrow is clicked
        jQuery('body,html').animate({
            scrollTop: 0                       // Scroll to top of body
        }, 500);
        return false;
    });


    jQuery(document).on('ready', function (e) {
        jQuery('.tm_coverimgbox_wrapper').each(function () {
            var parentDiv = jQuery(this);
            parentDiv.children('.tm_coverbox_contents').on('hover', function (e) {
                parentDiv.find('.tm_coverbox_img').removeClass('active');
                jQuery(this).next('.tm_coverbox_img').addClass('active');
            });
        });


    });


    /*------------------------------------------------------------------------------*/
    /* AOS
    /*------------------------------------------------------------------------------*/

    AOS.init({
        once: true,
        duration: 1200,
        delay: 500,
    });


    $(document).ready(function () {
        $('#upload-resume').on('click', function (e) {
            $('#opend-upload-box').click();
        });
    })
});