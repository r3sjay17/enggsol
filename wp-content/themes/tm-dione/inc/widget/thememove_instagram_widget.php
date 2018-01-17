<?php
if ( ! class_exists( 'TM_Instagram_Widget' ) ) {

  add_action( 'widgets_init', 'load_thememove_instagram_widget' );

  function load_thememove_instagram_widget() {
    register_widget( 'TM_Instagram_Widget' );
  }

  /**
   * Instagram Widget by ThemeMove
   */
  class TM_Instagram_Widget extends WP_Widget {

    private $sizes = array(
      'lg' => 'Large',
      'md' => 'Medium',
      'sm' => 'Small',
      'xs' => 'Extra small',
    );

    private $icons = array(
      'lg' => 'fa-desktop',
      'md' => 'fa-tablet fa-rotate-270',
      'sm' => 'fa-tablet',
      'xs' => 'fa-mobile',
    );

    private $responsive_data = array();

    private $responsive = '';

    private $item_width_list = array();

    /**
     * Register widget with WordPress.
     */
    function __construct() {
      parent::__construct( 'tm_instagram', __( 'ThemeMove - Instagram', 'infinity' ), array( 'description' => __( 'Displays latest Instagram photos', 'infinity' ) ) );

      wp_enqueue_style( 'thememove-font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );

      $this->item_width_list = array(
        __( '1 columns - 1/1 - 12 items in a row', 'infinity' ) => 1,
        __( '2 columns - 1/6 - 6 items in a row', 'infinity' )  => 2,
        __( '3 columns - 1/4 - 4 items in a row', 'infinity' )  => 3,
        __( '4 columns - 1/3 - 3 items in a row', 'infinity' )  => 4,
        __( '6 columns - 1/2 - 2 items in a row', 'infinity' )  => 6,
        __( '12 columns - 1/1 - 1 item in a row', 'infinity' )  => 12,
      );
    }

    function widget( $args, $instance ) {
      extract( $args );

      $title               = isset( $instance['title'] ) ? $instance['title'] : '';
      $username            = isset( $instance['username'] ) ? $instance['username'] : '';
      $number_items        = isset( $instance['number_items'] ) ? $instance['number_items'] : '6';
      $item_width_lg       = isset( $instance['item_width_lg'] ) ? $instance['item_width_lg'] : '';
      $item_width_md       = isset( $instance['item_width_md'] ) ? $instance['item_width_md'] : '2';
      $item_width_sm       = isset( $instance['item_width_sm'] ) ? $instance['item_width_sm'] : '';
      $item_width_xs       = isset( $instance['item_width_xs'] ) ? $instance['item_width_xs'] : '';
      $vc_hidden_lg        = isset( $instance['vc_hidden-lg'] ) ? $instance['vc_hidden-lg'] : '';
      $vc_hidden_md        = isset( $instance['vc_hidden-md'] ) ? $instance['vc_hidden-md'] : '';
      $vc_hidden_sm        = isset( $instance['vc_hidden-sm'] ) ? $instance['vc_hidden-sm'] : '';
      $vc_hidden_xs        = isset( $instance['vc_hidden-xs'] ) ? $instance['vc_hidden-xs'] : '';
      $spacing             = isset( $instance['spacing'] ) ? $instance['spacing'] : '0';
      $show_likes_comments = isset( $instance['show_likes_comments'] ) ? $instance['show_likes_comments'] : '';
      $link_new_page       = isset( $instance['link_new_page'] ) ? $instance['link_new_page'] : '';
      $show_follow_text    = isset( $instance['show_follow_text'] ) ? $instance['show_follow_text'] : '';
      $follow_text         = isset( $instance['follow_text'] ) ? $instance['follow_text'] : __( 'Follow us on Instagram', 'infinity' );
      $square_media        = isset( $instance['square_media'] ) ? $instance['square_media'] : 'on';

      $this->responsive_data = array(
        'lg'           => $item_width_lg,
        'md'           => $item_width_md,
        'sm'           => $item_width_sm,
        'xs'           => $item_width_xs,
        'vc_hidden-lg' => $vc_hidden_lg,
        'vc_hidden-md' => $vc_hidden_md,
        'vc_hidden-sm' => $vc_hidden_sm,
        'vc_hidden-xs' => $vc_hidden_xs,
      );

      $this->responsive = join( ' ', $this->responsive_data );

      echo $args['before_widget'];

      $output = '<h5 class="widget-title">' . $title . '</h5>';

      $class = '';
      if ( '' != $this->responsive ) {
        $class .= $this->responsive;
      } else {
        $class = $item_width_md;
      }
      // if hidden on device, find [class*=col] and replace to '', use only vc_hidden
      $class_container = preg_replace( '/col\-(lg|md|sm|xs)[^\s]*/', '', $class );
      $output .= '<div class="tm-instagram container ' . trim( $class_container ) . '">';
      if ( ! empty( $username ) ) {
        $media_array = $this->scrape_instagram( $username, $number_items, $square_media );

        if ( is_wp_error( $media_array ) ) {
          $output .= '<div class="tm-instagram--error"><p>' . $media_array->get_error_message() . '</p></div>';
        } else {
          $output .= '<ul class="tm-instagram-pics row">';
          foreach ( $media_array as $item ) {
            $output .= '<li class="item ' . trim( $class ) . '"style="padding:0 ' . $spacing . 'px ' . $spacing . 'px' . ' 0;">';

            if ( 'on' == $show_likes_comments ) {
              $output .= '<ul class="item-info" style="width:calc(100% - ' . $spacing . 'px);">';
              $output .= '<li class="likes"><a href="' . esc_url( $item['link'] ) . '" target="' . ( $link_new_page == 'on' ? '_blank' : '_self' ) . '" title="' . $item['description'] . '"><span>' . $item['likes'] . '</span></a></li>';
              $output .= '<li class="comments"><a href="' . esc_url( $item['link'] ) . '" target="' . ( $link_new_page == 'on' ? '_blank' : '_self' ) . '" title="' . $item['description'] . '"><span>' . $item['comments'] . '</span></a></li>';
              $output .= '</ul>';
            }


            $output .= '<img src="' . esc_url( $item['thumbnail'] ) . '" alt="' . $item['description'] . '" class="item-image"/>';
            if ( 'video' == $item['type'] ) {
              $output .= '<span class="play-button"></span>';
            }

            $output .= '<div class="overlay" style="margin:0 ' . $spacing . 'px ' . $spacing . 'px' . ' 0;">';
            $output .= '<a href="' . esc_url( $item['link'] ) . '" target="' . ( $link_new_page == 'on' ? '_blank' : '_self' ) . '">See on Instagram</a>';
            $output .= '</div>';

            $output .= '</li>';
          }
          $output .= '</ul>';

          if ( 'on' == $show_follow_text ) {
            $output .= '<p class="tm-instagram-follow-links">' . $follow_text . '</p>';
          }
        }
      }

      $output .= '</div>';

      echo $output;

      echo $args['after_widget'];
    }

    function update( $new_instance, $old_instance ) {
      $instance = $old_instance;

      $instance['title']               = strip_tags( $new_instance['title'] );
      $instance['username']            = strip_tags( $new_instance['username'] );
      $instance['number_items']        = strip_tags( $new_instance['number_items'] );
      $instance['item_width_lg']       = strip_tags( $new_instance['item_width_lg'] );
      $instance['item_width_md']       = strip_tags( $new_instance['item_width_md'] );
      $instance['item_width_sm']       = strip_tags( $new_instance['item_width_sm'] );
      $instance['item_width_xs']       = strip_tags( $new_instance['item_width_xs'] );
      $instance['hidden_lg']           = strip_tags( $new_instance['hidden_lg'] );
      $instance['hidden_md']           = strip_tags( $new_instance['hidden_md'] );
      $instance['hidden_sm']           = strip_tags( $new_instance['hidden_sm'] );
      $instance['hidden_xs']           = strip_tags( $new_instance['hidden_xs'] );
      $instance['spacing']             = strip_tags( $new_instance['spacing'] );
      $instance['show_likes_comments'] = strip_tags( $new_instance['show_likes_comments'] );
      $instance['show_follow_text']    = strip_tags( $new_instance['show_follow_text'] );
      $instance['follow_text']         = $new_instance['follow_text'];
      $instance['link_new_page']       = strip_tags( $new_instance['link_new_page'] );
      $instance['square_media']        = strip_tags( $new_instance['square_media'] );


      $this->responsive_data = array(
        'lg'        => $new_instance['item_width_lg'],
        'md'        => $new_instance['item_width_md'],
        'sm'        => $new_instance['item_width_sm'],
        'xs'        => $new_instance['item_width_xs'],
        'hidden_lg' => $new_instance['hidden_lg'],
        'hidden_md' => $new_instance['hidden_md'],
        'hidden_sm' => $new_instance['hidden_sm'],
        'hidden_xs' => $new_instance['hidden_xs'],
      );

      return $instance;
    }

    function form( $instance ) {
      $title               = isset( $instance['title'] ) ? $instance['title'] : '';
      $username            = isset( $instance['username'] ) ? $instance['username'] : '';
      $number_items        = isset( $instance['number_items'] ) ? $instance['number_items'] : '6';
      $item_width_lg       = isset( $instance['item_width_lg'] ) ? $instance['item_width_lg'] : '';
      $item_width_md       = isset( $instance['item_width_md'] ) ? $instance['item_width_md'] : 'col-md-2';
      $item_width_sm       = isset( $instance['item_width_sm'] ) ? $instance['item_width_sm'] : '';
      $item_width_xs       = isset( $instance['item_width_xs'] ) ? $instance['item_width_xs'] : '';
      $vc_hidden_lg        = isset( $instance['vc_hidden-lg'] ) ? $instance['vc_hidden-lg'] : '';
      $vc_hidden_md        = isset( $instance['vc_hidden-md'] ) ? $instance['vc_hidden-md'] : '';
      $vc_hidden_sm        = isset( $instance['vc_hidden-sm'] ) ? $instance['vc_hidden-sm'] : '';
      $vc_hidden_xs        = isset( $instance['vc_hidden-xs'] ) ? $instance['vc_hidden-xs'] : '';
      $spacing             = isset( $instance['spacing'] ) ? $instance['spacing'] : '0';
      $show_likes_comments = isset( $instance['show_likes_comments'] ) ? $instance['show_likes_comments'] : '';
      $show_follow_text    = isset( $instance['show_follow_text'] ) ? $instance['show_follow_text'] : '';
      $follow_text         = isset( $instance['follow_text'] ) ? $instance['follow_text'] : __( 'Follow us on Instagram', 'infinity' );
      $link_new_page       = isset( $instance['link_new_page'] ) ? $instance['link_new_page'] : '';
      $square_media        = isset( $instance['square_media'] ) ? $instance['square_media'] : 'on';

      $this->responsive_data = array(
        'lg'           => $item_width_lg,
        'md'           => $item_width_md,
        'sm'           => $item_width_sm,
        'xs'           => $item_width_xs,
        'vc_hidden-lg' => $vc_hidden_lg,
        'vc_hidden-md' => $vc_hidden_md,
        'vc_hidden-sm' => $vc_hidden_sm,
        'vc_hidden-xs' => $vc_hidden_xs,
      );
      ?>

      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" value="<?php echo esc_attr( $title ); ?>" />
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"><?php _e( 'User Name', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'username' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'username' ) ); ?>" value="<?php echo esc_attr( $username ); ?>" />
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'number_items' ) ); ?>"><?php _e( 'Number of items', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'usenumber_itemsrname' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'number_items' ) ); ?>" value="<?php echo esc_attr( $number_items ); ?>" />
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'item_width_md' ) ); ?>"><?php _e( 'Item Width', 'infinity' ); ?></label>

        <?php echo $this->sizeControl( 'md' ); ?>
      </p>
      <p class="help"><?php echo _e( 'Enter item width in a row (has 12 columns)', 'infinity' ); ?></p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'spacing' ) ); ?>"><?php _e( 'Item spacing', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'spacing' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'spacing' ) ); ?>" value="<?php echo esc_attr( $spacing ); ?>" />
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_likes_comments' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_likes_comments' ) ); ?>" <?php checked( $show_likes_comments, 'on' ); ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_likes_comments' ) ); ?>"><?php _e( 'Show likes and comments', 'infinity' ) ?></label>
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'show_follow_text' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'show_follow_text' ) ); ?>" <?php checked( $show_follow_text, 'on' ); ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'show_follow_text' ) ); ?>"><?php _e( 'Show follow text', 'infinity' ) ?></label>
      </p>
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'follow_text' ) ); ?>"><?php _e( 'Text', 'infinity' ) ?></label>
        <input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'spacing' ) ); ?>"
               name="<?php echo esc_attr( $this->get_field_name( 'follow_text' ) ); ?>" value="<?php echo esc_attr( $follow_text ); ?>" />
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'link_new_page' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'link_new_page' ) ); ?>" <?php checked( $link_new_page == 'on' ); ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'link_new_page' ) ); ?>"><?php _e( 'Open links in new page:', 'infinity' ) ?></label>
      </p>
      <p>
        <input type="checkbox" id="<?php echo esc_attr( $this->get_field_id( 'square_media' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'square_media' ) ); ?>" <?php checked( $square_media == 'on' ); ?> />
        <label for="<?php echo esc_attr( $this->get_field_id( 'square_media' ) ); ?>"><?php _e( 'Show square media', 'infinity' ) ?></label>
      </p>
      <strong><?php _e( 'Responsiveness', 'infinity' ); ?></strong>
      <table class="tm_table tm_insta-responsive-table">
        <tr>
          <th><?php _e( 'Device', 'infinity' ); ?></th>
          <th><?php _e( 'Item width', 'infinity' ); ?></th>
          <th><?php _e( 'Hide on device?', 'infinity' ); ?></th>
        </tr>
        <?php foreach ( $this->sizes as $key => $size ) { ?>
          <tr class="tm_size-<?php echo esc_attr( $key ); ?>">
            <td class="tm_screen-size tm_screen-size--<?php echo esc_attr( $key ); ?>">
              <i class="fa <?php echo esc_attr( $this->icons[ $key ] ); ?>" title="<?php echo esc_attr( $size ) ?>"></i>
            </td>
            <td class="tm_item-width"><?php echo $this->sizeControl( $key, false ); ?></td>
            <td>
              <label>
                <input type="checkbox" name="<?php echo esc_attr( $this->get_field_name( 'vc_hidden-' . $key ) ); ?>"
                       value="<?php echo 'vc_hidden-' . esc_attr( $key ); ?>" <?php echo esc_attr( $this->responsive_data[ 'vc_hidden-' . $key ] != '' ? ' checked="true"' : "" ); ?>/>
              </label>
            </td>
          </tr>
        <?php } ?>
      </table>
      <?php
    }

    /**
     * Render size control for widget
     *
     * @param      $size_key
     * @param bool $enable_md : Display select control for medium devices
     *
     * @return string
     */
    private function sizeControl( $size_key, $enable_md = true ) {

      if ( $size_key == 'md' && ! $enable_md ) {
        return '<span class="description">' . __( 'Default value from "Number of items in a row" attribute', 'infinity' ) . '</span>';
      }

      $empty_label = $size_key === 'xs' ? '' : __( 'Inherit from smaller', 'infinity' );
      $output      = '<select' . ' name="' . esc_attr( $this->get_field_name( 'item_width_' . $size_key ) ) . '">';
      if ( $size_key != 'md' ) {
        $output .= '<option value="" style="color: #ccc;">' . $empty_label . '</option>';
      }
      foreach ( $this->item_width_list as $label => $width ) {
        $value = 'col-' . $size_key . '-' . $width;
        $output .= '<option value="' . esc_attr( $value ) . '"' . ( in_array( $value, $this->responsive_data ) ? ' selected="true"' : '' ) . '>' . $label . '</option>';
      }
      $output .= '</select>';

      return $output;
    }

    /**
     * Quick-and-dirty Instagram web scrape
     * based on https://gist.github.com/cosmocatalano/4544576
     *
     * @param     $username
     * @param int $slice
     *
     * @return array|WP_Error
     */
    public function scrape_instagram( $username, $slice, $square_media ) {

      $username = strtolower( $username );

      if ( false === ( $instagram = get_transient( 'instagram-media-new-' . sanitize_title_with_dashes( $username . '-' . $square_media ) ) ) ) {

        $remote = wp_remote_get( 'http://instagram.com/' . trim( $username ) );

        if ( is_wp_error( $remote ) ) {
          return new WP_Error( 'site_down', __( 'Unable to communicate with Instagram.', 'infinity' ) );
        }

        if ( 200 != wp_remote_retrieve_response_code( $remote ) ) {
          return new WP_Error( 'invalid_response', __( 'Instagram did not return a 200.', 'infinity' ) );
        }

        $shards      = explode( 'window._sharedData = ', $remote['body'] );
        $insta_json  = explode( ';</script>', $shards[1] );
        $insta_array = json_decode( $insta_json[0], true );

        if ( ! $insta_array ) {
          return new WP_Error( 'bad_json', __( 'Instagram has returned invalid data.', 'infinity' ) );
        }

        // old style
        if ( isset( $insta_array['entry_data']['UserProfile'][0]['userMedia'] ) ) {
          $media_arr = $insta_array['entry_data']['UserProfile'][0]['userMedia'];
          $type      = 'old';
          // new style
        } else if ( isset( $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'] ) ) {
          $media_arr = $insta_array['entry_data']['ProfilePage'][0]['user']['media']['nodes'];
          $type      = 'new';
        } else {
          return new WP_Error( 'bad_josn_2', __( 'Instagram has returned invalid data.', 'infinity' ) );
        }

        if ( ! is_array( $media_arr ) ) {
          return new WP_Error( 'bad_array', __( 'Instagram has returned invalid data.', 'infinity' ) );
        }

        switch ( $type ) {
          case 'old':
            $instagram = $this->get_media_old_style( $username, $media_arr );
            break;
          default:
            $instagram = $this->get_media_new_style( $media_arr, $square_media );
            break;
        }

        // do not set an empty transient - should help catch private or empty accounts
        if ( ! empty( $instagram ) ) {
          $instagram = base64_encode( serialize( $instagram ) );
          set_transient( 'instagram-media-new-' . sanitize_title_with_dashes( $username . '-' . $square_media ), $instagram, apply_filters( 'null_instagram_cache_time', HOUR_IN_SECONDS * 2 ) );
        }
      }

      if ( ! empty( $instagram ) ) {

        $instagram = unserialize( base64_decode( $instagram ) );

        return array_slice( $instagram, 0, $slice );;

      } else {

        return new WP_Error( 'no_images', __( 'Instagram did not return any images.', 'infinity' ) );

      }
    }

    /**
     * @param $username
     * @param $media_arr
     *
     * @return array
     */
    public function get_media_old_style( $username, $media_arr ) {

      $instagram = array();

      foreach ( $media_arr as $media ) {

        if ( $media['user']['username'] == $username ) {

          $media['link']                          = preg_replace( "/^http:/i", "", $media['link'] );
          $media['images']['thumbnail']           = preg_replace( "/^http:/i", "", $media['images']['thumbnail'] );
          $media['images']['standard_resolution'] = preg_replace( "/^http:/i", "", $media['images']['standard_resolution'] );
          $media['images']['low_resolution']      = preg_replace( "/^http:/i", "", $media['images']['low_resolution'] );

          $instagram[] = array(
            'description' => $media['caption']['text'],
            'link'        => $media['link'],
            'time'        => $media['created_time'],
            'comments'    => $this->roundNumber( $media['comments']['count'] ),
            'likes'       => $this->roundNumber( $media['likes']['count'] ),
            'thumbnail'   => $media['images']['thumbnail']['url'],
            'large'       => $media['images']['standard_resolution']['url'],
            'small'       => $media['images']['low_resolution']['url'],
            'type'        => $media['type'],
          );
        }
      }

      return $instagram;
    }

    /**
     * @param $media_arr
     *
     * @return array
     */
    public function get_media_new_style( $media_arr, $square_media ) {

      $instagram = array();

      foreach ( $media_arr as $media ) {

        $image_src = ( 'on' == $square_media ) ? 'thumbnail_src' : 'display_src';

        $media[ $image_src ] = preg_replace( "/^http:/i", "", $media[ $image_src ] );

        if ( $media['is_video'] == true ) {
          $type = 'video';
        } else {
          $type = 'image';
        }

        $instagram[] = array(
          'description' => $media['caption'],
          'link'        => '//instagram.com/p/' . $media['code'],
          'time'        => $media['date'],
          'comments'    => $this->roundNumber( $media['comments']['count'] ),
          'likes'       => $this->roundNumber( $media['likes']['count'] ),
          'thumbnail'   => $media[ $image_src ],
          'type'        => $type,
        );
      }

      return $instagram;
    }

    /**
     * Generate rounded number
     * Example: 11200 --> 11K
     *
     * @param $number
     *
     * @return string
     */
    public function roundNumber( $number ) {
      if ( $number > 999 && $number <= 999999 ) {
        $result = floor( $number / 1000 ) . ' K';
      } elseif ( $number > 999999 ) {
        $result = floor( $number / 1000000 ) . ' M';
      } else {
        $result = $number;
      }

      return $result;
    }
  } // end class
} // end if
