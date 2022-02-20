<?php // Component: Team ?>

<?php
    $team_section_label     = get_sub_field('team_section_label');
    $team_headline          = get_sub_field('team_headline');
    $team_blurb             = get_sub_field('team_blurb');
    $team_members           = get_sub_field('team_members');
    $team_background_style  = get_sub_field('team_background_style');
    $team_hide_divider      = get_sub_field('team_hide_divider');

    $section_class = 'section--' .  $team_background_style;

    if ($team_hide_divider) {
        $section_class .= ' section--noDivider';
    }

?>

<div class="section <?php echo $section_class; ?>">
    <div class="section__hd">
        <div class="title">
            <h2 class="txt txt--title">
                <?php echo $team_section_label; ?>
            </h2>
        </div>
    </div>
    <div class="section__bd">
        <div class="feature feature--isSpacious">
            <?php if ($team_headline): ?>
                <div class="feature__hd">
                    <h3 class="txt txt--hdg">
                        <?php echo $team_headline; ?>
                    </h3>
                </div>
            <?php endif; ?>
            <?php if ($team_blurb): ?>
                <div class="feature__bd">
                    <p class="txt txt--body">
                        <?php echo $team_blurb; ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
