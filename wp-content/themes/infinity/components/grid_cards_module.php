<?php
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
