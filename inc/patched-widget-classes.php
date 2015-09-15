<?php
/**
 * Classes extending Widgets created in Podcasts by Churchthemes.net
 *
 * Original Classes can be found in the Podcasts Plugin
 *
 * @package    Rock
 * @subpackage Includes
 * @copyright  Copyright (c) 2014, upthemes.com
 * @link       https://upthemes.com/themes/rock
 * @license    http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 * @since      1.0
 */

if( class_exists( 'SSP_Widget_Series' ) ) :

class Patched_SSP_Widget_Series extends SSP_Widget_Series {
	public function __construct() {
		parent::__construct();
	}

	function widget( $args, $instance ) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_podcast_series', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$series_id = $instance['series_id'];

		$series = get_term( $series_id, 'series' );

		if ( ! $series || is_wp_error( $series ) ) {
			$series = new StdClass();
			$series->name = 'Select a Series';
			$series->description = '';
			$series->slug = 'facekeyboardasfijdoaldksfmasdoi';
		}

		$title = ( $instance['title'] ) ? $instance['title'] : $series->name;

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$show_title = isset( $instance['show_title'] ) ? $instance['show_title'] : false;
		$show_desc = isset( $instance['show_desc'] ) ? $instance['show_desc'] : false;
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$query_args = ssp_episodes( 999, $series->slug, true, 'widget' );

		$qry = new WP_Query( apply_filters( 'ssp_widget_series_episodes_args', $query_args ) );

		if ( $qry->have_posts() ) :
?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>

		<?php if ( $show_title ) { ?>
			<h3><?php echo $series->name; ?></h3>
		<?php } ?>

		<?php if ( $show_desc ) { ?>
			<p><?php echo $series->description; ?></p>
		<?php } ?>

		<ul>
		<?php while ( $qry->have_posts() ) : $qry->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
			<?php if ( $show_date ) : ?>
				<span class="post-date"><?php echo get_the_date(); ?></span>
			<?php endif; ?>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		else : // No Episodes Found ?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>

		<?php if ( $show_title ) { ?>
			<h3><?php echo $series->name; ?></h3>
		<?php } ?>

		<?php if ( $show_desc ) { ?>
			<p><?php echo $series->description; ?></p>
		<?php } ?>

		<ul>
			<li>
			
			</li>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_podcast_series', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}
}

endif; // End if Parent Class Exists

/**
 * If SSP_Widget_Single_Episode class exists, extend it to create a compatabible widget
 */
if( class_exists( 'SSP_Widget_Single_Episode' ) ) :

class Patched_SSP_Widget_Single_Episode extends SSP_Widget_Single_Episode {

	public function __construct() {
		parent::__construct();
	}

	public function widget( $args, $instance ) {
		global $ss_podcasting;

		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_single_episode', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$episode_id = $instance['episode_id'];

		if( 0 == $episode_id ) {
			$ssp_episodes = ssp_episodes( 1 );
			if( 0 < count( $ssp_episodes ) ) {
				foreach( $ssp_episodes as $episode ) {
					$episode_id = $episode->ID;
					break;
				}
			}
		}

		if( ! $episode_id ) {
			// return;
		}

		$title = ( $instance['title'] ) ? $instance['title'] : get_the_title( $episode_id );

		if( ! $title || is_wp_error( $title ) ) {
			$title = 'Select an Episode';
		}

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		$show_title = isset( $instance['show_title'] ) ? $instance['show_title'] : false;
		$show_excerpt = isset( $instance['show_excerpt'] ) ? $instance['show_excerpt'] : false;
		$show_content = isset( $instance['show_content'] ) ? $instance['show_content'] : false;
		$show_player = isset( $instance['show_player'] ) ? $instance['show_player'] : false;
		$show_details = isset( $instance['show_details'] ) ? $instance['show_details'] : false;

		$content_items = array();

		if ( $show_title ) {
			$content_items[] = 'title';
		}

		if ( $show_excerpt ) {
			$content_items[] = 'excerpt';
		}

		if ( $show_content ) {
			$content_items[] = 'content';
		}

		if ( $show_player ) {
			$content_items[] = 'player';
		}

		if ( $show_details ) {
			$content_items[] = 'details';
		}

		// Get episode markup
		$html = $ss_podcasting->podcast_episode( $episode_id, $content_items, 'widget' );

		if ( ! $html ) {
			$html = "";
		}

		echo $args['before_widget'];

		if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}

		echo $html;

		echo $args['after_widget'];

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_single_episode', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}
}

endif; // If parent class exists

/**
 * If SSP_Widget_Recent_Episodes class exists, extend it to create a compatabible widget
 */
if( class_exists( 'SSP_Widget_Recent_Episodes' ) ) :
class Patched_SSP_Widget_Recent_Episodes extends SSP_Widget_Recent_Episodes {

	public function __construct() {
		parent::__construct();
	}

	public function widget($args, $instance) {
		$cache = array();
		if ( ! $this->is_preview() ) {
			$cache = wp_cache_get( 'widget_recent_episodes', 'widget' );
		}

		if ( ! is_array( $cache ) ) {
			$cache = array();
		}

		if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
		}

		if ( isset( $cache[ $args['widget_id'] ] ) ) {
			echo $cache[ $args['widget_id'] ];
			return;
		}

		ob_start();

		$title = ( ! empty( $instance['title'] ) ) ? $instance['title'] : __( 'Recent Episodes', 'ss-podcasting' );

		/** This filter is documented in wp-includes/default-widgets.php */
		$title = apply_filters( 'widget_title', $title, $instance, $this->id_base );

		if( ! $title ) {
			$title = 'Recent Episodes';
		}

		$number = ( ! empty( $instance['number'] ) ) ? absint( $instance['number'] ) : 5;
		if ( ! $number ) {
			$number = 5;
		}

		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : false;

		$query_args = ssp_episodes( $number, '', true, 'widget' );

		$qry = new WP_Query( apply_filters( 'ssp_widget_recent_episodes_args', $query_args ) );

		if ($qry->have_posts()) :
?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<ul>
		<?php while ( $qry->have_posts() ) : $qry->the_post(); ?>
			<li>
				<a href="<?php the_permalink(); ?>"><?php get_the_title() ? the_title() : the_ID(); ?></a>
			<?php if ( $show_date ) : ?>
				<span class="post-date"><?php echo get_the_date(); ?></span>
			<?php endif; ?>
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
		// Reset the global $the_post as this query will have stomped on it
		wp_reset_postdata();

		else : // No Recent Episodes ?>
		<?php echo $args['before_widget']; ?>
		<?php if ( $title ) {
			echo $args['before_title'] . $title . $args['after_title'];
		} ?>
		<ul>
		<?php while ( $qry->have_posts() ) : $qry->the_post(); ?>
			<li>
				No Recent Episodes
			</li>
		<?php endwhile; ?>
		</ul>
		<?php echo $args['after_widget']; ?>
<?php
		endif;

		if ( ! $this->is_preview() ) {
			$cache[ $args['widget_id'] ] = ob_get_flush();
			wp_cache_set( 'widget_recent_episodes', $cache, 'widget' );
		} else {
			ob_end_flush();
		}
	}
}
endif; // If parent class exists