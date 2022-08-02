<?php
namespace BlogFromBWD\Widgets;

use Elementor\Widget_Base;
use Elementor\Controls_Manager;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class BWDBPBlog extends Widget_Base {

	public function get_name() {
		return esc_html__( 'NameBlog', 'bwd-blog-post' );
	}

	public function get_title() {
		return esc_html__( 'BWD Blog Post', 'elementor' );
	}

	public function get_icon() {
		return 'eicon-post';
	}

	public function get_categories() {
		return [ 'bwd-blog-post-category' ];
	}

	public function get_script_depends() {
		return [ 'bwd-blog-post-category' ];
	}

	protected function register_controls() {

        $this->start_controls_section(
            'product-archive-conent',
            [
                'label' => __( 'Archive Product', 'ferdaussk' ),
            ]
        );
            
        $this->add_responsive_control(
            'number_sk',
            [
                'label' => __( 'Page Number', 'ferdaussk' ),
                'type' => Controls_Manager::NUMBER,
            ]
        );
        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
        $post_per_page = $settings['number_sk'];

		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

		$args = array(
			'post_type'=>'post', // Your post type name
			'posts_per_page' => $post_per_page,
			'paged' => $paged,
		);
		
		$wp_query = new \WP_Query( $args );
		if ( $wp_query->have_posts() ) {
			while ( $wp_query->have_posts() ) : $wp_query->the_post();
		
					 the_permalink(); the_title('</br>');
		
			endwhile;
		?></br><?php
			$total_pages = $wp_query->max_num_pages;
			if ($total_pages > 1){
				$current_page = max(1, get_query_var('paged'));
				echo paginate_links(array(
					'base' => get_pagenum_link(1) . '%_%',
					'format' => '/page/%#%',
					'current' => $current_page,
					'total' => $total_pages,
					'prev_text'    => __('« prev'),
					'next_text'    => __('next »'),
				));
			}    
		}
		wp_reset_postdata();
    }

}
