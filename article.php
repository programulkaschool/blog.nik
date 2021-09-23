<?php
require('include/head.php');



?>
<body>

  <div id="wrapper">
      <?php
      include('include/header.php');
?>

    <div id="content">
      <div class="container">
        <div class="row">



             <?php
             if (isset($_GET['id']))    {
                 $articles= mysqli_query($connection, "SELECT * FROM `articles` WHERE `id`=".(int)$_GET['id']);

                if (mysqli_num_rows($articles) <= 0){
                    ?>
              <section class="content_left col-md-8">
                  <div class="block">
                      <h3>Пост відсутній</h3>
                      <div class="block__content">
                          <div class="full-text">
                              <h1>Пост не знайдений</h1>
                          </div>
                      </div>
                  </div>
              </section>
                <?php
                }else{
                $art=mysqli_fetch_assoc($articles);
                mysqli_query($connection, "UPDATE `articles` SET `views`=`views`+1 WHERE `id`=".$art['id']);
                //var_dump($art);
                ?>
              <section class="content__left col-md-8">
                  <div class="block">
                      <a><?php echo $art['views']?></a>
                   <?php  echo  "<h3>".$art['title']."</h3>" ?>
                      <div class="block__content">
                          <img src=<?php  echo "/img/".$art['img']?>>

                          <div class="full-text"><?php echo $art['text']?>

                          </div>
                      </div>
                  </div>
                  <div class="block">
                      <a href="#comment-add-form">Добавить свой</a>
                      <h3>Коментарі</h3>
                      <div class="block__content">
                          <div class="articles articles__vertical">

                              <?php
                              $comment_select = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id`=".$art['id']." ORDER BY `date` DESC");
                              if (mysqli_num_rows($comment_select) <= 0) {




                                echo  "Коментарії відсутні...";




                              }
                              else {
                                  while($art1 = mysqli_fetch_assoc($comment_select)){
                                  ?>      <article class="article">
                                  <div class="article__image" style="background-image: url('/img/<?php  echo $art1['img']?>');"></div>

                                  <div class="article__info">
                                      <a href="#"><?php echo $art1['author']?></a>
                              <div class="article__info__meta">
                                  <small><?php echo $art1['date']?></small>
                              </div>
                              <div class="article__info__preview"><?php echo $art1['text']?></div>
                          </div>
                          </article>
                              <?php
                                  };
                                  //var_dump($art1);
                              }
                              ?>





                          </div>
                      </div>
                  </div>

                  <div class="block" id="comment-add-form">
                      <h3>Добавить комментарий</h3>
                      <div class="block__content">
                          <form id_page="<?php echo $art['id'];?>" id="form_comments" class="form" method="post" action="article.php?id=<?php echo $art['id'];?>#comment-add-form">

                              <div class="form__group">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <input type="text" class="form__control name_my_impute" required="" name="name" placeholder="Имя">
                                      </div>
                                      <div class="col-md-6">
                                          <input type="text" class="form__control nickname_my_impute" required="" name="nickname" placeholder="Никнейм">
                                      </div>
                                  </div>
                              </div>
                              <div class="form__group">
                                  <textarea name="text" required="" class="form__control_ text_my_input" placeholder="Текст комментария ..."></textarea>
                              </div>
                              <div class="form__group">
                                  <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                              </div>
                              <div id="submit_div" class="form__controlmy"> My button </div>
                              <div id="position_button"><p>TXT button</p></div>
                          </form>
                      </div>
                  </div>
              </section>
              <?php
                }
             }

             else {
                 echo "POST NONE";
             }

                 
                 
                 
                 ?>





            <?php
            include('include/sidebar_right.php')
            ?>
        </div>
      </div>
    </div>
      <?php
      include('include/footer.php');
      ?>


  </div>

</body>
</html>