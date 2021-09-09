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
          <section class="content__left col-md-8">





              <div class="block">
                  <a href="#">Все записи</a>
                  <h3>Блок 1 [Новейшее]</h3>

                  <div class="block__content">
                      <div class="articles articles__horizontal">

                          <?php
                          $articles_select = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 6");
                          while($articles = mysqli_fetch_assoc($articles_select)) {

                              ?>
                              <article class="article">
                                  <div class="article__image" style="background-image: url('/img/<?php echo $articles['img'];?>');"></div>
                                  <div class="article__info">
                                      <a href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']),0,40,'UTF-8');?>...</a>
                                      <div class="article__info__meta">
                                          <?php
                                          foreach ($categories_array as $value){
                                              if ($value ["id"] == $articles['categorie_id']){
                                                  echo '<small>Категория: <a href="categories.php?id='.$value ["id"].'">';
                                                  echo $value ["title"];
                                                  echo '</a></small>';
                                                  break;
                                              }
                                          }
                                          ?>


                                      </div>
                                      <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
                                  </div>
                              </article>
                              <?php
                          }
                          ?>


                      </div>
                  </div>


              </div>


              <?php
              $articles_select = mysqli_query($connection, "SELECT `categorie_id` FROM `articles`");
              $articles_array = array();
              while($cat=mysqli_fetch_assoc($articles_select)){
                  $articles_array [] = $cat;
              }

              foreach ($articles_array as $val){
                  if (!in_array($val, $tape)){
                      $tape[]=$val;
                  }


              }

        //      var_dump($tape);
              foreach ($tape as $value ){
                  $gg = $value["categorie_id"];

                  ?>


                  <div class="block">
                      <a href="categories.php?id=<?php echo $gg?>">Все записи</a>
                      <?php

                      foreach ($categories_array as $value) {
                          if ($value ["id"] == $gg) {
                              echo  "<h3>".$value ["title"]."</h3>";
                              break;
                          }
                      }

                      ?>


                      <div class="block__content">
                          <div class="articles articles__horizontal">
                              <?php
                              $articles_select = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id`=$gg ORDER BY `id` DESC LIMIT 6");

                              while($articles = mysqli_fetch_assoc($articles_select)) {

                              ?>

                              <article class="article">
                                  <div class="article__image"
                                       style="background-image: url('/img/<?php echo $articles['img']; ?>');"></div>
                                  <div class="article__info">
                                      <a href="#">Название статьи</a>
                                      <div class="article__info__meta">
                                          <?php
                                          foreach ($categories_array as $value) {
                                              if ($value ["id"] == $articles['categorie_id']) {
                                                  echo '<small>Категория: <a href="categories.php?id=' . $value ["id"] . '">';
                                                  echo $value ["title"];
                                                  echo '</a></small>';
                                                  break;
                                              }
                                          }

                                              ?>

                                          </div>
                                          <div class="article__info__preview">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ...</div>
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