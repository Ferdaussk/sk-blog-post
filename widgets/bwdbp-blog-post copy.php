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
					'style2' => esc_html__( 'Style 2', 'bwd-blog-post' ),
					'style3' => esc_html__( 'Style 3', 'bwd-blog-post' ),
					'style4' => esc_html__( 'Style 4', 'bwd-blog-post' ),
					'style5' => esc_html__( 'Style 5', 'bwd-blog-post' ),
					'style6' => esc_html__( 'Style 6', 'bwd-blog-post' ),
					'style7' => esc_html__( 'Style 7', 'bwd-blog-post' ),
					'style8' => esc_html__( 'Style 8', 'bwd-blog-post' ),
					'style9' => esc_html__( 'Style 9', 'bwd-blog-post' ),
					'style10' => esc_html__( 'Style 10', 'bwd-blog-post' ),
					'style11' => esc_html__( 'Style 11', 'bwd-blog-post' ),
					'style12' => esc_html__( 'Style 12', 'bwd-blog-post' ),
					'style13' => esc_html__( 'Style 13', 'bwd-blog-post' ),
					'style14' => esc_html__( 'Style 14', 'bwd-blog-post' ),
					'style15' => esc_html__( 'Style 15', 'bwd-blog-post' ),
					'style16' => esc_html__( 'Style 16', 'bwd-blog-post' ),
					'style17' => esc_html__( 'Style 17', 'bwd-blog-post' ),
					'style18' => esc_html__( 'Style 18', 'bwd-blog-post' ),
					'style19' => esc_html__( 'Style 19', 'bwd-blog-post' ),
					'style20' => esc_html__( 'Style 20', 'bwd-blog-post' ),
					'style21' => esc_html__( 'Style 21', 'bwd-blog-post' ),
					'style22' => esc_html__( 'Style 22', 'bwd-blog-post' ),
					'style23' => esc_html__( 'Style 23', 'bwd-blog-post' ),
					'style24' => esc_html__( 'Style 24', 'bwd-blog-post' ),
					'style25' => esc_html__( 'Style 25', 'bwd-blog-post' ),
					'style26' => esc_html__( 'Style 26', 'bwd-blog-post' ),
					'style27' => esc_html__( 'Style 27', 'bwd-blog-post' ),
					'style28' => esc_html__( 'Style 28', 'bwd-blog-post' ),
					'style29' => esc_html__( 'Style 29', 'bwd-blog-post' ),
					'style30' => esc_html__( 'Style 30', 'bwd-blog-post' ),
					'style31' => esc_html__( 'Style 31', 'bwd-blog-post' ),
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
					'4' => esc_html__( '4', 'bwd-blog-post' ),
					'3' => esc_html__( '3', 'bwd-blog-post' ),
					'2' => esc_html__( '2', 'bwd-blog-post' ),
					'1' => esc_html__( '1', 'bwd-blog-post' ),
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
			'bwdbp_the_thumbnail_size',
			[
				'label' => esc_html__( 'Thumbnail Size', 'bwd-blog-post' ),
				'type' => Controls_Manager::SELECT,
				'default' => 'default',
				'options' => [
					'default' => esc_html__( 'Default', 'bwd-blog-post' ),//
					'large' => esc_html__( 'Large', 'bwd-blog-post' ),//
					'thumbnail' => esc_html__( 'Size 150 x 150', 'bwd-blog-post' ),
					'medium' => esc_html__( 'Size 300 x 300 max height', 'bwd-blog-post' ),
					'medium_large' => esc_html__( '768 x 0', 'bwd-blog-post' ),
					'full' => esc_html__( 'Original', 'bwd-blog-post' ),
					'shop_thumbnail' => esc_html__( 'Size 180 x 180', 'bwd-blog-post' ),
					'shop_catalog' => esc_html__( 'Size 300 x 300', 'bwd-blog-post' ),
					'shop_single' => esc_html__( 'Size 600 x 600', 'bwd-blog-post' ),
				],
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_post_image_height_size',
			[
				'label' => esc_html__( 'Thumbnail Height', 'bwd-blog-post' ),
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
				'default' => 'yes',
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
				'default' => 'yes',
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
			]
		);
		$this->add_responsive_control(
			'bwdbp_the_cat_per_page',
			[
				'label' => esc_html__( 'Cat Per Page', 'bwd-blog-post' ),
				'type' => Controls_Manager::NUMBER,
				'placeholder' => esc_html__( 'xx', 'bwd-blog-post' ),
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
		// print_r ($bwdbp_categorys_dataa); die();
		$bwdbp_args = array(
			'cat' => $bwdbp_cat_per_page,
			'posts_per_page' => $bwdbp_post_per_page,
			'category_name' => $bwdbp_categorys_dataa,
		);
		$bwdbp_thumbnail_sizing = $settings['bwdbp_the_thumbnail_size'];
		if('thumbnail' === $bwdbp_thumbnail_sizing){
			$bwdbp_image_size = 'thumbnail';
		} elseif('medium' === $bwdbp_thumbnail_sizing){
			$bwdbp_image_size = 'medium';
		} elseif('medium_large' === $bwdbp_thumbnail_sizing){
			$bwdbp_image_size = 'medium_large';
		} elseif('large' === $bwdbp_thumbnail_sizing){
			$bwdbp_image_size = 'large';
		} elseif('full' === $bwdbp_thumbnail_sizing){
			$bwdbp_image_size = 'full';
		} elseif('shop_thumbnail' === $bwdbp_thumbnail_sizing){
			$bwdbp_image_size = 'shop_thumbnail';
		} elseif('shop_catalog' === $bwdbp_thumbnail_sizing){
			$bwdbp_image_size = 'shop_catalog';
		} elseif('shop_single' === $bwdbp_thumbnail_sizing){
			$bwdbp_image_size = 'shop_single';
		} else{
			$bwdbp_image_size = 'default';
		}
		$bwdbp_yes_value = 'yes';

		switch ($bwdbp_styles) {
			case "style1":
				include( __DIR__ . '/templates/style1.php' );
				break;
		}
		$name = 'Ferdaus';
	}

	public function bwdbp_post_categories() {
        $bwdbp_categories_list = get_the_category_list(esc_html__(', ', 'bwd-blog-post'));
        if ($bwdbp_categories_list) {
            printf(
				'<span class="cat-links">%1$s<span class="screen-reader-text">%2$s</span>%3$s</span>', '', esc_html__('Posted in', 'bwd-blog-post'), $bwdbp_categories_list
            );
        }
    }
	

	public function bwdbp_post_thumbnail_here(){
		// return render($name);
		// echo 'Ferdaus';
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
