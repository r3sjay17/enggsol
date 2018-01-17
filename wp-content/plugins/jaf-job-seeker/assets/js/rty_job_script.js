jQuery(function($) {
    
    //hide_loader();
    //hide_loader2();
    
    function get_main_wrapper() {
        return $('#jobresult-content-wrapper');
    }
    
    function hide_loader() {
        get_main_wrapper().find('.rty-spinner').slideUp(800);
    }
    
    function show_loader() {
        get_main_wrapper().find('.rty-spinner').slideDown(800);
    }
    
    function hide_loader2() {
        get_main_wrapper().find('.rty-spinner-2').slideUp(800);
    }
    
    function show_loader2() {
        get_main_wrapper().find('.rty-spinner-2').slideDown(800);
    }
    
    function reload_job_content( jobID ) {
        get_main_wrapper().find('.job-content-page-wrapper').html('');
        var that = get_main_wrapper().find('.job-lists-wrapper');
        
        show_loader();
        $.get(
            that.data('ajax_url'), {
                action: 'reload_job_content',
                job_id: jobID,
                is_ajax: 1,
            }, function(res) {
                hide_loader();
                get_main_wrapper().find('.job-content-page-wrapper').html(res);
            }, 'html'
        );
        return false;
    }
    
    function reload_job_view( jtitle, loc, cat, last, page ) {
        get_main_wrapper().find('.job-lists-wrapper').html('');
        var that = $('.rty-search-form');
        
        show_loader2();
        $.get(
            that.data('ajax_url'), {
                action: 'reload_job_view',
                title: jtitle,
                location: loc,
                category: cat,
                last_day: last,
                page_number: page,
                is_ajax: 1,
            }, function(res) {
                hide_loader2();
                get_main_wrapper().find('.job-lists-wrapper').html(res);
                var jid = $('#jobresult-content-wrapper .jobs').first().data('job');
                $('#jobresult-content-wrapper .job-lists-wrapper .jobs').first().addClass('active');
                if( jid ) {
                    reload_job_content(jid);
                } else {
                    reload_job_content(0);
                }
            }, 'html'
        );
        return false;
    }
    
    function save_jobs( jid, side ) {
        var ajx = $('.job-content-page-wrapper .rty-current-job').data('ajax_url');
        
        if( side ) {
            show_loader2();
        } else {
            show_loader();
        }
        $.get(
            ajx, {
                action: 'save_job',
                job_id: jid
            }, function(res) {
                if( side ) {
                    hide_loader2();
                } else {
                    hide_loader();
                }
                if( res == 'Job saved!' ) {
                    reload_job_view( '', '', '', '', 1 );
                } else {
                    $('.rty-saved-job-alert .alert').removeClass('alert-success');
                    $('.rty-saved-job-alert .alert').addClass('alert-danger');
                    $('.rty-saved-job-alert .alert').text('Job already saved!');
                    $('.rty-saved-job-alert .alert').prepend('<i class="fa fa-exclamation-triangle" aria-hidden="true" ></i> ');
                }
                $('.rty-saved-job-alert').slideDown(800);
                setTimeout( function() { $('.rty-saved-job-alert').slideUp(800); }, 2000 );
                
            }, 'html'
        );
    }
    
    function drop_resume() {
        $('.getquote-product').fadeIn(800);
        $('.body-content.form-resume').addClass('visible');
        $('.body-content.form-request').removeClass('visible');
        $('.body-content.form-jobalert').removeClass('visible');
        $('.body-content.form-contact').removeClass('visible');
    }
    
    $('.rty-filter-industry').SumoSelect({
        placeholder: 'Choose by Function'
    });
    
    $('.rty-filter-location').SumoSelect({
        placeholder: 'Choose by Location'
    });
    
    /* Reload Content of first job */
    get_main_wrapper().find('.job-content-page-wrapper').html('');
    /*var jobID = $('#jobresult-content-wrapper .jobs').first().data('job');
    $('#jobresult-content-wrapper .job-lists-wrapper .jobs').first().addClass('active');
    if( jobID ) {
        reload_job_content(jobID);
    } else {
        hide_loader();
        $('.job-content-page-wrapper').html('');
        $('.job-content-page-wrapper').html('<div class="rty-no-results"><p class="alert alert-warning" ><i class="fa fa-exclamation-triangle" aria-hidden="true" ></i> No Results Found!</p></div>');
    }*/
    /* end */
    
    $('#jobresult-content-wrapper').on('click', '.jobs', function() {
        var id = $(this).data('job');
        $('#jobresult-content-wrapper .jobs').each(function() {
            $(this).removeClass('active');
        });
        $(this).addClass('active');
        reload_job_content(id);
    });
    
    
    if( $('body').hasClass('single-jobs') || $('body').hasClass('home') ) {
        $('.rty-search-form').on('submit', function(e) {
            e.preventDefault();
            var site = $('.rty-site-url').val();
            var that = $('.rty-search-form');
            var title = ( that.find('.rty-text-search').val() == '' || that.find('.rty-text-search').val() == null ) ? '' : '&search=' + that.find('.rty-text-search').val();
            var location = ( that.find('.rty-filter-location').val() == '' || that.find('.rty-filter-location').val() == null ) ? '' : '&location=' + that.find('.rty-filter-location').val();
            var func = ( that.find('.rty-filter-industry').val() == '' || that.find('.rty-filter-industry').val() == null ) ? '' : '&category=' + that.find('.rty-filter-industry').val();
            
            window.location = site + "/job-search/?" + title  + location  + func;
        });
    } else {
       $('.rty-search-form').on('submit', function() {
            //var func = [];
            var title = $(this).find('.rty-text-search').val();
            var location = $(this).find('.rty-filter-location').val();
            var func = $(this).find('.rty-filter-industry').val();
            var last = $(this).find('.rty-last-days').val();
            var page = $(this).find('.page_number').val();
            reload_job_view( title, location, func, last, page );
            return false;
        }).trigger('submit'); 
    }

    
    /* Tab Filters */
    $('#jobresults-wrapper').on('click', '.rty-btn-view-list', function(e) {
        e.preventDefault();
        if( get_main_wrapper().hasClass('rty-list-view') ) {
            
        } else {
            get_main_wrapper().removeClass('rty-side-list-view');
            get_main_wrapper().addClass('rty-list-view');
            get_main_wrapper().find('.job-lists-wrapper .rty-requirement').slideDown(800);
        }
    });
    
    $('#jobresults-wrapper').on('click', '.rty-btn-view-side-list', function(e) {
        e.preventDefault();
        get_main_wrapper().removeClass('rty-list-view');
        get_main_wrapper().find('.job-lists-wrapper .rty-requirement').slideUp(800);
    });
    
    $('#jobresults-wrapper').on('click', '.rty-btn-view-new-tab', function() {
        var loc = get_main_wrapper().find('.rty-current-job').val();
        window.open(loc);
    });
    
    $('#jobresults-wrapper').on('click', '.rty-btn-print', function(e) {
        e.preventDefault();
        var wid = $(window).width();
        var heig = $(window).height();
        var divContents = $(".rty-jobs-content-holder .job-content-page-wrapper").html();
            var printWindow = window.open('', '', 'height=900,width=1200');
            printWindow.document.write('<html><head><title>DIV Contents</title>');
            printWindow.document.write('</head><body >');
            printWindow.document.write(divContents);
            printWindow.document.write('</body></html>');
            printWindow.document.close();
            printWindow.print();
    });
    
    $('#jobresults-wrapper #filter-buttons').on('click', '.rty-last-days ul li a', function(e) {
        e.preventDefault();
        var last = $(this).data('last');
        var t = $(this).text();
        $('#jobresults-wrapper #filter-buttons .rty-last-days a.rty-text').html('');
        $('#jobresults-wrapper #filter-buttons .rty-last-days a.rty-text').html('<i class="fa fa-clock-o" aria-hidden="true"></i>' + t);
        $('.rty-search-form .rty-last-days').val(last);
        $('.rty-search-form').trigger('submit');
    });
    
    $('#filter-buttons').on('click', '.rty-last-days', function(e) {
        e.preventDefault();
        
        if ( $(this).find('ul').is(':visible') ) {
            $(this).find('ul').slideUp(800);
        } else {
            $(this).find('ul').slideDown(800);
        }
    });
    
    $('#filter-buttons').on('click', '.rty-btn-show-hide', function(e) {
        e.preventDefault();
        if( $(this).find('span').text() == 'Show' ) {
            $(this).find('span').text('Hide');
            get_main_wrapper().find('.job-lists-wrapper .rty-requirement').slideDown(800);
        } else {
            $(this).find('span').text('Show');
            get_main_wrapper().find('.job-lists-wrapper .rty-requirement').slideUp(800);  
        }
    });
    
    $('#filter-buttons').on('click', '.rty-btn-save-job', function(e) {
        e.preventDefault();
        var jid = [];
        jid.push( $('.job-content-page-wrapper .rty-current-job').data('id') );
        save_jobs( jid, false );
    })
    
    $('#filter-buttons').on('click', '.rty-btn-save-jobs', function(e) {
        e.preventDefault();
        var jid = [];
        get_main_wrapper().find('.job-lists-wrapper .jobs').each(function() {
            jid.push( $(this).data('job') );
        });
        save_jobs( jid, true );
    })
    
    $('#filter-buttons').on('click', '.rty-btn-share', function(e) {
        e.preventDefault();
        var link = get_main_wrapper().find('.rty-jobs-content-holder .rty-current-job').val();
        var title = get_main_wrapper().find('.rty-jobs-content-holder .job-heading').text();
        $('.rty-share-wrapper .rty-url-holder .rty-url').val(link);
        $('.rty-share-wrapper .rty-social-media-holder .rty-fb').attr( 'href', 'http://www.facebook.com/sharer.php?u=' + link + '&amp;t=' + title );
        $('.rty-share-wrapper .rty-social-media-holder .rty-twitter').attr( 'href', 'http://twitter.com/share?text=' + title + '&url=' + link );
        $('.rty-share-wrapper .rty-social-media-holder .rty-gplus').attr( 'href', 'https://plus.google.com/share?url=' + link );
        $('.rty-share-wrapper').fadeIn(800);
    });
    
    $('.rty-share-wrapper').on('click', '.rty-close', function(e) {
        e.preventDefault();
        $('.rty-share-wrapper').fadeOut(800);
    });
    
    $('.rty-share-wrapper .rty-social-media-holder, .single-jobs .social-holder .social-contents').on('click', '.rty-gplus, .rty-twitter, .rty-fb', function() {
        window.open(this.href, '', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=750,width=750');
        return false;
    });
    /* end */
    
    $('.single-jobs .rty-btn-drop-resume, .single-jobs .rty-btn-apply').on('click', function(e) {
        e.preventDefault();
        var title = $('.single-jobs .rty-single-job-content-holder h2').text();
        $('.gform_body .icon-title input[type="text"]').val(title);
        
        var jid = $('.single-jobs .rty-job-id').val();
        $('.single-jobs .gform_body .gform_hidden').val(jid);
        drop_resume();
    });  
    
    $(document).ajaxComplete(function() {
        /*$('.job-content-page-wrapper .button-apply-wrapper').on('click', '.button-apply', function(e) {
            e.preventDefault();
            var title = $('.job-content-page-wrapper .job-heading').text();
            $('.gform_body .icon-title input[type="text"]').val(title);
            drop_resume();
        });*/
    
        $('.company-related, .job-related').on('click', '.rty-related-company-jobs', function(e) {
            e.preventDefault();
            var jid = $(this).data('id');
            $('#jobresult-content-wrapper .jobs').each(function() {
                $(this).removeClass('active');
                if( $(this).data('job') == jid ) {
                    $(this).addClass('active');
                }
            });
            $('#jobresult-content-wrapper .jobs.active')[0].scrollIntoView(true);
            reload_job_content(jid);
        });

        $('.rty-pagination').on('click', '.rty-page a', function(e) {
            e.preventDefault();
            var page = $(this).data('page');
            $('.rty-search-wrapper .rty-search-form .page_number').val( page );
            $('.rty-pagination .rty-page').each(function() {
                $(this).removeClass('active');
            });
            $(this).parent().addClass('active');
            $('.rty-search-form').submit();
        });
    });
    
    /* Frontend */
    $('.rty-home-info-centre-row').on('click', '.primary-heading', function() {
        var site = $('.rty-site-url').val();
        window.location = "/information-center";
    });
    
    $('.home .rty-btn-view-more').text('Read More');
    
});