<!doctype html>
<html lang="en-us">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1" />

        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">
        <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#32645c">
        <meta name="apple-mobile-web-app-title" content="Silver Creek Equity">
        <meta name="application-name" content="Silver Creek Equity">
        <meta name="msapplication-TileColor" content="#32645c">
        <meta name="theme-color" content="#32645c">

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
                                    <img src="<?php the_field('global_logo', 'option'); ?>" alt="<?php echo get_bloginfo('name'); ?>" />
                                </a>
                            </div>
                            <div class="masthead__toggle">
                                <a class="masthead__toggle__icon" href="#toggle" role="button" id="js-navToggleTrigger" aria-expanded="false">
                                    <span class="isVisuallyHidden">Toggle Navigation</span>
                                    <span class="masthead__toggle__icon__bar masthead__toggle__icon__bar--top"></span>
                                    <span class="masthead__toggle__icon__bar masthead__toggle__icon__bar--bottom"></span>
                                </a>
                            </div>
                            <div class="masthead__nav" id="js-navToggleTarget" aria-hidden="true">
                                <div class="masthead__nav__primary">
                                    <?php
                                        function add_last_nav_item($items) {

                                            if (get_field('global_portal_link', 'option') && get_field('global_portal_link_text', 'option')):
                                                $items .= '<li class="isVisibleForMobile"><a href="'. get_field('global_portal_link', 'option') .'">'. get_field('global_portal_link_text', 'option') .'</a></li>';
                                            endif;

                                            if (get_field('global_phone_number', 'option')):
                                                $items .= '<li class="isVisibleForMobile"><a href="tel:+1-'. trim(preg_replace('/[^0-9] -/', '', get_field('global_phone_number', 'option'))) .'">'. get_field('global_phone_number', 'option') .'</a></li>';
                                            endif;

                                            return $items;
                                        }

                                        add_filter('wp_nav_menu_primary-navigation_items','add_last_nav_item');

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
                                            <a href="tel:+1-<?php echo trim(preg_replace('/[^0-9] -/', '', get_field('global_phone_number', 'option'))); ?>"><?php the_field('global_phone_number', 'option'); ?></a>
                                        </li>
                                        <?php if (get_field('global_portal_link', 'option') && get_field('global_portal_link_text', 'option')) : ?>
                                        <li class="portalLink">
                                            <a href="<?php the_field('global_portal_link', 'option'); ?>"><?php the_field('global_portal_link_text', 'option'); ?></a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                                <?php
                                    $linkedIn_url = get_field('socialmedia_linkedin_url', 'option');
                                    $facebook_url = get_field('socialmedia_facebook_url', 'option');
                                    $twitter_url = get_field('socialmedia_twitter_url', 'option');
                                ?>
                                <?php if ($linkedIn_url || $facebook_url || $twitter_url) : ?>
                                    <div class="masthead__nav__social">
                                        <ul class="masthead__nav__social__list">
                                            <?php if ($linkedIn_url) : ?>
                                            <li>
                                                <a class="hasSocialIcon" href="<?php echo $linkedIn_url; ?>">
                                                    <i class="socialIcon socialIcon--linkedin" aria-hidden="true"></i>
                                                    <span class="isVisuallyHidden">LinkedIn</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if ($facebook_url) : ?>
                                            <li>
                                                <a class="hasSocialIcon" href="<?php echo $facebook_url; ?>">
                                                    <i class="socialIcon socialIcon--facebook" aria-hidden="true"></i>
                                                    <span class="isVisuallyHidden">Facebook</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                            <?php if ($twitter_url) : ?>
                                            <li>
                                                <a class="hasSocialIcon" href="<?php echo $twitter_url; ?>">
                                                    <i class="socialIcon socialIcon--twitter" aria-hidden="true"></i>
                                                    <span class="isVisuallyHidden">Twitter</span>
                                                </a>
                                            </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                                <div class="masthead__nav__legal">
                                    <small class="txt txt--legal">
                                        &copy; <?php echo date('Y'); ?> <?php the_field('global_copyright_text', 'option'); ?>
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
