<?php
namespace BlogFromBWD\PageSettings;

use Elementor\Controls_Manager;
use Elementor\Core\DocumentTypes\PageBase;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

class Page_Settings {

	const PANEL_TAB = 'new-tab';

	public function __construct() {
		add_action( 'elementor/init', [ $this, 'bwdbp_blog_add_panel_tab' ] );
		add_action( 'elementor/documents/register_controls', [ $this, 'bwdbp_blog_register_document_controls' ] );
	}

	public function bwdbp_blog_add_panel_tab() {
		Controls_Manager::add_tab( self::PANEL_TAB, esc_html__( 'New Blog', 'bwd-blog-post' ) );
	}

	public function bwdbp_blog_register_document_controls( $document ) {
		if ( ! $document instanceof PageBase || ! $document::get_property( 'has_elements' ) ) {
			return;
		}

		$document->start_controls_section(
			'bwdbp_blog_new_section',
			[
				'label' => esc_html__( 'Settings', 'bwd-blog-post' ),
				'tab' => self::PANEL_TAB,
			]
		);

		$document->add_control(
			'bwdbp_blog_text',
			[
				'label' => esc_html__( 'Title', 'bwd-blog-post' ),
				'type' => Controls_Manager::TEXT,
				'default' => esc_html__( 'Title', 'bwd-blog-post' ),
			]
		);

		$document->end_controls_section();
	}
}
