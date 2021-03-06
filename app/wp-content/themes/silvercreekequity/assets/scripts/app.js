/*jshint esversion: 6 */

document.addEventListener("DOMContentLoaded", function() {

    /** ******************* */
    /** Constants           */
    /** ******************* */
    const body              = document.querySelector('body');
    const navToggleTrigger  = document.querySelector("#js-navToggleTrigger");
    const navToggleTarget   = document.querySelector("#js-navToggleTarget");
    const gallery           = document.querySelector('#js-gallery');
    const scrollers         = document.querySelectorAll('.scroller');

    /** ******************* */
    /** Navigation          */
    /** ******************* */
    navToggleTrigger.onclick = function (e) {

        e.preventDefault();

        let navIsVisible = navToggleTarget.getAttribute('aria-hidden');

        if (navIsVisible === 'true') {
            // nav is hidden and will be visible
            navToggleTarget.setAttribute('aria-hidden','false');
            navToggleTrigger.setAttribute('aria-expanded','true');
        } else {
            // nav is visible and will be hidden
            navToggleTarget.setAttribute('aria-hidden','true');
            navToggleTrigger.setAttribute('aria-expanded','false');
        }

        body.classList.toggle('isLocked');
        navToggleTarget.classList.toggle('isVisible');
    };

    /** ******************* */
    /** Gallery             */
    /** ******************* */
    if (gallery) {

        // locate triggers and items
        let galleryTriggers = document.querySelectorAll('#js-gallery .gallery__thumbs__item a');
        let galleryItems    = document.querySelectorAll('#js-gallery .gallery__stage__item');
        let galleryCaptions = document.querySelectorAll('#js-gallery .gallery__meta__caption__item');

        // stop if there are no triggers or items or captions found
        if (galleryTriggers.length < 1 || galleryItems.length < 1 || galleryCaptions.length < 1) {
            return;
        }

        // define prev & next buttons
        let galleryControlNext = document.querySelector('#js-gallery-next');
        let galleryControlPrev = document.querySelector('#js-gallery-prev');

        // enable the first gallery item;
        galleryTriggers[0].classList.add('isActive');
        galleryItems[0].classList.add('isActive');
        galleryCaptions[0].classList.add('isActive');

        // add listeners to triggers
        for (const galleryTrigger of galleryTriggers) {
            galleryTrigger.addEventListener('click', function(e) {

                e.preventDefault();

                let selectedIndex = this.getAttribute('data-index');

                // stop if the user clicked currently active item
                if (this.classList.contains('isActive')) {
                    return;
                }

                // change the item
                changeGalleryItem(selectedIndex);

            });
        }

        // next button
        galleryControlNext.addEventListener('click', function(e) {
            let currentIndex = parseInt(document.querySelector('#js-gallery .gallery__thumbs__item a.isActive').getAttribute('data-index'));
            let nextIndex;

            // set the next index
            if (currentIndex == galleryItems.length) {
                nextIndex = 1;
            } else {
                nextIndex = currentIndex + 1;
            }

            // change the item
            changeGalleryItem(nextIndex);

        });

        // prev button
        galleryControlPrev.addEventListener('click', function(e) {
            let currentIndex = parseInt(document.querySelector('#js-gallery .gallery__thumbs__item a.isActive').getAttribute('data-index'));
            let prevIndex;

            // set the prev index
            if (currentIndex == 1) {
                prevIndex = galleryItems.length;
            } else {
                prevIndex = currentIndex - 1;
            }

            // change the item
            changeGalleryItem(prevIndex);

        });

        // change the gallery item
        const changeGalleryItem = (targetIndex) => {

            // remove and reset the active class to the correct thumbnail
            document.querySelector('#js-gallery .gallery__thumbs__item a.isActive').classList.remove('isActive');
            document.querySelector('#js-gallery .gallery__thumbs__item a[data-index="'+ targetIndex +'"]').classList.add('isActive');

            // remove and reset the active class to the current item
            document.querySelector('#js-gallery .gallery__stage__item.isActive').classList.remove('isActive');
            document.querySelector('#js-gallery .gallery__stage__item[data-index="'+ targetIndex +'"]').classList.add('isActive');

            // remove and reset the active class on the gallery captions
            document.querySelector('#js-gallery .gallery__meta__caption__item.isActive').classList.remove('isActive');
            document.querySelector('#js-gallery .gallery__meta__caption__item[data-index="'+ targetIndex +'"]').classList.add('isActive');

            // update the gallery counter
            document.querySelector('#js-galleryCurrentIndex').innerHTML = targetIndex;

        };
    }

    /** ******************* */
    /** Scroller Clicker    */
    /** ******************* */
    if (scrollers.length > 0) {

        let scrollDistance  = 340;
        let clickerButtons  = document.querySelectorAll('.clicker button');

        // handle hide / show of clickers at beginning and end of scroll stage
        for (const scrollerInstance of scrollers) {
            let scrollerInstanceID              = scrollerInstance.getAttribute('data-scroller-id');
            let scrollerInstanceStage           = document.querySelector('.scroller[data-scroller-id="'+ scrollerInstanceID +'"] .scroller__stage');
            let scrollerInstanceClickerLeft     = document.querySelector('button[data-scroller-id="'+ scrollerInstanceID +'"][data-direction=left]').parentNode.parentNode;
            let scrollerInstanceClickerRight    = document.querySelector('button[data-scroller-id="'+ scrollerInstanceID +'"][data-direction=right]').parentNode.parentNode;

            // hide the left button when the page loads
            scrollerInstanceClickerLeft.classList.add('isHidden');

            // listen to the scroll
            scrollerInstanceStage.addEventListener("scroll", function(e) {
                let scrollPosition      = this.scrollLeft;
                let scrollPositionMax   = this.scrollWidth - this.clientWidth;

                // when scroll is at the start, hide the left clicker else show it
                if (scrollPosition == 0) {
                    scrollerInstanceClickerLeft.classList.add('isHidden');
                } else {
                    scrollerInstanceClickerLeft.classList.remove('isHidden');
                }

                // when scroll is at the end, hide the right clicker else show it
                if (scrollPosition == scrollPositionMax) {
                    scrollerInstanceClickerRight.classList.add('isHidden');
                } else {
                    scrollerInstanceClickerRight.classList.remove('isHidden');
                }

            });

        }

        // add listeners to clickers
        for (const clickerButton of clickerButtons) {
            clickerButton.addEventListener('click', function(e) {

                e.preventDefault();

                // set values for all the stuff we need
                let scrollDirection             = this.getAttribute('data-direction');
                let scrollerID                  = this.getAttribute('data-scroller-id');
                let scrollerStage               = document.querySelector('.scroller[data-scroller-id="'+ scrollerID +'"] .scroller__stage');
                let scrollerStageScrollPosition = scrollerStage.scrollLeft; // current position

                if (scrollDirection == 'left') {

                    // figure out the new position
                    let newScrollPosition = scrollerStageScrollPosition - scrollDistance;

                    // round the newScrollPosition UP to the nearest multiple of the scroll distance (340)
                    let fixedScrollPosition = Math.ceil(newScrollPosition / scrollDistance) * scrollDistance;

                    // scroll it
                    scrollerStage.scrollTo({
                        left: fixedScrollPosition,
                        behavior: 'smooth'
                    });
                }

                if (scrollDirection == 'right') {

                    // figure out the new position
                    let newScrollPosition = scrollerStageScrollPosition + scrollDistance;

                    // round the newScrollPosition DOWN to the nearest multiple of the scroll distance (340)
                    let fixedScrollPosition = Math.floor(newScrollPosition / scrollDistance) * scrollDistance;

                    // scroll it
                    scrollerStage.scrollTo({
                        left: fixedScrollPosition,
                        behavior: 'smooth'
                    });

                }

            });
        }
    }

});
