<?php // Component: Hero ?>

<?php
    $lede_headline          = get_sub_field('lede_headline');
    $lede_blurb             = get_sub_field('lede_blurb');
    $lede_background_style  = get_sub_field('lede_background_style');
    $lede_hide_divider      = get_sub_field('lede_hide_divider');

    $section_class = 'section--' .  $lede_background_style;

    if ($lede_hide_divider) {
        $section_class .= ' section--noDivider';
    }

?>

<div class="section <?php echo $section_class; ?>">
    <div class="section__bd">
        <div class="feature feature--isSpacious">
            <?php if ($lede_headline): ?>
                <div class="feature__hd">
                    <h3 class="txt txt--hdg">
                        <?php echo $lede_headline; ?>
                    </h3>
                </div>
            <?php endif; ?>
            <?php if ($lede_blurb): ?>
                <div class="feature__bd">
                    <p class="txt txt--body">
                        <?php echo $lede_blurb; ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
