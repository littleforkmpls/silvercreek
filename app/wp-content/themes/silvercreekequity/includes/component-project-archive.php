<?php // Component: Project Archive ?>

<?php
    $pa_args = array(
        'post_type' => 'scequity_projects',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'orderby' => 'date',
        'order' => 'DESC',
    );

    $pa_loop = new WP_Query($pa_args);

?>

<div class="tier tier--light-gradient">
    <div class="wrapper">
        <div class="mat">

            <div class="region">
                <div class="region__title">
                    <div class="title">
                        <h2 class="txt txt--title">
                            All Projects
                        </h2>
                    </div>
                </div>
                <?php if ($pa_loop->have_posts()): ?>
                    <div class="region__bd region__bd--hasCards">
                        <div class="collection">
                            <div class="collection__stage">
                                <div class="collection__stage__list">
                                    <?php while ($pa_loop->have_posts()): $pa_loop->the_post(); ?>
                                        <?php
                                            $project_permalink = get_permalink();
                                            $project_title = get_the_title();
                                            $project_location = get_field('project_location');
                                            $project_status = get_field('project_status');
                                            $project_image = get_the_post_thumbnail_url(get_the_ID(),'project-card');
                                        ?>
                                        <div class="collection__stage__list__item">
                                            <a class="isInlineBlock" href="<?php echo $project_permalink; ?>">
                                                <div class="card card--pro card--<?php echo strtolower($project_status); ?>">
                                                    <div class="card__label">
                                                        <span class="txt txt--label">
                                                            <?php echo $project_status; ?>
                                                        </span>
                                                    </div>
                                                    <div class="card__bd card__bd--inset">
                                                        <h3 class="txt txt--card-hdg txt--truncated">
                                                            <?php echo $project_title; ?>
                                                        </h3>
                                                        <h4 class="txt txt--card-hdg2 txt--truncated">
                                                            <?php echo $project_location; ?>
                                                        </h4>
                                                    </div>
                                                    <div class="card__media">
                                                        <img class="isBlock" width="400" height="320" src="<?php echo $project_image; ?>" alt="" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>

        </div>
    </div>
</div>
