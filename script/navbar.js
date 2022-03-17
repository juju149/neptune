// window.addEventListener('DOMContentLoaded', function(){
//     el_autoshow = document.querySelector('.autoshow');
//     navbar_height = document.querySelector('.navbar').offsetHeight;
//     el_autoshow.style.setProperty('top', '-255px')
//     window.addEventListener('scroll', function() {

//         let scrollTop = (window.scrollY)*2-200;
//         let newPosition = (scrollTop/4) - 100
//         if(scrollTop >= 255){
//             scrollTop = 255
//         }
//         if (newPosition >= 0) {
//             newPosition = 0
//         }
//         const hexDist = Math.round(scrollTop).toString(16)
//         console.log(scrollTop)
    
//         el_autoshow.style.setProperty('filter', 'opacity(' + Math.round(scrollTop/2.55) + '%)')
//         el_autoshow.style.setProperty('--border-radius', '0 0 ' + scrollTop/25.5 + 'px ' + scrollTop/25.5 + 'px')
//         el_autoshow.style.setProperty('top', newPosition + 'px')
//         el_autoshow.style.setProperty('color', '#ffffff' + hexDist)
//     });
// })
window.addEventListener('DOMContentLoaded', function(){
    el_autoshow = document.querySelector('.autoshow');
    navbar_height = document.querySelector('.navbar').offsetHeight;
    el_autoshow.style.setProperty('top', '-100px')
    window.addEventListener('scroll', function() {
        if (window.scrollY >= 200) {
            el_autoshow.style.top = '0px'
        }
        else{
            el_autoshow.style.top = -navbar_height*2 + 'px'
        }
    });
})




