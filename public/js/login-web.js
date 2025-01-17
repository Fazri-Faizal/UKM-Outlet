// let switchCtn = document.querySelector("#switch-cnt");
// let switchC1 = document.querySelector("#switch-c1");
// let switchC2 = document.querySelector("#switch-c2");
// let switchCircle = document.querySelectorAll(".switch__circle");
// let switchBtn = document.querySelectorAll(".switch-btn");
// let aContainer = document.querySelector("#a-container");
// let bContainer = document.querySelector("#b-container");
// let allButtons = document.querySelectorAll(".submit");

// let getButtons = (e) => e.preventDefault()

// let changeForm = (e) => {

//     switchCtn.classList.add("is-gx");
//     setTimeout(function(){
//         switchCtn.classList.remove("is-gx");
//     }, 1500)

//     switchCtn.classList.toggle("is-txr");
//     switchCircle[0].classList.toggle("is-txr");
//     switchCircle[1].classList.toggle("is-txr");

//     switchC1.classList.toggle("is-hidden");
//     switchC2.classList.toggle("is-hidden");
//     aContainer.classList.toggle("is-txl");
//     bContainer.classList.toggle("is-txl");
//     bContainer.classList.toggle("is-z200");
// }

// let mainF = (e) => {
//     for (var i = 0; i < allButtons.length; i++)
//         allButtons[i].addEventListener("click", getButtons );
//     for (var i = 0; i < switchBtn.length; i++)
//         switchBtn[i].addEventListener("click", changeForm)
// }

// window.addEventListener("load", mainF);

const wrapper = document.querySelector('.wrapper');
const signUpLink = document.querySelector('.signUp-link');
const signInLink = document.querySelector('.signIn-link');
const forgotlink = document.querySelector('.forgot-link');

signUpLink.addEventListener('click', () => {
    wrapper.classList.add('animate-signIn');
    wrapper.classList.remove('animate-signUp');
    wrapper.classList.remove('animate-forgot');
});

signInLink.addEventListener('click', () => {
    wrapper.classList.add('animate-signUp');
    wrapper.classList.remove('animate-signIn');
    wrapper.classList.remove('animate-forgot');
});

forgotlink.addEventListener('click', () => {
    wrapper.classList.add('animate-forgot');
    wrapper.classList.remove('animate-signIn');
    wrapper.classList.remove('animate-signUp');
});
