<?php
      require_once APPROOT . '/views/includes/head.php';
?>
<section id="food" class="edit_food form_input bg-img">
    <div class="overlay"></div>
    <div class="container bg-container">
        <div class="form-holder">
            <div class="head">
                <div class="line-container">
                    <div class="line"></div>
                </div>
                <h2 class="heading">MENU</h2>
            </div>
            <div class="body">
                <form action="<?=URLROOT?>/visitors/register_menu" method="POST">
                        <input type="hidden" id="visitor_id" name="visitor_id" value=<?=$_SESSION['visitor_id'];?>>
                        <input type="hidden" id="first_name" name="first_name" value="<?=$_SESSION['first_name']?>">
                        <input type="hidden" id="last_name" name="last_name" value="<?=$_SESSION['last_name']?>">

                        <div class="options-holder">
                            <h2 class="title">Starters</h2>
                                <div class="checkbox-holder">
                                    <label for="veg_tart">
                                        <input 
                                        type="radio" 
                                        value="Vegetable Tart (V)" 
                                        name="starter" 
                                        id="veg_tart" required>
                                        <div class="checkbox-text">
                                            <strong>Goats Cheese and Mediterranean Vegetable Tart (V)</strong>
                                            <em>Roquette salad, pesto, balsamic reduction</em><br>
                                            <span>*</span><em> available with no cheese or alternative cheese</em>  
                                        </div>

                                    </label>
                                </div>
                                <div class="checkbox-holder">
                                    <label for="smoked_sal">
                                        <input type="radio" value="Smoked Salmon" name="starter" id="smoked_sal" required>
                                        <div class="checkbox-text">
                                            <strong>Dill Cured Smoked Salmon</strong>
                                            <em> with shaved fennel, kohlrabi, compressed cucumber and beetroot puree</em>
                                        </div>
                                    </label>
                                </div>
                        </div>
                        <div class="options-holder">
                            <h2 class="title">Mains</h2>
                                <div class="checkbox-holder">
                                    <label for="beef">
                                        <input type="radio" value="Braised Beef" name="main" id="beef" required>
                                        <div class="checkbox-text">
                                            <strong>Slow Braised Feather Blade of Beef</strong>
                                            <em> nutmeg & thyme potato puree with summer greens and red wine jus</em> 
                                        </div>
                                    </label>
                                </div>
                                <div class="checkbox-holder">
                                    <label for="chicken">
                                        <input type="radio" value="Chicken breast" name="main" id="chicken" required>
                                        <div class="checkbox-text">
                                            <strong>Sun-blushed Tomato and Basil stuffed Norfolk Chicken breast</strong>
                                            <em>lemon & thyme potato cake and galette of grilled summer vegatables</em>
                                        </div>
                                    </label>
                                </div>
                        </div>
                        <div class="options-holder">
                            <h2 class="title">Dessert</h2>
                                <div class="checkbox-holder">
                                    <label for="cheesecake">
                                        <input type="radio" value="Cheesecake" name="dessert" id="cheesecake" required>
                                        <div class="checkbox-text">
                                            <strong>Salted Caramel Cheesecake</strong>
                                            <em> toffee sauce and fresh strawberries</em> 
                                        </div>
                                    </label>
                                </div>
                                <div class="checkbox-holder">
                                    <label for="dessert_tart">
                                        <input type="radio" value="St Clements Tart" name="dessert" id="dessert_tart" required>
                                        <div class="checkbox-text">
                                            <strong>St Clements Tart</strong>
                                            <em>Lemon curd macaroon and red berry coulis</em>
                                        </div>
                                    </label>
                                </div>
                        </div>
                        <textarea name="menu_message" id="menu_message" placeholder="Any allergies?"></textarea>
                    <div class="btn-container">
                        <button class="btn" type="submit">Send Message</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>
<?php 
      require_once APPROOT . '/views/includes/footer.php'; 
?>