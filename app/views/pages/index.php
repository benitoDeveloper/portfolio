<?php require_once APPROOT . "views/includes/head.php";
?>

<header class="header-container" id="home">
        <nav class="navbar">
          <div class="navbar__container container">
            <a href="#"><img class="navbar__logo" data-src="img/icon.png" alt="portfolio icon" /></a>
            <ul class="navbar__menu">
              <?php foreach($menu_arr as $item){
              ?>
                <li class="navbar__option">
                  <a class="navbar__link smooth" href="#<?=$item?>"><?=ucwords($item)?></a>
                </li>           
              <?php
              }
              ?>
            </ul>
            <button class="navbar__burger">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </button>
          </div>

        </nav>
      <main class="background">
        <div class="background__image">
          <h1 class="background__heading">Benito Beceiro</h1>
          <p class="background__subheading">A Web Developer</p>
          <p class="background__subheading">building functional and beautiful websites</p>
        </div>

      </main>
</header>
<main class="main-section" >
      <div id="hola" class="dots"></div>
      <section  class="introduction container">
        <div class="introduction__text-box ">
          <h2 class="introduction__title title">Hola!/h3>
          <div class="introduction__text">
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
            <div class="card-btn smooth" href="#projects">View my projects</div>
            <div class="card-btn smooth" href="#contact">Contact Me</div>
            
        </div>
        <div class="introduction__img"></div>
      </section>
      <div id="projects" class="dots"></div>
      <section  class="projects">

        <div class="projects-top-section container">
          <h2 class="projects__title title">
            My Projects
          </h2>
          <div class="slider__indicator">

          </div>

        </div>
        <div class="slider">
          <div class="slider__track-holder">
            <div class="slider__track">

<?php
foreach ($data['projects'] as $index => $project) 
{
    $languages = explode(",", $project->languages);
?>
    <div class="slider__card-holder">
        <div data-slide=<?= $index + 1 ?> class="slider__card">
            <img 
            src=
            "<?=URLROOT . 'public/img/' . $project->lr_image . '.jpg'?>" data-src="<?=URLROOT . 'public/img/' . $project->hr_image . '.jpg'?>" 
            height="172" alt="<?=$project->alt_text?>" 
            class="slider__card-image" 
            />
            <div class="slider__card-body">
                <h2 class="slider__card-title"><?= ucwords($project->project_name) ?></h2>
                <p class="slider__card-subHeading">Languages used:</p>
                <ul class="slider__card-languages">
                    <?php
                    foreach ($languages as $language) 
                    {
                    ?>
                        <li><?= ucwords($language) ?></li>
                    <?php
                    } 
                    ?>
                </ul>
                <a class="slider__card-btn card-btn-visit" target="_blank" href="<?=$project->project_url?>">Visit</a>
                <a class="slider__card-btn card-btn-code" target="_blank" href="<?= $project->github_url?>">Code</a>
            </div>
        </div>
    </div>
<?php
} 
?>
            </div>
          </div>

          <button title="slider button left" class="slider__btn slider__btn-left">
            <i class="fa-solid fa-arrow-left"></i>
          </button>
          <button title="slider button right" class="slider__btn slider__btn-right">
            <i class="fa-solid fa-arrow-right"></i>
          </button>

        </div>

      </section>

      <div id="contact" class="dots"></div>

      <section class="contact">
        <div class="container">
          <h2 class="title">Contact Me</h2>

          <div class="accordion">

            <div class="accordion__panel  send-message">
              <div class="accordion__panel-heading">
                <h3 class="panel-heading-text">Send me a Message</h3>
                <span><i class="fa-sharp fa-solid fa-angle-down accordion__panel-arrow"></i></span>
              </div>
              <div class="accordion__panel-content ">
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

            <div class="accordion__panel contact-me">
              <div class="accordion__panel-heading">
                <h3 class="panel-heading-text">Contact Details</h3>
                <span><i class="fa-sharp fa-solid fa-angle-down accordion__panel-arrow"></i></span>
              </div>
              <div class="accordion__panel-content">
                <div class="contact__details-box">
                  <div class="contact-details mobile-details">
                    <h2 class="accordion__title">Mobile Number:</h2>
                    <p>07720 287143</p>
                  </div>
                  <div class="contact-details email-details">
                    <h2 class="accordion__title">Email:</h2>
                    <p>benito_bec@hotmail.com</p>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </section>
</main>

<?php require_once(APPROOT . "views/includes/footer.php");?>

