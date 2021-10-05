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
                <section class="content__left col-md-12">
                    <div class="block new_text">
                        <div id="tabs">
                            <!-- Кнопки -->
                            <ul class="tabs-nav">
                                <li><a href="#tab-1">Вкладка №1</a></li>
                                <li><a href="#tab-2">Вкладка №2</a></li>
                                <li><a href="#tab-3">Вкладка №3</a></li>
                            </ul>

                            <!-- Контент -->
                            <div class="tabs-items">
                                <div class="tabs-item" id="tab-1">


                                    <table class="table">
                                        <thead class="thead-dark">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Назва</th>
                                            <th scope="col">Категорія</th>
                                            <th scope="col">ON/OFF</th>
                                            <th scope="col">Дата</th>
                                            <th scope="col">Delete</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                         $i = 1;
                                        $articles_sel = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id`");
                                        while($articles = mysqli_fetch_assoc( $articles_sel)) {
                                            // var_dump($articles);
                                            ?>
                                        <tr>
                                            <td><?php echo $i++?></td>
                                            <th scope="row"><a href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']), 0, 40, 'UTF-8'); ?>...</a></th>
                                            <td>
                                            <?php

                                            foreach ($categories_array as $value) {
                                            // var_dump($articles['categoria_id']);
                                            if ($value ["id"] == $articles['categoria_id']){
                                            echo '<a href="categories.php?id='.$value ["id"].'">';
                                                echo $value ["title"];
                                                echo '</a>';
                                            break;
                                            }
                                            }
                                            ?>
                                            </td>


                                            <td><div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                                    <label class="form-check-label" for="flexSwitchCheckDefault">ON/OFF</label>
                                                </div></td>
                                            <td><?php echo $articles["pubdata"]?></td>
                                            <td><input type="checkbox" class="btn-check" id="btn-check-2" checked autocomplete="off">
                                                <label class="btn btn-primary" id_delete="<?php echo $articles['id']; ?>"for="btn-check-2">DELETE</label></td>
                                        </tr>
                                    <?php
                                   }

                                    ?>

                                        </tbody>
                                    </table>

                                </div>
                                <div class="tabs-item" id="tab-2">
                                    <strong>Текст вкладки №2</strong>
                                </div>
                                <div class="tabs-item" id="tab-3">
                                    <strong>Текст вкладки №3</strong>
                                </div>
                            </div>
                        </div>
                    </div>




                </section>


            </div>
        </div>
    </div>

    <?php
    include ('include/footer.php');
    ?>

</div>

</body>
</html>
