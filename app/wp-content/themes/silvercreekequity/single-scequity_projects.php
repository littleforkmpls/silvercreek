<?php // INDIVIDUAL PROJECT PAGE ?>

<?php get_header(); ?>
<div class="site__main" role="main">

    <div class="tier tier--light-gradient">
        <div class="wrapper">
            <div class="mat">

                <div class="feature feature--inset">
                    <div class="note">
                        <div class="note__hd">
                            <h1 class="txt txt--hdg">
                                <?php the_title(); ?>
                            </h1>
                        </div>
                        <div class="note__subhd">
                            <h2 class="txt txt--body">
                                <?php the_field('project_location'); ?>
                            </h2>
                        </div>
                        <div class="note__meta">
                            <div class="tag tag--<?php echo strtolower(get_field('project_status')); ?>">
                                <span class="txt txt--label">
                                    <?php the_field('project_status'); ?>
                                </span>
                            </div>
                        </div>
                        <div class="note__bd">
                            <div class="txt txt--body txt--highlightLinks">
                                <?php the_field('project_description'); ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="tier tier--white">
        <div class="wrapper">
            <div class="mat">
                <div class="region">

                    <?php
                        if(have_rows('gallery_items')):
                        $total_gallery_items = count(get_field('gallery_items'));
                    ?>
                        <div id="js-gallery" class="gallery">
                            <div class="gallery__stage">
                                <?php if($total_gallery_items > 1): ?>
                                    <div class="gallery__stage__controls">
                                        <div class="gallery__stage__controls__item gallery__stage__controls__item--prev">
                                            <button id="js-gallery-prev" class="gallery__stage__controls__item__btn">
                                                <span class="isVisuallyHidden">Previous</span>
                                            </button>
                                        </div>
                                        <div class="gallery__stage__controls__item gallery__stage__controls__item--next">
                                            <button id="js-gallery-next" class="gallery__stage__controls__item__btn">
                                                <span class="isVisuallyHidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <?php while (have_rows('gallery_items')) : the_row(); ?>
                                    <?php if(get_row_layout() == 'gallery_items_image'): ?>
                                        <div class="gallery__stage__item gallery__stage__item--image" data-index="<?php echo get_row_index(); ?>">
                                            <div class="has16x9Media">
                                                <img class="isInlineBlock" src="<?php echo wp_get_attachment_image_url(get_sub_field('gallery_items_image_file'), 'large'); ?>" alt="" />
                                            </div>
                                        </div>
                                    <?php elseif(get_row_layout() == 'gallery_items_youtube_video'): ?>
                                        <div class="gallery__stage__item gallery__stage__item--video" data-index="<?php echo get_row_index(); ?>">
                                            <div class="has16x9Media">
                                                <iframe src="https://www.youtube.com/embed/<?php echo get_sub_field('gallery_items_youtube_video_id'); ?>" frameborder="0" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    <?php elseif(get_row_layout() == 'gallery_items_iframe'): ?>
                                        <div class="gallery__stage__item gallery__stage__item--iframe" data-index="<?php echo get_row_index(); ?>">
                                            <div class="has16x9Media">
                                                <iframe src="<?php echo get_sub_field('gallery_items_iframe_source'); ?>" frameborder="0" allowfullscreen="" /></iframe>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endwhile; ?>
                            </div>
                            <?php if($total_gallery_items > 1): ?>
                                <div class="gallery__thumbs">
                                    <?php while (have_rows('gallery_items')) : the_row(); ?>
                                        <?php if(get_row_layout() == 'gallery_items_image'): ?>
                                            <div class="gallery__thumbs__item gallery__thumbs__item--image">
                                                <a data-index="<?php echo get_row_index(); ?>" href="<?php echo wp_get_attachment_image_url(get_sub_field('gallery_items_image_file'), 'large'); ?>">
                                                    <img class="isBlock" width="60" height="60" src="<?php echo wp_get_attachment_image_url(get_sub_field('gallery_items_image_file'), 'thumbnail'); ?>" alt="View larger image" />
                                                </a>
                                            </div>
                                        <?php elseif(get_row_layout() == 'gallery_items_youtube_video'): ?>
                                            <div class="gallery__thumbs__item gallery__thumbs__item--video">
                                                <a data-index="<?php echo get_row_index(); ?>" href="https://www.youtube.com/embed/<?php echo get_sub_field('gallery_items_youtube_video_id'); ?>">
                                                    <img class="isBlock" width="60" height="60" src="<?php bloginfo('template_url'); ?>/assets/images/gallery-thumbnail-video.png" alt="View video" />
                                                </a>
                                            </div>
                                        <?php elseif(get_row_layout() == 'gallery_items_iframe'): ?>
                                            <div class="gallery__thumbs__item gallery__thumbs__item--iframe">
                                                <a data-index="<?php echo get_row_index(); ?>" href="<?php echo get_sub_field('gallery_items_iframe_source'); ?>">
                                                    <img class="isBlock" width="60" height="60" src="<?php bloginfo('template_url'); ?>/assets/images/gallery-thumbnail-iframe.png" alt="View iframe" />
                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                            <div class="gallery__meta">
                                <div class="gallery__meta__count">
                                    <span class="txt txt--size-md txt--color-brand-peacock">
                                        Item <span id="js-galleryCurrentIndex">1</span>/<?php echo $total_gallery_items; ?>
                                    </span>
                                </div>
                                <div class="gallery__meta__caption">
                                    <?php while (have_rows('gallery_items')) : the_row(); ?>
                                        <span class="gallery__meta__caption__item" data-index="<?php echo get_row_index(); ?>">
                                            <span class="txt txt--size-md txt--color-brand-dark">
                                            <?php if(get_row_layout() == 'gallery_items_image'): ?>
                                                <?php the_sub_field('gallery_items_image_caption'); ?>
                                            <?php elseif(get_row_layout() == 'gallery_items_youtube_video'): ?>
                                                <?php the_sub_field('gallery_items_youtube_caption'); ?>
                                            <?php elseif(get_row_layout() == 'gallery_items_iframe'): ?>
                                                <?php the_sub_field('gallery_items_iframe_caption'); ?>
                                            <?php endif; ?>
                                            </span>
                                        </span>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    <div class="tier tier--light-gradient">
        <div class="mat">

            <?php if (get_field('project_related_projects')) : ?>
                <?php $total_slider_steps = count(get_field('project_related_projects')); ?>
                <div class="region">
                    <div class="region__bd region__bd--hasCards">
                        <div class="panel">
                            <div class="panel__component">
                                <div class="scroller" data-items="<?php echo $total_slider_steps; ?>" data-scroller-id="scroller-<?php echo get_row_index(); ?>">
                                    <div class="scroller__stage">
                                        <div class="scroller__stage__list">
                                            <?php foreach(get_field('project_related_projects') as $related_project) : ?>
                                                <?php
                                                    $project_permalink = get_permalink($related_project->ID);
                                                    $project_title = get_the_title($related_project->ID);
                                                    $project_location = get_field('project_location', $related_project->ID);
                                                    $project_status = get_field('project_status', $related_project->ID);
                                                    $project_image = get_the_post_thumbnail_url($related_project->ID, 'project-card');
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
                    <div class="region__ft">
                        <a class="btn" href="<?php echo get_page_link(142); ?>">
                            <span class="btn__txt">All Projects</span>
                            <span class="btn__icon"></span>
                        </a>
                    </div>
                </div>
            <?php endif; ?>

        </div>
    </div>

    <?php // contact form ?>
    <?php get_template_part('includes/form-contact'); ?>

</div>
<?php get_footer(); ?>
