<?php // PAGEES: HOME, ABOUT, GENERAL, ETC ?>

<?php get_header(); ?>

<?php
    if(is_front_page()) {
        $hero_id = 'site__hero--home';
    } else {
        $hero_id ='';
    }
?>

<div class="site__hero <?php echo $hero_id; ?>">
    <?php
        if(have_rows('page_components')):
            while (have_rows('page_components')) : the_row();
                if(get_row_layout() == 'hero'):
                    get_template_part('includes/component-hero');
                endif;
            endwhile;
        endif;
    ?>
</div>

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
                if(get_row_layout() == 'featured_projects_slider'):
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
