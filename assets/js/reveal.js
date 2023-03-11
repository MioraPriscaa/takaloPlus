var cadre = document.querySelector('.shop');
cadre.addEventListener('scroll', reveal);

function reveal() {
    var reveals = document.querySelectorAll('.card');
    for (let i = 0; i < reveals.length; i++) {
        if (i % 3 == 0) reveals[i].style = `transition-delay: ${0.1 + 's'};`;
        if (i % 3 == 1) reveals[i].style = `transition-delay: ${0.2 + 's'};`;
        if (i % 3 == 2) reveals[i].style = `transition-delay: ${0.3 + 's'};`;
        reveals[i].classList.add('reveal');

        // var windowheight = cadre.clientHeight;
        // var middle = windowheight / 7;
        // var revealtop = reveals[i].getBoundingClientRect().top;
        // var revealpoint = middle;
        // if (revealtop < windowheight - revealpoint) {
        //     reveals[i].classList.add('reveal');
        // } else {
        //     reveals[i].classList.remove('reveal');
        // }
    }

}
reveal();