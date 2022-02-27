<?php // INDIVIDUAL PROJECT PAGE ?>

<?php get_header(); ?>
<div class="site__main" role="main">

    <div class="tier tier--main">
        <div class="tier__ornament tier__ornament--top tier__ornament--light"></div>
        <div class="tier__bd">
            <div class="wrapper">
                <div class="slab">
                    <div class="slab__content">

                        <div class="section section--noDivider">
                            <div class="section__bd section__bd--noPush">
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
                                            <div class="txt txt--body">
                                                <?php the_field('project_description'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <?php
                            if(have_rows('gallery_items')):

                            $total_gallery_items = count(get_field('gallery_items'));
                        ?>
                        <div class="section">
                            <div class="section__bd">
                                <div class="feature feature--inset">

                                    <div id="js-gallery" class="gallery">
                                        <div class="gallery__stage">
                                            <?php while (have_rows('gallery_items')) : the_row(); ?>
                                                <?php if(get_row_layout() == 'gallery_items_image'): ?>
                                                    <div class="gallery__stage__item gallery__stage__item--image" data-index="<?php echo get_row_index(); ?>">
                                                        <div>
                                                            <img class="isInlineBlock" src="<?php echo wp_get_attachment_image_url(get_sub_field('gallery_items_image_file'), 'large'); ?>" alt="" />
                                                        </div>
                                                    </div>
                                                <?php elseif(get_row_layout() == 'gallery_items_youtube_video'): ?>
                                                    <div class="gallery__stage__item gallery__stage__item--video" data-index="<?php echo get_row_index(); ?>">
                                                        <div class="hasVideo">
                                                            <iframe src="https://www.youtube.com/embed/<?php echo get_sub_field('gallery_items_youtube_video_id'); ?>" frameborder="0" allowfullscreen></iframe>
                                                        </div>
                                                    </div>
                                                <?php elseif(get_row_layout() == 'gallery_items_iframe'): ?>
                                                    <div class="gallery__stage__item gallery__stage__item--iframe" data-index="<?php echo get_row_index(); ?>">
                                                        <div class="hasVideo">
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

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php endif; ?>

                        <!--
                        <div class="section">
                            <div class="section__cards">

                            </div>
                        </div>
                        -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php // contact form ?>
    <?php get_template_part('includes/form-contact'); ?>

</div>
<?php get_footer(); ?>
