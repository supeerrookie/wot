var $ = jQuery.noConflict();
$(document).ready(function($) {

    var loadBgImg = false;
    var $winWidth = $(window).width();
    var $winHeight = $(window).height();

    var windowH = $(window).height();
    var wrapperH = $('.fullheight').height();

    var deviceAgent = navigator.userAgent.toLowerCase();

    var iOS = !!navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform) && !window.MSStream;

    var isTouchDevice = Modernizr.touch ||
        (deviceAgent.match(/(iphone|ipod|ipad)/) ||
            deviceAgent.match(/(android)/) ||
            deviceAgent.match(/(iemobile)/) ||
            deviceAgent.match(/iphone/i) ||
            deviceAgent.match(/ipad/i) ||
            deviceAgent.match(/ipod/i) ||
            deviceAgent.match(/blackberry/i) ||
            deviceAgent.match(/bada/i));

    $(window).resize(function() {
        var windowH = $(window).height();
        var wrapperH = $('.fullheight').height();
        var differenceH = windowH - wrapperH;

        var newH = wrapperH + differenceH;
        var truecontentH = $('.fullheight').height();

        if (windowH > truecontentH) {
            $('.fullheight').css('height', (newH) + 'px');
            $('.fullheight.x2').css('height', (newH) * 2 + 'px');
            $('.fullheight.halfheight').css({ 'height': ($(window).height()) * 0.5 + 'px' });
            $('.fullheight.quarterheight').css({ 'height': ($(window).height()) * 0.25 + 'px' });
            $('.fullheight.thirdheight').css({ 'height': ($(window).height()) * 0.35 + 'px' });
            $('.fullheight.x-45').css({ 'height': ($(window).height()) * 0.33 + 'px' });
            $('.fullheight.x-3').css({ 'height': ($(window).height()) * 0.75 + 'px' });
            $('.fullheight.x13').css({ 'height': ($(window).height()) * 1.3 + 'px' });
        }

    });


    if (windowH > wrapperH) {
        $('.fullheight').css({ 'height': ($(window).height()) + 'px' });
        $('.fullheight.x2').css('height', ($(window).height()) * 2 + 'px');
        $('.fullheight.halfheight').css({ 'height': ($(window).height()) * 0.5 + 'px' });
        $('.fullheight.quarterheight').css({ 'height': ($(window).height()) * 0.25 + 'px' });
        $('.fullheight.thirdheight').css({ 'height': ($(window).height()) * 0.35 + 'px' });
        $('.fullheight.x-45').css({ 'height': ($(window).height()) * 0.33 + 'px' });
        $('.fullheight.miniheight').css({ 'height': ($(window).height()) * 0.15 + 'px' });
        $('.fullheight.x-3').css({ 'height': ($(window).height()) * 0.75 + 'px' });
        $('.fullheight.x13').css({ 'height': ($(window).height()) * 1.3 + 'px' });

    }

    if (isTouchDevice && $winWidth <= 768) {
        $('.fullheight').css({ 'height': ($(window).height()) + 'px' });
        $('.fullheight.x2').css('height', ($(window).height()) * 2 + 'px');
        $('.fullheight.halfheight').css({ 'height': ($(window).height()) * 0.35 + 'px' });
        $('.fullheight.quarterheight').css({ 'height': ($(window).height()) * 0.25 + 'px' });
        $('.fullheight.thirdheight').css({ 'height': ($(window).height()) * 0.25 + 'px' });
        $('.fullheight.x-45').css({ 'height': ($(window).height()) * 0.25 + 'px' });
        $('.fullheight.miniheight').css({ 'height': ($(window).height()) * 0.15 + 'px' });
        $('.fullheight.x-3').css({ 'height': ($(window).height()) * 0.65 + 'px' });
        $('.fullheight.x13').css({ 'height': ($(window).height()) * 1.3 + 'px' });

    }

    if (isTouchDevice || $.browser.mobile) {
        $('#mainNav').removeClass('active');
        $('#btnNav').addClass('active');
        var lastScrollTop = 0;

        $(window).on('scroll', function(event) {
            var st = $(this).scrollTop();
            if (st > lastScrollTop) {
                $('#mainNav').removeClass('active');
                $('#btnNav').addClass('active');
            }
            lastScrollTop = st;
        });

        $(window).on('touchmove', function(event) {
            if ($('#mainNav').hasClass('active')) {
                $('.breadcrumbs.left').addClass('slideOutLeft animated');
                $('.breadcrumbs.right').addClass('slideOutRight animated');
                var xx1 = setTimeout(function() {
                    $('#btnNav').addClass('active');
                    var xx3 = setTimeout(function() {
                        $('.breadcrumbs.left').removeClass('slideOutLeft animated');
                        $('.breadcrumbs.right').removeClass('slideOutRight animated');
                        $('#mainNav').removeClass('active');
                        clearTimeout(xx3);
                    }, 600);
                    clearTimeout(xx1);
                }, 1200);
            }
        });

        $('#btnNav').on('click', function() {
            $('#mainNav').addClass('active');
            $('.breadcrumbs.left').addClass('slideInLeft animated');
            $('.breadcrumbs.right').addClass('slideInRight animated');
            $('#btnNav').removeClass('active');
            var xx2 = setTimeout(function() {
                $('.breadcrumbs.left').removeClass('slideInLeft animated');
                $('.breadcrumbs.right').removeClass('slideInRight animated');
                clearTimeout(xx2);
            }, 500);
            var xx1 = setTimeout(function() {
                $('.breadcrumbs.left').addClass('slideOutLeft animated');
                $('.breadcrumbs.right').addClass('slideOutRight animated');
                var xx3 = setTimeout(function() {
                    $('#mainNav').removeClass('active');
                    $('#btnNav').addClass('active');
                    $('.breadcrumbs.left').removeClass('slideOutLeft animated');
                    $('.breadcrumbs.right').removeClass('slideOutRight animated');
                    clearTimeout(xx3);
                }, 800);
                clearTimeout(xx1);
            }, 3000);

        });
    }

    function loadCheck() {
        var xx2 = setTimeout(function() {
            $('body').removeClass('hidden');
            $('#loading').removeClass('active');
            $('.main').addClass('active');
            clearTimeout(xx2);
        }, 300);
    }

    $('.bgimg').imagesLoaded({ backgound: true }).done(function(instance) {
        loadCheck();
        console.log('bg images loaded');
    });

    $('.lazy').Lazy({
        bind: "event",
        scrollDirection: 'vertical',
        effect: 'show',
        effectTime: 1,
        visibleOnly: true,
        customLoaderName: function(element) {
            element.html('element handled by "customLoaderName"');
            element.load();
        },
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        },
        afterLoad: function(element) {
            $('.lazy').addClass('img-loaded');
        },
        onFinishedAll: function() {
            console.log('images loaded');
        }
    });


    $('.breadcrumbs').click(function() {

        var index = $('.main-inside .overlay'),
            id = $(this).attr('data-id'),
            numbIndex = $(this).index(),
            slideItems = index.parents().find('.main-slider').length,
            // slideItems = index.find('.main-inside .overlay').attr('id'),
            layer = document.getElementById(id);
        document.location.href = '/' + $(this).attr('data-id') + '/';

    });

    $('.logo').click(function() {
        document.location.href = '/';

    });

    $('#btn-ticket').on('click', function() {

        $('html, body').animate({
            scrollTop: $("#homepageTicket").offset().top - 140

        }, 300);

    });

    $('#btn-gallery').on('click', function() {
        document.location.href = '/' + $(this).attr('data-id') + '/';
    });

    $('#btn-see-more').on('click', function() {
        document.location.href = '/' + $(this).attr('data-id') + '/';
    });

    $(function() {
        function toggleChevron(e) {
            $(e.target).prev('.card-header').find("i").toggleClass('rotate-icon');
            if ($('card-body').hasClass('show')) {
                $('.card-header').find("i").addClass('rotate-icon');
            }

            $('.card-body.animated p').toggleClass('fadeInUp');
        }
        $('#faq').on('hide.bs.collapse', toggleChevron);
        $('#faq').on('show.bs.collapse', toggleChevron);
    });

    $('.item-slick-lineups').slick({
        autoplay: true,
        autoplaySpeed: 1000,
        dots: false,
        infinite: true,
        speed: 1000,
        slidesToShow: 4,
        slidesToScroll: 1,
        easing: 'easeInOutCubic',
        arrows: false,
        responsive: [{
            breakpoint: 1480,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3
            }
        }, {
            breakpoint: 900,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 2
            }
        }]
    });


    $('.btn-lineup').click(function() {

        var index = $('.content .overlay'),
            id = $(this).attr('data-id'),
            numbIndex = $(this).index(),
            tagline = $('.tagline > p[data-id=' + id + ']'),
            slideItems = index.parents().find('.main-slider').length;
        // slideItems = index.find('.main-inside .overlay').attr('id'),
        layer = index.attr(id);
        if ($(id).hasClass('active')) {
            $(id).removeClass('active');
        }

        if (id == 'show') {
            $(this).addClass('active');
            $('.btn-lineup:eq(0)').removeClass('active');
            $('.btn-lineup:eq(2)').removeClass('active');
            // $(this).not(id).removeClass('active');
            $('.tagline > p:eq(1)').removeClass('d-none');
            $('.tagline > p:eq(0)').addClass('d-none');
            $('.tagline > p:eq(2)').addClass('d-none');
            $('.content > .overlay:eq(0)').removeClass('active');
            $('.content > .overlay:eq(1)').addClass('active');
            $('.content > .overlay:eq(2)').removeClass('active');

        }

        if (id == 'sight') {
            $(this).addClass('active');
            $(layer).addClass('active');
            $('.btn-lineup:eq(1)').removeClass('active');
            $('.btn-lineup:eq(2)').removeClass('active');

            $('.tagline > p:eq(0)').removeClass('d-none');
            $('.tagline > p:eq(1)').addClass('d-none');
            $('.tagline > p:eq(2)').addClass('d-none');
            $('.content > .overlay:eq(0)').addClass('active');
            $('.content > .overlay:eq(1)').removeClass('active');
            $('.content > .overlay:eq(2)').removeClass('active');

        }

        if (id == 'talks') {
            $(this).addClass('active');
            $(layer).addClass('active');
            $('.btn-lineup:eq(1)').removeClass('active');
            $('.btn-lineup:eq(0)').removeClass('active');
            // $(this).not(id).removeClass('active');
            $('.tagline > p:eq(2)').removeClass('d-none');
            $('.tagline > p:eq(1)').addClass('d-none');
            $('.tagline > p:eq(0)').addClass('d-none');
            $('.content > .overlay:eq(0)').removeClass('active');
            $('.content > .overlay:eq(1)').removeClass('active');
            $('.content > .overlay:eq(2)').addClass('active');
        }

    });

    $("#galley-list > a").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        'overlayShow': false
    });

    $(window).scroll(function() {
        var sticky = $('.header'),
            scroll = $(window).scrollTop();

        if ((scroll < 10)) {
            sticky.removeClass('active');
            var xx2 = setTimeout(function() {
                $('.header .logo').removeClass('logo-flat-full');
                $('#logoHome').show();
                $('#logoHome2').hide();
                $('#logoHome').addClass('fadeInDown animated');
                clearTimeout(xx2);

            }, 50);
        } else if ((scroll >= 200)) {
            $('#logoHome').hide();
            var xx2 = setTimeout(function() {
                sticky.addClass('active');
                $('.header .logo').addClass('logo-flat-full');
                $('#logoHome2').addClass('fadeInDown animated');
                $('#logoHome2').css('display', 'block');
                $('#logoHome').removeClass('fadeInDown animated');
                clearTimeout(xx2);
            }, 50);
        }
    });

    $('.main-inside .overlay.active').off('scroll').on('scroll', function(event) {
        var lastScrollTop = 30;
        var sticky = $(this).find('.header'),
            scroll = $('.main-inside .overlay.active').scrollTop();

        if ((scroll > 20)) {
            $('#logoHome').hide();
            var xx2 = setTimeout(function() {
                $('#headerChild').addClass('active');
                $('.header .logo').addClass('logo-flat-full');
                $('#logoHome2').addClass('fadeInDown animated');
                $('#logoHome2').css('display', 'block');
                $('#logoHome').removeClass('fadeInDown animated');
                clearTimeout(xx2);
            }, 50);

        } else if ((scroll < lastScrollTop)) {
            $('#logoHome2').hide();
            var xx2 = setTimeout(function() {
                $('#headerChild').removeClass('active');
                $('#logoHome').show();
                $('#logoHome').addClass('fadeInDown animated');
                $('#logoHome2').css('display', 'none');
                $('.header .logo').removeClass('logo-flat-full');
                clearTimeout(xx2);
            }, 50);

        }
    });

    $('.wrapper').off('scroll').on('scroll', function() {
        var sticky = $(this).find('.header'),
            scroll = $('.wrapper').scrollTop();

        if ((scroll > 20)) {
            $('#logoHome').hide();
            var xx2 = setTimeout(function() {
                $('#headerChild').addClass('active');
                $('.header .logo').addClass('logo-flat-full');
                $('#logoHome2').addClass('fadeInDown animated');
                $('#logoHome2').css('display', 'block');
                $('#logoHome').removeClass('fadeInDown animated');
                clearTimeout(xx2);
            }, 50);

        } else if ((scroll < 20)) {

            $('#logoHome2').hide();
            var xx2 = setTimeout(function() {
                $('#headerChild').removeClass('active');
                $('#logoHome').show();
                $('#logoHome').addClass('fadeInDown animated');
                $('#logoHome2').css('display', 'none');
                $('.header .logo').removeClass('logo-flat-full');
                clearTimeout(xx2);
            }, 50);

        }
    });

    $('.nav-lineups li.load').one('click', function (evt){
        var stage = $(this).attr('data-id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "/lineups/" + stage,
            dataType: 'JSON',
            success: function(results) {

                if(results == 'no data'){
                     $('#lineups .content > div#' + stage + ' .row').html('<h5 class="text-white">Ups, No Data Found</h5>');
                }
                console.log(results);
                $('.fullheight.x-45').css({ 'height': ($(window).height()) * 0.33 + 'px' });
                if(isTouchDevice){
                     $('.fullheight.x-45').css({ 'height': ($(window).height()) * 0.25 + 'px' });
                }
                $('#lineups .content > div#' + stage + ' .row').html('');
                $.each(results, function(key, value) {
                    $('#lineups .content > div#' + stage + ' .row').append(' <a href="/artist-detail/' + value.slug + '" class="col-6 col-sm-6 col-md-4 fullheight x-45 item-boxgrid fadeIn animated"> <div class="bgimg" style="background-image: url(../uploads/' + value.image + ')" rel="../uploads/' + value.image + '" > <div class="overlay soft"> <div class="centeralign"> <div class="centeralign-bottom"> <h3 class="title-lineup p-3">"' + value.name + '"</h3> </div></div></div></div></a>');
                });
                $('#lineups .content > div#' + stage).addClass('active');

            }
        });
    });

});