document.addEventListener("DOMContentLoaded", function() {


    /* Constants */
    const body              = document.querySelector('body');
    const navToggleTrigger  = document.querySelector("#js-navToggleTrigger");
    const navToggleTarget   = document.querySelector("#js-navToggleTarget");
    const gallery           = document.querySelector('#js-gallery');

    /** Small Screen Navigation */
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

    /** Gallery */
    if (gallery) {

        // locate triggers and items
        let galleryTriggers = document.querySelectorAll('#js-gallery .gallery__thumbs__item a');
        let galleryItems = document.querySelectorAll('#js-gallery .gallery__stage__item');

        // stop if there are no triggers or items found
        if (galleryTriggers.length < 1 || galleryItems.length < 1) {
            return;
        }

        // enable the first gallery item;
        galleryTriggers[0].classList.add('isActive');
        galleryItems[0].classList.add('isActive');

        // add listeners to triggers
        for (const galleryTrigger of galleryTriggers) {
            galleryTrigger.addEventListener('click', function(e) {

                e.preventDefault();

                let targetIndex = this.getAttribute('data-index');

                // stop if the user clicked currently active item
                if (this.classList.contains('isActive')) {
                    return;
                }

                // remove and reset the active class to the correct thumbnail
                document.querySelector('#js-gallery .gallery__thumbs__item a.isActive').classList.remove('isActive');
                this.classList.add('isActive');

                // remove and reset the active class to the current item
                document.querySelector('#js-gallery .gallery__stage__item.isActive').classList.remove('isActive');
                document.querySelector('#js-gallery .gallery__stage__item[data-index="'+ targetIndex +'"]').classList.add('isActive');
            });
        }
    }
});
