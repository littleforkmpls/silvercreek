
            <div class="site__footer" role="contentinfo">
                <div class="tier tier--peacock-dark-gradient">
                    <div class="wrapper">
                        <div class="footer">
                            <div class="footer__social">
                                <?php
                                    $linkedIn_url = get_field('socialmedia_linkedin_url', 'option');
                                    $facebook_url = get_field('socialmedia_facebook_url', 'option');
                                    $twitter_url = get_field('socialmedia_twitter_url', 'option');
                                ?>
                                <?php if ($linkedIn_url || $facebook_url || $twitter_url) : ?>
                                    <ul class="footer__social__list">
                                        <?php if ($linkedIn_url) : ?>
                                        <li>
                                            <a class="hasSocialIcon" href="<?php echo $linkedIn_url; ?>">
                                                <i class="socialIcon socialIcon--isLight socialIcon--linkedin" aria-hidden="true"></i>
                                                <span class="isVisuallyHidden">LinkedIn</span>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ($facebook_url) : ?>
                                        <li>
                                            <a class="hasSocialIcon" href="<?php echo $facebook_url; ?>">
                                                <i class="socialIcon socialIcon--isLight socialIcon--facebook" aria-hidden="true"></i>
                                                <span class="isVisuallyHidden">Facebook</span>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                        <?php if ($twitter_url) : ?>
                                        <li>
                                            <a class="hasSocialIcon" href="<?php echo $twitter_url; ?>">
                                                <i class="socialIcon socialIcon--isLight socialIcon--twitter" aria-hidden="true"></i>
                                                <span class="isVisuallyHidden">Twitter</span>
                                            </a>
                                        </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="footer__legal">
                                <small class="txt txt--legal">
                                    &copy; <?php echo date('Y'); ?> <?php the_field('global_copyright_text', 'option'); ?>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div><?php //end .site started in header.php ?>

        <?php wp_footer(); ?>
    </body>
</html>
