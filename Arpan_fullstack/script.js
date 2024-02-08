
    window.addEventListener('scroll', reveal);

function reveal() {
    var reveals = document.querySelectorAll('.transformed');

    for (var i = 0; i < reveals.length; i++) {
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 200;

        if (revealtop < windowheight - revealpoint) {
            reveals[i].classList.add('active');
        } else {
            reveals[i].classList.remove('active');
        }
    }
}

window.addEventListener('scroll', revealtext);

function revealtext() {
    var reveals = document.querySelectorAll('.transformed-text');

    for (var i = 0; i < reveals.length; i++) {
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 200;

        if (revealtop < windowheight - revealpoint) {
            reveals[i].classList.add('activetext');
        } else {
            reveals[i].classList.remove('activetext');
        }
    }
}

window.addEventListener('scroll', revealtextleft);

function revealtextleft() {
    var reveals = document.querySelectorAll('.transformed-text-left');

    for (var i = 0; i < reveals.length; i++) {
        var windowheight = window.innerHeight;
        var revealtop = reveals[i].getBoundingClientRect().top;
        var revealpoint = 200;

        if (revealtop < windowheight - revealpoint) {
            reveals[i].classList.add('activetextleft');
        } else {
            reveals[i].classList.remove('activetextleft');
        }
    }
}

