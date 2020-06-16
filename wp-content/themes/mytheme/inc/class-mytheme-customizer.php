<?php
/**
 * This is a customizer tmeplate.
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
 * Add custom section and settings to the Admin customizer.
 */
class Mytheme_Customizer {
	/**
	 * Registering customizer.
	 */
	public function __construct() {
		add_action( 'customize_register', array( $this, 'register_customize_sections' ) );

	}

	/**
	 * Initialising section.
	 *
	 * @param [type] $wp_customize is an object of WP_Customize_Manager().
	 * @return void
	 */
	public function register_customize_sections( $wp_customize ) {

		$this->author_callout_section( $wp_customize );
		$this->body_background( $wp_customize );
	}


	/**
	 * Author Section
	 *
	 * @param [type] $wp_customize is an object of WP_Customize_Manager().
	 * @return void
	 */
	private function author_callout_section( $wp_customize ) {
		// New panel for "Layout".
		$wp_customize->add_section(
			'basic-author-callout-section',
			array(
				'title'       => 'Author',
				'priority'    => 2,
				'description' => __( 'The Author section is only displayed on the Blog page.', 'mytheme' ),
			)
		);

		$wp_customize->add_setting(
			'basic-author-callout-display',
			array(
				'default'           => 'No',
				'sanitize_callback' => array(
					$this,
					'sanitize_custom_option',
				),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'basic-author-callout-display-control',
				array(
					'label'    => 'Display this section?',
					'section'  => 'basic-author-callout-section',
					'settings' => 'basic-author-callout-display',
					'type'     => 'select',
					'choices'  => array(
						'No'  => 'No',
						'Yes' => 'Yes',
					),
				)
			)
		);

		$wp_customize->add_setting(
			'basic-author-callout-text',
			array(
				'default'           => '',
				'sanitize_callback' => array(
					$this,
					'sanitize_custom_text',
				),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Control(
				$wp_customize,
				'basic-author-callout-text-control',
				array(
					'label'    => 'About Author',
					'section'  => 'basic-author-callout-section',
					'settings' => 'basic-author-callout-text',
					'type'     => 'textarea',
				),
			)
		);

		$wp_customize->add_setting(
			'basic-author-callout-image',
			array(
				'default'           => '',
				'type'              => 'theme_mod',
				'capability'        => 'edit_theme_options',
				'sanitize_callback' => array( $this, 'sanitize_custom_url' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Cropped_Image_Control(
				$wp_customize,
				'basic-author-callout-image-control',
				array(
					'label'    => 'Image',
					'section'  => 'basic-author-callout-section',
					'settings' => 'basic-author-callout-image',
					'width'    => 450,
					'height'   => 320,
				)
			)
		);

	}

	/**
	 * Author Section
	 *
	 * @param [type] $wp_customize is an object of WP_Customize_Manager().
	 * @return void
	 */
	private function body_background( $wp_customize ) {
		$wp_customize->add_section(
			'background_colour',
			array(
				'title'       => 'Background color',
				'priority'    => 3,
				'description' => __( 'This changes the color of the body.', 'mytheme' ),
			)
		);

		$wp_customize->add_setting(
			'body-background',
			array(
				'default'   => '#fff',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'body_bg_color',
				array(
					'label'    => 'Background',
					'section'  => 'background_colour',
					'settings' => 'body-background',
				),
			)
		);
	}

	/**
	 * Sanitize Inputs
	 *
	 * @param [type] $input sanitizes the input.
	 */
	public function sanitize_custom_option( $input ) {
		return ( 'No' === $input ) ? 'No' : 'Yes';
	}

	/**
	 * Sanitizes input string.
	 *
	 * @param [type] $input sanitizes input string.
	 */
	public function sanitize_custom_text( $input ) {
		return filter_var( $input, FILTER_SANITIZE_STRING );
	}

	/**
	 * Snaitizes input url.
	 *
	 * @param [type] $input sanitizes input url.
	 */
	public function sanitize_custom_url( $input ) {
		return filter_var( $input, FILTER_SANITIZE_URL );
	}
}

/**
 * Function to display background color on front end.
 */
function bg_color() { ?>
	<style>
		body{
			background: <?php echo esc_html( get_theme_mod( 'body-background' ) ); ?>;
		}
	</style>

	<?php
}

add_action( 'wp_head', 'bg_color' );
