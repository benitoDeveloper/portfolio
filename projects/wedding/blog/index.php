<!-- <html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="styles.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
      <title>Sports Blog</title>
</head>
<body>
      <nav>
            <div>Sports Blog</div>
            <ul class="options">
                  <li>Home</li>
                  <li>Reach Us</li>
            </ul>
            <div>Subscribe</div>
            <div class="hamburger">
                  <div></div>
                  <div></div>
                  <div></div>
            </div>
      </nav> -->
      <?php
      require_once("head.php");
      ?>
      <section class="two-column-display">
            <article class="latest-article">
                  <picture class="image">
                        <img class="article" src="img/articles/article1.jpg" alt="article1 picture">
                  </picture>
                  <div class="container">
                        <div class="details">
                              <span>Category</span>
                              <span>22/09/24</span>
                        </div>
                        <div class="author">
                              <picture>
                                    <img class="head-shot" src="img/authors/article1.jpg" alt="author article1">
                              </picture>
                              <div class="details">
                                    <p class="name">Name Surname</p>
                                    <p>Author</p>
                              </div>
                        </div>
                        <h1 class="header">Lorem ipsum dolor sit amet consectetur.</h1>
                        <p class="text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ratione, assumenda fugiat quibusdam consequuntur harum commodi alias tempora, deserunt sapiente repudiandae rem! Molestias dolorum magnam quis aliquid eos ratione molestiae rerum. Ab, error hic odit, culpa at id asperiores voluptatibus distinctio, eius sed animi excepturi accusantium cumque quisquam nobis omnis nam.

                        </p>
                  </div>

            </article>
            <aside class="article-array">
                  <div class="item item1">
                        <picture class="content-left">
                              <img class="article" src="img/articles/article2.jpg" alt="article2">
                        </picture>
                        <div class="content-right">
                              <h1 class="header">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h1>
                              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis illo cumque laborum ipsam a pariatur.</p>
                              <div class="details">
                                    <span>Category</span>
                                    <span>22/09/24</span>
                              </div>
                        </div>
                  </div>
                  <div class="item item2">
                        <picture class="content-left">
                              <img class="article" src="img/articles/article3.jpg" alt="article3">
                        </picture>
                        <div class="content-right">
                              <h1 class="header">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h1>
                              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis illo cumque laborum ipsam a pariatur.</p>
                              <div class="details">
                                    <span>Category</span>
                                    <span>22/09/24</span>
                              </div>
                        </div>
                  </div>
                  <div class="item item3">
                        <picture class="content-left">
                              <img class="article" src="img/articles/article4.jpg" alt="article4">
                        </picture>
                        <div class="content-right">
                              <h1 class="header">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</h1>
                              <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Veritatis illo cumque laborum ipsam a pariatur.</p>
                              <div class="details">
                                    <span>Category</span>
                                    <span>22/09/24</span>
                              </div>
                        </div>
                  </div>

            </aside>
      </section>
      <footer></footer>
      
</body>
</html>