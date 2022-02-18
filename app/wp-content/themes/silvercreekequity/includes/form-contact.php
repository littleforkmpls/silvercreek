<div class="section">
    <div class="section__hd">
        <div class="title title--inverted">
            <h2 class="txt txt--title txt--color-brand-light">
                Contact Us
            </h2>
        </div>
    </div>
    <div class="section__bd">
        <div class="feature">
            <div class="feature__hd">
                <h3 class="txt txt--hdg txt--color-brand-light">
                    Ready to profit through partnership?
                </h3>
            </div>
        </div>
    </div>
    <div class="section__bd section__bd--noPush">
        <div class="slab">
            <div class="form">
                <div class="form__intro">
                    <p class="txt txt--body">
                        If you’re looking to make a smart, long-term investment, we could have just the right project for you. Fill out this simple form and we’ll be in touch soon.
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
