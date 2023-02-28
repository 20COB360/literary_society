console.log("OHiYO");
function btnaction() {
    var nav = document.getElementById("nav");
    nav.classList.toggle("show");
    var side_nav = document.getElementById("side-nav");
    side_nav.classList.remove("show");
}
function linkaction() {
    var side_nav = document.getElementById("side-nav");
    side_nav.classList.toggle("show");
}
function modaldisplay() {
    console.log("hi")
    var mod = document.getElementById("modal");
    mod.style.display = "block";
}
window.onclick = function (event) {
    if (event.target == modal)
        modal.style.display = "none";
}
let slideIndex = 1;
console.log(slideIndex);
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}