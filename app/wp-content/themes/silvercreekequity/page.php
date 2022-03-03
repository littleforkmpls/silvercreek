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
        // loop through components
        if(have_rows('page_components')):
            while (have_rows('page_components')) : the_row();
                if(get_row_layout() == 'hero'):
                    get_template_part('includes/component-hero');
                elseif(get_row_layout() == 'featured_projects_slider'):
                    get_template_part('includes/component-featured-projects-slider');
                elseif(get_row_layout() == 'process_slider'):
                    get_template_part('includes/component-process-slider');
                elseif(get_row_layout() == 'lede'):
                    get_template_part('includes/component-lede');
                elseif(get_row_layout() == 'team'):
                    get_template_part('includes/component-team');
                elseif(get_row_layout() == 'project_archive'):
                    get_template_part('includes/component-project-archive');
                endif;
            endwhile;
        endif;
    ?>

    <?php // contact form ?>
    <?php get_template_part('includes/form-contact'); ?>

</div>
<?php get_footer(); ?>
