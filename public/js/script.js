"use strict";

// --------------------- Sections ---------------------//
const nav = document.querySelector(".navbar");
const link = nav.querySelectorAll(".nav-link");
const allSections = document.querySelectorAll("section");
const all_cards = Array.from(document.querySelectorAll(".card"));
const lazyElements = document.querySelectorAll("img");
const allSlides = document.querySelector("slide");
const project_slider_container = document.querySelector(".projects-slider-container");
const project_slider_track = document.querySelector(".projects-slider-track");
const accordion = document.querySelector(".accordion");
const cards_holder = document.querySelector(".card-holder");


// ---------------------------------- Section Fade in
const sectionFadeIn = function (entries, observer) {
  const [entry] = entries;
  if (!entry.isIntersecting) return;
  entry.target.classList.toggle("section-fade-in");
  observer.unobserve(entry.target);
};

const sectionFadeObserver = new IntersectionObserver(sectionFadeIn, {
  root: null,
  threshold: 0.08,
});
allSections.forEach((section) => {
  // adding the class with js. If you make it the default behavior, the sections may keep opacity 0 if something goes wrong
  section.classList.add("section-fade-in");
  sectionFadeObserver.observe(section);
});

// ---------------------------------- Lazy loading img
const lazyImgFunction = function (entries, observer) {
  // const [entry] = entries;
  entries.forEach((entry) => {
    if (!entry.isIntersecting) return;
    entry.target.src = entry.target.dataset.src;
    entry.target.classList.remove("blur");

    observer.unobserve(entry.target);
  });
};

const lazyImgObserver = new IntersectionObserver(lazyImgFunction, {
  root: null,
  threshold: 0.1,
});
lazyElements.forEach((img) => lazyImgObserver.observe(img));

/// --------------------- smooth Scrolling
const smoothScrolling = (e) => 
{
  if (!e.target.classList.contains("smooth")) return;
  e.preventDefault();
  const section = document.querySelector(e.target.getAttribute("href"));
  section.scrollIntoView({ behavior: "smooth" });
};

/// --------------------- nav Fade
const navFade = function(e) {
  e.preventDefault();
  if (!e.target.classList.contains("nav-link")) return;
  const links = nav.querySelectorAll(".nav-link, .logo-icon");
  links.forEach((link) => {
    if (link !== e.target) link.style.opacity = this;
  });
};

/// --------------------- Accordion
accordion.addEventListener("click", function (e) 
{
  if (e.target.classList.contains("panel-heading-text") || e.target.classList.contains("fa-solid") || e.target.classList.contains("panel-heading")) 
  {
    e.target.closest(".panel").classList.toggle("active");
  };
})

/// --------------------- Event Listeners
nav.addEventListener("mouseover", navFade.bind(0.3));
nav.addEventListener("mouseout", navFade.bind(1));
document.body.addEventListener("click", smoothScrolling);
nav.addEventListener("click", function(e)
{
  if(!e.target.classList.contains("bar")) return;
  nav.querySelector('.hamburger').classList.toggle("active");
  nav.querySelector('.nav-menu').classList.toggle("active");
})









