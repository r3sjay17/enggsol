(function(){

    tinymce.PluginManager.add("nscShortcodes", function( editor, url ){

        var menuOptions = [
            {
                text: 'Highlight Shortcode',
                onclick: function(t) {
                    editor.windowManager.open({
                        title  : 'Highlight shortcode',
                        width  : 500,
                        height : 250,
                        body   : [
                            {
                                type    : 'textbox',
                                name    : 'ht_text',
                                label   : 'Text',
                                value   : ''
                            },
                            {
                                type    : 'textbox',
                                name    : 'txt_color',
                                label   : 'Text color',
                                classes : 'colorpicker',
                                value   : ''
                            },
                            {
                                type    : 'textbox',
                                name    : 'bg_color',
                                label   : 'Background color',
                                classes : 'colorpicker',
                                value   : ''
                            },
                            {
                                type    : 'listbox',
                                name    : 'ht_style',
                                label   : 'Style',
                                values  : [
                                    { text: 'None', value: '' },
                                    { text: 'Style 01', value: 'ht-style-1' },
                                    { text: 'Style 02', value: 'ht-style-2' },
                                    { text: 'Style 03', value: 'ht-style-3' },
                                ],
                            },
                            {
                                type    : 'textbox',
                                name    : 'ht_class',
                                label   : 'CSS class',
                                value   : ''
                            },
                        ],
                        onsubmit: function(e) {
                            var attrs = '';
                            if (e.data.txt_color) {
                                attrs += ' color="' + e.data.txt_color + '"';
                            }
                            if (e.data.bg_color) {
                                attrs += ' background-color="' + e.data.bg_color + '"';
                            }
                            if (e.data.ht_style) {
                                attrs += ' style="' + e.data.ht_style + '"';
                            }
                            if (e.data.ht_class) {
                                attrs += ' class="' + e.data.ht_class + '"';
                            }
                            var htPre = '[tm_dione_highlight '+ attrs +']';
                            var htAft = '[/tm_dione_highlight]';
                            editor.insertContent( htPre + e.data.ht_text + htAft );
                        }
                    });

                    var windows = editor.windowManager.getWindows()[0];
                    var $el = jQuery( windows.$el[0] );

                    /* check if wpColorPicker available */
                    if( typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function' ) {
                        $el.find( '.mce-colorpicker' ).wpColorPicker();
                    }
                }
            },

            {
                text: 'Quote',
                onclick: function(t) {
                    editor.windowManager.open({
                        title  : 'Quote shortcode',
                        width  : 500,
                        height : 250,
                        body   : [
                            {
                                type    : 'textbox',
                                name    : 'ht_text',
                                label   : 'Text',
                                value   : ''
                            },
                            {
                                type    : 'listbox',
                                name    : 'ht_style',
                                label   : 'Style',
                                values  : [
                                    { text: 'None', value: '' },
                                    { text: 'Style 01', value: 'block-quote_style1' },
                                    { text: 'Style 02', value: 'block-quote_style2' },
                                    { text: 'Style 03', value: 'block-quote_style3' },
                                ],
                            },
                            {
                                type    : 'textbox',
                                name    : 'ht_class',
                                label   : 'CSS class',
                                value   : ''
                            },
                        ],
                        onsubmit: function(e) {
                            var attrs = '';
                            if (e.data.ht_style) {
                                attrs += ' style="' + e.data.ht_style + '"';
                            }
                            if (e.data.ht_class) {
                                attrs += ' class="' + e.data.ht_class + '"';
                            }
                            var htPre = '[tm_dione_quote '+ attrs +']';
                            var htAft = '[/tm_dione_quote]';
                            editor.insertContent( htPre + e.data.ht_text + htAft );
                        }
                    });

                    //var windows = editor.windowManager.getWindows()[0];
                    //var $el = jQuery( windows.$el[0] );
                    //
                    ///* check if wpColorPicker available */
                    //if( typeof jQuery.wp === 'object' && typeof jQuery.wp.wpColorPicker === 'function' ) {
                    //    $el.find( '.mce-colorpicker' ).wpColorPicker();
                    //}
                }
            },

        ];

        editor.addButton( 'nsc_button', {
            //icon: 'nsc-tinymce-icon',
            title: 'Highlight shortcode',
            type: 'menubutton',
            menu: menuOptions
        });
    });
})();