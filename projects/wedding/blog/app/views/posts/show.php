<?php require_once APPROOT . "/views/includes/head.php";
$post = $data['post'];
$user = $data['user'];
// var_dump($post->id);
// return;
?>

<section id="post-show" class="form-container">
      <div class="card">
            <div class="container">
                  <?=flash_msg('post_message')?>
                  <a href="<?=URLROOT?>/posts"><i class="fa fa-backward"></i> Back</a>
                  <div class="head">
                        <h2><?=$post->title?></h2>
                        <p>written by: <?=$user->name?> on <?=$post->date?></p>
                  </div>
                  <div class="body">
                        <p><?=$post->text?></p>
                  </div>
            <?php
            if($user->id === $_SESSION['user_id'])
            {
            ?>
                  <div class="btn-holder">
                        <?php var_dump(URLROOT . '/posts/edit/' . $post->id)?>
                        <a href="<?=URLROOT?>/posts/edit/<?=$post->id?>">
                              <div class="btn submit">Edit</div>
                        </a>
                        <form action="<?=URLROOT?>/posts/delete/<?=$post->id?>" method="POST">
                              <input type="submit" value="Delete" class="btn danger">
                        </form>
                  </div>
            <?php
            }
            ?>

            </div>
      </div>
</section>
<?php require_once APPROOT . "/views/includes/footer.php";?>