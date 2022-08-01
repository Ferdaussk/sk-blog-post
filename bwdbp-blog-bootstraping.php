<?php
namespace BlogFromBWD;

use BlogFromBWD\PageSettings\Page_Settings;
define( "BWDBP_ASFSK_ASSETS_PUBLIC_DIR_FILE", plugin_dir_url( __FILE__ ) . "assets/public" );
define( "BWDBP_ASFSK_ASSETS_ADMIN_DIR_FILE", plugin_dir_url( __FILE__ ) . "assets/admin" );
class CallBlogFromBWD {

	private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public function bwdbp_admin_editor_scripts() {
		add_filter( 'script_loader_tag', [ $this, 'bwdbp_admin_editor_scripts_as_a_module' ], 10, 2 );
	}
	public function bwdbp_admin_editor_scripts_as_a_module( $tag, $handle ) {
		if ( 'bwdbp_the_blog_editor' === $handle ) {
			$tag = str_replace( '<script', '<script type="module"', $tag );
		}

		return $tag;
	}

	private function include_widgets_files() {
		require_once( __DIR__ . '/widgets/bwdbp-blog-post.php' );
	}

	public function bwdbp_register_widgets() {
		// Its is now safe to include Widgets files
		$this->include_widgets_files();

		// Register Widgets
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Widgets\BWDBPBlog() );
	}

	private function add_page_settings_controls() {
		require_once( __DIR__ . '/page-settings/bwdbp-blog-post-settings.php' );
		new Page_Settings();
	}

	// Register Category
	function bwdbp_add_elementor_widget_categories( $elements_manager ) {

		$elements_manager->add_category(
			'bwd-blog-post-category',
			[
				'title' => esc_html__( 'BWD Blog Post', 'bwd-blog-post' ),
				'icon' => 'eicon-person',
			]
		);
	}
	public function bwdbp_all_assets_for_the_public(){
		wp_enqueue_script( 'bwdbp_blog_the_articulate_js', plugin_dir_url( __FILE__ ) . 'assets/public/js/text-to-speech/articulate.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'bwdbp_blog_the_custom_js', plugin_dir_url( __FILE__ ) . 'assets/public/js/text-to-speech/custom-text-to-speech.js', array('jquery'), '1.0', true );

		wp_enqueue_script( 'bwdbp_blog_the_test_js', plugin_dir_url( __FILE__ ) . 'assets/public/js/word-count/dist/test.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'bwdbp_blog_the_keepreading_js', plugin_dir_url( __FILE__ ) . 'assets/public/js/word-count/dist/keepreading.min.js', array('jquery'), '1.0', true );
		wp_enqueue_script( 'bwdbp_blog_the_jquery_js', plugin_dir_url( __FILE__ ) . 'assets/public/js/jquery.js', array('jquery'), '1.0', true );
		$all_css_js_file = array(
            'bwdbp_blog_bootstrapdd_css' => array('bwdbp_path_define'=>BWDBP_ASFSK_ASSETS_PUBLIC_DIR_FILE . '/css/bootstrap.css'),
            'bwdbp_blog_icon_css' => array('bwdbp_path_define'=>BWDBP_ASFSK_ASSETS_PUBLIC_DIR_FILE . '/css/all.min.css'),
            'bwdbp_blog_blog_main_css' => array('bwdbp_path_define'=>BWDBP_ASFSK_ASSETS_PUBLIC_DIR_FILE . '/css/blog-main.css'),
        );
        foreach($all_css_js_file as $handle => $fileinfo){
            wp_enqueue_style( $handle, $fileinfo['bwdbp_path_define'], null, '1.0', 'all');
            // wp_enqueue_script( $handle, $fileinfo['bwdbp_path_define'], ['jquery'], '1.0', true);
        }
	}
	public function bwdbp_all_assets_for_elementor_editor_admin(){
		$all_css_js_file = array(
            'bwdbp_blog_admin_icon_css' => array('bwdbp_path_admin_define'=>BWDBP_ASFSK_ASSETS_ADMIN_DIR_FILE . '/icon.css'),
        );
        foreach($all_css_js_file as $handle => $fileinfo){
            wp_enqueue_style( $handle, $fileinfo['bwdbp_path_admin_define'], null, '1.0', 'all');
        }
	}

	// For tags
	function the_tags( $before = null, $sep = ', ', $after = '' ) {
		if ( null === $before ) {
			$before = esc_html__( 'Tags:- ' );
		}
		$the_tags = get_the_tag_list( $before, $sep, $after );
		if ( ! is_wp_error( $the_tags ) ) {
			echo $the_tags;
		}
	}

	public function __construct() {
		// For public assets
		add_action('wp_enqueue_scripts', [$this, 'bwdbp_all_assets_for_the_public']);

		// For Elementor Editor
		add_action('elementor/editor/before_enqueue_scripts', [$this, 'bwdbp_all_assets_for_elementor_editor_admin']);
		
		// Register Category
		add_action( 'elementor/elements/categories_registered', [ $this, 'bwdbp_add_elementor_widget_categories' ] );

		// Register widgets
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'bwdbp_register_widgets' ] );

		// Register editor scripts
		add_action( 'elementor/editor/after_enqueue_scripts', [ $this, 'bwdbp_admin_editor_scripts' ] );
		
		$this->add_page_settings_controls();
	}
}

// Instantiate Plugin Class
CallBlogFromBWD::instance();