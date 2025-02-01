<?php require_once APPROOT . "/views/includes/head.php";
      //  var_dump($data['posts']);
      //  return;
?>
<h1><?=$data['title']?></h1>
<section class="two-column-display">
      <?php foreach($data['posts'] as $key => $post) {
            // var_dump(APPROOT. "/img/articles/article". $key . "jpg");
            // return;
            if(!$key === 0 ) return;
      {?>
                  <article class="latest-article">
                        <picture class="image">
                              <img src="<?=URLROOT?>/img/articles/article<?=$key?>.jpg" alt="article<?=$key?> picture" class="article">
                        </picture>
                        <div class="container">
                              <div class="details">
                                    <span>Category</span>
                                    <span>22/09/24</span>
                              </div>
                              <div class="author">
                                    <picture>
                                          <img src="<?=URLROOT?>img/authors/article'<?=$key?>.jpg" alt="article<?=$key?>" class="chead-shot">
                                    </picture>
                                    <div class="details">
                                          <p class="name"></p>
                                          <p>Author</p>
                                    </div>
                              </div>
                              <h1 class="header"><?=$post->title?></h1>
                              <p class="text"><?=$post->text?></p>                  
                        </div>
                  </article>
      <?php
            };
      };
      ?>
      <aside>
            <?php
            $remaining_articles = array_shift($data['posts']);
            foreach($remaining_articles as $key=>$post)
            {?>
            <div class="item item<?=$key+1?>">
                  <picture class="content-left">
                        <img src="<?=URLROOT?>img/articles/article<?=$key+1?>" alt="article<?=$key+1?>" class="article">
                  </picture>
                  <div class="content-right">
                        <h1 class="header"><?=$post->title?></h1>
                        <p><?=$post->text?></p>
                  </div>
            </div>

            <?php
            }
            ?>
      </aside>
  
      </section>
<?php 
      require_once APPROOT . "/views/includes/footer.php";
?>