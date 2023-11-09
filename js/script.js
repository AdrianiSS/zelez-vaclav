$(function(){
    $(".toggle").on("click", function(){
        if($(".menu").hasClass("active")){
            $(".menu").removeClass("active");
            $(this).find("a").html("<ion-icon name='menu_outline'></ion-icon>");
        } else{
            $(".menu").addClass("active");
            $(this).find("a").html("<ion-icon name='close_outline'></ion-icon>");
        }
    })
})

const rectangle = document.getElementsByClassName('rectangle')[0]
setInterval(() => {
    const computedStyle = getComputedStyle(rectangle)
    const width = parseFloat(computedStyle.getPropertyValue('--width')) || 0
    rectangle.style.setProperty('--width', width + .1) 
}, 5)

const popup = document.querySelector('.popup')
const x = document.querySelector('.popup-content h1')
const buttonOn = document.getElementsByClassName('.on')
window.addEventListener('load', () => {
    popup.classList.add('showPopup')
    popup.childNodes[1].classList.add('showPopup')
})

x.addEventListener('click', () => {
    popup.classList.remove('showPopup')
    popup.childNodes[1].classList.add('showPopup')
})