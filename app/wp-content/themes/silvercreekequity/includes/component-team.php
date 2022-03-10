<?php // Component: Team ?>

<?php
    $team_section_label     = get_sub_field('team_section_label');
    $team_headline          = get_sub_field('team_headline');
    $team_blurb             = get_sub_field('team_blurb');
    $team_members           = get_sub_field('team_members');
?>

<div class="tier tier--white">
    <div class="wrapper">
        <div class="mat">

            <div class="region">
                <?php if ($team_section_label): ?>
                    <div class="region__title">
                        <div class="title">
                            <h2 class="txt txt--title">
                                <?php echo $team_section_label; ?>
                            </h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($team_headline || $team_blurb): ?>
                    <div class="region__intro">
                        <div class="feature">
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
                <?php endif; ?>
                <?php if($team_members): ?>
                    <div class="region__bd region__bd--hasTeam">
                        <div class="yearbook">
                            <?php while(have_rows('team_members')) : the_row(); ?>
                                <?php
                                    $team_member_name       = get_sub_field('team_member_name');
                                    $team_member_job_title  = get_sub_field('team_member_job_title');
                                    $team_member_bio        = get_sub_field('team_member_bio');
                                    $team_member_image_id   = get_sub_field('team_member_headshot');
                                    $team_member_image_url   = wp_get_attachment_image_url($team_member_image_id, 'bio-headshot');
                                ?>
                                <div class="yearbook__item">
                                    <div class="frame">
                                        <div class="frame__media">
                                            <img class="isBlock" loading="lazy" width="500" height="333" src="<?php echo $team_member_image_url; ?>" alt="<?php echo $team_member_name; ?>" />
                                        </div>
                                        <div class="frame__content">
                                            <div class="frame__content__hd">
                                                <h4 class="txt txt--hdg txt--color-brand-dark">
                                                    <?php echo $team_member_name; ?>
                                                </h4>
                                            </div>
                                            <div class="frame__content__subhd">
                                                <div class="txt txt--body txt--color-brand-peacock">
                                                    <?php echo $team_member_job_title; ?>
                                                </div>
                                            </div>
                                            <div class="frame__content__bd">
                                                <div>
                                                    <?php echo $team_member_bio; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>
