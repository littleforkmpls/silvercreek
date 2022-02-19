<?php // GENERAL PAGES :: About, Privacy, Forms, etc ?>

<?php get_header(); ?>
<div class="site__main" role="main">

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

    <div class="tier">
        <div class="wrapper">

            <?php
                // loop through components and display all except hero
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

        </div>
    </div>

    <?php // contact form ?>
    <div class="tier tier--peacock-dark">
        <div class="wrapper">
            <?php get_template_part('includes/form-contact'); ?>
        </div>
    </div>

</div>
<?php get_footer(); ?>
