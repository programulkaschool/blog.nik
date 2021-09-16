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
                $articles_select2=mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `views` DESC LIMIT 5");
                while($articles3 = mysqli_fetch_assoc($articles_select2)) {
                 //var_dump($articles3);?>
                      <article class="article">
                    <div class="article__image" style="background-image: url('/img/<?php echo $articles3['img'];?>');"></div>

                <div class="article__info">
                    <a href="article.php?id=<?php echo $articles3['id']; ?>"><?php echo $articles3['title']; ?></a>
                    <div class="article__info__meta">
                        <?php
                        foreach ($categories_array as $value3){
                            if ($value3 ["id"] == $articles3['categorie_id']){
                                echo '<small>Категория: <a href="categories.php?id='.$value3 ["id"].'">';
                                echo $value3 ["title"];
                                echo '</a></small>';
                                break;
                            }
                        }
                        ?>
                    </div>
                    <div class="article__info__preview"><?php echo mb_substr(strip_tags($articles3['text']),0,40,'UTF-8');?>...</div>
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
            <div class="articles articles__vertical comment_block">
                <?php
                $articles_select1=mysqli_query($connection, "SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 5");
                while($articles1 = mysqli_fetch_assoc($articles_select1)) { ?>
                <article class="article">
                    <div class="article__image"
                         style="background-image: url('/img/<?php echo $articles1['img']; ?>');"></div>

                    <div class="article__info">
                        <a href="article.php?id=<?php echo $articles1['id']; ?>"><?php echo $articles1['author']; ?></a>

                        <div class="article__info__meta">
                            <?php
                            $articles_title=mysqli_query($connection, "SELECT * FROM `articles` WHERE `id`=".$articles1['articles_id']);
                            //var_dump($articles_title);

                            $title = mysqli_fetch_assoc($articles_title);
                            //var_dump($title['title']);
                            echo '<small>Назва статті:<a href="article.php?id='.$title['id'].'">'.$title['title'].'</a></small>';


                            /*$articles_select0=mysqli_query($connection, "SELECT * FROM `articles`");
                            $articles_array=array();
                            while($articles0 = mysqli_fetch_assoc($articles_select0)) {
                                $articles_array []=$articles0;
                            }
                            foreach ($articles_array as $articles0){
                                if ( $articles0["id"] == $articles1['articles_id']){
                                    echo '<!--<small>Назва статті:<a href="article.php?id='.$articles0['id'].'">'.$articles0['title'].'</a></small>-->';
                                }
                            }*/


                            ?>


                            </div>
                            <div class="article__info__preview"><?php echo mb_substr(strip_tags($articles1['text']),0,40,'UTF-8');?></div>
                        </div>
                    </article>
                    <?php
                }
                ?>


            </div>
        </div>
    </div>
</section>
