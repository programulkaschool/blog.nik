<section class="content__right col-md-4">
    <div class="block">
        <h3>Мы_знаем</h3>
        <div class="block__content">
            <script type="text/javascript" src="//ra.revolvermaps.com/0/0/6.js?i=02op3nb0crr&amp;m=7&amp;s=320&amp;c=e63100&amp;cr1=ffffff&amp;f=arial&amp;l=0&amp;bv=90&amp;lx=-420&amp;ly=420&amp;hi=20&amp;he=7&amp;hc=a8ddff&amp;rs=80" async="async"></script>
        </div>
    </div>

    <div class="block">
        <h3>Топ читаемых статей</h3>
        <div class="block__content">
            <div class="articles articles__vertical">

                <?php
                $article = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id` DESC LIMIT 5");
                //var_dump( $article);
                while ($articles = mysqli_fetch_assoc($article)){
                   // var_dump($articles);
                    ?>
                    <article class="article">
                        <div class="article__image" style="background-image: url('/img/<?php echo $articles['img'];?>')"></div>
                        <div class="article__info">
                            <a href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']), 0, 40, 'UTF-8'); ?>...</a>
                            <div class="article__info__meta">
                                <?php
                                // var_dump($categories_array );
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
                            <div class="article__info__preview"><?php  echo mb_substr(strip_tags($articles['text']), 0, 50, 'UTF-8');?></div>
                        </div>
                    </article>


                <?php

                }

                ?>


            </div>
        </div>
    </div>



    <div class="block">
        <h3>Комментарии</h3>
        <div class="block__content">
            <div class="articles articles__vertical">

                <?php
                $coments = mysqli_query($connection, "SELECT * FROM `comments` WHERE `articles_id`=".(int)$_GET['id']." ORDER BY `comments`.`date` DESC");
                if (mysqli_num_rows( $coments) <= 0) {
                echo "Коментарів немає";
                }else{
                    while ($coment = mysqli_fetch_assoc($coments)){
                       // var_dump($coment);
                        ?>
                        <article class="article">
                    <div class="article__image" style="background-image: url('/img/<?php echo $coment['img']; ?>');"></div>
                    <div class="article__info">
                        <a href="#"> <?php echo $coment["author"]; ?></a>
                        <div class="article__info__meta">


                            <?php
                            $articl_sel =  mysqli_query($connection, "SELECT * FROM `articles`");
                            $articl_array = array();
                            while ($articl = mysqli_fetch_assoc($articl_sel)){
                                $articl_array[] = $articl;}
                           // var_dump($articl_array);
                                foreach ($articl_array as $articl){
                                    if ($coment['articles_id'] == $articl['id']){

                                        echo '<small><a href="article.php?id='.$articl["id"].'">';

                                        echo $articl["title"];
                                        echo '</a></small>';


                                    }

                                }




                            /*$coment_title = mysqli_query($connection, "SELECT * FROM `articles` WHERE `id`=".$coment["articles_id"]);
                            $comt = mysqli_fetch_assoc($coment_title);
                            //var_dump($comt["title"]);

                            echo '<small><a href="article.php?id='.$comt["id"].'">';

                           echo $comt["title"];
                           echo '</a></small>';*/
                            ?>

                        </div>
                        <div class="article__info__preview"><?php echo $coment["text"]; ?></div>
                    </div>
                </article>
                <?php
                    }


                }



                ?>



            </div>
        </div>
    </div>
</section>