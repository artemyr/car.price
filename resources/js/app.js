// require('./bootstrap');

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
        if(screenWidth > 576) {
            const buttons = document.querySelectorAll('[data-spoiler="button"]')
            buttons.forEach((button, index) => {
                button.style.display = 'none';
            })
            return;
        }

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

    function toggleMenu() {
        const menu = document.querySelector('[js-toggle-menu="menu"]')
        if (!menu) return
        const btnMenu = document.querySelector('[js-toggle-menu="toggler"]')
        const body = document.body

        btnMenu.addEventListener('click', (e) => {
            btnMenu.classList.toggle('active');
            menu.classList.toggle('active');
            body.classList.toggle('scroll-lock');

            menu.classList.remove('open')
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
    }

    init_accordion('first_active');
    init_tabs();
    init_spoilers();
    toggleMenu();
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
            const text = this.params.content;
            btn.addEventListener('click',function(){
                modal.querySelector('.modal__content').innerHTML = text
            })
		},
    }
})(window);