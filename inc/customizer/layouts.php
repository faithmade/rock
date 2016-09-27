<?php
/**
 * Customizer Layouts functionality.
 *
 * @package Rock
 * @since   1.0.0
 */

class Rock_Customizer_Layouts {

	/**
	 * Array of custom layouts.
	 *
	 * @var array
	 */
	protected $layouts = array();

	/**
	 * Default layout key.
	 *
	 * @var string
	 */
	protected $default = 'two-column-default';

	/**
	 * Enable post/page overrides via meta box.
	 *
	 * @var bool
	 */
	protected $meta_box = true;

	/**
	 * Array of page widths.
	 *
	 * @var bool
	 */
	protected $page_widths = array();

	/**
	 * Class constructor.
	 */
	public function __construct() {

		/**
		 * Filter the registered layouts.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		$this->layouts = (array) apply_filters( 'rock_layouts',
			array(
				'one-column-wide'       => esc_html__( 'One Column: Wide', 'rock' ),
				'one-column-narrow'     => esc_html__( 'One Column: Narrow', 'rock' ),
				'two-column-default'    => esc_html__( 'Two Columns: Content | Sidebar', 'rock' ),
				'two-column-reversed'   => esc_html__( 'Two Columns: Sidebar | Content', 'rock' ),
				'three-column-default'  => esc_html__( 'Three Columns: Content | Sidebar | Sidebar', 'rock' ),
				'three-column-center'   => esc_html__( 'Three Columns: Sidebar | Content | Sidebar', 'rock' ),
				'three-column-reversed' => esc_html__( 'Three Columns: Sidebar | Sidebar | Content', 'rock' ),
			)
		);

		if ( ! $this->layouts ) {

			return;

		}

		/**
		 * Filter the default layout.
		 *
		 * @since 1.0.0
		 *
		 * @var string
		 */
		$default       = (string) apply_filters( 'rock_default_layout', $this->default );
		$this->default = $this->layout_exists( $default ) ? $default : ( $this->layout_exists( $this->default ) ? $this->default : key( $this->layouts ) );

		/**
		 * Filter if post/page overrides via meta box should be enabled.
		 *
		 * @since 1.0.0
		 *
		 * @var bool
		 */
		$this->meta_box = (bool) apply_filters( 'rock_layouts_meta_box_enabled', $this->meta_box );

		/**
		 * Filter the registered page widths.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		$this->page_widths = (array) apply_filters( 'rock_page_widths',
			array(
				'fixed' => esc_html_x( 'Fixed', 'fixed-width page layout', 'rock' ),
				'fluid' => esc_html_x( 'Fluid', 'fluid-width page layout', 'rock' ),
			)
		);

		add_action( 'init', array( $this, 'rtl_layouts' ), 11 );
		add_action( 'init', array( $this, 'post_type_support' ), 11 );

		add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
		add_action( 'customize_register',    array( $this, 'customize_register' ) );

		if ( $this->meta_box ) {

			add_action( 'load-post.php',     array( $this, 'load_post' ) );
			add_action( 'load-post-new.php', array( $this, 'load_post' ) );
			add_action( 'save_post',         array( $this, 'save_post' ) );

		}

		add_filter( 'body_class', array( $this, 'body_class' ) );

	}

	/**
	 * Alter some registered layouts when in RTL mode.
	 *
	 * @action init
	 * @since  1.0.0
	 */
	public function rtl_layouts() {

		if ( ! is_rtl() ) {

			return;

		}

		/**
		 * Filter changes needed for registered layouts when in RTL mode.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		$rtl_layouts = (array) apply_filters( 'rock_layouts_rtl',
			array(
				'two-column-default'    => esc_html__( 'Two Columns: Sidebar | Content', 'rock' ),
				'two-column-reversed'   => esc_html__( 'Two Columns: Content | Sidebar', 'rock' ),
				'three-column-default'  => esc_html__( 'Three Columns: Sidebar | Sidebar | Content', 'rock' ),
				'three-column-reversed' => esc_html__( 'Three Columns: Content | Sidebar | Sidebar', 'rock' ),
			)
		);

		$this->layouts = array_merge( $this->layouts, $rtl_layouts );

	}

	/**
	 * Add post type support.
	 *
	 * @action init
	 * @since  1.0.0
	 */
	public function post_type_support() {

		/**
		 * Filter the post types that allow layouts.
		 *
		 * @since 1.0.0
		 *
		 * @var array
		 */
		$post_types = (array) apply_filters( 'rock_layouts_post_types', get_post_types( array( 'public' => true ) ) );

		foreach ( $post_types as $post_type ) {

			add_post_type_support( $post_type, 'rock-layouts' );

		}

	}

	/**
	 * Enqueue scripts and styles for post meta box.
	 *
	 * @action admin_enqueue_scripts
	 * @since  1.0.0
	 *
	 * @param string $hook
	 */
	public function admin_enqueue_scripts( $hook ) {

		if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ) ) ) {

			return;

		}

		$rtl    = is_rtl() ? '-rtl' : '';
		$suffix = SCRIPT_DEBUG ? '' : '.min';

		wp_enqueue_script(
			'rock-layouts',
			get_template_directory_uri() . "/assets/js/admin/layouts{$suffix}.js",
			array( 'jquery' ),
			ROCK_VERSION
		);

		wp_enqueue_style(
			'rock-layouts',
			get_template_directory_uri() . "/assets/css/admin/layouts{$rtl}{$suffix}.css",
			array(),
			ROCK_VERSION
		);

	}

	/**
	 * Add a new meta box to post screens.
	 *
	 * @action load-post.php
	 * @action load-post-new.php
	 * @since  1.0.0
	 * @uses   $this->add_meta_box()
	 */
	public function load_post() {

		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ), 10, 2 );

	}

	/**
	 * Add post meta box for custom layouts.
	 *
	 * @see   $this->load_post()
	 * @since 1.0.0
	 * @uses  $this->render_meta_box()
	 *
	 * @param string  $post_type
	 * @param WP_Post $post
	 */
	public function add_meta_box( $post_type, WP_Post $post ) {

		if (
			! post_type_supports( $post_type, 'rock-layouts' )
			||
			! current_user_can( 'edit_post_meta', $post->ID )
			||
			! current_user_can( 'add_post_meta', $post->ID )
			||
			! current_user_can( 'delete_post_meta', $post->ID )
		) {

			return;

		}

		add_meta_box(
			'rock-layouts-meta-box',
			esc_html__( 'Layout', 'rock' ),
			array( $this, 'render_meta_box' ),
			$post_type,
			'side',
			'default'
		);

	}

	/**
	 * Display the custom layouts post meta box.
	 *
	 * @see   $this->add_meta_box()
	 * @since 1.0.0
	 *
	 * @param WP_Post $post
	 * @param string  $box
	 */
	public function render_meta_box( WP_Post $post, $box ) {

		$cur_layout = $this->get_post_layout( $post->ID );
		$has_custom = ! empty( $cur_layout );

		wp_nonce_field( basename( __FILE__ ), 'rock-layout-nonce' );

		?>

		<div class="rock-layout">

			<p>
				<label for="rock-layout-use-default">
					<input type="radio"
					       name="rock-layout-override"
					       id="rock-layout-use-default"
					       value="0"
					       autocomplete="off"
						<?php checked( ! $has_custom ); ?>>
					<?php _e( 'Default', 'rock' ); ?>
				</label>
				<label for="rock-layout-use-custom">
					<input type="radio"
					       name="rock-layout-override"
					       id="rock-layout-use-custom"
					       value="1"
					       autocomplete="off"
						<?php checked( $has_custom ); ?>>
					<?php _e( 'Custom', 'rock' ); ?>
				</label>
				<span class="clear"></span>
			</p>

			<?php $this->print_layout_choices( $this->layouts, $post->ID, $cur_layout, $has_custom ); ?>

		</div>

		<?php

	}

	/**
	 * Print all layouts choices to meta-box or customizer
	 *
	 * @param      $layouts
	 * @param null $post_id
	 * @param null $cur_layout
	 * @param bool $has_custom
	 */
	public function print_layout_choices( $layouts, $post_id = null, $cur_layout = null, $has_custom = true ) {

		global $wp_customize;

		$global_layout = $this->get_global_layout();

		if ( ! $cur_layout ) {

			$cur_layout = $global_layout;

		}

		$name = isset( $wp_customize ) ? '_customize-radio' : 'rock';

		?>

		<div class="rock-layout-wrap">

			<ul>

				<?php

				foreach ( $layouts as $layout => $label ) :

					$class = ( $has_custom ) ? 'active' : 'disabled';
					$class .= ( $layout === $global_layout ) ? ' active global' : '';

					?>

					<li class="<?php echo esc_attr( $class ); ?>">
						<label for="rock-layout-<?php echo esc_attr( $layout ); ?>">
							<input type="radio"
							       name="<?php echo $name; // xss ok ?>-layout"
							       data-customize-setting-link="layout"
							       id="rock-layout-<?php echo esc_attr( $layout ); ?>"
							       value="<?php echo esc_attr( $layout ); ?>"
								   <?php checked( $cur_layout, $layout ); ?>
								   <?php disabled( 'disabled' === $class ); ?>>
							<img src="<?php echo esc_url( sprintf( '%s/assets/layouts/%s%s.svg', get_template_directory_uri(), $layout, is_rtl() ? '-rtl' : '' ) ); ?>"
							     alt="<?php echo esc_attr( $label ); ?>"
							     title="<?php echo esc_attr( $label ); ?>">
							<span><?php echo esc_html( $label ); ?></span>
						</label>
					</li>

				<?php endforeach; ?>

			</ul>

		</div>

		<?php

	}

	/**
	 * Save layout post meta.
	 *
	 * @action save_post
	 * @since  1.0.0
	 *
	 * @param int $post_id
	 */
	public function save_post( $post_id ) {

		if (
			empty( $_POST['rock-layout-nonce'] )
			||
			! wp_verify_nonce( $_POST['rock-layout-nonce'], basename( __FILE__ ) )
		) {

			return;

		}

		$override = ! empty( $_POST['rock-layout-override'] );
		$current  = $this->get_post_layout( $post_id );

		if ( ! $override && $current ) {

			delete_post_meta( $post_id, 'rock_layout' );

			return;

		}

		$layout = isset( $_POST['rock-layout'] ) ? sanitize_key( $_POST['rock-layout'] ) : null;

		if ( ! $override || ! $this->layout_exists( $layout ) || $layout === $current ) {

			return;

		}

		update_post_meta( $post_id, 'rock_layout', $layout );

	}

	/**
	 * Register custom layout settings.
	 *
	 * @action customize_register
	 * @since  1.0.0
	 *
	 * @param WP_Customize_Manager $wp_customize
	 */
	public function customize_register( WP_Customize_Manager $wp_customize ) {

		$wp_customize->add_section(
			'layout',
			array(
				'title'      => esc_html__( 'Layout', 'rock' ),
				'priority'   => 30,
				'capability' => 'edit_theme_options',
			)
		);

		if ( ! $this->page_widths ) {

			return;

		}

		reset( $this->page_widths );

		$wp_customize->add_setting(
			'page_width',
			array(
				'default'           => key( $this->page_widths ),
				'sanitize_callback' => 'sanitize_key',
				'transport'         => 'postMessage',
			)
		);

		$wp_customize->add_control(
			'page_width',
			array(
				'label'       => esc_html__( 'Page Width', 'rock' ),
				'description' => esc_html__( 'Display your site differently on larger screens.', 'rock' ),
				'section'     => 'layout',
				'settings'    => 'page_width',
				'type'        => 'radio',
				'choices'     => $this->page_widths,
			)
		);

	}

	/**
	 * Add layout class to body element on the front-end.
	 *
	 * @filter body_class
	 * @since  1.0.0
	 *
	 * @param  array $classes
	 *
	 * @return array
	 */
	public function body_class( array $classes ) {

		$classes[] = sanitize_html_class( sprintf( 'layout-%s', $this->get_current_layout() ) );
		$classes[] = rock_is_fluid_width() ? 'no-max-width' : null;

		return array_filter( $classes );

	}

	/**
	 * Check if a layout exists.
	 *
	 * @since 1.0.0
	 *
	 * @param  string $layout
	 *
	 * @return bool
	 */
	protected function layout_exists( $layout ) {

		return isset( $this->layouts[ $layout ] );

	}

	/**
	 * Return a post ID.
	 *
	 * @param  WP_Post|int $post (optional)
	 *
	 * @return string
	 */
	protected function get_post_id( $post = null ) {

		return is_a( 'WP_Post', $post ) ? $post->ID : ( is_numeric( $post ) ? absint( $post ) : get_queried_object_id() );

	}

	/**
	 * Return the layout override for a post.
	 *
	 * @param  WP_Post|int $post (optional)
	 *
	 * @return string
	 */
	protected function get_post_layout( $post = null ) {

		return get_post_meta( $this->get_post_id( $post ), 'rock_layout', true );

	}

	/**
	 * Return the global layout.
	 *
	 * @return string
	 */
	public function get_global_layout() {

		return get_theme_mod( 'layout', $this->default );

	}

	/**
	 * Return the current layout.
	 *
	 * @param  WP_Post|int $post (optional)
	 *
	 * @return string
	 */
	public function get_current_layout( $post = null ) {

		$override = $this->get_post_layout( $post );
		$layout   = ( $override ) ? $override : $this->get_global_layout();

		/**
		 * Filter the current layout.
		 *
		 * @since 1.0.0
		 *
		 * @param WP_Post|int|null $post
		 *
		 * @var string
		 */
		$layout = (string) apply_filters( 'rock_current_layout', $layout, $post );

		return $this->layout_exists( $layout ) ? $layout : $this->default;

	}

}

$GLOBALS['rock_customizer_layouts'] = new Rock_Customizer_Layouts;
