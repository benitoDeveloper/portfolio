class Slider_indicator
{
      buildIndicator(slidesCount, element)
      {
            const indicator_element = element;
            indicator_element.innerHTML = '';
            for(let i = 0; i <= slidesCount; i++)
            {
                  const indicator = document.createElement('div');
                  indicator.setAttribute('data-indicator', i);
                  indicator.classList.add('slider__indicator-item');
                  if(i === 0)
                  {
                        indicator.classList.add('slider__indicator--active');
                  }
                  indicator_element.appendChild(indicator);

            }
      }
      switch_indicator(indicator_container, index)
      {
            const currentIndicator = indicator_container.querySelector(".slider__indicator--active");
            if(currentIndicator)
            {
                  currentIndicator.classList.remove('slider__indicator--active')
            }

            const newIndicator = indicator_container.querySelector(`div[data-indicator='${index}']`);
            if(newIndicator)
            {
                  newIndicator.classList.add("slider__indicator--active");
            }
      }
}

class Slider 
{
      index = 0;
      totalCards;
      maxSlides;
      slide_element;
      indicator_element;
      slide_arr = [];
      screen_size;
      indicator;

      constructor(totalCards, slide_element, indicator_element)
      {
            this.indicator = new Slider_indicator();
            this.indicator_element = indicator_element;
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
            const slide_width = this.slide_element.getBoundingClientRect().width;
            this.slide_arr = [];
            for(var i = 0; i<= this.maxSlides; i++) 
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
            if(this.screen_size > 600 && this.screen_size <= 1000)
            {
                  this.maxSlides = Math.floor((this.totalCards - 1)/2);
                  this.indicator.buildIndicator(this.maxSlides,this.indicator_element);
                  return 
            }
            if(this.screen_size > 1000)
            {
                  this.maxSlides = Math.floor((this.totalCards - 1)/3);
                  this.indicator.buildIndicator(this.maxSlides,this.indicator_element);
                  return
            }
      }
}

const slider_container = document.querySelector(".slider");
const sliderTrack = slider_container.querySelector('.slider__track');
const sliderElement = slider_container.querySelector('.slider__track');
const allCards = Array.from(slider_container.querySelectorAll(".slider__card-holder"));
const allCardsCount = allCards.length;
const indicator_container = document.querySelector(".slider__indicator");

const slider = new Slider(allCardsCount, sliderElement,indicator_container);

slider_container.addEventListener("click", function(e) 
{
      const rightArrow = e.target.classList.contains("fa-arrow-right");
      const leftArrow = e.target.classList.contains("fa-arrow-left");

      if(rightArrow) 
      {
            slider.addingToIndex();
      }
      if(leftArrow) 
      {
            slider.subtractToIndex();
      }
      sliderTrack.style.transform = `translateX(${-slider.slide_arr[slider.index]}px)`;

      if(slider.screen_size > 720) 
      {
            slider.indicator.switch_indicator(indicator_container, slider.index);
      }
})
document.addEventListener("DOMContentLoaded", () =>
{
      slider.indicator.buildIndicator(slider.maxSlides,indicator_container);
})
window.addEventListener('resize', () =>
{
      slider.update_slide_arr();
      slider.update_screen_size();
      slider.update_max_slides();
})







