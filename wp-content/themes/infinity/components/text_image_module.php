<?php

function render_text_image_module($module)
{ ?>
    <section class="text-image <?= $module["background_color"] ?>">
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-12 col-lg-6 text-center text-lg-left mb-5 mb-lg-0 cms pr-lg-4" data-aos="fade-in">
                    <?= $module["content"]["content"] ?>
                </div>
                <div class="col-12 col-lg-6" data-aos="fade-in">
                    <?php if ($module["display_video"]) { ?>
                        <div class="img-wrapper ">
                            <a href="<?= $module["video_id"] ?>?autoplay=1" data-fancybox>
                                <img class="w-100" src="<?= $module["image"]["url"] ?>" alt="<?= $module["image"]["title"] ?>" />
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php if ($module["display_disclaimer"]) { ?>
            <p><?= $module["disclaimer_text"] ?></p>
        <?php } ?>
        <?php if ($module["content"]["button_group"]) { ?>
            <?= button_group($module) ?>
        <?php
        } ?>
    </section>
<?php
}
