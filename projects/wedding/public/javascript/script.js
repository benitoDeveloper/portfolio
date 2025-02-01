const project_slider_container = document.querySelector("#slider-section");
const project_slider_track = document.querySelector(".slider-track");
const cards_holder = document.querySelector(".slide-holder");
const mobile_screen = window.matchMedia("(max-width: 720px)");
const nav = document.querySelector("nav");
const allSections = document.querySelectorAll("section");





let currentSlide=0;
let maxSlides = 2;

const move_slider = function (e) {
      if(!e.target.classList.contains("fa-solid")) return;
      // maxSlides = mobile_screen.matches ? (all_cards.length-1) : Math.ceil((all_cards.length - 1)/3);
      if (e.target.classList.contains("fa-arrow-left")) {
        if (currentSlide === 0) {
          currentSlide = maxSlides;
        } else {
          currentSlide--;
        }
      }
      else {
        if (currentSlide === maxSlides) {
          currentSlide = 0;
        } else {
          currentSlide++;
        }
      }
      if(!mobile_screen.matches) {
      //   indicator_container.querySelector(".indicator-active").classList.remove("indicator-active");
      //   indicator_container.querySelector(`div[data-indicator='${currentSlide.toString()}']`).classList.add("indicator-active");
        project_slider_track.style.transform = `translateX(${100 * (currentSlide*-1)}%)`;
      }
      else {
        const screen_width = cards_holder.offsetWidth;
        project_slider_track.style.transform = `translateX(${(screen_width) * (currentSlide*-1)}px)`;
      }

}
const smoothScrolling = (e) => {
  e.preventDefault();
  if (!e.target.classList.contains("nav-link")) return;
  const section = document.querySelector(e.target.getAttribute("href"));
  section.scrollIntoView({ behavior: "smooth" });
};
  project_slider_container.addEventListener("click", function(e) {
    move_slider(e);
    // console.log(currentSlide);
    // console.log(maxSlides);
    // console.log(`screen width is ${screen_width}`);
    // console.log(cards_holder.offsetWidth);
  })

nav.addEventListener("click", function(e){
  if(e.target.classList.contains("burger_click")) {
    nav.querySelector('.burger').classList.toggle("active");
    nav.querySelector('.nav-menu').classList.toggle("active");
  }
})
nav.addEventListener("click", smoothScrolling);
