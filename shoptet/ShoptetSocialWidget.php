<?php
 
class ShoptetSocialWidget extends WP_Widget {

  /**
   * Register widget with WordPress.
   */
  public function __construct() {
    parent::__construct( 'shoptet_social_widget', 'Shoptet Social Widget' );
  }
 
  /**
   * Front-end display of widget.
   *
   * @see WP_Widget::widget()
   *
   * @param array $args     Widget arguments.
   * @param array $instance Saved values from database.
   */
  public function widget( $args, $instance ) {
    extract( $args );
    $title = apply_filters( 'widget_title', $instance['title'] );

    echo $before_widget;
    if ( ! empty( $title ) ) {
        echo $before_title . $title . $after_title;
    }

    $current_url = get_permalink(get_the_ID());
    $encoded_url = urlencode($current_url);
    ?>
    <ul class="social-share">
      <li>
        <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $encoded_url; ?>" title="<?php _e( 'Share on Facebook', 'shoptet' ); ?>" target="_blank">
          <i class="fab fa-facebook-f"></i>
        </a>
      </li>
      <li>
        <a href="https://twitter.com/intent/tweet?text=<?php echo $encoded_url; ?>" title="<?php _e( 'Tweet on Twitter', 'shoptet' ); ?>" target="_blank">
          <i class="fab fa-twitter"></i>
        </a>
      </li>
    </ul>
    <?php
    echo $after_widget;
  }
 
  /**
   * Back-end widget form.
   *
   * @see WP_Widget::form()
   *
   * @param array $instance Previously saved values from database.
   */
  public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
      $title = $instance[ 'title' ];
    } else {
      $title = '';
    }
    ?>
    <p>
      <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
      <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
  <?php
  }
 
  /**
   * Sanitize widget form values as they are saved.
   *
   * @see WP_Widget::update()
   *
   * @param array $new_instance Values just sent to be saved.
   * @param array $old_instance Previously saved values from database.
   *
   * @return array Updated safe values to be saved.
   */
  public function update( $new_instance, $old_instance ) {
    $instance = array();
    $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

    return $instance;
  }
 
}
 
?>