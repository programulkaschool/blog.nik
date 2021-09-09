<?php
require ('include/head.php');
?>
<body>

  <div id="wrapper">

      <?php
      include ('include/header.php');
      ?>

      <div id="content">
      <div class="container">
        <div class="row">
          <section class="content__left col-md-8">
            <div class="block">
              <a href="#">Все записи</a>
              <h3>Новейшее_в_блоге</h3>
              <div class="block__content">
                <div class="articles articles__horizontal">

                    <?php
                    $articles_select = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 6");
                    while($articles = mysqli_fetch_assoc($articles_select)){
                    ?>

                        <article class="article">
                            <div class="article__image" style="background-image: url('/img/<?php echo $articles['img']; ?>');">
                            </div>
                            <div class="article__info">
                                <a href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']), 0, 40, 'UTF-8'); ?>...</a>
                                <div class="article__info__meta">
                                    <?php
                                   //var_dump($categories_array );
                                    foreach ($categories_array as $value) {
                                       // var_dump($articles['categoria_id']);
                                        if ($value ["id"] == $articles['categoria_id']){
                                            echo '<small>Категория: <a href="categories.php?id='.$value ["id"].'">';
                                            echo $value ["title"];
                                            echo '</a></small>';
                                            break;
                                        }
                                    }
                                    ?>

                                </div>
                                <div class="article__info__preview"><?php  echo mb_substr(strip_tags($articles['text']), 0, 50, 'UTF-8'); ?> ...</div>
                            </div>
                        </article>
                        <?php
                    }

                    ?>

                </div>
              </div>
            </div>


              <?php
              $articles_select = mysqli_query($connection, "SELECT `categoria_id` FROM `articles`");
              $all_id = [];
              while ($articles = mysqli_fetch_assoc($articles_select)) {
                  // var_dump($articles );
                  if(!in_array($articles["categoria_id"],$all_id)){
                      $all_id[]=$articles["categoria_id"];
                  }

              }
              foreach ($all_id as $val3){
                  $hh=$val3["categoria_id"];
                ?>
                  <div class="block">
                      <a href="article.php?id=<?php echo $hh?>">Все записи</a>
                      <?php
                      foreach ($categories_array  as $val2) {
                          if ($val2["id"] == $hh) {
                                echo  "<h3>".$val2["title"]."</h3>";
                              break;
                          }
                      }
                      ?>


                      <div class="block__content">
                          <div class="articles articles__horizontal">




                              <?php
                              $articles_select = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id`=$hh ORDER BY `id` DESC LIMIT 6");
                              // var_dump($articles_select );
                              while ($articles = mysqli_fetch_assoc($articles_select)){
                                  ?>

                                  <article class="article">
                                      <div class="article__image"></div>
                                      <div class="article__info">
                                          <a href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']), 0, 40, 'UTF-8'); ?>...</a>
                                          <div class="article__info__meta">
                                              <?php
                                              foreach ($categories_array  as $val2){
                                                  if ($val2["id"] == $articles["categoria_id"]){
                                                      echo '<small>Категория: <a href="categories.php?id='.$val2["id"].'">';
                                                      echo $val2["title"];
                                                      echo '</a></small>';
                                                  }

                                              }



                                              ?>



                                          </div>
                                          <div class="article__info__preview"><?php  echo mb_substr(strip_tags($articles['text']), 0, 50, 'UTF-8'); ?> ...</div>
                                      </div>
                                  </article>


                                  <?php
                              }
                              ?>



                          </div>
                      </div>
                  </div>


              <?php


              }

              ?>

          </section>
            <?php
            include ('include/sidebar_right.php');
            ?>
        </div>
      </div>
    </div>

      <?php
      include ('include/footer.php');
      ?>

  </div>

</body>
</html>
