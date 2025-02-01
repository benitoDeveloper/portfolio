<?php
      require_once APPROOT . '/views/includes/head.php';
?>
    <section class="bg-section" id="already_registered">
        <div class="container bg-container">
                <div class="line-container">
                    <div class="line"></div>
                </div>
                <h2 class="title">Hi <?=$data['first_name']?>, you are already registered <?=$data['attendance'] === 'not_attend'? "as not attending" : "as attending"?></h2>
                <div class="btn-container">
                    <?php
                    if($data['attendance'] === 'yes_attend'){
                    ?>
                        <a class="btn" href="<?=URLROOT?>/visitors/menu">Confirm Menu</a>
                    <?php
                    }else {
                    ?>
                        <a class="btn" href="<?=URLROOT?>/visitors/edit_attendance/true">Edit Attendance</a>
                    <?php
                    }
                    ?>
                    <a class="btn" href="<?=URLROOT?>/page">home</a>
                </div>

        </div>
    </section> 
<?php 
      require_once APPROOT . '/views/includes/footer.php'; 
?>