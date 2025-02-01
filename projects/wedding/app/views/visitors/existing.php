<?php
      require_once APPROOT . '/views/includes/head.php';
?>
    <section class="bg-section" id="already_registered">
        <!-- <div class="overlay"></div> -->
        <div class="container bg-container">
                <div class="line-container">
                    <div class="line"></div>
                </div>
                <?=flash_msg('visitor_msg');?>
                <h2 class="title">Hi <?=$data['first_name']?>, you are registered <?=$data['attendance'] === 'not_attend'? "as not attending" : "as attending"?></h2>
                <div class="btn-container">
                    <?php
                    if($data['attendance'] === 'yes_attend'){
                    ?>
                        <a class="btn" href="<?=URLROOT?>/menus/menu">Select Menu</a>
                        <a class="btn" href="<?=URLROOT?>/visitors/edit_attendance">Edit Attendance</a>
                    <?php
                    }else {
                    ?>
                        <a class="btn" href="<?=URLROOT?>/visitors/not_attend">Confirm</a>
                        <a class="btn" href="<?=URLROOT?>/visitors/edit_attendance">Edit Attendance</a>
                    <?php
                    }
                    ?>
                </div>

        </div>
    </section> 
<?php 
      require_once APPROOT . '/views/includes/footer.php'; 
// ?>