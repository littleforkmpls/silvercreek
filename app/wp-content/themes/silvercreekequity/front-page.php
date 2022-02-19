<?php // HOME PAGE ?>

<?php get_header(); ?>
<div class="site__main" role="main">

    <?php
        if(have_rows('page_components')):
            while (have_rows('page_components')) : the_row();
                if(get_row_layout() == 'hero'):
                    get_template_part('includes/component-hero');
                endif;
            endwhile;
        endif;
    ?>

    <?php // main content ?>
    <div class="tier tier--main">
        <div class="tier__ornament tier__ornament--top"></div>
        <div class="tier__bd">
            <div class="wrapper">
                <div class="slab">
                    <div class="slab__ornament"></div>

                        <?php
                            if(have_rows('page_components')):
                                while (have_rows('page_components')) : the_row();
                                    if(get_row_layout() == 'featured_projects_slider'):
                                        get_template_part('includes/component-featured-projects-slider');
                                    elseif(get_row_layout() == 'process_slider'):
                                        get_template_part('includes/component-process-slider');
                                    endif;
                                endwhile;
                            endif;
                        ?>



                    <div class="section">
                        <div class="section__hd">
                            <div class="title">
                                <h2 class="txt txt--title">
                                    <?php the_field('home_process_section_label'); ?>
                                </h2>
                            </div>
                        </div>
                        <div class="section__bd">
                            <div class="feature">
                                <div class="feature__hd">
                                    <h3 class="txt txt--hdg">
                                        <?php the_field('home_process_headline'); ?>
                                    </h3>
                                </div>
                                <div class="feature__bd">
                                    <p class="txt txt--body">
                                        <?php the_field('home_process_blurb'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="section__cards">
                            <div class="collection">
                                <div class="collection__stage">
                                    <div class="collection__stage__list">
                                        <?php if(have_rows('home_process_steps')): ?>
                                            <?php while(have_rows('home_process_steps')) : the_row(); ?>
                                                <?php
                                                    $process_image_id = get_sub_field('home_process_step_image');
                                                    $process_image = wp_get_attachment_image_url($process_image_id, 'project-card');
                                                ?>
                                                <div class="collection__stage__list__item">
                                                    <div class="card">
                                                        <div class="card__media">
                                                            <img class="isBlock" src="<?php echo $process_image; ?>" alt="<?php the_sub_field('home_process_step_name'); ?>" />
                                                        </div>
                                                        <div class="card__bd card__bd--dark card__bd--center">
                                                            <div class="card__bd_content">
                                                                <div class="card__bd_content__hd">
                                                                    <h4 class="txt txt--label">
                                                                        <?php the_sub_field('home_process_step_name'); ?>
                                                                    </h4>
                                                                </div>
                                                                <div class="card__bd_content__bd">
                                                                    <p class="txt txt--body2">
                                                                        <?php the_sub_field('home_process_step_description'); ?>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endwhile; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="tier__ornament tier__ornament--bottom"></div>
    </div>

    <?php // contact form ?>
    <div class="tier tier--peacock-dark">
        <div class="wrapper">
            <?php get_template_part('includes/form-contact'); ?>
        </div>
    </div>

</div>
<?php get_footer(); ?>
