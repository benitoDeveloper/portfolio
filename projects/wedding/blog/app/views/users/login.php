<?php require_once APPROOT . "/views/includes/head.php";?>

<section id="login" class="form-container">
      <div class="card">
            <div class="container">
                  <div class="head">
                        <h2>Login</h2>
                        <p>Please fill in your details to log in</p>
                  </div>
                  <div class="body">
                        <form action="<?=URLROOT?>/users/login" method="POST">
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
                              <div class="button-container">
                                    <div class="button-holder">
                                          <input type="submit" value="Login" class="btn submit">
                                    </div>
                                    <div class="button-holder">
                                          <a href="<?=URLROOT?>/users/register">
                                          <input type="submit" value="No account? Register" class="btn alternative">
                                          </a>
                                    </div>
                              </div>
                        </form>
                  </div>
                  

            </div>
      </div>
</section>
<?php require_once APPROOT . "/views/includes/footer.php";?>
