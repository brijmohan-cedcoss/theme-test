<?php
/**
 * This is a custom widget file.
 * php version 7.3.5
 *
 * @category   null
 * @package    WordPress
 * @subpackage Mytheme
 * @author     brij1234 <brijmohan11.1996@gmail.com>
 * @license    GNU General Public License version 2 or later; see LICENSE
 * @link       https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since      Mytheme 1.0
 */

/**
 * Widget class.
 */
class Mytheme_Widget extends WP_Widget {
	/**
	 * Setting up widget description, name.
	 */
	public function __construct() {
		$args = array(
			'classname'   => 'Mytheme-widget',
			'description' => 'This is custom Mytheme widget',
		);
		parent::__construct( 'mytheme-widget', 'Mytheme-Widget', $args );
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
		esc_html( $args['before_widget'] );
		if ( ! empty( $instance['title'] ) ) {
			echo ( $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'] );
		}
		if ( ! empty( $instance['desc'] ) ) {
			esc_html_e( $instance['desc'] );
		}
		esc_html( $args['after_widget'] );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'text_domain' );
		$desc  = ! empty( $instance['desc'] ) ? $instance['desc'] : esc_html__( 'Give Your description here', 'text_domain' );
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', 'text_domain' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php esc_attr_e( 'Description:', 'text_domain' ); ?></label> 
		<textarea class="widefat" name="<?php echo esc_attr( $this->get_field_name( 'desc' ) ); ?>" id="<?php echo esc_attr( $this->get_field_id( 'desc' ) ); ?>"><?php echo esc_attr( $desc ); ?></textarea>
		</p>
		<?php
	}

	/**
	 * Function for save/update.
	 *
	 * @param array $new_instance Saved new values from database.
	 * @param array $old_instance Saved  old values from database.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance          = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';
		$instance['desc']  = ( ! empty( $new_instance['desc'] ) ) ? sanitize_text_field( $new_instance['desc'] ) : '';

		return $instance;
	}

}
add_action(
	'widgets_init',
	function() {
		register_widget( 'Mytheme_Widget' );
	}
);