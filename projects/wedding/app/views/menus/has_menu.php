<?php
      require_once APPROOT . '/views/includes/head.php';
?>
<section class="bg-section" id="has_menu">
        <div class="container bg-container">
                <div class="line-container">
                    <div class="line"></div>
                </div>
                <h3 class="heading3">
                    Hi <?=$data["first_name"]?>,<br>
                    you already confirmed your menu.
                </h3>
                <div class="light-text">
                    if you want to make changes please contact Rachele
                </div>
                <div class="btn-container">
                    <a class="btn" href="<?=URLROOT?>/menus/edit_menu/edit">Edit Menu</a>
                    <a class="btn" href="<?=URLROOT?>/pages">Home</a>
                </div>
        </div>
</section>
<?php 
      require_once APPROOT . '/views/includes/footer.php'; 
?>