<?php // Component: Featured Projects Slider ?>

<?php
    $featured_projects_slider_section_label     = get_sub_field('featured_projects_slider_section_label');
    $featured_projects_slider_headline          = get_sub_field('featured_projects_slider_headline');
    $featured_projects_slider_blurb             = get_sub_field('featured_projects_slider_blurb');
    $featured_projects_slider_projects          = get_sub_field('featured_projects_slider_projects');
    $featured_projects_slider_button_text       = get_sub_field('featured_projects_slider_button_text');
?>

<div class="tier tier--peacock-gradient tier--stripe"></div>

<div class="tier tier--light-gradient">
    <div class="wrapper">
        <div class="mat">

            <div class="region">
                <?php if ($featured_projects_slider_section_label): ?>
                    <div class="region__title">
                        <div class="title">
                            <h2 class="txt txt--title">
                                <?php echo $featured_projects_slider_section_label; ?>
                            </h2>
                        </div>
                    </div>
                <?php endif; ?>
                <?php if ($featured_projects_slider_headline || $featured_projects_slider_blurb): ?>
                    <div class="region__intro region__intro--noPush">
                        <div class="feature feature--hasDivider">
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
                <?php endif; ?>
            </div>

        </div>
    </div>
</div>

<div class="tier tier--light-gradient">
    <div class="mat mat--noTop">

        <div class="region">
            <?php if($featured_projects_slider_projects): ?>
                <?php $total_slider_steps = count($featured_projects_slider_projects); ?>
                <div class="region__bd region__bd--hasCards">
                    <div class="panel">
                        <div class="panel__component">
                            <div class="scroller" data-items="<?php echo $total_slider_steps; ?>" data-scroller-id="scroller-<?php echo get_row_index(); ?>">
                                <div class="scroller__stage">
                                    <div class="scroller__stage__list">
                                        <?php foreach($featured_projects_slider_projects as $featured_project): ?>
                                            <?php
                                                $project_permalink = get_permalink($featured_project->ID);
                                                $project_title = get_the_title($featured_project->ID);
                                                $project_location = get_field('project_location', $featured_project->ID);
                                                $project_status = get_field('project_status', $featured_project->ID);
                                                $project_image = get_the_post_thumbnail_url($featured_project->ID, 'project-card');
                                            ?>
                                            <div class="scroller__stage__list__item">
                                                <div class="scroller__stage__list__item__view">
                                                    <a class="isInlineBlock" href="<?php echo $project_permalink; ?>">
                                                        <div class="card card--pro card--<?php echo strtolower($project_status); ?>">
                                                            <div class="card__label">
                                                                <span class="txt txt--label">
                                                                    <?php echo $project_status; ?>
                                                                </span>
                                                            </div>
                                                            <div class="card__bd card__bd--inset">
                                                                <h4 class="txt txt--card-hdg txt--truncated">
                                                                    <?php echo $project_title; ?>
                                                                </h4>
                                                                <h5 class="txt txt--card-hdg2 txt--truncated">
                                                                    <?php echo $project_location; ?>
                                                                </h5>
                                                            </div>
                                                            <div class="card__media">
                                                                <img class="isBlock" loading="lazy" width="400" height="320" src="<?php echo $project_image; ?>" alt="" />
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="panel__controls" data-items="<?php echo $total_slider_steps; ?>">
                            <div class="panel__controls__item panel__controls__item--left">
                                <div class="clicker clicker--left">
                                    <button data-direction="left" data-scroller-id="scroller-<?php echo get_row_index(); ?>">
                                        <span class="isVisuallyHidden">Scroll Left</span>
                                    </button>
                                </div>
                            </div>
                            <div class="panel__controls__item panel__controls__item--right">
                                <div class="clicker clicker--right">
                                    <button data-direction="right" data-scroller-id="scroller-<?php echo get_row_index(); ?>">
                                        <span class="isVisuallyHidden">Scroll Right</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <?php if($featured_projects_slider_button_text): ?>
                <div class="region__ft">
                    <a class="btn" href="<?php echo get_page_link(142); ?>">
                        <span class="btn__txt"><?php echo $featured_projects_slider_button_text; ?></span>
                        <span class="btn__icon"></span>
                    </a>
                </div>
            <?php endif; ?>
        </div>

    </div>
</div>
