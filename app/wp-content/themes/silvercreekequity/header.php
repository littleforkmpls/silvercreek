<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1" />

        <?php wp_head(); ?>
    </head>
    <body>
        <div class="site">
            <div class="site__masthead" role="banner">
                <div class="tier tier--peacock-dark-gradient">
                    <div class="wrapper">
                        <div class="masthead" role="nav">
                            <div class="masthead__brand">
                                <a href="<?php echo site_url(); ?>">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/silver-creek-equity-logo.svg" alt="Silver Creek Equity" />
                                </a>
                            </div>
                            <div class="masthead__toggle">
                                <a class="masthead__toggle__icon" href="#toggle" role="button" id="js-navToggleTrigger" aria-expanded="false">
                                    <span class="masthead__toggle__icon__bar masthead__toggle__icon__bar--top"></span>
                                    <span class="masthead__toggle__icon__bar masthead__toggle__icon__bar--bottom"></span>
                                </a>
                            </div>
                            <div class="masthead__nav" id="js-navToggleTarget" aria-hidden="true">
                                <div class="masthead__nav__primary">
                                    <div class="nav">
                                        <ul id="primaryNav" class="nav__list">
                                            <li>
                                                <a href="#about">About</a>
                                            </li>
                                            <li>
                                                <a href="#projects">Projects</a>
                                            </li>
                                            <li>
                                                <a href="#news">News</a>
                                            </li>
                                            <li>
                                                <a href="#contact">Contact</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="masthead__nav__secondary">
                                    <div class="utils">
                                        <div class="utils__contact">
                                            <a href="#phone">612-282-7053</a>
                                        </div>
                                        <div class="utils__portal">
                                            <a href="#login">Login</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
