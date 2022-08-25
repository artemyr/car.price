// require('./bootstrap');

(function(window){
    const modal_togglers = document.querySelectorAll('[modal-toggle]');
    if(modal_togglers)
    {
        modal_togglers.forEach(
            function (currentValue, currentIndex, listObj) {
                currentValue.onclick = (e) => {
                    const modal_target = e.target.attributes['modal-toggle'].value;
                    document.getElementById(modal_target).classList.add('active');
                }
            },
        );
    }

    const modal_windows = document.querySelectorAll('[modal=window]');
    if(modal_windows)
    {
        modal_windows.forEach(
            function (currentValue, currentIndex, listObj) {
                currentValue.onclick = (e) => {
                    const modal_target = e.target.classList.remove('active')
                }
            },
        );
    }
})(window)