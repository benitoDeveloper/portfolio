class Slider {
      index = 0;
      total_slides;
      slide_width=[0];

      constructor(totalSlides, slide_width){
            this.total_slides = totalSlides - 1;
            for(var i = 0; i<= this.total_slides; i++) {
                  this.slide_width.push(this.slide_width[this.slide_width.length -1] - slide_width);

            }

      }
      addingToIndex() {
            if (this.index >= this.total_slides) {
                  this.index = 0;
                  return;
            }
            this.index = this.index + 1;
      }
      subtractToIndex() {
            if(this.index <= 0) {
                  this.index = this.total_slides;
                  return;
            };
            this.index = this.index - 1;
      }
}

const slider_container = document.querySelector(".projects-slider-container");
const allCards = Array.from(slider_container.querySelectorAll(".card-holder"));
const allCardsCount = allCards.length - 1;



const slider = new Slider(allCardsCount);

slider_container.addEventListener("click", function(e) {
      if(e.target.classList.contains("slider-btn-right")) {
            slider.addingToIndex();
      }
      if(e.target.classList.contains("slider-btn-left")) {
            slider.subtractToIndex();
      }
      allCards.forEach(function (card){
            card.classList.remove("active");
      });
      document.querySelector(`[data-slide="${slider.index}"]`).classList.add("active")

})