<div class="tier tier--peacock-gradient">
    <div class="wrapper">
        <div class="mat">

            <div class="region">
                <?php if(!is_page('contact')): ?>
                    <div class="region__title">
                        <div class="title title--inverted">
                            <h2 class="txt txt--title txt--color-brand-light">
                                <?php the_field('contact_form_section_label', 'option'); ?>
                            </h2>
                        </div>
                    </div>
                    <div class="region__intro">
                        <div class="feature">
                            <div class="feature__hd feature__hd--noPush">
                                <h3 class="txt txt txt--hdg txt--color-brand-light">
                                    <?php the_field('contact_form_headline', 'option'); ?>
                                </h3>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="region__bd">
                    <div class="slab slab--sm">
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
</div>
