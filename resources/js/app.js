// require('./bootstrap');

(function(window){

    const city_selector_rel = '[data-js=chose-city]';

    if(document.querySelector(city_selector_rel))
    {
        const city_selector = document.querySelector(city_selector_rel);

        city_selector.onchange = function(e){
            window.location.href = "/" + city_selector.value;
        }
    }

    document.querySelectorAll('a').forEach((el) => {
        if(el.attributes['href'].value == '#' || el.attributes['href'].value == ''){
            el.classList.add('develop');
        }
    });
    
})(window)