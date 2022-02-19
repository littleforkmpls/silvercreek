<?php // Component: Process Slider ?>

<?php
    $process_slider_section_label = get_sub_field('process_slider_section_label');
    $process_slider_headline      = get_sub_field('process_slider_headline');
    $process_slider_blurb         = get_sub_field('process_slider_blurb');
    $process_slider_steps         = get_sub_field('process_slider_steps');
?>

<div class="section">
    <div class="section__hd">
        <div class="title">
            <h2 class="txt txt--title">
                <?php echo $process_slider_section_label; ?>
            </h2>
        </div>
    </div>
    <div class="section__bd">
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
    <div class="section__cards">
        <div class="collection">
            <div class="collection__stage">
                <div class="collection__stage__list">
                    <?php while(have_rows('process_slider_steps')) : the_row(); ?>
                        <?php
                            $process_slider_steps_step_name        = get_sub_field('process_slider_steps_step_name');
                            $process_slider_steps_step_description = get_sub_field('process_slider_steps_step_description');
                            $process_slider_steps_step_image_id    = get_sub_field('process_slider_steps_step_image');
                            $process_slider_steps_step_image_url   = wp_get_attachment_image_url($process_slider_steps_step_image_id, 'project-card');
                        ?>
                        <div class="collection__stage__list__item">
                            <div class="card">
                                <div class="card__media">
                                    <img class="isBlock" src="<?php echo $process_slider_steps_step_image_url; ?>" alt="<?php echo $process_slider_steps_step_name; ?>" />
                                </div>
                                <div class="card__bd card__bd--dark card__bd--center">
                                    <div class="card__bd_content">
                                        <div class="card__bd_content__hd">
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
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
</div>
