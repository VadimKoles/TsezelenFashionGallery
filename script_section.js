// ИНИЦИАЛИЗАЦИЯ И ВАЖНЫЕ ПРОЦЕССЫ
let header = document.querySelector(".nav_card_menu")

// отслеживание прокрутки и анимация шапки
let scrollTop
let doingToTop = true
window.addEventListener("scroll", function(){
    scrollTop = Math.round(window.pageYOffset)

    if (window.innerHeight*0.5<scrollTop)  {
        if (doingToTop) {
            buttonToTop(true)
        }
    } else if (window.innerHeight*0.45>scrollTop) {
        if (!doingToTop) {
            buttonToTop(false)            
        }
    }

})

// отправка формы
document.querySelector("#sendMail").addEventListener("click", function() {
    if ($("#form-name").val() == "") {
        document.querySelector("#error-text").style.display = "block"
        document.querySelector("#form-name").style.boxShadow = "0px 5px 8px 0px #ffab8d70"
        return false
    } else if ($("#form-phone").val() == "") {
        document.querySelector("#error-text").style.display = "block"
        document.querySelector("#form-phone").style.boxShadow = "0px 5px 8px 0px #ffab8d70"
        return false
    }
    $.ajax({
        url: "sendmail.php",
        type: "POST",
        cache: false,
        data: {
            'name': $("#form-name").val(),
            'phone': $("#form-phone").val(),
            'type': $("#form-type").val(),
            'how': $("#form-how").val()
        },
        dataType: 'html',
        beforeSend: function() {
            $("#sendMail").prop('disabled', true)
        },
        success: function(flag) {
            if (flag) {
                $("#section_form").trigger("reset")
                open_popup("popup-success")
            } else {
                
            }
            
            document.querySelector("#error-text").style.display = "none"
            document.querySelector("#form-name").style.boxShadow = "0px 5px 8px 0px #ffab8d00"
            document.querySelector("#form-phone").style.boxShadow = "0px 5px 8px 0px #ffab8d00"
            $("#sendMail").prop('disabled', false)


        }
    })
})

// АНИМАЦИИ

// Плавная прокрутка
let links = document.querySelectorAll('.scroll')
links.forEach(function(element){
    element.addEventListener('click', function(event){
        event.preventDefault()
        targetID = element.getAttribute('href')
        document.querySelector(targetID).scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        })
    })
})
// анимация закртия и открытия бургер меню
let sticks = document.querySelectorAll('.stick')
let condition = true
function forwards(){
    sticks.forEach(function(stick){
        stick.setAttribute('style', 'justify-content: center; position: absolute')
    })
        header.style.backgroundColor = "rgb(255, 255, 255)"
        st1.style.transform = "rotate(45deg)"
        st2.style.display = "none"
        st3.style.transform = "rotate(-45deg)"
    document.querySelector('.burger_menu').style.transform = "translateX(0px)"
    document.querySelector('.burger_menu').style.backgroundColor = "rgba(255, 255, 255)"
    document.querySelector('.burger_menu_icon').style.height = "1px"
    condition = false
}
function backwards(){
    sticks.forEach(function(stick){
        stick.setAttribute('style', 'justify-content: space-between; ')
    })
        header.style.backgroundColor = "rgba(255, 255, 255, 0.92)"
        st1.style.transform = "rotate(0deg)"
        st2.style.display = "block"
        st3.style.transform = "rotate(0deg)"
    document.querySelector('.burger_menu').style.transform = "translateX(-100vw)"
    document.querySelector('.burger_menu').style.backgroundColor = "rgba(255, 255, 255, 0.7)"
    document.querySelector('.burger_menu_icon').style.height = "16px"
    condition = true
}
document.querySelector('.burger_menu_icon').addEventListener('click', function(){
    if(condition){
        forwards()
    }else{
        backwards()
    }
})

// Анимация кнопки прокрутки
function buttonToTop(doTransButton) {
    if (doTransButton == true) {
        document.querySelector(".scrollToTop").setAttribute('style', 'transform: translateX(0); background-color:rgba(0, 0, 0, 0.3); box-shadow: 0px 0px 10px 10px rgba(255, 255, 255, 0.8);')
        document.querySelector(".imgToTop").setAttribute('style', 'transform: rotate(180deg);')
        doingToTop = false
    } else {
        document.querySelector(".scrollToTop").setAttribute('style', 'transform: translateX(14vw); background-color:rgba(0, 0, 0, 0); box-shadow: 0px 0px 10px 0px rgba(255, 255, 255, 0.0);')
        document.querySelector(".imgToTop").setAttribute('style', 'transform: rotate(-180deg);')
        doingToTop = true
    }
}

// открытие popup
function open_popup (elem) {
    q1 = "#" + elem
    document.querySelector(q1).setAttribute('style', `
        opacity: 1;
        visibility: visible;

    `)
    q2 = q1 + "-content"
    document.querySelector(q2).setAttribute('style', `
        opacity: 1;
        transform: perspective(40vw) translate(0px, 0px) rotateX(0deg);

    `)
}

function close_popup (elem) {
    q1 = "#" + elem
    document.querySelector(q1).setAttribute('style', `
        opacity: 0;
        visibility: hidden;
    `)
    q2 = q1 + "-content"
    document.querySelector(q2).setAttribute('style', `
        opacity: 0;
        transform: perspective(40vw) translate(0px, 100%) rotateX(45deg);

    `)
}