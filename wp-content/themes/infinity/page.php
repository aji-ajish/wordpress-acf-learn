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

get_header();

function image_variant($module, $name)
{
	foreach ($module[$name]["sizes"] as $image_variant) {
		if (strpos($image_variant, 'http://') !== false || strpos($image_variant, 'https://') !== false) { ?>
			<img src="<?= $image_variant ?>" />
		<?php }
	}
}

function button_group($module)
{
	foreach ($module["content"]["button_group"] as $button) { ?>
	<a class="btn <?= $button["button_type"] ?> mr-1" href="<?= $button["button"]["url"] ?>" target="<?= $button["button"]["target"] ?>"><?= $button["button"]["title"] ?></a>
	<?php }
}

function render_hero_module($module)
{
	?>
	<div class="<?= $module["custom_class"] ?> <?= $module["hero_height"] ?> 
        <?= $module["hero_overlay"] ?> <?= $module["overlay_mob"] ?>
        <?= $module["hero_overlay_overlay_mob"] ?> <?= $module["rotating_images"] ?> <?= $module["background_image_position"] ?>">
		<img src="<?= $module["background_image"]["url"] ?>" alt="<?= $module["background_image"]["title"] ?>" width="400px" />
		<!-- image variant -->

		<!-- <?= image_variant($module, "background_image") ?> -->
	</div>
	<div class="<?= $module["mobile_background_image_position"] ?>">
		<img src="<?= $module["mobile_background_image"]["url"] ?>" alt="<?= $module["mobile_background_image"]["title"] ?>" width="400px" />
		<!-- image variant -->
		<!-- <?= image_variant($module, "mobile_background_image") ?> -->
	</div>
	<div>
		<p><?= $module["hero_caption"] ?></p>
		<?php if ($module["content"]["content"]) { ?>
			<p><?= $module["content"]["content"] ?></p>
		<?php } ?>
		<?php if ($module["content"]["button_group"]) { ?>
			<?= button_group($module) ?>
		<?php
		} ?>
	</div>
<?php
}

function render_grid_cards_module($module)
{
?>
	<div class="">
		<div class="<?= $module["background_color"] ?> <?= $module["columns"] ?>">
			<?php if ($module["content"]["content"]) { ?>
				<h2><?= $module["content"]["content"] ?></h2>
			<?php } ?>
			<?php if ($module["content"]["button_group"]) { ?>
				<?= button_group($module) ?>
			<?php
			} ?>

			<?php foreach ($module['card'] as $card) { ?>
				<!-- <?= print("<pre>" . print_r($card, true) . "</pre>") ?> -->
				<div>
					<h3><?= $card["content"]["content"] ?></h3>
					<img src="<?= $card["image"]["url"] ?>" alt="<?= $card["image"]["title"] ?>" width="200px" />
					<!-- image variant -->
					<!-- <?= image_variant($card, "image") ?> -->
					<p><?= $card["test"] ?></p>

					<?php if ($card["content"]["button_group"]) { ?>
						<?= button_group($card) ?>
					<?php
					} ?>
				</div>
			<?php } ?>
		</div>

	</div>
<?php
}

function render_text_image_module($module)
{ ?>
	<!-- <?= print("<pre>" . print_r($module, true) . "</pre>") ?> -->
	<div class="<?= $module["background_color"] ?> <?= $module["image_left_or_text_right"] ?>">
		<img src="<?= $module["image"]["url"] ?>" alt="<?= $module["image"]["title"] ?>" width="400px" />

		<div>
			<!-- image variant -->
			<!-- <?= image_variant($module, "image") ?> -->
		</div>
		<p><?= $module["caption"] ?></p>
		<?php if ($module["display_video"]) { ?>
			<p>Video</p>
			<video source="<?= $module["video_id"] ?>"></video>
		<?php } ?>
		<?php if ($module["display_disclaimer"]) { ?>
			<p><?= $module["disclaimer_text"] ?></p>
		<?php } ?>
		<h3><?= $module["content"]["content"] ?></h3>
		<?php if ($module["content"]["button_group"]) { ?>
			<?= button_group($module) ?>
		<?php
		} ?>
	</div>
<?php
}

// var_dump(get_fields());

$modules = get_fields()["modules"];
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
		default:
			break;
	}
}

get_footer();
?>