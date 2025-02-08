class Slider {
      index = 0;
      totalCards;
      maxSlides;
      slide_element;
      slide_arr = [];
      screen_size;

      constructor(totalCards, slide_element)
      {
            this.slide_element = slide_element;
            this.totalCards = totalCards;
            this.update_screen_size();
            this.update_max_slides();
            this.update_slide_arr();
            window.addEventListener('resize', () =>
            {
                  this.update_slide_arr();
                  this.update_screen_size();
                  this.update_max_slides();
            })
      }
      addingToIndex() 
      {
            if (this.index >= this.maxSlides) {
                  this.index = 0;
                  return;
            }
            this.index = this.index + 1;
      }
      subtractToIndex() 
      {
            if(this.index <= 0) {
                  this.index = this.maxSlides;
                  return;
            };
            this.index = this.index - 1;
      }
      update_slide_arr() 
      {         
            let slide_width = this.slide_element.getBoundingClientRect().width;
            this.slide_arr = [];
            for(var i = 0; i<= this.totalCards; i++) 
            {
                  this.slide_arr.push(slide_width * i);
            }
      }
      update_screen_size()
      {
            return this.screen_size = window.innerWidth;
      }
      update_max_slides()
      {
            if(this.screen_size <= 600)
            {
                  return this.maxSlides = this.totalCards - 1;
            }
            if(this.screen_size > 600 && this.screen_size < 1000)
            {
                  return this.maxSlides = Math.ceil((this.totalCards - 1)/2);
            }
            this.maxSlides = Math.ceil((this.totalCards - 1)/3);
      }
}

const slider_container = document.querySelector(".projects-slider-container");
const allCards = Array.from(slider_container.querySelectorAll(".card-holder"));
const allCardsCount = allCards.length;
let sliderElement = slider_container.querySelector('.projects-slider-track-holder');


const slider = new Slider(allCardsCount, sliderElement);

slider_container.addEventListener("click", function(e) 
{
      if(e.target.classList.contains("fa-arrow-right")) {
            slider.addingToIndex();
      }
      if(e.target.classList.contains("fa-arrow-left")) {
            slider.subtractToIndex();
      }

      slider_container.querySelector('.projects-slider-track').style.transform = `translateX(${-slider.slide_arr[slider.index] }px)`;

      if(slider.screen_size > 720) 
            {
                  indicator_container.querySelector(".indicator-active").classList.remove("indicator-active");
                  indicator_container.querySelector(`div[data-indicator='${slider.index || slider.maxSlides -1 }']`).classList.add("indicator-active");
                  project_slider_track.style.transform = `translateX(${100 * (slider.index * -1)}%)`;
            }
            else {
                  const screen_width = cards_holder.offsetWidth;
                  project_slider_track.style.transform = `translateX(${screen_width * (currentSlide*-1)}px)`;
            }
})

const indicator_container = document.querySelector(".indicator-container");




indicator_container.addEventListener("click", function(e){
      if (!e.target.classList.contains("indicator")) return;
        indicator_container.querySelector(".indicator-active").classList.remove("indicator-active");
      e.target.classList.add("indicator-active");
      currentSlide = e.target.getAttribute("data-indicator");
      project_slider_track.style.transform = `translateX(${100 * (currentSlide*-1)}%)`;
    })



