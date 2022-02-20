<?php // PAGEES: HOME, ABOUT, GENERAL, ETC ?>

<?php get_header(); ?>
<div class="site__main" role="main">

    <?php // page title for SEO & accessibility always present in the h1 ?>
    <h1 class="isVisuallyHidden">
        <?php
            if (is_front_page()):
                echo get_bloginfo('name');
            else:
                the_title();
            endif;
        ?>
    </h1>

    <?php
        // loop through components and display hero
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
                    <div class="slab__content">

                        <?php
                            // loop through components and display all except hero
                            if(have_rows('page_components')):
                                while (have_rows('page_components')) : the_row();
                                    if(get_row_layout() == 'featured_projects_slider'):
                                        get_template_part('includes/component-featured-projects-slider');
                                    elseif(get_row_layout() == 'process_slider'):
                                        get_template_part('includes/component-process-slider');
                                    elseif(get_row_layout() == 'lede'):
                                        get_template_part('includes/component-lede');
                                    endif;
                                endwhile;
                            endif;
                        ?>

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
