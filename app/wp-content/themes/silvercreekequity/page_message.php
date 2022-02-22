<?php /* Template Name: Short Message Template */ ?>

<?php get_header(); ?>
<div class="site__main site__main--fullscreen" role="main">
    <div class="site__main__inner">

        <div class="placard">
            <div class="placard__inner">
                <div class="placard__hd">
                    <h1 class="txt txt--hero">
                        <?php the_title(); ?>
                    </h1>
                </div>
                <div class="placard__bd">
                    <div class="txt txt--body2">
                        <?php the_field('short_message_text'); ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>
