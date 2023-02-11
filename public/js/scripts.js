/*!
 * Start Bootstrap - Shop Homepage v5.0.5 (https://startbootstrap.com/template/shop-homepage)
 * Copyright 2013-2022 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
 */
// This file is intentionally blank
// Use this file to add JavaScript to your project

//parallax

$(window).scroll(function () {
    var wScroll = $(this).scrollTop();

    // console.log(wScroll);
    if (wScroll > $('.title-about').offset().top - 450) {
        $('.title-about .title-about-text').addClass('show');
        console.log('ok');
    }

    //Title Wisata
    if (wScroll > $('.blocks').offset().top - 550) {
        $('.blocks').addClass('show');
        // console.log('ok');
    }

    //Title Event
    if (wScroll > $('.event').offset().top - 650) {
        $('.event').addClass('show');
        // console.log('ok');
    }


});

window.addEventListener("scroll", function () {
    var header = document.querySelector(".row1");
    header.classList.toggle("sticky", window.scrollY > 75);
    console.log('ok');
})