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

    function loadCheck() {
        var xx2 = setTimeout(function() {
            $('body').removeClass('hidden');
            $('#loading').removeClass('active');
            $('.main').addClass('active');
            clearTimeout(xx2);
        }, 100);
    }

    $('.bg-fixed').imagesLoaded({ backgound: true }, function() {
        loadCheck();
        $('.bg-fixed').addClass('bgimg-loaded')
        console.log('bg-images loaded');
    });

    $('.bg-desktop').addClass('active');


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
        $('.fullheight.kurs.x-3').css({ 'height': ($(window).height()) * 0.45 + 'px' });
        $('.fullheight.x13').css({ 'height': ($(window).height()) * 1.3 + 'px' });

    }
    if (isTouchDevice || $.browser.mobile) {
        $('.bg-desktop').removeClass('active');
        $('.bg-mobile').addClass('active');
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
            }, 100);
            var xx1 = setTimeout(function() {
                $('.breadcrumbs.left').addClass('slideOutLeft animated');
                $('.breadcrumbs.right').addClass('slideOutRight animated');
                var xx3 = setTimeout(function() {
                    $('#mainNav').removeClass('active');
                    $('#btnNav').addClass('active');
                    $('.breadcrumbs.left').removeClass('slideOutLeft animated');
                    $('.breadcrumbs.right').removeClass('slideOutRight animated');
                    clearTimeout(xx3);
                }, 1000);
                clearTimeout(xx1);
            }, 3000);

        });

        try { // prevent exception on browsers not supporting DOM styleSheets properly
            for (var si in document.styleSheets) {
                var styleSheet = document.styleSheets[si];
                if (!styleSheet.rules) continue;

                for (var ri = styleSheet.rules.length - 1; ri >= 0; ri--) {
                    if (!styleSheet.rules[ri].selectorText) continue;

                    if (styleSheet.rules[ri].selectorText.match(':hover')) {
                        styleSheet.deleteRule(ri);
                    }
                }
            }
        } catch (ex) {}
    }

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
        window.open('https://kiostix.com/id/event/731/wave-of-tomorrow', '_blank');
    });

    $('#btn-ticket-float').on('click', function() {
        window.open('https://kiostix.com/id/event/731/wave-of-tomorrow', '_blank');
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
            $(e.target).prev('.card-header').find("img").toggleClass('opacity-0');
            $(e.target).prev('.card-header').find("h6").toggleClass('font-color-red');
            $(e.target).prev('.card-header').toggleClass('animated delay-1s');

            $('.card-body.animated p').toggleClass('fadeInUp');
        }
        $('#faq').on('hide.bs.collapse', toggleChevron);
        $('#faq').on('show.bs.collapse', toggleChevron);
    });

    $("#galley-list a").fancybox({
        'transitionIn': 'elastic',
        'transitionOut': 'elastic',
        'speedIn': 600,
        'speedOut': 200,
        'overlayShow': false,
        'touch': false,
        'mobile': {
            'touch': {
                vertical: true,
                momentum: true
            }
        }
    });

    $('.item-slick-lineups').slick({
        autoplay: true,
        autoplaySpeed: 3000,
        dots: false,
        infinite: true,
        speed: 3000,
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

    $('#exPrev').roundabout({
        duration: 1000,
        minScale: 0.6,
        minOpacity: 0.5,
        maxOpacity: 1,
        reflect: true,
        startingChild: 1,
        enableDrag: true
    });

    $('ul#exPrev li').on('click touchend', function(e) {
        el = document.querySelector('.roundabout-in-focus');
        show = $(this).hasClass('roundabout-in-focus');
        if (show) {
            ena = $(el).find('a');
            $.fancybox.open({
                'src': $(ena).attr('href'),
                'transitionIn': 'elastic',
                'transitionOut': 'elastic',
                'speedIn': 600,
                'speedOut': 200,
            });
        }
        if (e.cancelable) {
            e.preventDefault();
        }
    });

    $('.btn-lineup').one('click', function() {

        var index = $('.content .overlay'),
            id = $(this).attr('data-id'),
            numbIndex = $(this).index(),
            tagline = $('.tagline > p[data-id=' + id + ']'),
            slideItems = index.parents().find('.main-slider').length;
        // slideItems = index.find('.main-inside .overlay').attr('id'),
        layer = index.attr(id);

        if (id == 'show') {
            $('.tagline > p:eq(1)').removeClass('d-none');
            $('.tagline > p:eq(0)').addClass('d-none');
            $('.tagline > p:eq(2)').addClass('d-none');

        }

        if (id == 'sight') {
            $('.tagline > p:eq(0)').removeClass('d-none');
            $('.tagline > p:eq(1)').addClass('d-none');
            $('.tagline > p:eq(2)').addClass('d-none');

        }

        if (id == 'talks') {
            $('.tagline > p:eq(2)').removeClass('d-none');
            $('.tagline > p:eq(1)').addClass('d-none');
            $('.tagline > p:eq(0)').addClass('d-none');
        }

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


        var x = scroll;
        $('.parallax').css('background-position', '0 ' + parseInt(-x / 2) + 'px' + ', 0% ' + parseInt(-x / 6) + 'px, center top');


        if ((scroll > 20)) {
            $('#logoHome').hide();
            var xx2 = setTimeout(function() {
                $('#headerChild').addClass('active');
                $('.header .logo').addClass('logo-flat-full');
                $('#logoHome2').addClass('fadeInDown animated');
                $('#logoHome2').css('display', 'block');
                $('#logoHome').removeClass('fadeInDown animated');
                $('#floatTicket').addClass('opacity-1 fadeIn delay-2s show animated');
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

        var x = scroll;
        $('.parallax').css('background-position', '0 ' + parseInt(-x / 4) + 'px' + ', 0% ' + parseInt(-x / 6) + 'px, center top');


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

    $('.nav-lineups li.load').on('click', function(evt) {
        var stage = $(this).attr('data-id');
        $('#lineups .content .container .row').html('');
        $('#navLineups li').not(this).removeClass('active');
        $(this).addClass('active');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "GET",
            url: "/lineups/" + stage,
            token: '{{ csrf_token() }}',
            dataType: 'JSON',
            success: function(results) {
                if (results === 'empty') {
                    $('#lineups .content .container .row').html('<div class="col-12 d-flex justify-content-center"><h4 class="red align-self-center box-schedule">Coming Soon !</h4></div>');
                }else{
                    $('#lineups .content .container .row').html(results);
                    $.each(results['data'], function(key, value) {
                        $('#lineups .content .container .row').append(' <a href="/artist-detail/' + value.slug + '" class="col-6 col-sm-6 col-md-4 fullheight x-45 item-boxgrid fadeIn animated"> <div class="bgimg small-padds border-grey p-2" style="background-image: url(../uploads/' + string_replace(value.image, '.', '-medium.')  + ')" > <div class="overlay soft"> <div class="centeralign"> <div class="centeralign-bottom"> <h3 class="title-lineup p-3">' + value.name + '</h3> </div></div></div></div></a>');
                    });
                }
            },
            error: function(results) {
                var errors = results.responseJSON;
                console.log(errors);

            }

        });
    });

    $('#artSche li').on('click', function(evt) {
        $('#schedule-container').html('');
        var id = $(this).attr('data-id');
        var el = document.querySelector('#days-schedule li.active');
        var date = $('#days-schedule li[data-id="day-1"]');
        $('#artSche li').not(this).removeClass('active');
        $(this).addClass('active');
        $(date).addClass('active');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
        });
        $.ajax({
            type: "GET",
            url: "/schedule/" + id,
            token: '{{ csrf_token() }}',
            dataType: 'JSON',
            success: function(results) {
                if (results === 'empty') {
                    $('#schedule-container').html('<div class="col-sm-12 col-md-8 d-flex justify-content-center no-data"><h4 class="red align-self-center box-schedule">Data Schedule, Coming Soon !</h4></div>');
                } else {
                    $('#schedule-container').html(results);
                    var outString = '';

                    $.each(results, function(key, value) {
                        outString += '<li class="col-12 col-sm-12 col-md-12 item-schedule"><div class="row no-gutters box-schedule">';
                        outString += '<div class="col-4 col-sm-4 col-md-2"><span class="red">' + new Date(key).toLocaleString('en-us', { weekday: 'long' }).toUpperCase() + ', </span><br /><span class="font-color-grey">' + new Date(key).toLocaleString('en-us', { day: 'numeric' }).toUpperCase() + '</span><span class="font-color-grey"> ' + new Date(key).toLocaleString('en-us', { month: 'short' }).toUpperCase() + '</span></div>';
                        outString += '<div class="col-8 col-sm-8 col-md-10">';
                        $.each(value, function(key1, value1) {
                            outString += '<div class="col-12"><div class="main-title"> <h3> <a id="' + value1.slug + '" href="/artist-detail/' + value1.slug + '">' + value1.name + '</h3></a><p class="font-color-grey">' + value1.timeperform.replace(/(:\d{2}| [AP]M)$/, "") + '</p></div></div>';
                        });
                        outString += '</div>';
                        outString += '</div></li>';

                    });

                    $('#schedule-container').append(outString);
                }

            },
            error: function(results) {
                var errors = results.responseJSON;
                console.log(errors);
            }

        });
    });


    $(window).scroll(function(e) {
        var x = $(this).scrollTop();
        $('.parallax').css('background-position', '0 ' + parseInt(-x / 4) + 'px' + ', 0% ' + parseInt(-x / 6) + 'px, center top');
    });

    $('.js-cookie-consent-agree').on('click', function() {
        $('.js-cookie-consent').hide();
    });

    videoLike();

    lineupsGet();

    artScheduleGet();
});

function videoLike() {
    var getVid = document.getElementById("videoTeaserHomepage");
    if (getVid) {
        var player = videojs('videoTeaserHomepage');
        var myButton = player.controlBar.addChild("button");
        var myButtonDom = myButton.el();
        myButton.setAttribute("id", "likeContent");
        myButtonDom.innerHTML = "<span aria-hidden='true' class='vjs-icon-placeholder'></span></span><img style='height: 18px; width: 18px; margin: 0.5em;' src='./uploads/images/icon/like.png'><span class='vjs-control-text' aria-live='polite'>Like This</span>";
    }
}

function artScheduleGet() {
    var getSche = document.getElementById("schedule");
    var scheId = document.getElementById('artSche');
    var el = document.querySelector('#artSche li.active');
    var idDate = 'day-1';
    if (getSche) {
        kane = $(el).attr('data-id');
        var xx2 = setTimeout(function() {
            $.ajax({
                type: "GET",
                url: "/schedule/" + kane,
                token: '{{ csrf_token() }}',
                dataType: 'JSON',
                success: function(results) {
                    if (results == 'empty') {
                        $('#schedule-container').html('<div class="col-8 d-flex justify-content-center"><h4 class="red align-self-center box-schedule">Data Schedule, Coming Soon !</h4></div>');

                    }
                    $('#schedule-container').html(results);
                    var outString = '';
                    $.each(results, function(key, value) {
                        outString += '<li class="col-12 col-sm-12 col-md-12 item-schedule"><div class="row no-gutters box-schedule">';
                        outString += '<div class="col-4 col-sm-4 col-md-2"><span class="red">' + new Date(key).toLocaleString('en-us', { weekday: 'long' }).toUpperCase() + ', </span><br /><span class="font-color-grey">' + new Date(key).toLocaleString('en-us', { day: 'numeric' }).toUpperCase() + '</span><span class="font-color-grey"> ' + new Date(key).toLocaleString('en-us', { month: 'short' }).toUpperCase() + '</span></div>';
                        outString += '<div class="col-8 col-sm-8 col-md-10">';
                        $.each(value, function(key1, value1) {
                            outString += '<div class="col-12"><div class="main-title"> <h3> <a id="' + value1.slug + '" href="/artist-detail/' + value1.slug + '">' + value1.name + '</h3></a><p class="font-color-grey">' + value1.timeperform.replace(/(:\d{2}| [AP]M)$/, "") + '</p></div></div>';
                        });
                        outString += '</div>';
                        outString += '</div></li>';

                    });

                    $('#schedule-container').append(outString);

                },
                error: function(results) {
                    var errors = results.responseJSON;
                    console.log(errors);
                }
            });
            clearTimeout(xx2);
        }, 50);
    } else {

    }
}


function lineupsGet() {
    var getLineups = document.getElementById("lineups");
    var navId = document.getElementById('navLineups');
    var el = document.querySelector('#navLineups li.active');
    if (getLineups) {
        stage = $(el).attr('data-id');
        $('#lineups .content').addClass('active');
        var xx2 = setTimeout(function() {
            $.ajax({
                type: "GET",
                url: "/lineups/" + stage,
                token: '{{ csrf_token() }}',
                dataType: 'JSON',
                success: function(results) {
                    if (results === 'empty') {
                        $('#lineups .content .container .row ').html('<div class="col-8 d-flex justify-content-center"><h4 class="red align-self-center box-schedule">Coming Soon.</h4></div>');
                    }
                    $('#lineups .content .container .row').html(results);
                    $.each(results['data'], function(key, value) {
                        $('#lineups .content .container .row ').append(' <a href="/artist-detail/' + value.slug + '" class="col-6 col-sm-6 col-md-4 fullheight x-45 item-boxgrid fadeIn animated"> <div class="bgimg small-padds border-grey p-2 lazy" style="background-image: url(../uploads/' + string_replace(value.image, '.', '-medium.') + ')" > <div class="overlay soft"> <div class="centeralign"> <div class="centeralign-bottom"> <h3 class="title-lineup p-3">' + value.name + '</h3> </div></div></div></div></a>');
                    });
                },
                error: function(results) {
                    var errors = results.responseJSON;
                    console.log(errors);

                }

            });
            clearTimeout(xx2);
        }, 50);
    } else {

    }
}

function logElementEvent(eventName, element) {
    console.log(
        Date.now(),
        eventName,
        element.getAttribute("data-src")
    );
}

document.addEventListener("DOMContentLoaded", function() {
    window.lazyLoadOptions = {
        elements_selector: ".lazy",
        load_delay: 300,
        threshold: 0
    };
    window.addEventListener('LazyLoad::Initialized', function(event) {
        window.lazyLoadInstance = event.detail.instance;
    }, false);

});

function string_replace(hay, find, sub) {
    return hay.split(find).join(sub);
}

function getMaxFromKeys(json) {
    var m;
    for (var i in json) {
        if (json.hasOwnProperty(i)) {
           m = (typeof m == 'undefined' || i > m) ? i : m;
        }
    }
    return m;
}
