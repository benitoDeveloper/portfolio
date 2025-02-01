<?php
// require_once("classes/database.php");
$menu_arr = ["home"=>"#top", "details"=>"#slider-section", "venues"=>"#features", "rsvp"=>"#rsvp"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="wedding website">
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- <link rel="stylesheet" href="../style.css" /> -->
      <link rel="stylesheet" href= "<?=URLROOT?>/public/css/style.css">

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      

      <link href="https://fonts.googleapis.com/css2?family=Lora&family=Merriweather&family=Montserrat&family=Sacramento&display=swap"
      rel="stylesheet"/>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" integrity="sha384-/frq1SRXYH/bSyou/HUp/hib7RVN1TawQYja658FEOodR/FQBKVqT9Ol+Oz3Olq5" crossorigin="anonymous"/>
      <script defer src="<?=URLROOT?>/public/javascript/script.js"></script>
      <title><?=SITENAME?></title>
</head>
<body>
<nav>
      <div class="nav-container">
            <a href="<?=URLROOT?>/pages">
            <img src="<?=URLROOT?>/images/logo.png" class="logo" alt="RnB logo">
            </a>
            <ul class="nav-menu burger_click">
            <?php 
              foreach($menu_arr as $key => $item){
            ?>
                <li class="nav-option">
                  <a class="nav-link" href=<?=$item?>><?=ucwords($key)?></a>
                </li>   
            <?php
              }
            ?>
            </ul>

            <div class="burger burger_click">
                  <span class="bar burger_click"></span>
                  <span class="bar burger_click"></span>
                  <span class="bar burger_click"></span>
            </div>
      </div>
</nav>