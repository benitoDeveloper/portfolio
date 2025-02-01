<?php
require_once APPROOT . "/views/includes/head.php";
// var_dump($data['posts']);
// return;
?>

<div id="posts">

      <div class="container">
            <div class="top">
                  <h1>Posts</h1>
                  <?=flash_msg('post_message')?>
                  <a href="<?=URLROOT?>/posts/add"><i class="fa fa-pencil"></i>Add new post</a>
            </div>

<?php

foreach($data['posts'] as $key => $post) {
?>
            <div class="item item<?=$key?>">
                  <div class="content-right">
                        <h1 class="header"><?=$post->title?></h1>
                        <p class="text"><?=$post->text?></p>
                  </div>
                  <div class="btn-holder">
                        <a href="<?=URLROOT?>/posts/show/<?=$post->posts_id?>">
                              <div class="btn submit">More</div>
                        </a>
                  </div>
            </div>

<?php
}
?>
      </div>
</div>
<?php
require_once APPROOT . "/views/includes/footer.php";
?>