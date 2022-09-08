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

    function init_accordion(option) {
        const block = document.querySelectorAll('[data-accordion="block"]')

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
            } else {
                el.classList.add('not-active')
                el.style.height = startHeight + 'px';
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

    init_accordion('first_active');
    init_tabs();
})(window)