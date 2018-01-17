<?php
if ( ! class_exists( 'TM_Recent_Posts_Widget' ) ) {

  add_action( 'widgets_init', 'load_thememove_recent_posts_widget' );

  function load_thememove_recent_posts_widget() {
    register_widget( 'TM_Recent_Posts_Widget' );
  }

  /**
   * REcent Posts Widget by ThemeMove
   *
   * @property mixed data
   */
  class TM_Recent_Posts_Widget extends WP_Widget {

    /*
     * Register widget with WordPress
     */
    function __construct() {
      parent::__construct( 'tm_recent_posts', __( 'ThemeMove - Recent Posts', 'infinity' ), array( 'description' => __( 'Your site\'s most recent Posts.', 'infinity' ) ) );
    }

    private function getImageSize( $img_size = 'small' ) {

      if ( preg_match_all( '/(\d+)x(\d+)/', $img_size, $sizes ) ) {
        $exact_size = array(
          isset( $sizes[1][0] ) ? $sizes[1][0] : '0',
          isset( $sizes[2][0] ) ? $sizes[2][0] : '0',
        );
      } else {
        if ( 'small' == $img_size ) {
          $img_size .= '-thumb';
        }

        return $img_size;
      }

      return $exact_size;
    }

    function widget( $args, $instance ) {
      extract( $args );

      echo $args['before_widget'];

      $output = '<h5 class="widget-title">' . $instance['title'] . '</h5>';

      $query_args = array( 'post_type' => 'post', 'posts_per_page' => $instance['number'] );
      $loop       = new WP_Query( $query_args );

      $output .= '<div class="recent-posts">';

      while ( $loop->have_posts() ) {

        $loop->the_post();

        $output .= '<div class="recent-posts__item row">';

        $output .= '<a href="' . get_permalink() . '" class="recent-posts__thumb col-sm-4">';

        if ( has_post_thumbnail( get_the_ID() ) ) {
          $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), $this->getImageSize( $instance['img_size'] ) );
          $output .= '<img src="' . $image[0] . '" />';
        }

        $output .= '</a>';

        $output .= '<div class="recent-posts__info col-sm-8">';

        if ( $instance['show_post_title'] ) {
          $output .= '<h3><a href="' . get_permalink() . '">' . get_the_title() . '</a></h3>';
        }

        if ( $instance['show_excerpt'] ) {
          $output .= '<div class="entry-excerpt">' . get_the_excerpt() . '</div>';
        }

        if ( $instance['show_meta'] ) {
          $output .= '<div class="post-meta">';
          $output .= '<span class="post-date">' . get_the_time( 'F j, Y' ) . '</span>';
          $output .= '</div>';
        }

        $output .= '</div>';

        $output .= '</div>';
      }

      wp_reset_postdata();

      $output .= '</div>';


      echo $output;

      echo $args['after_widget'];
    }

    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;

      $instance['title']           = strip_tags( $new_instance['title'] );
      $instance['show_post_title'] = strip_tags( $new_instance['show_post_title'] );
      $instance['show_excerpt']    = strip_tags( $new_instance['show_excerpt'] );
      $instance['show_meta']       = strip_tags( $new_instance['show_meta'] );
      $instance['number']          = strip_tags( $new_instance['number'] );
      $instance['img_size']        = strip_tags( $new_instance['img_size'] );

      return $instance;
    }

    function form( $instance ) {

      // Set up default settings
      $default = array(
        'title'           => '',
        'show_post_title' => 'on',
        'show_excerpt'    => '',
        'show_meta'       => 'on',
        'number'          => 5,
        'img_size'        => 'small',
      );

      $instance = wp_parse_args( (array) $instance, $default );

      ?>

      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'infinity' ); ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $instance['title'] ); ?>" />
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_post_title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_post_title' ) ); ?>" <?php checked( $instance['show_post_title'], 'on' ); ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_post_title' ) ); ?>"><?php _e( 'Show post title', 'infinity' ) ?></label>
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_excerpt' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_excerpt' ) ); ?>" <?php checked( $instance['show_excerpt'], 'on' ); ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_excerpt' ) ); ?>"><?php _e( 'Show excerpt', 'infinity' ) ?></label>
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_meta' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_meta' ) ); ?>" <?php checked( $instance['show_meta'], 'on' ); ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_meta' ) ); ?>"><?php _e( 'Show meta', 'infinity' ) ?></label>
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"><?php _e( 'Enter numbers of articles', 'infinity' ); ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'number' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'number' ) ); ?>" value="<?php echo esc_attr( $instance['number'] ); ?>" />
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'img_size' ) ); ?>"><?php _e( 'Image size', 'infinity' ); ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'img_size' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'img_size' ) ); ?>" value="<?php echo esc_attr( $instance['img_size'] ); ?>" />
      </p>
      <p class="help"><?php _e( 'Enter image size (Example: "small", "thumbnail", "medium", "large", "full" ). Alternatively enter size in pixels (Example: 200x100 (Width x Height)).', 'infinity' ); ?></p>

      <?php
    }
  } // end class
} // end if
