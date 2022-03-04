<?php // Component: Process Slider ?>

<?php
    $process_slider_section_label       = get_sub_field('process_slider_section_label');
    $process_slider_headline            = get_sub_field('process_slider_headline');
    $process_slider_blurb               = get_sub_field('process_slider_blurb');
    $process_slider_steps               = get_sub_field('process_slider_steps');
    $process_slider_cta_blurb           = get_sub_field('process_slider_cta_blurb');
    $process_slider_cta_button_text     = get_sub_field('process_slider_cta_button_text');
    $process_slider_cta_button_link     = get_sub_field('process_slider_cta_button_link');

    if (is_front_page()) {
        $tier_class = 'tier--white';
    } else {
        $tier_class = 'tier--light-gradient';
    }
?>

<div class="tier <?php echo $tier_class; ?>">
    <div class="wrapper">
        <div class="mat">

            <div class="region">
                <?php if ($process_slider_section_label): ?>
                    <div class="region__title">
                        <div class="title">
                            <h2 class="txt txt--title">
                                <?php echo $process_slider_section_label; ?>
                            </h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($process_slider_headline || $process_slider_blurb): ?>
                    <div class="region__intro region__intro--noPush">
                        <div class="feature">
                            <?php if ($process_slider_headline): ?>
                            <div class="feature__hd">
                                <h3 class="txt txt--hdg">
                                    <?php echo $process_slider_headline; ?>
                                </h3>
                            </div>
                            <?php endif; ?>
                            <?php if ($process_slider_blurb): ?>
                                <div class="feature__bd">
                                    <p class="txt txt--body">
                                        <?php echo $process_slider_blurb; ?>
                                    </p>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<div class="tier <?php echo $tier_class; ?>">
    <div class="mat mat--noTop">

        <div class="region">
            <?php if($process_slider_steps): ?>
                <?php $total_slider_steps = count($process_slider_steps); ?>
                <div class="region__bd">
                    <div class="scroller" data-items="<?php echo $total_slider_steps; ?>">
                        <div class="scroller__stage">
                            <div class="scroller__stage__list">
                                <?php while(have_rows('process_slider_steps')) : the_row(); ?>
                                    <?php
                                        $process_slider_steps_step_name        = get_sub_field('process_slider_steps_step_name');
                                        $process_slider_steps_step_description = get_sub_field('process_slider_steps_step_description');
                                        $process_slider_steps_step_image_id    = get_sub_field('process_slider_steps_step_image');
                                        $process_slider_steps_step_image_url   = wp_get_attachment_image_url($process_slider_steps_step_image_id, 'project-card');
                                    ?>
                                    <div class="scroller__stage__list__item">
                                        <div class="scroller__stage__list__item__view">
                                            <div class="card">
                                                <div class="card__media">
                                                    <img class="isBlock" width="400" height="320" src="<?php echo $process_slider_steps_step_image_url; ?>" alt="<?php echo $process_slider_steps_step_name; ?>" />
                                                </div>
                                                <div class="card__bd card__bd--dark card__bd--center">
                                                    <div class="card__bd__content">
                                                        <div class="card__bd__content__hd">
                                                            <h4 class="txt txt--label">
                                                                <?php echo $process_slider_steps_step_name; ?>
                                                            </h4>
                                                        </div>
                                                        <div class="card__bd_content__bd">
                                                            <p class="txt txt--body2">
                                                                <?php echo $process_slider_steps_step_description; ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if ($process_slider_cta_blurb || $process_slider_cta_button_text): ?>
                <div class="region__cta">
                    <div class="feature">
                        <?php if ($process_slider_cta_blurb): ?>
                            <div class="feature__bd">
                                <div class="txt txt--body txt--size-xl">
                                    <?php echo $process_slider_cta_blurb; ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if ($process_slider_cta_button_text && $process_slider_cta_button_link): ?>
                            <div class="feature__ft">
                                <a class="btn" href="<?php echo $process_slider_cta_button_link; ?>">
                                    <span class="btn__txt"><?php echo $process_slider_cta_button_text; ?></span>
                                    <span class="btn__icon"></span>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>
