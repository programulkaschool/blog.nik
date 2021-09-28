<?php
require ('include/head.php');
?>
<body>

<div id="wrapper">

    <?php
    include ('include/header.php');
    ?>

    <div id="content">
        <style>
            .new_post .article:nth-child(2n) {
                border: 1px solid red;
            }
        </style>

        <div class="container">
            <div class="row">
                <?php
                if (isset($_GET['id'])) {
                $articles_cat = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id`=" . (int)$_GET['id']);

                ?>
                <section class="content__left col-md-8">
                    <div class="block new_text">

                        <?php
                        //var_dump($categories_array );
                        foreach ($categories_array as $value) {
                            // var_dump($articles['categoria_id']);
                            if ($value ["id"] ==$_GET['id']) {
                                echo '<small><h3>';
                                echo $value ["title"];
                                echo '</h3></small>';
                                break;
                            }
                        }
                        ?>


                        <div class="block__content">


                            <?php

                            if (mysqli_num_rows($articles_cat) <= 0) {
                                echo '<p>Поста немає</p>';
                            } else {
                                //$art = mysqli_fetch_assoc($articles_cat);
                                //
                                ?>
                            <div class="articles articles__horizontal new_post">

                            <?php

                                $articles_select = mysqli_query($connection, "SELECT * FROM `articles` WHERE `categoria_id`=" . (int)$_GET['id']);
                                while ($articles = mysqli_fetch_assoc($articles_select)) {
                                    ?>

                                    <article class="article">
                                        <div class="article__image"
                                             style="background-image: url('/img/<?php echo $articles['img']; ?>');">
                                        </div>
                                        <div class="article__info">
                                            <a href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']), 0, 40, 'UTF-8'); ?>
                                                ...</a>
                                            <div class="article__info__meta">
                                                <?php
                                                //var_dump($categories_array );

                                                    // var_dump($articles['categoria_id']);

                                                        echo '<small><p>Переглядів ';
                                                        echo $articles['views'];
                                                        echo '</p></small>';

                                                ?>

                                            </div>
                                            <div class="article__info__preview"><?php echo mb_substr(strip_tags($articles['text']), 0, 50, 'UTF-8'); ?>
                                                ...
                                            </div>
                                        </div>
                                    </article>
                                    <?php
                                }


                                ?>

                                </div>


                                <?php

                            }

                            }

                                ?>


                        </div>
                    </div>
                </section>


                <?php
                include ('include/sidebar_right.php');
                ?>

                    </div>




            </div>
        </div>
    </div>

    <?php
    include ('include/footer.php');
    ?>

</div>

</body>
</html>

