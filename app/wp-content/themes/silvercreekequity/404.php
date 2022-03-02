<?php // 404 ERROR PAGE ?>

<?php get_header(); ?>
<div class="site__main site__main--fullscreen" role="main">
    <div class="site__main__inner">

        <div class="placard">
            <div class="placard__title">
                <div class="placard__title__inner">
                    <div class="txt txt--label txt--color-brand-grey">
                        404 Error
                    </div>
                </div>
            </div>
            <div class="placard__hd">
                <h1 class="txt txt--hero">
                    <?php the_field('404_page_headline', 'option'); ?>
                </h1>
            </div>
            <div class="placard__bd">
                <p class="txt txt--heroSub">
                    <?php the_field('404_page_blurb', 'option'); ?>
                </p>
            </div>
            <div class="placard__cta">
                <a class="btn" href="<?php echo site_url(); ?>">
                    <span class="btn__txt">Home</span>
                    <span class="btn__icon"></span>
                </a>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>
