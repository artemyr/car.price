// require('./bootstrap');

(function(window){
    const myModal = new HystModal({
        linkAttributeName: "data-hystmodal",
    });

    var swiper = new Swiper(".mySwiper", 
    {
        slidesPerView: 3,
        spaceBetween: 28,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true
        },
    });
})(window)