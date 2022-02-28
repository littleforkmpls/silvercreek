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
    <?php if(have_rows('page_components')): ?>
    <?php
        $total_rows = count(get_field('page_components'));
        $last_row_index = $total_rows - 1;
        $last_component_name = get_field('page_components')[$last_row_index]['acf_fc_layout'];
    ?>
    <?php
        // prevent the entire tier from rendering in the event only a hero component is present
        // like on the contact page
        if($total_rows !== 1 && $last_component_name !== 'hero'):
    ?>
        <div class="tier tier--main">
            <div class="tier__ornament tier__ornament--top"></div>
            <?php if(is_front_page() && $last_component_name == 'process_slider'): ?>
                <div class="tier__ornament tier__ornament--bottom"></div>
            <?php endif; ?>
            <div class="tier__bd">
                <div class="wrapper">
                    <div class="slab">
                        <?php if(is_front_page() && $last_component_name == 'process_slider'): ?>
                            <div class="slab__ornament"></div>
                        <?php endif; ?>

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
                                        elseif(get_row_layout() == 'team'):
                                            get_template_part('includes/component-team');
                                        elseif(get_row_layout() == 'cta'):
                                            get_template_part('includes/component-cta');
                                        elseif(get_row_layout() == 'project_archive'):
                                            get_template_part('includes/component-project-archive');
                                        endif;
                                    endwhile;
                                endif;
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php endif; ?>

    <?php // contact form ?>
    <?php get_template_part('includes/form-contact'); ?>

</div>
<?php get_footer(); ?>
