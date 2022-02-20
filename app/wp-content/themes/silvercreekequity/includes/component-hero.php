<?php // Component: Hero ?>

<?php
    $hero_bg_image_id     = get_sub_field('hero_background_image');
    $hero_headline        = get_sub_field('hero_headline');
    $hero_blurb           = get_sub_field('hero_blurb');
    $hero_cta_link        = get_sub_field('hero_cta_link');
    $hero_cta_text        = get_sub_field('hero_cta_text');
    $hero_show_page_title = get_sub_field('hero_show_page_title');

    if ($hero_bg_image_id) {
        $hero_bg_image = wp_get_attachment_image_url($hero_bg_image_id, 'large');
    } else {
        $hero_bg_image = '';
    }

    if ($hero_show_page_title) {
        $hero_class = 'hero--hasTitle';
    } else {
        $hero_class = '';
    }
?>

<div class="tier tier--peacock-dark-media" style="background-image: url('<?php echo $hero_bg_image ?>');">
    <div class="wrapper">
        <div class="section">

            <div class="hero <?php echo $hero_class; ?>">
                <?php if ($hero_show_page_title): ?>
                    <div class="hero__title">
                        <div class="hero__title__inner">
                            <?php // not using a heading - it's already included in page templates ?>
                            <div class="txt txt--label">
                                <?php the_title(); ?>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($hero_headline): ?>
                    <div class="hero__hd">
                        <h2 class="txt txt--hero">
                            <?php echo $hero_headline; ?>
                        </h2>
                    </div>
                <?php endif; ?>
                <?php if ($hero_blurb): ?>
                    <div class="hero__bd">
                        <p class="txt txt--heroSub">
                            <?php echo $hero_blurb; ?>
                        </p>
                    </div>
                <?php endif; ?>
                <?php if ($hero_cta_link && $hero_cta_text): ?>
                    <div class="hero__cta">
                        <a class="btn btn--light" href="<?php echo $hero_cta_link; ?>">
                            <span class="btn__txt"><?php echo $hero_cta_text; ?></span>
                            <span class="btn__icon"></span>
                        </a>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
