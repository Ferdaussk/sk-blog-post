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
		return 'bwdbp-blog-icon eicon-post';
	}

	public function get_categories() {
		return [ 'bwd-blog-post-category' ];
	}

	public function get_script_depends() {
		return [ 'bwd-blog-post-category' ];
	}

	protected function register_controls() {
		$this->start_controls_section(
			'bwdbp_blog_content_layout_section',
			[
				'label' => esc_html__( 'Post Layout', 'bwd-blog-post' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'bwdbp_style_selection',
			[
				'label' => esc_html__( 'Post Styles', 'bwd-blog-post' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'style1',
				'options' => [
					'style1' => esc_html__( 'Style 1', 'bwd-blog-post' ),
				],
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_post_columns',
			[
				'label' => esc_html__( 'Columns', 'bwd-blog-post' ),
				'type' => Controls_Manager::SELECT,
				'default' => '3',
				'options' => [
					'4' => esc_html__( 'Four Column', 'bwd-blog-post' ),
					'3' => esc_html__( 'Three Column', 'bwd-blog-post' ),
					'2' => esc_html__( 'Two Column', 'bwd-blog-post' ),
					'1' => esc_html__( 'One Column', 'bwd-blog-post' ),
				],
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'bwdbp_blog_content_section',
			[
				'label' => esc_html__( 'Post Settings', 'bwd-blog-post' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_post_image_height_size',
			[
				'label' => esc_html__( 'Thumbnail Ratio', 'bwd-blog-post' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'laptop', 'tablet', 'tablet_extra', 'mobile', 'mobile_extra' ],
				'selectors' => [
					'{{WRAPPER}} .bwd_blog_area .bwd_blog_img img' => 'height: {{SIZE}}{{UNIT}};',
				],
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_post_image_width_size',
			[
				'label' => esc_html__( 'Thumbnail Width', 'bwd-blog-post' ),
				'type' => Controls_Manager::SLIDER,
				'range' => [
					'px' => [
						'min' => 0,
						'max' => 1000,
					],
				],
				'devices' => [ 'desktop', 'laptop', 'tablet', 'tablet_extra', 'mobile', 'mobile_extra' ],
				'selectors' => [
					'{{WRAPPER}} .bwd_blog_area .bwd_blog_img img' => 'width: {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'bwdbp_divider_b',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);

		$this->add_control(
			'bwdbp_title_show_switcher',
			[
				'label' => esc_html__( 'Hide Title', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'Hide', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'bwdbp_description_show_switcher',
			[
				'label' => esc_html__( 'Hide Description', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'Hide', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_post_description_words',
			[
				'label' => esc_html__( 'Word Length', 'bwd-blog-post' ),
				'type' => Controls_Manager::NUMBER,
				'default' => 15,
				'condition' => [
					'bwdbp_description_show_switcher' => 'yes',
				],
			]
		);
		$this->add_control(
			'bwdbp_date_show_switcher',
			[
				'label' => esc_html__( 'Hide Date', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'Hide', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'bwdbp_blog_date_format',
			[
				'label' => esc_html__( 'Date Format', 'bwd-blog-post' ),
				'type' => Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'F j, y', 'bwd-blog-post' ),
				'label_block' => true,
				'condition' => [
					'bwdbp_date_show_switcher' => 'yes',
				],
				'description' => '<span class="pro-feature">Use WordPress date format. <a href="https://wordpress.org/support/article/formatting-date-and-time/" target="_blank">More...</a></span>',
			]
		);
		$this->add_control(
			'bwdbp_author_show_switcher',
			[
				'label' => esc_html__( 'Hide Author', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'Hide', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'bwdbp_comments_show_switcher',
			[
				'label' => esc_html__( 'Hide Comments', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'Hide', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'bwdbp_categories_show_switcher',
			[
				'label' => esc_html__( 'Hide Categories', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'Hide', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->add_control(
			'bwdbp_tags_show_switcher',
			[
				'label' => esc_html__( 'Hide Tags', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'Hide', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);

		$this->add_control(
			'bwdbp_divider_c',
			[
				'type' => Controls_Manager::DIVIDER,
			]
		);
		
		
		$this->add_control(
			'bwdbp_button_show_switcher',
			[
				'label' => esc_html__( 'Hide Button', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Show', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'Hide', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'yes',
			]
		);
		$this->add_control(
			'bwdbp_blog_button_title',
			[
				'label' => esc_html__( 'Button', 'bwd-blog-post' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__('Read More', 'bwd-blog-post'),
				'label_block' => true,
				'condition' => [
					'bwdbp_button_show_switcher' => 'yes',
				],
			]
		);
		$this->add_control(
			'bwdbp_button_open_switcher',
			[
				'label' => esc_html__( 'Open in new window', 'bwd-blog-post' ),
				'type' => Controls_Manager::SWITCHER,
				'label_on' => esc_html__( 'Yes', 'bwd-blog-post' ),
				'label_off' => esc_html__( 'No', 'bwd-blog-post' ),
				'return_value' => 'yes',
				'default' => 'no',
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'bwdbp_blog_query_section',
			[
				'label' => esc_html__( 'Post Query', 'bwd-blog-post' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_post_per_page',
			[
				'label' => esc_html__( 'Post Per Page', 'bwd-blog-post' ),
				'type' => Controls_Manager::NUMBER,
				'placeholder' => esc_html__( '00', 'bwd-blog-post' ),
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_cat_per_page',
			[
				'label' => esc_html__( 'Cat Per Page', 'bwd-blog-post' ),
				'type' => Controls_Manager::NUMBER,
				'placeholder' => esc_html__( '00', 'bwd-blog-post' ),
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_tag_per_page',
			[
				'label' => esc_html__( 'Tag Per Page', 'bwd-blog-post' ),
				'type' => Controls_Manager::NUMBER,
				'placeholder' => esc_html__( '00', 'bwd-blog-post' ),
			]
		);
		// For Category Filter
		$bwdbp_idObj = get_category_by_slug('category-slug');
		$bwdbp_order_options = array($bwdbp_idObj => 'All Categories');
		$bwdbp_categories = get_categories('orderby=name&hide_empty=0');
		foreach ($bwdbp_categories as $category):
			$bwdbp_catids = $category->slug;
			$bwdbp_catname = $category->name;
			$bwdbp_order_options[$bwdbp_catids] = $bwdbp_catname;
		endforeach;
		$this->add_responsive_control(
			'bwdbp_the_cat_columnsdd',
			[
				'label' => esc_html__( 'Categories', 'bwd-blog-post' ),
				'type' => Controls_Manager::SELECT,
				'default' => 0,
				'options' => $bwdbp_order_options,
			]
		);
		// For Tag
		// $bwdbp_tag_idObj = get_the_tags('tag-slug');
		// $bwdbp_order_tags_options = array($bwdbp_tag_idObj => 'All Tags');
		// $bwdbp_tags = get_tags('orderby=name&hide_empty=0');
		// // print_r($bwdbp_tags); die();
		// foreach ($bwdbp_tags as $tag):
		// 	$bwdbp_tags_catids = $tag->slug;
		// 	$bwdbp_tags_catname = $tag->name;
		// 	$bwdbp_order_tags_options[$bwdbp_tags_catids] = $bwdbp_tags_catname;
		// endforeach;
		$this->add_responsive_control(
			'bwdbp_the_tags_columnsdd',
			[
				'label' => esc_html__( 'Tags', 'bwd-blog-post' ),
				'type' => Controls_Manager::SELECT,
				'default' => 0,
				'options' => [
					'ferdaus_tag' => 'One',
					'dhaka_tag' => 'Two',
				],
				// 'options' => $bwdbp_order_tags_options,
			]
		);
		$this->end_controls_section();

		$this->start_controls_section(
			'bwdbp_blog_style_section',
			[
				'label' => esc_html__( 'Blog Style', 'bwd-blog-post' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);
		$this->add_responsive_control(
            'bwdbp_blog_the_box_border_radius',
            [
                'label' => esc_html__('Border Radius', 'bwd-blog-post'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', 'rem', '%'],
                'selectors' => [
                    '{{WRAPPER}} .bwdbp-blog' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
		$this->end_controls_section();
	}
	protected function render() {
		$settings = $this->get_settings_for_display();
		$bwdbp_styles = $settings['bwdbp_style_selection'];
		$bwdbp_post_per_page = $settings['bwdbp_the_post_per_page'];
		$bwdbp_cat_per_page = $settings['bwdbp_the_cat_per_page'];
		$bwdbp_tag_per_page = $settings['bwdbp_the_tag_per_page'];
		$bwdbp_post_column = $settings['bwdbp_the_post_columns'];
		$bwdbp_post_description_words = $settings['bwdbp_the_post_description_words'];
		$bwdbp_blog_date_format = $settings['bwdbp_blog_date_format'];
		if('1' === $bwdbp_post_column){
			$bwdbp_lg_dev_clmn = 'col-lg-12';
			$bwdbp_xl_dev_clmn = 'col-xl-12';
		} elseif('2' === $bwdbp_post_column){
			$bwdbp_lg_dev_clmn = 'col-lg-6';
			$bwdbp_xl_dev_clmn = 'col-xl-6';
		} elseif('3' === $bwdbp_post_column){
			$bwdbp_lg_dev_clmn = 'col-lg-4';
			$bwdbp_xl_dev_clmn = 'col-xl-4';
		} elseif('4' === $bwdbp_post_column){
			$bwdbp_lg_dev_clmn = 'col-lg-3';
			$bwdbp_xl_dev_clmn = 'col-xl-3';
		}
		$bwdbp_title_swtcher = $settings['bwdbp_title_show_switcher'];
		$bwdbp_description_swtcher = $settings['bwdbp_description_show_switcher'];
		$bwdbp_date_swtcher = $settings['bwdbp_date_show_switcher'];
		$bwdbp_author_swtcher = $settings['bwdbp_author_show_switcher'];
		$bwdbp_comments_swtcher = $settings['bwdbp_comments_show_switcher'];
		$bwdbp_categories_swtcher = $settings['bwdbp_categories_show_switcher'];
		$bwdbp_tags_swtcher = $settings['bwdbp_tags_show_switcher'];

		// Time start
		$text = $settings['bwdbp_blog_title01_text_time'];
		$wordCount = str_word_count($text);// getting the number of words
		$minutesToRead = round($wordCount / 200);// getting the number of minutes

		if($minutesToRead < 1){// if the time is less than a minute
		$minutes = 'less than a minute';
		}else{
		$minutes = $minutesToRead;// saving the time in the variable
		}
		// Time end

		$bwdbp_categorys_dataa = $settings['bwdbp_the_cat_columnsdd'];
		// $bwdbp_tags_dataa = $settings['bwdbp_the_tags_columnsdd'];
		// print_r ($bwdbp_tags_dataa); die();
		$bwdbp_args = array(
			'cat' => $bwdbp_cat_per_page,
			'tag' => $bwdbp_tag_per_page,
			'posts_per_page' => $bwdbp_post_per_page,
			'category_name' => $bwdbp_categorys_dataa,
			// 'tag_name' => $bwdbp_tags_dataa,
		);

		
		$bwdbp_yes_value = 'yes';
		switch ($bwdbp_styles) {
			case "style1":
				include( __DIR__ . '/templates/style1.php' );
				break;
		}
	}

	public function bwdbp_post_categories() {
        $bwdbp_categories_list = get_the_category_list(esc_html__(', ', 'bwd-blog-post'));
        if ($bwdbp_categories_list) {
            printf(
				'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>', '', esc_html__('Posted in', 'bwd-blog-post'), $bwdbp_categories_list
            );
        }
    }



	// For post pagination
	public function bestwpdevelopertd_blog_pagination(){
		global $wp_query;
		$links = paginate_links(array(
			'current' => max(1, get_query_var('paged')),
			'total' => $wp_query->max_num_pages,
		));
		$links = str_replace("page-numbers", "page-link", $links);
		echo $links;
	}
	// The pagination function include( __DIR__ . '/templates/style1.php' );


	
	public function bwdbp_post_thumbnail_here(){
		?>
		<a href="<?php the_permalink(); ?>"  style="text-decoration:none;">
		<?php 
		if(has_post_thumbnail()){
			the_post_thumbnail(); 
			} else{ 
			echo '<h2 class="text-center ">' . esc_html__('No Thumbnail', 'bwd-blog-post') . '</h2>';
			} 
			?>
		</a>
		<?php
	}
}
