<?php
if ( ! class_exists( 'TM_Facebook_Widget' ) ) {

  add_action( 'widgets_init', 'load_thememove_facebook_widget' );

  function load_thememove_facebook_widget() {
    register_widget( 'TM_Facebook_Widget' );
  }

  /**
   * Facebook Widget by ThemeMove
   */
  class TM_Facebook_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    function __construct() {
      parent::__construct( 'tm_facebook', __( 'ThemeMove - Facebook Page Like', 'infinity' ), array( 'description' => __( 'Facebook Page "Like" button', 'infinity' ) ) );
    }

    function widget( $args, $instance ) {
      extract( $args );

      $title              = isset( $instance['title'] ) ? $instance['title'] : '';
      $url                = isset( $instance['url'] ) ? $instance['url'] : '';
      $width              = isset( $instance['width'] ) ? $instance['width'] : '';
      $height             = isset( $instance['height'] ) ? $instance['height'] : '';
      $use_small_header   = isset( $instance['use_small_header'] ) ? $instance['use_small_header'] : '';
      $adapt_to_container = isset( $instance['adapt_to_container'] ) ? $instance['adapt_to_container'] : '';
      $hide_cover         = isset( $instance['hide_cover'] ) ? $instance['hide_cover'] : '';
      $show_face          = isset( $instance['show_face'] ) ? $instance['show_face'] : '';
      $show_posts         = isset( $instance['show_posts'] ) ? $instance['show_posts'] : '';

      echo $args['before_widget'];

      $output = '<h5 class="widget-title">' . $title . '</h5>';
      $output .= '<div class="tm-facebook-page fb-page"';
      $output .= 'data-href="' . esc_url( $url ) . '"';
      $output .= 'data-width="' . $width . '"';
      $output .= 'data-height="' . $height . '"';
      $output .= 'data-small-header="' . ( $use_small_header == 'on' ? 'true' : 'false' ) . '"';
      $output .= 'data-adapt-container-width="' . ( $adapt_to_container == 'on' ? 'true' : 'false' ) . '"';
      $output .= 'data-hide-cover="' . ( $hide_cover == 'on' ? 'true' : 'false' ) . '"';
      $output .= 'data-show-facepile="' . ( $show_face == 'on' ? 'true' : 'false' ) . '"';
      $output .= 'data-show-posts="' . ( $show_posts == 'on' ? 'true' : 'false' ) . '"';
      $output .= '>';
      $output .= '<div class="fb-xfbml-parse-ignore">';
      $output .= '<blockquote cite="' . esc_url( $url ) . '"><a href="' . esc_url( $url ) . '">' . esc_url( $url ) . '</a></blockquote>';
      $output .= '</div>';
      $output .= '</div>';
      $output .= '<script>(function(d, s, id) {var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.4&appId=609411882431242";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, "script", "facebook-jssdk"));</script>';

      echo $output;

      echo $args['after_widget'];
    }

    function form( $instance ) {
      $title              = isset( $instance['title'] ) ? $instance['title'] : '';
      $url                = isset( $instance['url'] ) ? $instance['url'] : '';
      $width              = isset( $instance['width'] ) ? $instance['width'] : '';
      $height             = isset( $instance['height'] ) ? $instance['height'] : '';
      $use_small_header   = isset( $instance['use_small_header'] ) ? $instance['use_small_header'] : '';
      $adapt_to_container = isset( $instance['adapt_to_container'] ) ? $instance['adapt_to_container'] : '';
      $hide_cover         = isset( $instance['hide_cover'] ) ? $instance['hide_cover'] : '';
      $show_face          = isset( $instance['show_face'] ) ? $instance['show_face'] : '';
      $show_posts         = isset( $instance['show_posts'] ) ? $instance['show_posts'] : '';

      ?>

      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" />
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"><?php _e( 'Facebook Page URL', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'url' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'url' ) ); ?>" value="<?php echo esc_attr( $url ); ?>" />
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"><?php _e( 'Width', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'width' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'width' ) ); ?>" value="<?php echo esc_attr( $width ); ?>" />
      </p>
      <p class="help"><?php _e( 'The pixel width of the embed (Min. 180 to Max. 500)', 'infinity' ); ?></p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"><?php _e( 'Height', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'height' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'height' ) ); ?>" value="<?php echo esc_attr( $height ); ?>" />
      </p>
      <p class="help"><?php _e( 'The pixel height of the embed (Min. 70)', 'infinity' ); ?></p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'use_small_header' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'use_small_header' ) ); ?>" <?php checked( $use_small_header, 'on' ) ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'use_small_header' ) ); ?>"><?php _e( 'Use Small Header', 'infinity' ) ?></label>
      </p>
      <p class="help"><?php echo _e( 'Uses a smaller version of the page header', 'infinity' ); ?></p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'adapt_to_container' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'adapt_to_container' ) ); ?>" <?php checked( $adapt_to_container, 'on' ) ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'adapt_to_container' ) ); ?>"><?php _e( 'Adapt to shortcode container width', 'infinity' ) ?></label>
      </p>
      <p class="help"><?php echo _e( 'Shortcode will try to fit inside the container', 'infinity' ); ?></p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'hide_cover' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'hide_cover' ) ); ?>" <?php checked( $hide_cover, 'on' ) ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'hide_cover' ) ); ?>"><?php _e( 'Hide cover photo', 'infinity' ); ?></label>
      </p>
      <p class="help"><?php echo _e( 'Hide the cover photo in the header', 'infinity' ); ?></p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_face' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_face' ) ); ?>" <?php checked( $show_face, 'on' ) ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_face' ) ); ?>"><?php _e( 'Show Friend\'s Faces', 'infinity' ); ?></label>
      </p>
      <p class="help"><?php echo _e( 'Show profile photos when friends like this', 'infinity' ); ?></p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_posts' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_posts' ) ); ?>" <?php checked( $show_posts, 'on' ) ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_posts' ) ); ?>"><?php _e( 'Show Page Posts', 'infinity' ); ?></label>
      </p>
      <p class="help"><?php echo _e( 'Show posts from the Page\'s timeline', 'infinity' ); ?></p>
      <?php
    }
  } // end class
} // end if
