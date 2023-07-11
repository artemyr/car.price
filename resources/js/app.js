import Vue from 'vue'
import router from './router'
import Index from './components/admin/Index'


require('./bootstrap');

const app = new Vue({
    el: '#app',
    components: {
        Index
    },
    router
});





(function(window){
    const myModal = new HystModal({
        linkAttributeName: "data-hystmodal",
    });

    var swiper = new Swiper(".mySwiper",
    {
        slidesPerView: 1,
        spaceBetween: 28,
        navigation: {
            nextEl: "#sw1r",
            prevEl: "#sw1l",
        },
        pagination: {
            el: "#sw1p",
            clickable: true
        },
        breakpoints: {
            1200: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            }
        }
    });

    var swiper2 = new Swiper(".mySwiper2",
    {
        slidesPerView: 1,
        spaceBetween: 28,
        navigation: {
            nextEl: "#sw2r",
            prevEl: "#sw2l",
        },
        pagination: {
            el: "#sw2p",
            clickable: true
        },
        breakpoints: {
            1200: {
                slidesPerView: 3,
            },
            768: {
                slidesPerView: 2,
            }
        }
    });

    function init_accordion(option) {
        const block = document.querySelectorAll('[data-accordion="block"]')

        if(block.length > 0){
            block.forEach(itemBlock => {
                const btn = itemBlock.querySelector('[data-accordion="head"]')
                const el = itemBlock.querySelector('[data-accordion="body"]')

                smoothView(btn, el)

                btn.addEventListener('click', () => {
                    itemBlock.classList.toggle('active')
                })
            })

            if(option == 'first_active')
                block[0].querySelector('[data-accordion="head"]').click();
        }
    }

    function smoothView(btn, el, startHeight = 0) {

        if (!btn && !el) return

        let heightEl = el.offsetHeight
        el.classList.add('not-active')
        el.style.height = startHeight + 'px';

        if (startHeight > 0) {
            if (heightEl < startHeight) {
                el.classList.remove('not-active')
                el.style.height = heightEl + 'px';
            }
        }

        const update = () => {
            el.style.height = 'auto'
            setTimeout(() => {
                heightEl = el.offsetHeight
                el.style.height = heightEl + 'px';
            }, 100)
        }

        btn.addEventListener('click', () => {
            if (el.classList.contains('not-active')) {
                el.classList.remove('not-active')
                el.style.height = heightEl + 'px';
                btn.classList.add('active')
            } else {
                el.classList.add('not-active')
                el.style.height = startHeight + 'px';
                btn.classList.remove('active')
            }
        })

        let observer = new MutationObserver(mutationRecords => {
            update()
        })

        observer.observe(el, {
            childList: true,
            subtree: true,
            characterDataOldValue: true
        })
    }

    function init_tabs() {
        const sectionTabs = document.querySelector('[data-product-card-page="section-tabs"]')

        if (sectionTabs) {
            const btnTab =  sectionTabs.querySelectorAll('[data-product-card-page="btn-tab"]')
            const itemTab = sectionTabs.querySelectorAll('[data-product-card-page="item-tab"]')

            const removeActive = () => {
                btnTab.forEach((itemBtnTab, index) => {
                    itemBtnTab.classList.remove('active')
                    itemTab[index].classList.remove('active')
                })
            }

            btnTab.forEach((itemBtnTab, index) => {
                itemBtnTab.addEventListener('click', () => {
                    if (!itemBtnTab.classList.contains('active')) {
                        removeActive()
                        itemBtnTab.classList.add('active')
                        itemTab[index].classList.add('active')
                    }
                })
            })
        }
    }

    function init_spoilers() {
        const screenWidth = window.screen.width
        if(screenWidth > 767) {
            const buttons = document.querySelectorAll('[data-spoiler="button"]')
            buttons.forEach((button, index) => {
                button.style.display = 'none';
            })
        } else {
            const buttons = document.querySelectorAll('[data-spoiler="button"]')
            buttons.forEach((button, index) => {
                button.style.display = 'block';
            })
            const spoilers = document.querySelectorAll('[data-spoiler="block"]')
            spoilers.forEach((spoiler, index) => {

                const button = spoiler.querySelector('[data-spoiler="button"]')
                const hide = spoiler.querySelectorAll('[data-spoiler="hide"]')

                hide.forEach((el, index) => {
                    el.style.overflow = 'hidden';
                    el.style.transition = 'height 0.3s';
                    smoothView(button, el)
                })
            })
        }
    }

    function toggleMenu() {
        const menu = document.querySelector('[js-toggle-menu="menu"]')
        if (!menu) return;

        menu.style.opacity = '1';
        if (!menu) return
        const btnMenu = document.querySelector('[js-toggle-menu="toggler"]')
        const body = document.body

        document.addEventListener('click', (e) => {
            if(e.target.closest('[js-toggle-menu=toggler]')) {
                btnMenu.classList.toggle('active');
                menu.classList.toggle('active');
                body.classList.toggle('scroll-lock');

                menu.classList.remove('open')
            } else {
                btnMenu.classList.remove('active');
                menu.classList.remove('active');
                body.classList.remove('scroll-lock');

                menu.classList.remove('open')
            }
        })

        //submenu
        const catalog_btn = document.querySelector('[js-toggle-menu="catalog_btn"]')
        catalog_btn.addEventListener('click', (e) => {
            e.stopPropagation()
            menu.classList.toggle('open')
        })

        //elements
        const open_elements_btn = document.querySelectorAll('[js-toggle-menu="open_elements"]')
        open_elements_btn.forEach(btn => {
            btn.addEventListener('click', (e) => {
                btn.querySelector('.dropdown-menu__elements').classList.toggle('open')
            })
        })

        const close_elements = document.querySelectorAll('[js-toggle-menu="close_elements"]')
        close_elements.forEach(btn => {
            btn.addEventListener('click', (e) => {
                btn.closest('.dropdown-menu__elements').classList.toggle('open')
            })
        })

        const close_sections = document.querySelectorAll('[js-toggle-menu="close_sections"]')
        close_sections.forEach(btn => {
            btn.addEventListener('click', (e) => {
                menu.classList.remove('open')
            })
        })
    }

    function initScrollToTop() {
        const body = document.querySelector('body')
        document.querySelectorAll('[data-scroll-to-top]').forEach(el => {
            el.onclick = () => {
                body.scrollIntoView({ behavior: "smooth", block: "start", inline: "nearest" });
            }
        })
    }

    init_accordion('first_active');
    init_tabs();
    init_spoilers();
    toggleMenu();
    initScrollToTop();

    function windowResize() {
        // init_spoilers();
    }
    window.addEventListener("resize", windowResize);
})(window);


(function (window){
	'use strict';

	if (window.JCpopup)
		return;

	window.JCpopup = function (arParams)
	{
        this.params = arParams;
		this.init();
	};

	window.JCpopup.prototype = {
		init: function()
		{
            const btn = document.querySelector('[js-insert-info-to-popup="'+ this.params.id +'"]')
            const modal = document.querySelector('#reviewPopUp')

            const img = this.params.img;
            const title = this.params.title;
            const text = this.params.content;
            const author = this.params.author;
            const cr_date = this.params.cr_date;
            const author_ava = this.params.author_ava;

            const rate = this.params.rate;
            let rateHTML = ``;
            for (let i = 1; i <= 5;i++){
                if(rate >= i) rateHTML += `<svg><use xlink:href="/img/svg/sprite.svg#star"></use></svg>`;
                else rateHTML += `<svg><use xlink:href="/img/svg/sprite.svg#nostar"></use></svg>`;
            }

            btn.addEventListener('click',function(){

                modal.querySelector('.review__title').innerHTML = title;
                modal.querySelector('.review__text').innerHTML = text;
                modal.querySelector('.review-author__name').innerHTML = author;
                modal.querySelector('.review-author__subtitle').innerHTML = cr_date;
                modal.querySelector('.review-author__ava img').src = author_ava;
                modal.querySelector('.review-author__stars').innerHTML = rateHTML;

                modal.querySelector('.modal__header').style.backgroundImage = 'url('+img+')';
                modal.querySelector('.modal__header').style.backgroundRepeat = 'no-repeat';
                modal.querySelector('.modal__header').style.backgroundSize = 'cover';
                modal.querySelector('.modal__header').style.backgroundPosition = 'center';
            })
		},
    }
})(window);

(function (window){
    'use strict';

    if (window.JCmap)
        return;

    window.JCmap = function (arParams)
    {
        this.params = arParams;
        this.init();
    };

    window.JCmap.prototype = {
        init: function()
        {
            this.features = []

            this.params.addresses.forEach((el, index) => {
                this.features.push({
                    "type": "Feature",
                    "id": index,
                    "geometry": {
                        "type": "Point",
                        "coordinates": el.coords
                    },
                    "properties": {
                        "balloonContentHeader": "<font size=3><b><a target='_blank' href='https://car-price.online'>car-price.online</a></b></font>",
                        "balloonContentBody": `<p><em>${el.address}</em></p>`,
                        "balloonContentFooter": `<font size=1>Часы работы: </font> <strong>${el.work_time}</strong>`,
                        "clusterCaption": "<strong><s>Еще</s> одна</strong> метка",
                        "hintContent": `<strong>${el.address}</strong>`
                    }
                })
            })

            let data = {
                "type": "FeatureCollection",
                "features": this.features
            }

            let yaMapInit = () => {
                if (!document.getElementById('map')) return;
                var myMap = new ymaps.Map('map', {
                        center: this.params.center,
                        zoom: 10,
                        controls: ['zoomControl'],
                        behaviors: ['drag'],
                    }, {
                        searchControlProvider: 'yandex#search'
                    }),
                    objectManager = new ymaps.ObjectManager({
                        // Чтобы метки начали кластеризоваться, выставляем опцию.
                        clusterize: true,
                        // ObjectManager принимает те же опции, что и кластеризатор.
                        gridSize: 32,
                        clusterDisableClickZoom: true
                    });

                myMap.geoObjects.add(objectManager);
                objectManager.add(data);
            }

            ymaps.ready(yaMapInit);
        },
    }
})(window);
