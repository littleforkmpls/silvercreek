<?php // Component: Featured Projects Slider ?>

<?php
    $featured_projects_slider_section_label = get_sub_field('featured_projects_slider_section_label');
    $featured_projects_slider_headline      = get_sub_field('featured_projects_slider_headline');
    $featured_projects_slider_blurb         = get_sub_field('featured_projects_slider_blurb');
    $featured_projects_slider_projects      = get_sub_field('featured_projects_slider_projects');
    $featured_projects_slider_button_text   = get_sub_field('featured_projects_slider_button_text');
?>

<div class="section section--hasDivider">
    <div class="section__hd">
        <div class="title">
            <h2 class="txt txt--title">
                <?php echo $featured_projects_slider_section_label; ?>
            </h2>
        </div>
    </div>
    <div class="section__bd">
        <div class="feature">
            <?php if ($featured_projects_slider_headline): ?>
                <div class="feature__hd">
                    <h3 class="txt txt--hdg">
                        <?php echo $featured_projects_slider_headline; ?>
                    </h3>
                </div>
            <?php endif; ?>
            <?php if ($featured_projects_slider_blurb): ?>
                <div class="feature__bd">
                    <p class="txt txt--body">
                        <?php echo $featured_projects_slider_blurb; ?>
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div class="section__cards">
        <div class="collection">
            <div class="collection__stage">
                <div class="collection__stage__list">
                    <?php if ($featured_projects_slider_projects) : ?>
                        <?php foreach($featured_projects_slider_projects as $featured_project) : ?>
                            <?php
                                $project_permalink = get_permalink($featured_project->ID);
                                $project_title = get_the_title($featured_project->ID);
                                $project_location = get_field('project_location', $featured_project->ID);
                                $project_status = get_field('project_status', $featured_project->ID);
                                $project_image = get_the_post_thumbnail_url($featured_project->ID, 'project-card');
                            ?>
                            <div class="collection__stage__list__item">
                                <a class="isInlineBlock" href="<?php echo esc_html($project_permalink); ?>">
                                    <div class="card card--pro card--<?php echo strtolower(esc_html($project_status)); ?>">
                                        <div class="card__label">
                                            <span class="txt txt--label">
                                                <?php echo esc_html($project_status); ?>
                                            </span>
                                        </div>
                                        <div class="card__bd card__bd--inset">
                                            <h4 class="txt txt--card-hdg txt--truncated">
                                                <?php echo esc_html($project_title); ?>
                                            </h4>
                                            <h5 class="txt txt--card-hdg2 txt--truncated">
                                                <?php echo esc_html($project_location); ?>
                                            </h5>
                                        </div>
                                        <div class="card__media">
                                            <img class="isBlock" src="<?php echo $project_image; ?>" alt="" />
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="section__ft">
        <a class="btn" href="<?php echo get_post_type_archive_link('scequity_projects'); ?>">
            <span class="btn__txt"><?php echo $featured_projects_slider_button_text; ?></span>
            <span class="btn__icon"></span>
        </a>
    </div>
</div>
