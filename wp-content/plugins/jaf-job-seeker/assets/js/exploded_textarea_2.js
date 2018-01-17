!function($) {
    $('body').on('change', '.exploded_textarea_2_field', function(e){
        console.log('exploded_textarea_2_field', $(this).val());
        var lines = $(this).val().split(/\n/);
        var texts = null;
        for (var i=0; i < lines.length; i++) {
            if (/\S/.test(lines[i])) {
                if(i > 0){
                    texts += '||';
                }
                texts += $.trim(lines[i]);
            }
        }
        $(this).parent().find('.wpb_vc_param_value').html(texts);
    });
}(window.jQuery);
