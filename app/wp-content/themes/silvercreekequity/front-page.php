<?php // HOME PAGE ?>

<?php get_header(); ?>
<div class="site__main" role="main">

    <?php // hero ?>
    <?php $bg_image_id = get_field('home_hero_background_image'); ?>
    <div class="tier tier--peacock-dark-media" style="background-image: url('<?php echo wp_get_attachment_image_url($bg_image_id, 'large'); ?>');">
        <div class="wrapper">
            <div class="section">

                <div class="hero">
                    <div class="hero__hd">
                        <h1 class="txt txt--hero">
                            <?php the_field('home_hero_headline'); ?>
                        </h1>
                    </div>
                    <div class="hero__bd">
                        <p class="txt txt--heroSub">
                            <?php the_field('home_hero_blurb'); ?>
                        </p>
                    </div>
                    <div class="hero__cta">
                        <a class="btn btn--light" href="<?php the_field('home_hero_cta_link'); ?>">
                            <span class="btn__txt"><?php the_field('home_hero_cta_text'); ?></span>
                            <span class="btn__icon"></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php // main content ?>
    <div class="tier tier--main">
        <div class="tier__ornament"></div>
        <div class="tier__bd">
            <div class="wrapper">
                <div class="slab">

                    <div class="section section--hasDivider">
                        <div class="section__hd">
                            <div class="title">
                                <h2 class="txt txt--title">
                                    <?php the_field('home_featured_projects_section_label'); ?>
                                </h2>
                            </div>
                        </div>
                        <div class="section__bd">
                            <div class="feature">
                                <div class="feature__hd">
                                    <h3 class="txt txt--hdg">
                                        <?php the_field('home_featured_projects_headline'); ?>
                                    </h3>
                                </div>
                                <div class="feature__bd">
                                    <p class="txt txt--body">
                                        <?php the_field('home_featured_projects_blurb'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="section__cards">
                            <div class="collection">
                                <div class="collection__stage">
                                    <div class="collection__stage__list">
                                        <?php $featured_projects = get_field('home_featured_projects'); ?>
                                        <?php if ($featured_projects) : ?>
                                            <?php foreach($featured_projects as $featured_project) : ?>
                                                <?php
                                                    $project_permalink = get_permalink($featured_project->ID);
                                                    $project_title = get_the_title($featured_project->ID);
                                                    $project_location = get_field('project_location', $featured_project->ID);
                                                    $project_status = get_field('project_status', $featured_project->ID);
                                                    $project_image = get_the_post_thumbnail_url($featured_project->ID, 'project-card');
                                                ?>
                                                <div class="collection__stage__list__item">
                                                    <a class="isInlineBlock" href="<?php echo esc_html($project_permalink); ?>">
                                                        <div class="card card--<?php echo strtolower(esc_html($project_status)); ?>">
                                                            <div class="card__label">
                                                                <span class="txt txt--label"><?php echo esc_html($project_status); ?></span>
                                                            </div>
                                                            <div class="card__bd">
                                                                <h4 class="txt txt--card-hdg txt--truncated"><?php echo esc_html($project_title); ?></h4>
                                                                <h5 class="txt txt--card-hdg2 txt--truncated"><?php echo esc_html($project_location); ?></h5>
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
                                <span class="btn__txt"><?php the_field('featured_projects_cta_text'); ?></span>
                                <span class="btn__icon"></span>
                            </a>
                        </div>
                    </div>

                    <div class="section">
                        <div class="section__hd">
                            <div class="title">
                                <h2 class="txt txt--title">Our Process</h2>
                            </div>
                        </div>
                        <div class="section__bd">
                            <div class="feature">
                                <div class="feature__hd">
                                    <h3 class="txt txt--hdg">Our process creates low risk and high returns.</h3>
                                </div>
                                <div class="feature__bd">
                                    <p class="txt txt--body">To give each project the best chance to succeed, we put our development experience to work and lean on the support of other experts in construction, design, project management and market study analysis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="section__cards">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php // contact form ?>
    <div class="tier tier--peacock-gradient">
        <div class="wrapper">

        </div>
    </div>

</div>
<?php get_footer(); ?>
