<?php require_once APPROOT . "/views/includes/head.php";?>

<section id="register-form" class="form-container">
      <div class="card">
            <div class="container">
                  <div class="head">
                        <?php
                        flash_msg('register_success');
                        ?>
                        
                        <h2>Create An Account</h2>
                        <p>Please fill out this form to register with us</p>
                  </div>
                  <div class="body">
                        <form action="<?=URLROOT?>/users/register" method="POST">
                              <div class="input-group">
                                    <label for="name" >Name:<sup>*</sup></label>
                                    <input 
                                          name="name" type="text" 
                                          class="<?=(!empty($data['name_err']))? 'is-invalid':''?>"
                                          value="<?=$data['name']?>">
                                    <span class="error_message"><?=$data['name_err']?></span>
                              </div>
                              <div class="input-group">
                                    <label for="email">Email:<sup>*</sup></label>
                                    <input 
                                          name="email" type="email" 
                                          class="<?=(!empty($data['email_err']))? 'is-invalid':''?>"
                                          value="<?=$data['email']?>">
                                    <span class="error_message"><?=$data['email_err']?></span>
                              </div>
                              <div class="input-group">
                                    <label for="password">Password:<sup>*</sup></label>
                                    <input 
                                          name="password" type="password" 
                                          class="<?=(!empty($data['password_err']))? 'is-invalid':''?>"
                                          value="<?=$data['password']?>">
                                    <span class="error_message"><?=$data['password_err']?></span>
                              </div>
                              <div class="input-group">
                                    <label for="password">Confirm Password:<sup>*</sup></label>
                                    <input 
                                          name="confirm_password" type="password" 
                                          class="<?=(!empty($data['confirmPass_err']))? 'is-invalid':''?>"
                                          value="<?=$data['confirm_password']?>">
                                    <span class="error_message"><?=$data['confirmPass_err']?></span>
                              </div>
                              <div class="button-container">
                                    <div class="button-holder">
                                          <input type="submit" value="Register" class="btn submit">
                                    </div>
                                    <div class="button-holder">
                                          <a href="<?=URLROOT?>/users/login">
                                          <input type="submit" value="Have an account? Login" class="btn alternative">
                                          </a>
                                    </div>
                              </div>
                        </form>
                  </div>
                  

            </div>
      </div>
</section>
<?php require_once APPROOT . "/views/includes/footer.php";?>
