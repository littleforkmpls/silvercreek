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
                        <div class="masthead" role="navigation">
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
                                    <?php
                                        wp_nav_menu(array(
                                            'container'            => false,
                                            'menu_class'           => 'masthead__nav__primary__list',
                                            'menu_id'              => 'primaryNav',
                                            'echo'                 => true,
                                            'fallback_cb'          => false,
                                            'items_wrap'           => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                            'item_spacing'         => 'preserve',
                                            'depth'                => 1,
                                            'theme_location'       => 'primary-navigation'
                                        ));
                                    ?>
                                </div>
                                <div class="masthead__nav__secondary">
                                    <ul class="masthead__nav__secondary__list">
                                        <li>
                                            <a href="#phone">612-282-7053</a>
                                        </li>
                                        <li>
                                            <a href="#login">Login</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="masthead__nav__social">
                                    <ul class="masthead__nav__social__list">
                                        <li>
                                            <a class="hasSocialIcon" href="#linkedin">
                                                <i class="socialIcon socialIcon--linkedin" aria-hidden="true"></i>
                                                <span class="isVisuallyHidden">LinkedIn</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hasSocialIcon" href="#facebook">
                                                <i class="socialIcon socialIcon--facebook" aria-hidden="true"></i>
                                                <span class="isVisuallyHidden">Facebook</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="hasSocialIcon" href="#twitter">
                                                <i class="socialIcon socialIcon--twitter" aria-hidden="true"></i>
                                                <span class="isVisuallyHidden">Twitter</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="masthead__nav__legal">
                                    <small class="txt txt--legal">
                                        &copy; <?php echo date('Y'); ?> Silver Creek Equity. All Rights Reserved.
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
