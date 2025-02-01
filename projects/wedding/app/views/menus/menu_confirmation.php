<?php
      require_once APPROOT . '/views/includes/head.php';
?>
      <section class="bg-section" id="menu_confirmation">
            <div class="container bg-container">
                  <div class="line-container">
                    <div class="line"></div>
                  </div>
                  <h3 class="heading3">
                        Thank you, <?=$data["first_name"]?><br>
                        You selected the below.
                  </h3>
                  <div class="light-text">
                        Starter: <?=$data["starter"]?> <br>
                        Main: <?=$data["main"]?> <br>
                        Dessert: <?=$data["dessert"]?> <br>
                        Allegies: <?=$data["menu_message"] === ""? "none": $data["menu_message"] ?> <br>

                  </div>
                  <div class="btn-container">
                        <a class="btn" href="<?=URLROOT?>/visitors/register_menu/true">Confirm</a>
                        <a class="btn" href="<?=URLROOT?>/menu">Edit</a>
                  </div>
            </div>
      </section>
<?php
      require_once APPROOT . '/views/includes/footer.php'; 
?>