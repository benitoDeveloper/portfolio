<?php
      require_once APPROOT . '/views/includes/head.php';      
?>
<section id="rsvp" class="form_input bg-img">
            <div class="overlay"></div>
            <div class="container bg-container">
                  <div class="form-holder">
                        <div class="head">
                              <div class="line-container">
                                    <div class="line"></div>
                              </div>
                              <h2 class="heading">RSVP</h2>
                        </div>
                        <div class="body">
                              <form id="rsvp1" action="<?=URLROOT?>/visitors/edit_process" method="POST">
                                    <!-- <input id="status" name="status" type="text" hidden value="true"> -->
                                          <input type="text" value="<?=$data['first_name']?>" name="first_name" id="first_name">
                                          <input type="text" value="<?=$data['last_name']?>" name="last_name" id="last_name">
                                          <input type="email" value="<?=$data['email']?>" name="email" id="email">
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
                                          <input type="submit" value="Send Message" class="btn">
                                          <!-- <button class="btn" type="submit">Send Message</button> -->

                              </form>
                        <!-- </div>

                  </div>
            </div> -->
</section>
<?php 
      require_once APPROOT . '/views/includes/footer.php'; 
?>