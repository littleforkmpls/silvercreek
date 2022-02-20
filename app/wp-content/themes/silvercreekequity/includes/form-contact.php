<div class="section section--noDivider">
    <div class="section__hd">
        <div class="title title--inverted">
            <h2 class="txt txt--title txt--color-brand-light">
                <?php the_field('contact_form_section_label', 'option'); ?>
            </h2>
        </div>
    </div>
    <div class="section__bd">
        <div class="feature feature--tight">
            <div class="feature__hd">
                <h3 class="txt txt--hdg txt--color-brand-light">
                    <?php the_field('contact_form_headline', 'option'); ?>
                </h3>
            </div>
        </div>
    </div>
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
