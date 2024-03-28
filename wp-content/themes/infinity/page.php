<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package infinity
 */

include __DIR__ . "/header.php";

?>
<main>
	<?php

	function image_variant($module, $name)
	{
		foreach ($module[$name]["sizes"] as $image_variant) {
			if (strpos($image_variant, 'http://') !== false || strpos($image_variant, 'https://') !== false) { 
				$image_urls[] = $image_variant;	
			}
		}
		echo implode(', ', $image_urls);
	}

	function button_group($module)
	{
		foreach ($module["content"]["button_group"] as $button) { ?>
			<a class="btn <?= $button["button_type"] ?> mr-1" href="<?= $button["button"]["url"] ?>" target="<?= $button["button"]["target"] ?>"><?= $button["button"]["title"] ?></a>
	<?php }
	}


	include __DIR__ . '/components/hero_module.php';
	include __DIR__ . '/components/grid_cards_module.php';
	include __DIR__ . '/components/text_image_module.php';
	include __DIR__ . '/components/text_icon_grid_module.php';


	

	$modules = get_fields()["modules"];
	// var_dump($modules);
	// var_dump(get_field('social','option'));


	foreach ($modules as $module) {
		switch ($module["acf_fc_layout"]) {
			case 'hero':
				render_hero_module($module);
				break;
			case 'grid_cards':
				render_grid_cards_module($module);
				break;
			case 'text_image':
				render_text_image_module($module);
				break;
			case 'text_icon_grid':
				render_text_icon_grid_module($module);
				break;
			default:
				break;
		}
	}
	?>
	<main>
		<?php
		get_footer()
		?>