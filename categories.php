<?php
require('include/head.php');



?>
<body>

<div id="wrapper">
    <?php
    include('include/header.php');
    ?>

    <style>
        .new_post .article:nth-child(2n){
            border: 1px solid red;
        }
        .new_post .article:nth-child(2n+1){
            border: 1px solid #3dff59;
        }
    </style>

    <div id="content">
        <div class="container">
            <div class="row">
                <section class="content__left col-md-8">

                    <?php
             if (isset($_GET['id'])) {
                    $articles_pos= mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id`=".(int)$_GET['id']);
//var_dump($articles);
                    if (mysqli_num_rows($articles_pos) <= 0) {
                    }else{
                        $art=mysqli_fetch_assoc($articles_pos);
                       //var_dump($art);
                    }
             }
                    ?>




                    <div class="block new_text">
                        <a href="#">Все записи</a>
                        <?php  echo  "<h3>".$art['title']."</h3>" ?>

                        <div class="block__content">
                            <div class="articles articles__horizontal  new_post">


                                <?php

                                    $articles_id = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categorie_id`=" . (int)$_GET['id']);
                                    while ($articles = mysqli_fetch_assoc($articles_id)) {


                                ?>
                                <article class="article">
                                    <div class="article__image"
                                         style="background-image: url('/img/<?php echo $articles['img']; ?>');"></div>
                                    <div class="article__info">
                                        <a href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']), 0, 40, 'UTF-8'); ?>
                                            ...</a>
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
                                        <div class="article__info__preview">Lorem ipsum dolor sit amet,
                                            consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                                            labore et dolore magna ...
                                        </div>
                                    </div>
                                </article>
                                        <?php

                                    }

                                if (mysqli_num_rows($articles_id) <= 0) {
                                    echo    '<article class="article">NON POST</article>';
                                }



                                ?>


                            </div>
                        </div>


                    </div>


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