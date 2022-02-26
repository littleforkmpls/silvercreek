<?php // INDIVIDUAL PROJECT PAGE ?>

<?php get_header(); ?>
<div class="site__main" role="main">

    <div class="tier tier--main">
        <div class="tier__ornament tier__ornament--top tier__ornament--light"></div>
        <div class="tier__bd">
            <div class="wrapper">
                <div class="slab">
                    <div class="slab__content">

                        <div class="section section--noDivider">
                            <div class="section__bd section__bd--noPush">
                                <div class="feature">
                                    <div class="note">
                                        <div class="note__hd">
                                            <h1 class="txt txt--hdg">
                                                <?php the_title(); ?>
                                            </h1>
                                        </div>
                                        <div class="note__subhd">
                                            <h2 class="txt txt--body">
                                                <?php the_field('project_location'); ?>
                                            </h2>
                                        </div>
                                        <div class="note__meta">
                                            <div class="tag tag--<?php echo strtolower(get_field('project_status')); ?>">
                                                <span class="txt txt--label">
                                                    <?php the_field('project_status'); ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="note__bd">
                                            <div>
                                                <?php the_field('project_description'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section">
                            <div class="section__bd">
                                <div class="gallery">
                                    <div>
                                        <?php
                                        // <iframe id="iframe-310470" frameBorder="0" sandbox="allow-scripts allow-same-origin allow-forms allow-popups allow-presentation allow-top-navigation" src="javascript: window.frameElement.getAttribute(&quot;srcdoc&quot;);" srcDoc="&lt;script&gt;window.onmessage = function(event) {event.source.postMessage({iframeId: event.data, scrollHeight: document.body.getBoundingClientRect().height || document.body.scrollHeight}, event.origin);};&lt;/script&gt;&lt;body style=&#x27;margin: 0&#x27;&gt;&lt;script type=&quot;text/javascript&quot; src=&quot;https://share.earthcam.net/embed/timelapse/tJ90CoLmq7TzrY396Yd88BvxsbjvXoLki_rh0irqyFk!&quot;&gt;&lt;/script&gt;&lt;/body&gt;" style="width:100%;height:undefinedpx;overflow:visible;transition:height 1.5s ease;-webkit-transition:height 1.5s ease;-moz-transition:height .25s ease"></iframe>
                                        // <iframe id="iframe-510471" frameBorder="0" sandbox="allow-scripts allow-same-origin allow-forms allow-popups allow-presentation allow-top-navigation" src="javascript: window.frameElement.getAttribute(&quot;srcdoc&quot;);" srcDoc="&lt;script&gt;window.onmessage = function(event) {event.source.postMessage({iframeId: event.data, scrollHeight: document.body.getBoundingClientRect().height || document.body.scrollHeight}, event.origin);};&lt;/script&gt;&lt;body style=&#x27;margin: 0&#x27;&gt;&lt;iframe title=&quot;Timber Pines&quot; src=&quot;https://www.senserasystems.com/public/embed/SP2021929768&quot; width=&quot;1200&quot; height=&quot;700&quot; frameborder=&quot;0&quot; allowfullscreen&gt;&lt;/iframe&gt;&lt;/body&gt;" style="width:100%;height:undefinedpx;overflow:visible;transition:height 1.5s ease;-webkit-transition:height 1.5s ease;-moz-transition:height .25s ease"></iframe>
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="section">
                            <div class="section__cards">

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php // contact form ?>
    <?php get_template_part('includes/form-contact'); ?>

</div>
<?php get_footer(); ?>
