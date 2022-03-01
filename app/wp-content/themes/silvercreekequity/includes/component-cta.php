<?php // Component: Hero ?>

<?php
    $cta_headline           = get_sub_field('cta_headline');
    $cta_button_text        = get_sub_field('cta_button_text');
    $cta_button_link        = get_sub_field('cta_button_link');
    $cta_background_style   = get_sub_field('cta_background_style');
    $cta_hide_divider       = get_sub_field('cta_hide_divider');

    $section_class = 'section--' .  $cta_background_style;

    if ($cta_hide_divider) {
        $section_class .= ' section--noDivider';
    }

?>

<div class="section <?php echo $section_class; ?>">
    <div class="section__bd">
        <div class="feature feature--isSpacious">
            <?php if ($cta_headline): ?>
                <div class="feature__bd">
                    <p class="txt txt--body txt--size-xl">
                        <?php echo $cta_headline; ?>
                    </p>
                </div>
            <?php endif; ?>
            <?php if ($cta_button_link && $cta_button_text): ?>
                <div class="feature__ft">
                    <a class="btn" href="<?php echo $cta_button_link; ?>">
                        <span class="btn__txt"><?php echo $cta_button_text; ?></span>
                        <span class="btn__icon"></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
