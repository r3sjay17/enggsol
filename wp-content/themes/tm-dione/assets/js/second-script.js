(function($) {
    $(document).ready(function() {
        var $opScroll = $('.one-page-scroll .entry-content');
        var $hWindows = $(window).height(),
            $wWindows = $(window).width();
        if ($opScroll.length > 0 && $wWindows >= '800') {
            onePageScroll();
            $(window).resize(function() {
                onePageScroll();
            });
        }
        // Set height for onepage-scroll
        function onePageScroll() {
            var $hWindows = $(window).height(),
                $wWindows = $(window).width(),
                $hHeader = $('.header-wrapper').outerHeight(),
                $hFooter = $('.copyright').outerHeight(),
                $options = {
                    sectionContainer: '.one-page-scroll .entry-content > .vc_row',
                    loop: false
                };
            if ($wWindows >= '800' && $opScroll.length > 0) {
                $opScroll.onepage_scroll($options);
                //console.log($hWindows - ($hHeader + $hFooter));
                //$opScroll.css('height', $hWindows - ($hHeader + $hFooter) + 'px');
                $opScroll.css('height', $hWindows + 'px');
            } else {
                $opScroll.destroy_onepage_scroll($options);
                $opScroll.css('height', 'auto');
            }
        }

		$('.btn-loadmore').on('click', function(){
			var box_container = $(this).data('box-container');
			var box_container_el = $($(this).data('box-container'));
			var page = '=' + $(this).data('next-page');
			var max_pages = '=' + $(this).data('max-pages');

			if(page == 0) {
				$(this).parent().css({display: 'none'});
				return;
			}

			$(this).data('next-page', ( page + 1 ) );
			var $thiss = $(this);

			$(this).addClass('btn-transparent').html('<div class="loading loader-inner ball-pulse"><div></div><div></div><div></div></div>');
			$.get( $(this).data('url') + page , function( html ) {
				var content = $(html).find('#blog-metro .content');
				var $newItems = $(content[0].innerHTML);
				box_container_el.isotope( 'insert', $newItems );

				box_container_el.imagesLoaded().progress(function() {
					box_container_el.isotope( 'layout' );
			    });

				$thiss.removeClass('btn-transparent').html($thiss.data('text'));

				if(page == max_pages) {
					$thiss.parent().css({display: 'none'});
					return;
				}
				return false;
			});
		});

		// Photography
		var stopScroll = false;

		function rowfullheight(){
			var wHeight = $(window).height(),
				hHeight = $('.header-wrapper').outerHeight(),
				cHeight = $('.copyright').outerHeight();
			if ( $(window).width() <= 768 || wHeight <= 480 ) {
				stopScroll = false;
				$('.rowfullheight, .rowfullheight .wpb_wrapper').height('auto');
				$(".gallery-container-wrap-scroll").removeClass('gallery-container-wrap');
				$(".gallery-container-wrap-scroll img").css({height: 'auto'});
			} else {
				stopScroll = true;
				var h_wpadminbar = 0;
				if($('#wpadminbar').length > 0 ) {
					h_wpadminbar = $('#wpadminbar').outerHeight();
				}

				var f_height = wHeight - hHeight - cHeight - h_wpadminbar;

				$(".gallery-container-wrap-scroll").addClass('gallery-container-wrap');
				$(".gallery-container-wrap-scroll img").css({height: f_height });
				$('.rowfullheight, .rowfullheight .wpb_wrapper').height( f_height );
			}
		}
		rowfullheight();
		$(window).resize(function() {
			rowfullheight();
	    });

		$(".gallery-container-wrap-scroll").mousewheel(function(event, delta) {
			if(stopScroll) {
		        this.scrollLeft -= (delta * 30);
		        event.preventDefault();
			}
	    });

    });
})(jQuery);
