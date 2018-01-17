jQuery(document).ready(function($) {
    'use strict';

	function autoHeightMenuItem(){
		if($('.header .header-row').length > 0 && $('.TMWalkerMenu').length > 0) {
			var $main_menu = $('#site-navigation .primary-menu > ul > li > a');
			var $header_h = $('.header .header-row').height();
			$main_menu.css( 'height', ($header_h + 1) + 'px' );
		}
	}
	autoHeightMenuItem();

    /* ==========================================================================
     MOBILE MENU / SIDEMENU
     ========================================================================== */
    if ($('#open-left').length > 0) {
        var slideout = new Slideout({
            'panel': document.getElementById('page'),
            'menu': document.getElementById('menu-slideout'),
            'padding': 256,
            'tolerance': 70,
            'touch': false,
        });
    }
    if ($('#open-right').length > 0) {
        var sidemenu = new Slideout({
            'panel': document.getElementById('page'),
            'menu': document.getElementById('menu-sidemenu'),
            'side': 'right',
            'padding': 350,
            'tolerance': 70,
            'touch': false,
        });
    }

    // Toggle button
    if ($('#open-left').length > 0) {
        document.querySelector('#open-left').addEventListener('click', function() {
            slideout.toggle();
        });
        $('#page').on('click', function(e) {
            if ($(e.target).closest('#open-left').length === 0) {
                if (slideout._opened) {
                    e.preventDefault();
                }
                slideout.close();
            }
        });
    }
    // Toggle button
    if ($('#open-right').length > 0) {
        document.querySelector('#open-right').addEventListener('click', function() {
            sidemenu.toggle();
        });
    }

    $('#close-sidemenu').on('click', function(e) {
        sidemenu.close();
    });

    $('.video-gallery').lightGallery();

    // Menu mobile
    var $menu = $('.mobile-menu');

    $menu.find('.sub-menu-toggle').on('click', function(e) {
        var subMenu = $(this).next();

        if (subMenu.css('display') == 'block') {
            subMenu.css('display', 'block').slideUp().parent().removeClass('expand');
        } else {
            subMenu.css('display', 'none').slideDown().parent().addClass('expand');
        }
        e.stopPropagation();
    });

    // mini-cart
    var $mini_cart = $('.mini-cart');
    $mini_cart.on('click', function(e) {
        $(this).addClass('open');
    });

	$(".sticky-header").headroom(
		{
			offset: 0,
			onNotTop : function() {
				var $header = $('#logo img');
				$header.attr("src", $header.data('sticky') );
				setTimeout(autoHeightMenuItem, 250);
			},
			onTop : function() {
				var $header = $('#logo img');
				$header.attr("src", $header.data('origin') );
				setTimeout(autoHeightMenuItem, 250);
			},
		}
	);

    // init Isotope
    var $grid = $('.grid-masonry').isotope({
        itemSelector: '.grid-item',
        percentPosition: true,
    }).imagesLoaded().progress(function() {
        $grid.isotope('layout');
    });

    // Masonry
    var $masonry = $('.blog-grid-masonry').isotope({
        itemSelector: '.post',
        percentPosition: true,
    }).imagesLoaded().progress(function() {
        $masonry.isotope('layout');
    });

    $(document).on('click', function(e) {
        if ($(e.target).closest($mini_cart).length === 0) {
            $mini_cart.removeClass('open');
        }
    });

    // search in menu
    var $search_btn = $('.search-box > i'),
        $search_form = $('form.search-form');

    $search_btn.on('click', function() {
        $search_form.toggleClass('open');
    });

    $(document).on('click', function(e) {
        if ($(e.target).closest($search_btn).length == 0 && $(e.target).closest('input.search-field').length == 0 && $search_form.hasClass('open')) {
            $search_form.removeClass('open');
        }
    });

    // footer parallax
    $(window).on('load', function() {
        var $footer_parallax = $('.footer-parallax');
        if ($footer_parallax.length > 0) {
            $('.site-content').css('margin-bottom', $footer_parallax.outerHeight() + 'px');
        }
    });

    var $tabs = $('.tabs-container');
    $tabs.find('li a').on('click', function() {
        var $id_tab = $(this).attr('href');
        $(this).closest('.tabs-container').find('.tab-pane').removeClass('active');
        $(this).closest('.tabs-container').find($id_tab).addClass('active');
        $(this).closest('.nav-tabs').find('li').removeClass('active');
        $(this).closest('li').addClass('active');
        return false;
    });

    var $amazing_search = $('.show-amazing-search');
    $amazing_search.on('click', function() {
        $('.amazing-search-box').slideToggle(300);
        $('.amazing-search-box').find('input[type="search"]').focus();
    });

    //var navigation = $('.okayNav').okayNav();
    var selectors = $('div[data-seperator=true]');
    //var parents = selector.prev();
    $.each(selectors, function(index, value) {
        var parent = $(value).prev().prev();
        ult_vc_seperators($(value), parent);
    });

    var selectors_cl = $('div[data-tm-column=true]');
    $.each(selectors_cl, function(index, value) {
        var parent = $(value).prev();
        tm_vc_shortcode($(value), parent);
    });

    // Message shortcode
    $('*[data-dismiss=message]').on('click', function() {
        $(this).closest('.message').fadeOut();
    });

    // Counter
    $('[data-counter]').each(function() {
        var el = document.getElementById($(this).attr('id'));
        var v = $(this).data('counter');
        var o = new Odometer({
            el: this,
            value: 0,
            format: $(this).data('format'),
        });
        o.render();
        var waypoint = new Waypoint({
            element: el,
            handler: function() {
                o.update(v);
            },
            duration: 0,
            offset: "100%",
            animation: 'count'
        });
    });

	// Counter
    $('[data-progress-width]').each(function($index) {
		var $this = $(this);
		var time = 1 + ($index / 2);
		var css = '-webkit-transition: all '+time+'s cubic-bezier(0.645, 0.045, 0.355, 1);transition: all '+time+'s cubic-bezier(0.645, 0.045, 0.355, 1)';
		var el = document.getElementById($(this).attr('id'));
		var waypoint = new Waypoint({
            element: el,
            handler: function() {
                $this.attr('style', css).css({width: $this.data('progress-width') + '%' });
            },
            duration: 0,
            offset: "100%",
            animation: 'count'
        });

    });

    // Portfolio
    var $folioGrid = $('.folio-main-grid');
    $folioGrid.isotope({
        itemSelector: '.folio-main-item',
        transitionDuration: '0.8s'
    }).imagesLoaded().progress(function() {
        $folioGrid.isotope('layout');
    });
    // Portfolio masonry
    var $folioMasonry = $('.folio-main-masonry');
    $folioMasonry.isotope({
        layoutMode: "masonry",
        masonry: {
            columnWidth: '.folio-main-item_sizer'
        },
        itemSelector: '.folio-main-item',
        transitionDuration: '0.8s'
    }).imagesLoaded().progress(function() {
        $folioMasonry.isotope('layout');
    });

    // Filter
    var $optionSets = $('.folio-main-filter'),
        $optionLinks = $optionSets.find('a');
    $optionLinks.click(function() {
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('active')) {
            return false;
        }
        var $optionSet = $this.parents('.folio-main-filter');
        $optionSet.find('.active').removeClass('active');
        $this.addClass('active');
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        // parse 'false' as false boolean
        value = value === 'false' ? false : value;
        options[key] = value;
        if (key === 'layoutMode' && typeof changeLayoutMode === 'function') {
            changeLayoutMode($this, options);
        } else {
            // otherwise, apply new options
            if ($this.hasClass("filter-masonry")) {
                $this.closest('.folio-main-filter').next('.folio-main-masonry').isotope(options);
            } else {
                $this.closest('.folio-main-filter').next('.folio-main-grid').isotope(options);
            }
        }
        return false;
    });

    // Slider filter
    var $optionSetsPf = $('.folio-filter'),
        $optionLinksPf = $optionSetsPf.find('a');
    $optionLinksPf.click(function() {
        var $this = $(this);
        // don't proceed if already selected
        if ($this.hasClass('active')) {
            return false;
        }
        var $optionSet = $this.parents('.folio-filter');
        $optionSet.find('.active').removeClass('active');
        $this.addClass('active');
        // make option object dynamically, i.e. { filter: '.my-filter-class' }
        var options = {},
            key = $optionSet.attr('data-option-key'),
            value = $this.attr('data-option-value');

        // parse 'false' as false boolean
        value = value === 'false' ? false : value;

        $(this).closest('.portfolio-slider').find('.awesome-slider').slick('slickFilter', value);

        return false;
    });

    // Gallery
    $('.lightgallery, .folio-gallery, .post-gallery.masonry').lightGallery({
        thumbnail: false
    });

    $('.awesome-slider').slick({
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        }, {
            breakpoint: 800,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        }, {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }]
    });
	$('.slick-single-item').slick(
		{
			vertical: true,
			verticalSwiping: true,
			infinite: false,
		}
	);
	$('.slick-single-item .slick-slide').css({maxHeight: $(window).outerHeight()});

	// Scroll
    var $window = $(window);
    // Scroll up
    var $scrollup = $('.scrollup');

    $window.scroll(function() {
        if ($window.scrollTop() > 100) {
            $scrollup.addClass('show');
        } else {
            $scrollup.removeClass('show');
        }
    });

    $scrollup.on('click', function(evt) {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        evt.preventDefault();
    });

    /* Product Slider */
    var $imageProduct = $("#imageProduct");
    $imageProduct.lightSlider({
        addClass: 'imageProduct',
        gallery: true,
        item: 1,
        loop: true,
        thumbItem: 7,
        slideMargin: 0,
        enableDrag: false,
        currentPagerPosition: 'left',
        onSliderLoad: function(el) {
            el.lightGallery({
                selector: '#imageProduct .lslide'
            });
        }
    });

	if(jQuery().WOW) {
	    var wow = new WOW(
	        {
	            boxClass: 'wow',      // animated element css class (default is wow)
	            animateClass: 'animated', // animation css class (default is animated)
	            offset: 250,          // distance to the element when triggering the animation (default is 0)
	            mobile: true,       // trigger animations on mobile devices (default is true)
	            live: true,       // act on asynchronously loaded content (default is true)
	            callback: function (box) {
	                // the callback is fired every time an animation is started
	                // the argument that is passed in is the DOM node being animated
	            },
	            scrollContainer: null // optional scroll container selector, otherwise use window
	        }
	    );
	    wow.init();
	}
});

/* function for seperators */
function ult_vc_seperators(selector, parent) {
    /* seperators */
    var bg = selector.data('bg-img'); // dep in vc v4.1
    var bg_rep = selector.data('bg-img-repeat');
    var bg_size = selector.data('bg-img-size');
    var bg_cstm_size = selector.data('bg-img-cstm-size');
    var bg_pos = selector.data('bg-img-position');
    var bg_attach = selector.data('bg-img-attach');
    var bg_color = selector.data('bg-color');
    var bg_grad = selector.data('bg-grad');

    var overlay = selector.data('overlay');
    var overlay_style = selector.data('overlay-style');
    var overlay_color = selector.data('overlay-color');
    var overlay_grad = selector.data('overlay-grad');
    var overlay_opacity = selector.data('overlay-opacity');
    var overlay_pattern = selector.data('overlay-pattern');

    var seperator = selector.data('seperator');
    var seperator_type = selector.data('seperator-type');
    var seperator_shape_size = selector.data('seperator-shape-size');
    var seperator_background_color = selector.data('seperator-background-color');
    var seperator_border = selector.data('seperator-border');
    var seperator_border_color = selector.data('seperator-border-color');
    var seperator_border_width = selector.data('seperator-border-width');
    var seperator_svg_height = selector.data('seperator-svg-height');
    var seperator_svg_bottom = selector.data('seperator-bottom');
    var seperator_full_width = selector.data('seperator-full-width');
    var seperator_position = selector.data('seperator-position');
    if (typeof seperator_position == 'undefined' || seperator_position === '')
        seperator_position = 'top_seperator';

    var icon = selector.data('icon');

    if (typeof icon == 'undefined')
        icon = '';
    else
        icon = '<div class="separator-icon">' + icon + '</div>';

    var seperator_css_main = seperator_class = seperator_border_css = seperator_border_line_css = seperator_css = '';
    if (typeof seperator != 'undefined' && seperator.toString() == 'true') {
        var css = shape_css = svg = inner_html = seperator_css = '';
        var is_svg = false;

        var uniqid = Math.floor(Math.random() * 9999999999999);
        var uniqclass = 'uvc-seperator-' + uniqid;

        if (typeof seperator_shape_size == 'undefined' || seperator_shape_size === '' || seperator_shape_size === 'undefined')
            seperator_shape_size = 0;

        seperator_shape_size = parseInt(seperator_shape_size);
        var half_shape = seperator_shape_size / 2;
        var half_border = 0;

        if (seperator_type == 'triangle_seperator')
            seperator_class = 'ult-trinalge-seperator';
        else if (seperator_type == 'circle_seperator')
            seperator_class = 'ult-circle-seperator';
        else if (seperator_type == 'diagonal_seperator')
            seperator_class = 'ult-double-diagonal';
        else if (seperator_type == 'triangle_svg_seperator') {
            seperator_class = 'ult-svg-triangle';
            svg = '<svg class="uvc-svg-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 0.156661 0.1"><polygon points="0.156661,3.93701e-006 0.156661,0.000429134 0.117665,0.05 0.0783307,0.0999961 0.0389961,0.05 -0,0.000429134 -0,3.93701e-006 0.0783307,3.93701e-006 "/></svg>';
            is_svg = true;
        } else if (seperator_type == 'circle_svg_seperator') {
            seperator_class = 'ult-svg-circle';
            svg = '<svg class="uvc-svg-circle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 0.2 0.1"><path d="M0.200004 0c-3.93701e-006,0.0552205 -0.0447795,0.1 -0.100004,0.1 -0.0552126,0 -0.0999921,-0.0447795 -0.1,-0.1l0.200004 0z"/></svg>';
            is_svg = true;
        } else if (seperator_type == 'xlarge_triangle_seperator') {
            seperator_class = 'ult-xlarge-triangle';
            svg = '<svg class="uvc-x-large-triangle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none"><path class="fil0" d="M-0 0.333331l4.66666 0 0 -3.93701e-006 -2.33333 0 -2.33333 0 0 3.93701e-006zm0 -0.333331l4.66666 0 0 0.166661 -4.66666 0 0 -0.166661zm4.66666 0.332618l0 -0.165953 -4.66666 0 0 0.165953 1.16162 -0.0826181 1.17171 -0.0833228 1.17171 0.0833228 1.16162 0.0826181z"/></svg>';
            is_svg = true;
        } else if (seperator_type == 'xlarge_triangle_left_seperator') {
            seperator_class = 'ult-xlarge-triangle-left';
            svg = '<svg class="uvc-x-large-triangle-left" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 2000 90" preserveAspectRatio="none"><polygon xmlns="http://www.w3.org/2000/svg" points="535.084,64.886 0,0 0,90 2000,90 2000,0 "></polygon></svg>';
            is_svg = true;
        } else if (seperator_type == 'xlarge_triangle_right_seperator') {
            seperator_class = 'ult-xlarge-triangle-right';
            svg = '<svg class="uvc-x-large-triangle-right" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 2000 90" preserveAspectRatio="none"><polygon xmlns="http://www.w3.org/2000/svg" points="535.084,64.886 0,0 0,90 2000,90 2000,0 "></polygon></svg>';
            is_svg = true;
        } else if (seperator_type == 'xlarge_circle_seperator') {
            seperator_class = 'ult-xlarge-circle';
            svg = '<svg class="uvc-x-large-circle" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none"><path class="fil1" d="M4.66666 0l0 7.87402e-006 -3.93701e-006 0c0,0.0920315 -1.04489,0.166665 -2.33333,0.166665 -1.28844,0 -2.33333,-0.0746339 -2.33333,-0.166665l-3.93701e-006 0 0 -7.87402e-006 4.66666 0z"/></svg>';
            is_svg = true;
        } else if (seperator_type == 'curve_up_seperator') {
            seperator_class = 'ult-curve-up-seperator';
            svg = '<svg class="curve-up-inner-seperator uvc-curve-up-seperator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none"><path class="fil0" d="M-7.87402e-006 0.0148858l0.00234646 0c0.052689,0.0154094 0.554437,0.154539 1.51807,0.166524l0.267925 0c0.0227165,-0.00026378 0.0456102,-0.000582677 0.0687992,-0.001 1.1559,-0.0208465 2.34191,-0.147224 2.79148,-0.165524l0.0180591 0 0 0.166661 -7.87402e-006 0 0 0.151783 -4.66666 0 0 -0.151783 -7.87402e-006 0 0 -0.166661z"/></svg>';
            is_svg = true;
        } else if (seperator_type == 'curve_down_seperator') {
            seperator_class = 'ult-curve-down-seperator';
            svg = '<svg class="curve-down-inner-seperator uvc-curve-down-seperator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 4.66666 0.333331" preserveAspectRatio="none"><path class="fil0" d="M-7.87402e-006 0.0148858l0.00234646 0c0.052689,0.0154094 0.554437,0.154539 1.51807,0.166524l0.267925 0c0.0227165,-0.00026378 0.0456102,-0.000582677 0.0687992,-0.001 1.1559,-0.0208465 2.34191,-0.147224 2.79148,-0.165524l0.0180591 0 0 0.166661 -7.87402e-006 0 0 0.151783 -4.66666 0 0 -0.151783 -7.87402e-006 0 0 -0.166661z"/></svg>';
            is_svg = true;
        } else if (seperator_type == 'tilt_left_seperator') {
            seperator_class = 'ult-tilt-left-seperator';
            svg = '<svg class="uvc-tilt-left-seperator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 4 0.266661" preserveAspectRatio="none"><polygon class="fil0" points="4,0 4,0.266661 -0,0.266661 "/></svg>';
            is_svg = true;
        } else if (seperator_type == 'tilt_right_seperator') {
            seperator_class = 'ult-tilt-right-seperator';
            svg = '<svg class="uvc-tilt-right-seperator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 4 0.266661" preserveAspectRatio="none"><polygon class="fil0" points="4,0 4,0.266661 -0,0.266661 "/></svg>';
            is_svg = true;
        } else if (seperator_type == 'waves_seperator') {
            seperator_class = 'ult-wave-seperator';
            svg = '<svg class="wave-inner-seperator uvc-wave-seperator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 6 0.1" preserveAspectRatio="none"><path d="M0.199945 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c-0.0541102,0 -0.0981929,-0.0430079 -0.0999409,-0.0967008l0 0.0967008 0.0999409 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm0.200004 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm0.200004 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm0.200004 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm0.200004 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm2.00004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm-0.1 0.1l-0.200008 0c-0.0552126,0 -0.0999921,-0.0447795 -0.1,-0.1 -7.87402e-006,0.0552205 -0.0447874,0.1 -0.1,0.1l0.2 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1 3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1zm-0.400008 0l-0.200008 0c-0.0552126,0 -0.0999921,-0.0447795 -0.1,-0.1 -7.87402e-006,0.0552205 -0.0447874,0.1 -0.1,0.1l0.2 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1 3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1zm-0.400008 0l-0.200008 0c-0.0552126,0 -0.0999921,-0.0447795 -0.1,-0.1 -7.87402e-006,0.0552205 -0.0447874,0.1 -0.1,0.1l0.2 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1 3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1zm-0.400008 0l-0.200008 0c-0.0552126,0 -0.0999921,-0.0447795 -0.1,-0.1 -7.87402e-006,0.0552205 -0.0447874,0.1 -0.1,0.1l0.2 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1 3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1zm-0.400008 0l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1 3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1zm1.90004 -0.1c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm0.200004 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm0.200004 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm0.200004 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.200004 0c7.87402e-006,0.0552205 0.0447874,0.1 0.1,0.1l-0.2 0c0.0552126,0 0.0999921,-0.0447795 0.1,-0.1zm0.200004 0c3.93701e-006,0.0552205 0.0447795,0.1 0.100004,0.1l-0.200008 0c0.0552244,0 0.1,-0.0447795 0.100004,-0.1zm0.199945 0.00329921l0 0.0967008 -0.0999409 0c0.0541102,0 0.0981929,-0.0430079 0.0999409,-0.0967008z"/></svg>';
            is_svg = true;
        } else if (seperator_type == 'clouds_seperator') {
            seperator_class = 'ult-cloud-seperator';
            svg = '<svg class="cloud-inner-seperator uvc-cloud-seperator" xmlns="http://www.w3.org/2000/svg" version="1.1" fill="' + seperator_background_color + '" width="100%" height="' + seperator_svg_height + '" viewBox="0 0 2.23333 0.1" preserveAspectRatio="none"><path class="fil0" d="M2.23281 0.0372047c0,0 -0.0261929,-0.000389764 -0.0423307,-0.00584252 0,0 -0.0356181,0.0278268 -0.0865354,0.0212205 0,0 -0.0347835,-0.00524803 -0.0579094,-0.0283701 0,0 -0.0334252,0.0112677 -0.0773425,-0.00116929 0,0 -0.0590787,0.0524724 -0.141472,0.000779528 0,0 -0.0288189,0.0189291 -0.0762362,0.0111535 -0.00458268,0.0141024 -0.0150945,0.040122 -0.0656811,0.0432598 -0.0505866,0.0031378 -0.076126,-0.0226614 -0.0808425,-0.0308228 -0.00806299,0.000854331 -0.0819961,0.0186969 -0.111488,-0.022815 -0.0076378,0.0114843 -0.059185,0.0252598 -0.083563,-0.000385827 -0.0295945,0.0508661 -0.111996,0.0664843 -0.153752,0.019 -0.0179843,0.00227559 -0.0571181,0.00573622 -0.0732795,-0.0152953 -0.027748,0.0419646 -0.110602,0.0366654 -0.138701,0.00688189 0,0 -0.0771732,0.0395709 -0.116598,-0.0147677 0,0 -0.0497598,0.02 -0.0773346,-0.00166929 0,0 -0.0479646,0.0302756 -0.0998937,0.00944094 0,0 -0.0252638,0.0107874 -0.0839488,0.00884646 0,0 -0.046252,0.000775591 -0.0734567,-0.0237087 0,0 -0.046252,0.0101024 -0.0769567,-0.00116929 0,0 -0.0450827,0.0314843 -0.118543,0.0108858 0,0 -0.0715118,0.0609803 -0.144579,0.00423228 0,0 -0.0385787,0.00770079 -0.0646299,0.000102362 0,0 -0.0387559,0.0432205 -0.125039,0.0206811 0,0 -0.0324409,0.0181024 -0.0621457,0.0111063l-3.93701e-005 0.0412205 2.2323 0 0 -0.0627953z"/></svg>';
            is_svg = true;
        } else if (seperator_type == 'multi_triangle_seperator') {
            seperator_class = 'ult-multi-trianle';
            var rgb = ultHexToRgb(seperator_background_color);
            svg = '<svg class="uvc-multi-triangle-svg" xmlns="http://www.w3.org/2000/svg" version="1.1" viewBox="0 0 100 100" preserveAspectRatio="none" width="100%" height="' + seperator_svg_height + '">\
				            <path class="large left" d="M0 0 L50 50 L0 100" fill="rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ', .1)"></path>\
				            <path class="large right" d="M100 0 L50 50 L100 100" fill="rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ', .1)"></path>\
				            <path class="medium left" d="M0 100 L50 50 L0 33.3" fill="rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ', .3)"></path>\
				            <path class="medium right" d="M100 100 L50 50 L100 33.3" fill="rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ', .3)"></path>\
				            <path class="small left" d="M0 100 L50 50 L0 66.6" fill="rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ', .5)"></path>\
				            <path class="small right" d="M100 100 L50 50 L100 66.6" fill="rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ', .5)"></path>\
				            <path d="M0 99.9 L50 49.9 L100 99.9 L0 99.9" fill="rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ', 1)"></path>\
				            <path d="M48 52 L50 49 L52 52 L48 52" fill="rgba(' + rgb.r + ',' + rgb.g + ',' + rgb.b + ', 1)"></path>\
				        </svg>';
            is_svg = true;
        } else if (seperator_type == 'round_split_seperator') {
            var temp_css = temp_border_before = temp_border_after = temp_border_line = '';
            temp_padding = 0;
            seperator_class = 'ult-rounded-split-seperator-wrapper';
            var row_height = jQuery(selector).outerHeight();

            if (seperator_shape_size != 0) {
                var prev_padding = parseInt(jQuery(selector).css('padding-bottom'));
                jQuery(selector).css({
                    'padding-bottom': seperator_shape_size + 'px'
                });
                if (prev_padding == 0)
                    temp_padding = seperator_shape_size;
            }
            if (seperator_position == 'top_seperator') {
                var eclass = 'top-split-seperator';
                var etop = '0px';
                var ebottom = 'auto';
                var border_radius_before = 'border-radius: 0 0 ' + seperator_shape_size + 'px 0 !important;';
                var border_radius_after = 'border-radius: 0 0 0 ' + seperator_shape_size + 'px !important;';
            } else if (seperator_position == 'bottom_seperator') {
                var eclass = 'bottom-split-seperator';
                var etop = 'auto';
                var ebottom = '0px';
                var border_radius_before = 'border-radius: 0 ' + seperator_shape_size + 'px 0 0 !important;';
                var border_radius_after = 'border-radius: ' + seperator_shape_size + 'px 0 0 0 !important;';
            } else {
                var eclass = 'top-bottom-split-seperator';
                var etop_top = '0px';
                var ebottom_top = 'auto';
                var etop_bottom = 'auto';
                var ebottom_bottom = '0px';
                var border_radius_before_top = 'border-radius: 0 0 ' + seperator_shape_size + 'px 0 !important;';
                var border_radius_after_top = 'border-radius: 0 0 0 ' + seperator_shape_size + 'px !important;';
                var border_radius_before_bottom = 'border-radius: 0 ' + seperator_shape_size + 'px 0 0 !important;';
                var border_radius_after_bottom = 'border-radius: ' + seperator_shape_size + 'px 0 0 0 !important;';
            }
            inner_html = '<div class="ult-rounded-split-seperator ' + eclass + '"></div>';

            if (seperator_border != 'none') {
                temp_border_line = seperator_border_width + 'px ' + seperator_border + ' ' + seperator_border_color;
                temp_border_before = 'border-top: ' + temp_border_line + '; border-right: ' + temp_border_line + ';';
                temp_border_after = 'border-top: ' + temp_border_line + '; border-left: ' + temp_border_line + ';';
            }

            if (seperator_position == 'top_seperator' || seperator_position == 'bottom_seperator') {
                temp_css = '<style>.' + uniqclass + ' .ult-rounded-split-seperator.' + eclass + ':before { background-color:' + seperator_background_color + '; height:' + seperator_shape_size + 'px !important; top:' + etop + '; bottom:' + ebottom + '; ' + temp_border_before + ' ' + border_radius_before + ' } .' + uniqclass + ' .ult-rounded-split-seperator.' + eclass + ':after { background-color:' + seperator_background_color + '; left: 50%; height:' + seperator_shape_size + 'px !important; top:' + etop + '; bottom:' + ebottom + '; ' + temp_border_after + ' ' + border_radius_after + ' }</style>';
                jQuery('head').append(temp_css);
            } else {
                temp_css = '<style>.' + uniqclass + '.top_seperator .ult-rounded-split-seperator:before { background-color:' + seperator_background_color + '; height:' + seperator_shape_size + 'px !important; top:' + etop_top + '; bottom:' + ebottom_top + '; ' + temp_border_before + ' ' + border_radius_before_top + ' } .' + uniqclass + '.top_seperator .ult-rounded-split-seperator:after { background-color:' + seperator_background_color + '; left: 50%; height:' + seperator_shape_size + 'px !important; top:' + etop_top + '; bottom:' + ebottom_top + '; ' + temp_border_after + ' ' + border_radius_after_top + ' }</style>';
                temp_css_bottom = '<style>.' + uniqclass + '.bottom_seperator .ult-rounded-split-seperator:before { background-color:' + seperator_background_color + '; height:' + seperator_shape_size + 'px !important; top:' + etop_bottom + '; bottom:' + ebottom_bottom + '; ' + temp_border_before + ' ' + border_radius_before_bottom + ' } .' + uniqclass + '.bottom_seperator .ult-rounded-split-seperator:after { background-color:' + seperator_background_color + '; left: 50%; height:' + seperator_shape_size + 'px !important; top:' + etop_bottom + '; bottom:' + ebottom_bottom + '; ' + temp_border_after + ' ' + border_radius_after_bottom + ' }</style>';
                jQuery('head').append(temp_css + temp_css_bottom);
            }
        } else
            seperator_class = 'ult-no-shape-seperator';

        if (typeof seperator_border_width != 'undefined' && seperator_border_width != '' && seperator_border_width != 0) {
            half_border = parseInt(seperator_border_width);
        }
        shape_css = 'content: "";width:' + seperator_shape_size + 'px; height:' + seperator_shape_size + 'px; bottom: -' + (half_shape + half_border) + 'px;';

        if (seperator_background_color != '')
            shape_css += 'background-color:' + seperator_background_color + ';';

        if (seperator_border != 'none' && seperator_class != 'ult-rounded-split-seperator-wrapper' && is_svg == false) {
            seperator_border_line_css = seperator_border_width + 'px ' + seperator_border + ' ' + seperator_border_color;
            shape_css += 'border-bottom:' + seperator_border_line_css + '; border-right:' + seperator_border_line_css + ';';
            seperator_css += 'border-bottom:' + seperator_border_line_css + ';';
            seperator_css_main = 'bottom:' + seperator_border_width + 'px !important';
        }

        if (seperator_class != 'ult-no-shape-seperator' && seperator_class != 'ult-rounded-split-seperator-wrapper' && is_svg == false) {
            var css = '<style>.' + uniqclass + ' .ult-main-seperator-inner:after { ' + shape_css + ' }</style>';
            jQuery('head').append(css);
        }

        if (is_svg == true) {
            inner_html = svg;
        }

        if (seperator_position == 'top_bottom_seperator') {
            var seperator_html = '<div class="ult-vc-seperator top_seperator ' + seperator_class + ' ' + uniqclass + '" data-full-width="' + seperator_full_width + '" data-border="' + seperator_border + '" data-border-width="' + seperator_border_width + '"><div class="ult-main-seperator-inner">' + inner_html + '</div>' + icon + '</div>';
            seperator_html += '<div class="ult-vc-seperator bottom_seperator ' + seperator_class + ' ' + uniqclass + '" data-full-width="' + seperator_full_width + '" data-border="' + seperator_border + '" data-border-width="' + seperator_border_width + '"><div class="ult-main-seperator-inner">' + inner_html + '</div>' + icon + '</div>';
        } else {
            var seperator_html = '<div class="ult-vc-seperator ' + seperator_position + ' ' + seperator_class + ' ' + uniqclass + '" data-full-width="' + seperator_full_width + '" data-border="' + seperator_border + '" data-border-width="' + seperator_border_width + '"><div class="ult-main-seperator-inner">' + inner_html + '</div>' + icon + '</div>';
        }
        parent.prepend(seperator_html);

        seperator_css = '<style>.' + uniqclass + ' .ult-main-seperator-inner { ' + seperator_css + ' }</style>';
        if (seperator_css_main != '') {
            seperator_css_main = '<style>.' + uniqclass + ' .ult-main-seperator-inner { ' + seperator_css_main + ' }</style>';
            seperator_css += seperator_css_main;
        }
        if (icon != '') {
            var t = seperator_svg_height / 2;
            if (seperator_type == 'none_seperator' || seperator_type == 'circle_svg_seperator' || seperator_type == 'triangle_svg_seperator')
                seperator_css += '<style>.' + uniqclass + ' .separator-icon { -webkit-transform: translate(-50%, -50%); -moz-transform: translate(-50%, -50%); -ms-transform: translate(-50%, -50%); -o-transform: translate(-50%, -50%); transform: translate(-50%, -50%); }</style>';
            else {
                seperator_css += '<style>.' + uniqclass + '.top_seperator .separator-icon { -webkit-transform: translate(-50%, calc(-50% + ' + (t) + 'px)); -moz-transform: translate(-50%, calc(-50% + ' + (t) + 'px)); -ms-transform: translate(-50%, calc(-50% + ' + (t) + 'px)); -o-transform: translate(-50%, calc(-50% + ' + (t) + 'px)); transform: translate(-50%, calc(-50% + ' + (t) + 'px)); } .' + uniqclass + '.bottom_seperator .separator-icon { -webkit-transform: translate(-50%, calc(-50% - ' + (t) + 'px)); -moz-transform: translate(-50%, calc(-50% - ' + (t) + 'px)); -ms-transform: translate(-50%, calc(-50% - ' + (t) + 'px)); -o-transform: translate(-50%, calc(-50% - ' + (t) + 'px)); transform: translate(-50%, calc(-50% - ' + (t) + 'px)); }</style>';
            }
        }
        if (is_svg == true) {
            jQuery('.' + uniqclass).find('svg').css('height', seperator_svg_height);
            jQuery('.' + uniqclass).find('svg').css('bottom', seperator_svg_bottom);
            setTimeout(function() {
                if (seperator_type == 'multi_triangle_seperator') {
                    jQuery('.ult-multi-trianle').each(function(i, mt) {
                        var svg_height = $(mt).find('svg').height();
                        if ($(mt).hasClass('top_seperator')) {
                            //$(mt).css('top',-(svg_height-1));
                        } else if ($(mt).hasClass('bottom_seperator')) {
                            $(mt).css('bottom', (svg_height - 1));
                        }
                    });
                }
            }, 300);
        }

        var bg_inlinestyle = {};
        // Image background.
        if (typeof bg != 'undefined') {
            bg_inlinestyle['background-image'] = bg;
            bg_inlinestyle['background-repeat'] = bg_rep;
            if (bg_size != 'cstm') {
                bg_inlinestyle['background-size'] = bg_size;
            } else {
                bg_inlinestyle['background-size'] = bg_cstm_size;
            }
            if (bg_pos != "") {
                bg_inlinestyle['background-position'] = bg_pos;
            }
            bg_inlinestyle['background-attachment'] = bg_attach;

        }
        if (typeof bg_color != 'undefined') {
            bg_inlinestyle['background-color'] = bg_color;
        }
        if (typeof bg_grad != 'undefined') {
            bg_inlinestyle += bg_grad;
            if (selector.prevAll('.vc_row:first').length > 0 && bg_inlinestyle != '') {
                var style = selector.prevAll('.vc_row:first').attr('style');
                selector.prevAll('.vc_row:first').attr('style', style + bg_inlinestyle);
            }
        } else {
            if (selector.prevAll('.vc_row:first').length > 0 && bg_inlinestyle != '') {
                selector.prevAll('.vc_row:first').css(bg_inlinestyle);
            }
        }

        // Overlay
        if (overlay) {
            var overlay_html = '',
                overlay_cssclass = '',
                overlay_inlinestyle = 'style="';
            if (overlay_style == 'custom_solid_color') {
                overlay_inlinestyle += 'background-color:' + overlay_color + ';';
            } else if (overlay_style == 'custom_gradient') {
                overlay_inlinestyle += 'background:' + overlay_grad + ';';
            } else {
                overlay_cssclass = ' ' + overlay_style;
            }

            if (typeof overlay_pattern != 'undefined') {
                overlay_html += '<div class="pattern_overlay" style="background-position: center;background-image:url(\'' + overlay_pattern + '\');opacity:' + overlay_opacity + '"></div>';
            }

            overlay_inlinestyle += 'opacity:' + overlay_opacity + ';';

            overlay_inlinestyle += '"';


            overlay_html += '<div class="bg_overlay' + overlay_cssclass + '" ' + overlay_inlinestyle + '>';

            overlay_html += '</div>';
            parent.prepend(overlay_html);
        }

        jQuery('head').append(seperator_css);
        jQuery(selector).remove();
    }
    /* end of seperators */
}

/* function for seperators */
function tm_vc_shortcode(selector, parent) {
    /* seperators */
    var bg = selector.data('bg-img'); // dep in vc v4.1
    var bg_rep = selector.data('bg-img-repeat');
    var bg_size = selector.data('bg-img-size');
    var bg_cstm_size = selector.data('bg-img-cstm-size');
    var bg_pos = selector.data('bg-img-position');
    var bg_attach = selector.data('bg-img-attach');
    var bg_color = selector.data('bg-color');
    var bg_grad = selector.data('bg-grad');

    var overlay = selector.data('overlay');
    var overlay_style = selector.data('overlay-style');
    var overlay_color = selector.data('overlay-color');
    var overlay_grad = selector.data('overlay-grad');
    var overlay_opacity = selector.data('overlay-opacity');
    var overlay_pattern = selector.data('overlay-pattern');

    var bg_inlinestyle = '';

    // Image background.
    if (typeof bg != 'undefined') {

        bg_inlinestyle += 'background-image:' + bg + ';';
        bg_inlinestyle += 'background-repeat:' + bg_rep + ';';
        if (bg_size != 'cstm') {
            bg_inlinestyle += 'background-size:' + bg_size + ';';
        } else {
            bg_inlinestyle += 'background-size:' + bg_cstm_size + ';';
        }
        if (bg_pos != "") {
            bg_inlinestyle += 'background-position:' + bg_pos + ';';
        }
        bg_inlinestyle += 'background-attachment:' + bg_attach + ';';

    }
    if (typeof bg_color != 'undefined') {
        bg_inlinestyle += 'background-color:' + bg_color + ';';
    }
    if (typeof bg_grad != 'undefined') {
        bg_inlinestyle += bg_grad;
    }
    selector.prevAll('.vc_column_container:first').attr('style', bg_inlinestyle);

    // Overlay
    if (overlay) {
        var overlay_html = '',
            overlay_cssclass = '',
            overlay_inlinestyle = 'style="';
        if (overlay_style == 'custom_solid_color') {
            overlay_inlinestyle += 'background-color:' + overlay_color + ';';
        } else if (overlay_style == 'custom_gradient') {
            overlay_inlinestyle += 'background:' + overlay_grad + ';';
        } else {
            overlay_cssclass = ' ' + overlay_style;
        }

        if (typeof overlay_pattern != 'undefined') {
            overlay_html += '<div class="pattern_overlay" style="background-position: center;background-image:url(\'' + overlay_pattern + '\');opacity:' + overlay_opacity + '"></div>';
        }

        overlay_inlinestyle += 'opacity:' + overlay_opacity + ';';

        overlay_inlinestyle += '"';


        overlay_html += '<div class="bg_overlay' + overlay_cssclass + '" ' + overlay_inlinestyle + '>';

        overlay_html += '</div>';

        parent.addClass('enable-overlay');
        parent.prepend(overlay_html);
    }

    jQuery(selector).remove();

    /* end of seperators */
}

if( ! /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
 // some code..

	var $ = jQuery;
	var $header_left_side = $('.header-left-side');
	if ($header_left_side.length > 0 && $(window).width() > 1022) {
	    var paddingLeft = $header_left_side.outerWidth();
	    $('body').css({
	        paddingLeft: paddingLeft + 'px'
	    });
	} else {
		$('body').css({
	        paddingLeft:  '0px'
	    });
	}

	jQuery(document).ready(function() {
	        var $ = jQuery;
	        var $header_left_side = $('.header-left-side');
	        if ($header_left_side.length > 0 && $(window).width() > 1022) {
	            //var paddingLeft = $header_left_side.outerWidth();
	            //$('body').css({paddingLeft: paddingLeft + 'px'});
	            tm_resize();
	            $(window).resize(function() {
	                tm_resize();
	            });
	        }
	        //console.log($header_left_side.outerWidth());
	    })
	    // jQuery(document).ready(function() {
	    // 	var $ = jQuery;
	    // 	tm_resize();
	    // 	$(this).resize(function(){
	    // 		tm_resize();
	    // 	});
	    // });

	function tm_resize() {
	    var $ = jQuery;
	    var $header_left_side = $('.header-left-side');
	    if ($header_left_side.length > 0 && $(window).width() <= 1022) {
	        $('body').css({
	            paddingLeft: '0px'
	        });
	    } else if ($header_left_side.length > 0) {
	        //console.log($(window).width());
	        //if(false) {
	        $("#content").find('.vc_row[data-vc-full-width=true]').each(function(index) {
	            if ($(this).attr('data-vc-stretch-content') == 'true') {
	                // var padding_left = (parseFloat($(this).css('padding-left')) - $header_left_side.width()/2) + 'px';
	                // var padding_right = (parseFloat($(this).css('padding-right')) - $header_left_side.width()/2) + 'px';

	                var left = (parseFloat($(this).css('left')) + $header_left_side.outerWidth()) + 'px';
	                var width = (parseFloat($(this).css('width')) - $header_left_side.outerWidth()) + 'px';
	                $(this).css({
	                    left: left,
	                    width: width,
	                    // paddingLeft: padding_left,
	                    // paddingRight: padding_right,
	                });
	            };
	        });
	    }
	}
} // If not mobile

function uniqid() {
    var ts = String(new Date().getTime()),
        i = 0,
        out = '';
    for (i = 0; i < ts.length; i += 2) {
        out += Number(ts.substr(i, 2)).toString(36);
    }
    return ('tm-' + out);
}

// ScrollTo
function goToByScroll(id){
	// Scroll
	$('html,body').animate({
			scrollTop: $(id).offset().top
		},
		'slow');
}

jQuery(document).ready(function() {
	$("#site-navigation a, #mobile-menu a").click(function(e) {
		var href = $(this).attr('href');
		var id = href.split("#");
		if(typeof id[1] != "undefined") {
			if($('#' + id[1]).length > 0) {
				// Prevent a page reload when a link is pressed
				e.preventDefault();
				// Call the scroll function
				goToByScroll('#' + id[1]);
			}
		}
	});

	// fit videos
	$(".container").fitVids();

	// post-gallery
	$(".post-gallery.slider").slick({
		infinite: true,
		speed: 800,
		fade: true,
	});
	// post-gallery-masonry
    var $postMasonry = $('.post-gallery.masonry');
    $postMasonry.isotope({
        layoutMode: "masonry",
        masonry: {
            columnWidth: '.grid-thumb-sizer'
        },
        itemSelector: '.thumb-masonry-item',
        transitionDuration: '0.8s'
    }).imagesLoaded().progress(function() {
        $postMasonry.isotope('layout');
    });

});
