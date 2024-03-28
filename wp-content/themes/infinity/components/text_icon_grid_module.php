<?php
function render_text_icon_grid_module($module)
{

?>
    <!-- <?= print("<pre>" . print_r($module['grid_item'], true) . "</pre>") ?> -->

    <section class="text-icon-grid bg-lightbluegrey" data-aos="fade-in">
        <div class="row no-gutters text-center">
            <div class="container">
                <div class="row justify-content-center">

                    <?php foreach ($module['grid_item'] as $grid_item) { ?>
                        <div class="text-icon-grid-item col-10 col-lg-4 my-3" data-aos="fade-up" data-aos-delay="300">
                            <img class="lazy-load w-100  " data-lazy-srcset="<?= image_variant($grid_item, "icon") ?>" data-lazy-set="height" alt=""
                            />
                            <?= $grid_item["content"]["content"] ?>
                        </div>
                        <?php if ($grid_item["content"]["button_group"]) { ?>
                            <?= button_group($grid_item) ?>
                        <?php
                        } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($module["content"]["button_group"]) { ?>
            <div class="button-container">
                <?= button_group($module) ?>
            </div>
        <?php
        } ?>
    </section>
<?php
}
