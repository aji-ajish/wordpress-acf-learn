<?php
function render_hero_module($module)
{
?>
	<style>
		#section-0 .hero-bg-image {
			background-position: center -10px;
		}

		.button-container {
			padding-bottom: 40px;
		}

		@media screen and (min-width: 768px) {
			#section-0 .hero-bg-image {
				background-position: center top;
			}

			.button-container {
				padding-bottom: 80px;
			}
		}
	</style>

	<section id="section-0" class="hero d-flex align-items-end align-items-lg-end pb-0 <?= $module["custom_class"] ?> <?= $module["hero_height"] ?> 
            <?= $module["hero_overlay"] ?> <?= $module["overlay_mob"] ?>
            <?= $module["hero_overlay_overlay_mob"] ?> <?= $module["rotating_images"] ?> <?= $module["background_image_position"] ?>" data-aos="fade-in">
		<div class="hero-bg-image lazy-load d-none d-lg-block" data-lazy-srcset="<?= $module["background_image"]["url"] ?>" data-lazy-type="background-image" style="background-image: url('<?= $module["background_image"]["url"] ?>');"></div>
		<div class="hero-bg-image lazy-load d-lg-none" data-lazy-srcset="<?= $module["mobile_background_image"]["url"] ?>" data-lazy-type="background-image" style="background-image: url('<?= $module["mobile_background_image"]["url"] ?>');"></div>
		<div class="container">
			<div class="row text-center text-lg-left">
				<div class="col-12 col-lg-6">
					<div class="hero-content cms" data-aos="fade-up">
						<!--
                            <h1>The #1 Bunion Product in the US<sup>*</sup></h1>
                            <p>Lapiplasty<sup>®</sup> 3-Plane Correction at the CORA</p>
-->
						<?php if ($module["content"]["content"]) { ?>
							<p><?= $module["content"]["content"] ?></p>
						<?php } ?>
						<?php if ($module["content"]["button_group"]) { ?>
							<div class="button-container">
								<?= button_group($module) ?>
							</div>
						<?php
						} ?>

					</div>
				</div>
			</div>
			<div class="row hero-caption-wrapper w-100 mx-0">
				<div class="col-12">
					<span class="hero-caption"><?= $module["hero_caption"] ?></span>
				</div>
			</div>
		</div>

	</section>
<?php
}
