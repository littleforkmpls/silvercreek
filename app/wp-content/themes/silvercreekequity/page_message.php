<?php /* Template Name: Short Message Template */ ?>

<?php get_header(); ?>
<div class="site__main site__main--fullscreen" role="main">
    <div class="site__main__inner">

        <div class="placard">
            <div class="placard__title">
                <div class="placard__title__inner">
                    <div class="txt txt--label txt--color-brand-grey">
                        Contact
                    </div>
                </div>
            </div>
            <div class="placard__hd">
                <h1 class="txt txt--hero">
                    <?php the_title(); ?>
                </h1>
            </div>
            <div class="placard__bd">
                <div class="txt txt--heroSub">
                    <?php the_field('short_message_text'); ?>
                </div>
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
