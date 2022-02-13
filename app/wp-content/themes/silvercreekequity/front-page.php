<?php // HOME PAGE ?>

<?php get_header(); ?>
<div class="site__main" role="main">

    <?php // hero ?>
    <div class="tier tier--peacock-dark-media" style="background-image: url('<?php bloginfo('template_directory'); ?>/assets/content/hero-home.jpg')">
        <div class="wrapper">
            <div class="section">

                <div class="hero">
                    <div class="hero__hd">
                        <h1 class="txt txt--hero">
                            Let&rsquo;s start<br/> building wealth<br class="break break--whenSmall"> together.
                        </h1>
                    </div>
                    <div class="hero__bd">
                        <p class="txt txt--heroSub">We&rsquo;re private equity managers specializing in multifamily and senior living communities from concept to completion.</p>
                    </div>
                    <div class="hero__cta">
                        <a class="btn btn--light" href="">
                            <span class="btn__txt">About us</span>
                            <span class="btn__icon"></span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php // main content ?>
    <div class="tier tier--main">
        <div class="tier__ornament"></div>
        <div class="tier__bd">
            <div class="wrapper">
                <div class="slab">

                    <div class="section">
                        <div class="section__hd">
                            <div class="title">
                                <h2 class="txt txt--title">Projects</h2>
                            </div>
                        </div>
                        <div class="section__bd">
                            <div class="feature">
                                <div class="feature__hd">
                                    <h3 class="txt txt--hdg">Find the perfect project for your investment dollar.</h3>
                                </div>
                                <div class="feature__bd">
                                    <p class="txt txt--body">From market rate apartments to a variety of unique senior living properties, our vast project portfolio gives you acres of investment options.</p>
                                </div>
                            </div>
                        </div>
                        <div class="section__cards">
                            <div class="collection">
                                <div class="collection__stage">
                                    <div class="collection__stage__list">
                                        <?php for ($i = 1; $i <= 5; $i++) { ?>
                                        <div class="collection__stage__list__item">
                                            <a class="isInlineBlock" href="#">
                                                <div class="card card--funded">
                                                    <div class="card__label">
                                                        <span class="txt txt--label">Funded</span>
                                                    </div>
                                                    <div class="card__bd">
                                                        <h4>Project name goes here</h4>
                                                        <h5>Minneapolis, MN</h5>
                                                    </div>
                                                    <div class="card__media">
                                                        <img class="isBlock" src="https://via.placeholder.com/400x320.png?text=400x320" alt="" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="collection__stage__list__item">
                                            <a class="isInlineBlock" href="#">
                                                <div class="card card--completed">
                                                    <div class="card__label">
                                                        <span class="txt txt--label">Completed</span>
                                                    </div>
                                                    <div class="card__bd">
                                                        <h4>Project name goes here</h4>
                                                        <h5>Minneapolis, MN</h5>
                                                    </div>
                                                    <div class="card__media">
                                                        <img class="isBlock" src="https://via.placeholder.com/400x320.png?text=400x320" alt="" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <div class="collection__stage__list__item">
                                            <a class="isInlineBlock" href="#">
                                                <div class="card card--open">
                                                    <div class="card__label">
                                                        <span class="txt txt--label">Open</span>
                                                    </div>
                                                    <div class="card__bd">
                                                        <h4>Project name goes here</h4>
                                                        <h5>Minneapolis, MN</h5>
                                                    </div>
                                                    <div class="card__media">
                                                        <img class="isBlock" src="https://via.placeholder.com/400x320.png?text=400x320" alt="" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="section__ft">
                            <!-- <a class="btn" href="">
                                <span class="btn__txt">All Projects</span>
                                <span class="btn__icon"></span>
                            </a> -->
                        </div>
                    </div>

                    <div class="section">
                        <div class="section__hd">
                            <div class="title">
                                <h2 class="txt txt--title">Our Process</h2>
                            </div>
                        </div>
                        <div class="section__bd">
                            <div class="feature">
                                <div class="feature__hd">
                                    <h3 class="txt txt--hdg">Our process creates low risk and high returns.</h3>
                                </div>
                                <div class="feature__bd">
                                    <p class="txt txt--body">To give each project the best chance to succeed, we put our development experience to work and lean on the support of other experts in construction, design, project management and market study analysis.</p>
                                </div>
                            </div>
                        </div>
                        <div class="section__cards">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php // contact form ?>
    <div class="tier tier--peacock-gradient">
        <div class="wrapper">

        </div>
    </div>

</div>
<?php get_footer(); ?>
