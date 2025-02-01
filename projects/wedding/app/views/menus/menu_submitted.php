<?php
      require_once APPROOT . '/views/includes/head.php';
?>
    <section class="bg-section" id="menu_submitted">
        <div class="container bg-container">
                <div class="line-container">
                    <div class="line"></div>
                </div>
                <?=flash_msg("menu_edited")?>

                <h3 class="heading3">
                    Hi <?=$data['first_name']?>              
                </h3>
                <div class="light-text">
                    Your menu selection has been submitted, thank you.
                </div>
                <div class="btn-container">
                    <a class="btn" href="<?=URLROOT?>/pages">Home</a>
                </div>
        </div>
    </section> 
</body>
<?php
      require_once APPROOT . '/views/includes/footer.php'; 
?>
