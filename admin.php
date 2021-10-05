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
                <section class="content__left col-md-12">

                    <div id="tabs">
                        <!-- Кнопки -->
                        <ul class="tabs-nav">
                            <li><a href="#tab-1">Всі статті</a></li>
                            <li><a href="#tab-2">Вкладка №2</a></li>
                            <li><a href="#tab-3">Вкладка №3</a></li>
                        </ul>
                        <table class="table table-striped table-dark">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Назва</th>
                                <th scope="col">Категорія</th>
                                <th scope="col">Дата</th>
                                <th scope="col">ON/OF</th>
                                <th scope="col">DELETE</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $i = 1;


                            $articles = mysqli_query($connection, "SELECT * FROM `articles`  ");
                            while ($articles_oll = mysqli_fetch_assoc($articles)) {
                                //  var_dump($articles_oll);
                                ?>


                                <tr>
                                    <th scope="row"><?php echo $i++; ?></th>
                                    <td> <a href="article.php?id=<?php echo $articles_oll['id']; ?>"><?php echo $articles_oll['title'];?></a></td>
                                    <td><?php
                                        foreach ($categories_array as $value) {
                                            if ($value ["id"] == $articles_oll['categorie_id']) {
                                                echo '<a href="categories.php?id=' . $value ["id"] . '">';
                                                echo $value ["title"];
                                                echo '</a>';
                                                break;
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td><?php echo $articles_oll['pubdate']; ?></td>
                                    <td><div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="on_of">
                                            <label class="form-check-label" for="on_of"></label>
                                        </div></td>
                                    <td><button type="button" id_delete="<?php echo $articles_oll['id']; ?>" class="btn btn-outline-danger delete_post" ">DELETE</button></td>
                                </tr>

                            <?php }


                            ?>
                            </tbody>
                        </table>
                        <!-- Контент -->


                    </div>
            </div>


            </section>

        </div>
    </div>
</div>
<?php
include('include/footer.php');
?>


</div>

</body>
</html>