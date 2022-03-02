<?php
    if (is_front_page() || is_page(12)):
        $cf_tier_class = 'tier--peacock-dark';
        $cf_title_class = 'title--inverted';
        $cf_headline_class = 'txt--color-brand-light';
    else:
        $cf_tier_class = 'tier--white';
        $cf_title_class = '';
        $cf_headline_class = '';
    endif;
?>

<div class="tier <?php echo $cf_tier_class; ?>">
    <div class="wrapper">

        <div class="section section--noDivider section--contactForm">
            <?php if(!is_page('contact')): ?>
            <div class="section__hd">
                <div class="title <?php echo $cf_title_class; ?>">
                    <h2 class="txt txt--title <?php echo $cf_headline_class; ?>">
                        <?php the_field('contact_form_section_label', 'option'); ?>
                    </h2>
                </div>
            </div>
            <div class="section__bd">
                <div class="feature feature--tight">
                    <div class="feature__hd">
                        <h3 class="txt txt--hdg <?php echo $cf_headline_class; ?>">
                            <?php the_field('contact_form_headline', 'option'); ?>
                        </h3>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            <div class="section__bd section__bd--noPush">
                <div class="slab slab--isLight">
                    <div class="form">
                        <div class="form__intro">
                            <p class="txt txt--body">
                                <?php the_field('contact_form_blurb', 'option'); ?>
                            </p>
                        </div>
                        <div class="form__embed">
                            <?php
                                gravity_form(
                                    1,
                                    false, // display title
                                    false, // display desc
                                    false, // display inactive
                                    '', // array of field values
                                    true, // ajax
                                    0, // tabindex
                                    true // echo
                                );
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
