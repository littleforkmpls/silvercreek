<?php // 404 ERROR PAGE ?>

<?php get_header(); ?>
<div class="site__main site__main--fullscreen" role="main">
    <div class="site__main__inner">

        <div class="placard">
            <div class="placard__inner">
                <div class="placard__hd">
                    <h1 class="txt txt--hero">
                        <?php the_field('404_page_headline', 'option'); ?>
                    </h1>
                </div>
                <div class="placard__bd">
                    <p class="txt txt--body2">
                        <?php the_field('404_page_blurb', 'option'); ?>
                    </p>
                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>
