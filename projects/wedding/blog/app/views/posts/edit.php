<?php require_once APPROOT . "/views/includes/head.php";
// var_dump($data['id']);
// return;
?>

<section id="add-post" class="form-container">
      <div class="card">
            <div class="container">
                  <div class="head">
                        <?=flash_msg('post_message')?>
                        <h2>Edit your post</h2>
                        <p>Please fill in your details to log in</p>
                  </div>
                  <div class="body">
                        <form action="<?=URLROOT?>/posts/edit/<?=$data['id']?>" method="POST">
                              <div class="input-group">
                                    <label for="title">Title:<sup>*</sup></label>
                                    <input 
                                          name="title" type="text" 
                                          class="<?=(!empty($data['title_err']))? 'is-invalid':''?>"
                                          value="<?=$data['title']?>">
                                    <span class="error_message"><?=$data['title_err']?></span>
                              </div>
                              <div class="input-group">
                                    <label for="text">Text:<sup>*</sup></label>
                                    <textarea 
                                          name="text" 
                                          class="<?=(!empty($data['text_err']))? 'is-invalid':''?>"
                                          ><?=$data['text']?>
                                    </textarea>
                                    <span class="error_message"><?=$data['text_err']?></span>
                              </div>
                              <div class="button-container">
                                    <div class="button-holder">
                                          <input type="submit" value="Submit" class="btn submit">
                                    </div>
                                    <div class="button-holder">
                                          <a href="<?=URLROOT?>/posts/show/<?=$data['id']?>">
                                          <div class="btn alternative">Back</div>
                                          </a>
                                    </div>
                              </div>
                        </form>
                  </div>
                  

            </div>
      </div>
</section>
<?php require_once APPROOT . "/views/includes/footer.php";?>