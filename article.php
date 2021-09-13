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
                          <form class="form" method="post" action="article.php?id=<?php echo $art['id'];?>#comment-add-form">
                              <?php
                              if (isset($_POST['do_post'])) {
                                  $error = array();
                                  if ($_POST['name'] == '') {
                                      $error [] = 'Введіть Ім\'я';
                                  }
                                  if ($_POST['nickname'] == '') {
                                      $error [] = 'Введіть Нік';
                                  }
                                  if ($_POST['text'] == '') {
                                      $error [] = 'Введіть Текст комментария';
                                  }
                                  if (empty($error)) {
                                      mysqli_query($connection, "INSERT INTO `comments` (`name`, `author`, `text`, `date`, `articles_id`) VALUES ('".$_POST['name']."', '".$_POST['nickname']."', '".$_POST['text']."', NOW() , '".$art['id']."')");

                                      echo '<span style="color: #00d118; font-weight: bold;">Комент добавлений</span><hr>';
                                  } else {
                                      echo'<span style="color: red; font-weight: bold;">'.$error[0].'</span><hr>';
                                  }
                              }


                              ?>

                              <div class="form__group">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <input type="text" class="form__control" required="" name="name" placeholder="Имя">
                                      </div>
                                      <div class="col-md-6">
                                          <input type="text" class="form__control" required="" name="nickname" placeholder="Никнейм">
                                      </div>
                                  </div>
                              </div>
                              <div class="form__group">
                                  <textarea name="text" required="" class="form__control" placeholder="Текст комментария ..."></textarea>
                              </div>
                              <div class="form__group">
                                  <input type="submit" class="form__control" name="do_post" value="Добавить комментарий">
                              </div>
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