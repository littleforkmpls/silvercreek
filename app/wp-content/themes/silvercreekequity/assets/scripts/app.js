const body = document.querySelector('body');
const navToggleTrigger = document.querySelector("#js-navToggleTrigger");
const navToggleTarget  = document.querySelector("#js-navToggleTarget");

navToggleTrigger.onclick = function () {

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
}
