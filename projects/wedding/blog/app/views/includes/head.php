<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href=<?=URLROOT . "/css/styles.css"?>>
      <!-- <link rel="stylesheet" href=<=URLROOT . "/libraries/bootstrap523/css/bootstrap.css"?>> -->

      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <title><?=SITENAME?></title>
</head>
<body>
      <nav>
            <a href="<?=URLROOT?>/pages/index">
                  <div>Sports Blog</div>
            </a>
            <!-- <ul class="options">
                  <li>Subscribe</li>
                  <li>login</li>
            </ul> -->
            <?php
            if(empty($_SESSION['user_id'])) {
            ?>
                  <ul>
                        <a href="<?=URLROOT?>/users/register">
                              <li>Subscribe</li>
                        </a>
                        <a href="<?=URLROOT?>/users/login">
                              <li>login</li>
                        </a>
                  </ul>
            <?php
            } else {
            ?>
            <ul>
                  <li>
                        <a href="<?=URLROOT?>/users/logout">
                              Logout
                        </a>
                  </li>
                  <li>
                        <a href="#">Welcome back <?=$_SESSION['user_name']?></a>
                  </li>
            </ul>

            <?php
            };
            ?>

            <div class="hamburger hide">
                  <div></div>
                  <div></div>
                  <div></div>
            </div>
      </nav>
