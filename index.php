<?php

require_once("includes/database.php");
require_once("includes/functions.php");
$db = new Database();
$db_connection = $db->get_db_connection();
$menu_arr = ["home", "hola!", "projects", "contact"];
$projects = $db->get_all_projects($db_connection);
$slides_count = ceil(count($projects)/3);

page_header();
?>

    <header class="header-container">
        <nav>
          <div class="navbar container">
            <a href="#"><img class="logo-icon" data-src="img/icon.png" alt="portfolio icon" /></a>
            <ul class="nav-menu">
              <?php foreach($menu_arr as $item){
                $id = $item === "home"? "top": $item;?>
                <li class="nav-option">
                  <a class="nav-link" href="#<?=(clean($id))?>"><?=ucwords($item)?></a>
                </li>           
              <?php
              }
              ?>
            </ul>
            <button class="hamburger">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </button>
          </div>

        </nav>
      <main class="background-image-container">
        <div class="background-image">
          <h1 class="title-heading">Benito Beceiro</h1>
          <p class="title-subHeading">A Web Developer</p>
          <p class="title-subHeading">building functional and beautiful websites</p>
        </div>
      </main>
    </header>
    <main class="main-section" >
      <div id="hola" class="dots"></div>
      <section  class="introduction-section container">
        <div class="introduction-text ">
          <h2 class="introduction-title text-title">Hola!</h3>
          <div class="introduction-text-text">
            <p>
                I'm Benito, a passionate Web Developer who likes solving problems and building functional, beautiful websites
            <p>
            <h4>About Me</h4>
            <p>
                Self-Taught & Passionate: I transitioned into web development through dedication and continuous learning, studying over 25+ hours a week and working part time before landing a part-time web developer role. I had to go back to full time job in the logisitcs industry, but I still dedicate most of my free time to learning and improving my programming skills.
            </p>
            <p>
                Multilingual: Fluent in Spanish, English, and Tagalog, allowing me to collaborate in diverse work environments.
            </p>
            <h4>My Goal</h4>
            <ul>
                <li>
                    Short-term: Secure a full-time web developer role where I can contribute business value and continue growing.
                </li>
                <li>
                    Long-term: to master my craft and become a highly skilled developer, capable of building complex applications that help businesses and individuals solve real-world problems.
                </li>
            </ul>
            <h4>Tech Stack</h4>
            <ul>
                <li>Proficient in HTML, CSS, Bootstrap, JavaScript, PHP, and MySQL, Git, Github, devtools, lighthouse</li>
                <li>Experience with Google Search Console, Google Merchant Center, GA4</li>
                <li>Comptia A+ 220 certified</li>
                <li>Next Steps: Currently updating my portfolio to show the new skills I've learned in the past months, OOP, MVC design pattern, git and github</li>
            </ul>


          </div>
        </div>
        <div class="introduction-image"></div>
      </section>
      <div id="projects" class="dots"></div>
      <section  class="projects">

        <div class="projects-top-section container">
          <h2 class="projects-title text-title">
            My Projects
          </h2>
          <div class="indicator-container">
            <?php for($i=0;$i<$slides_count;$i++) {
              if($i === 0) {?>
                  <div data-indicator="<?=$i?>" class="indicator indicator-active"></div>          
            <?php
              }else {?>
                <div data-indicator="<?=$i?>" class="indicator"></div>
            <?php
              }
            }
            ?>
          </div>

        </div>
        <div class="projects-slider-container">
          <div class="projects-slider-track-holder">
            <div class="projects-slider-track">
              <?php display_slide($projects) ?>
            </div>
          </div>

          <button title="slider button left" class="slider-btn slider-btn-left">
            <i class="fa-solid fa-arrow-left"></i>
          </button>
          <button title="slider button right" class="slider-btn slider-btn-right">
            <i class="fa-solid fa-arrow-right"></i>
          </button>

        </div>

      </section>

      <div id="contact" class="dots"></div>

      <section class="get-inTouch">
        <div class="container">
          <h2 class="text-title">Contact Me</h2>

          <div class="accordion">

            <div class="panel  send-message">
              <div class="panel-heading">
                <h3 class="panel-heading-text">Send me a Message</h3>
                <span><i class="fa-sharp fa-solid fa-angle-down"></i></span>
              </div>
              <div class="panel-content ">
                <form action="send-email.php" method="GET">
                  <div class="input-group name">
                    <label for="name_input">
                      <span><i class="fa-solid fa-user"></i></span>
                      <input id="name_input" name="name_input" type="text" placeholder="Enter Name" required>

                    </label>
                  </div>
                  <div class="input-group email">
                    <label for="email_input">
                      <span><i class="fa-solid fa-envelope"></i></span>
                      <input id="email_input" name="email_input" type="email" placeholder="Email" required>

                    </label>
                  </div>
                  <div class="input-group text-area">
                    <label for="message"> <span><i class="fa-solid fa-pencil"></i></span>
                    <textarea id="message" cols="30" rows="5" name="message" placeholder="Message"></textarea>
                    </label>
                  </div>
                  <input class="card-btn" type="submit" value="submit">
                </form>
              </div>
            </div>

            <div class="panel contact-me">
              <div class="panel-heading">
                <h3 class="panel-heading-text">Contact Details</h3>
                <span><i class="fa-sharp fa-solid fa-angle-down"></i></span>
              </div>
              <div class="panel-content">
                <div class="contact-details-container">
                  <div class="contact-details mobile-details">
                    <h2 class="card-title">Mobile Number:</h2>
                    <p>07720 287143</p>
                  </div>
                  <div class="contact-details email-details">
                    <h2 class="card-title">Email:</h2>
                    <p>benito_bec@hotmail.com</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- <div class="container">
          <h2 class="get-inTouch-title text-title">Get In Touch</h2>
        </div> -->
      </section>
    </main>
<?php
page_footer();
