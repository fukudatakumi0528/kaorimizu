(function() {
  tinymce.create( 'tinymce.plugins.article__interview_shortcode_button', {
    init: function( ed, url ) {
      ed.addButton( 'article__interview', {
        title: 'article__interview shortcode',
        icon: 'code',
        cmd: 'article__interview_cmd'
      });

      ed.addCommand( 'article__interview_cmd', function() {
        var interview_name = ed.selection.getContent(),
            return_text = '[article__interview name="" src=""]' + interview_name + '[/article__interview]';
        ed.execCommand( 'mceInsertContent', 0, return_text );
      });
    },
    createControl : function( n, cm ) {
      return null;
    },
  });
  tinymce.PluginManager.add( 'article__interview_shortcode_button_plugin', tinymce.plugins.article__interview_shortcode_button );
})();