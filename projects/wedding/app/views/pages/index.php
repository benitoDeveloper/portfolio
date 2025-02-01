<?php
      require_once APPROOT . '/views/includes/head.php';
      close_session();      
      $top_image= URLROOT . "/public/images/TheStoryteller--44_websize.jpg";



?>
      <section id="invite" class="fade-in-img invite">
             <div class="background">
                  <img class="main" src="<?=URLROOT?>/public/images/couple-main.jpg" alt="photo of the couple sitting on a rock at the beach">
             </div>
      </section>
      <section id="intro">
            <div class="container">
                  <p class="sub-heading">Benito & Rachele</p>
                  <div class="line-container">
                        <div class="line"></div>
                  </div>
                  <h3 class="heading3">
                        We are happy to share this day with you!
                  </h3>
                  <div class="couple-container">
                        <div class="couple-img bride">
                              <img src="<?=URLROOT?>/public/images/TheStoryteller--54_websize.jpg" alt="picture of the bride" class="bride ">
                        </div>
                        <span class="heart">
                              <i class="fa-regular fa-heart"></i></span>
                        <div class="couple-img groom">
                              <img src="<?=URLROOT?>/public/images/benito.jpg" alt="picture of the groom">
                        </div>
                  </div>
            </div>
      </section>

      <section class="bg-img" id="slider-section">
            <!-- <div class="overlay"></div> -->
            <div class="background">
                  <img src="<?=URLROOT?>/public/images/bg-gifts.jpg" alt="">
            </div>
            <div class="slider-container">
                  <div class="slider-track-holder">
                        <div class="slider-track">
                              <?php
                              for($i=0;$i<3;$i++) {
                              ?>
                                          <div data-slide=<?=$i+1?> class="slide-holder">
                                                <img src="<?=URLROOT?>/public/images/invitation<?=$i+1?>.jpg" alt="invitation 1">
                                          </div>
                              <?php
                              }
                              ?>
                        </div>
                  </div>
                  <button title="slider button left" class="slider-btn slider-btn-left">
                        <i class="fa-solid fa-arrow-left"></i>
                  </button>
                  <button title="slider button right" class="slider-btn slider-btn-right">
                        <i class="fa-solid fa-arrow-right"></i>
                  </button>
            </div>
      </section>

      <section id="features">
            <div class="container">
                  <div class="cards-container">
                        <div class="card ceremony">
                              <div class="card-text">
                                    <div class="icon">
                                          <span>
                                                <i class="fa-regular fa-heart"></i>
                                          </span>
                                    </div>
                                    <h2 class="title">Wedding Ceremony</h2>
                                    <div class="light-text">Church of Christ, Sunbury</div>
                              </div>
                              <!-- <div class="card-image"></div> -->
                               <div class="img-holder">
                                    <img src="<?=URLROOT?>/public/images/rings.jpg" alt="">
                               </div>
                        </div>
                        <div class="card dinner">
                              <div class="card-text">
                                    <div class="icon">
                                          <span>
                                                <i class="fa-regular fa-chess-rook"></i>
                                          </span>
                                    </div>
                                    <h2 class="title">Wedding Reception</h2>
                                    <div class="light-text">The Castle Hotel Windsor</div>
                              </div>
                              <!-- <div class="card-image"></div> -->
                              <div class="img-holder">
                                    <img src="<?=URLROOT?>/public/images/windsor_path.jpg" alt="">
                               </div>
                        </div>
                  </div>
            </div>
      </section>
      <section id="rsvp" class="form_input bg-img">
            <!-- <div class="overlay"></div> -->
             <div class="background">
             <img src="<?=URLROOT?>/public/images/bg-gifts.jpg" alt="">
             </div>
            <div class="container bg-container">
                  <div class="form-holder">
                        <div class="head">
                              <div class="line-container">
                                    <div class="line"></div>
                              </div>
                              <h2 class="heading">RSVP</h2>
                        </div>
                        <div class="body">
                              <form action="visitors" method="POST" onsubmit="return validateForm()">
                                          <input type="text" placeholder="FIRST NAME" name="first_name" id="first_name">
                                          <input type="text" placeholder="LAST NAME" name="last_name" id="last_name">
                                          <input type="email" placeholder="E-MAIL" name="email" id="email">
                                          <div class="checkbox-holder">
                                                <label for="yes_attend"> 
                                                      <input 
                                                      type="radio" 
                                                      value="yes_attend" name="attendance" id="yes_attend">
                                                      <div class="checkbox-text">
                                                            Yes, I will be attending
                                                      </div>
                                                      
                                                </label>
                                          </div>
                                          <div class="checkbox-holder">
                                                <label for="not_attend"> 
                                                      <input 
                                                      type="radio" 
                                                      value="not_attend" name="attendance" 
                                                      id="not_attend">
                                                      <div class="checkbox-text">
                                                            No, I will not attend
                                                      </div>

                                                </label>
                                          </div>
                                          <textarea name="message" id="message" placeholder="MESSAGE"></textarea>
                                    <button class="btn" type="submit">Send Message</button>
                              </form>
                        </div>

                  </div>
            </div>
      </section>
      
<?php 
      require_once APPROOT . '/views/includes/footer.php'; 
?>