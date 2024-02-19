<?php

namespace Automattic\WooCommerce\Blocks\Templates;

use Automattic\WooCommerce\Blocks\Utils\BlockTemplateUtils;

/**
 * ProductCategoryTemplate class.
 *
 * @internal
 */
class ProductCategoryTemplate extends AbstractTemplateWithFallback {

	/**
	 * The slug of the template.
	 *
	 * @var string
	 */
	public $slug = 'taxonomy-product_cat';

	/**
	 * The title of the template.
	 *
	 * @var string
	 */
	public $template_title;

	/**
	 * The description of the template.
	 *
	 * @var string
	 */
	public $template_description;

	/**
	 * The template used as a fallback if that one is customized.
	 *
	 * @var string
	 */
	public $fallback_template = 'archive-product';

	/**
	 * Initialization method.
	 */
	public function init() {
		$this->template_title       = _x( 'Products by Category', 'Template name', 'woocommerce' );
		$this->template_description = __( 'Displays products filtered by a category.', 'woocommerce' );

		parent::init();

		add_action( 'template_redirect', array( $this, 'render_block_template' ) );
	}

	/**
	 * True when viewing the Product Category page.
	 *
	 * @return boolean
	 */
	protected function is_active_template() {
		return ! is_embed() && is_product_taxonomy() && is_tax( 'product_cat' );
	}

	/**
	 * Renders the default block template from Woo Blocks if no theme templates exist.
	 */
	public function render_block_template() {
		if ( $this->is_active_template() ) {
			$templates = get_block_templates( array( 'slug__in' => array( $this->slug ) ) );

			if ( isset( $templates[0] ) && BlockTemplateUtils::template_has_legacy_template_block( $templates[0] ) ) {
				add_filter( 'woocommerce_disable_compatibility_layer', '__return_true' );
			}

			if ( ! BlockTemplateUtils::theme_has_template( $this->slug ) ) {
				add_filter( 'woocommerce_has_block_template', '__return_true', 10, 0 );
			}
		}
	}
}
