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
                            <li><a href="#tab-1">Вкладка №1</a></li>
                            <li><a href="#tab-2">Вкладка №2</a></li>
                            <li><a href="#tab-3">Вкладка №3</a></li>
                        </ul>

                        <!-- Контент -->
                        <div class="tabs-items">
                            <div class="tabs-item" id="tab-2">
                                <table class="table table-striped table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
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
                                            <td>
                                                <a href="article.php?id=<?php echo $articles_oll['id']; ?>"><?php echo $articles_oll['title']; ?></a>
                                            </td>
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
                                            <td>
                                                <div class="form-check form-switch">
                                                    <?php
                                                    $checked = '';
                                                    if ($articles_oll['post_look'] == 1) {
                                                        $checked = 'checked';
                                                    }

                                                    ?>
                                                    <input class="form-check-input" type="checkbox"
                                                           id_on_of="<?php echo $articles_oll['id']; ?>" <?php echo $checked; ?>
                                                           id="on_of<?php echo $i++; ?>">

                                                </div>
                                            </td>
                                            <td>
                                                <button type="button" id_delete="<?php echo $articles_oll['id']; ?>"
                                                        class="btn btn-outline-danger delete_post"
                                                ">DELETE</button></td>
                                        </tr>

                                    <?php }


                                    ?>

                                    </tbody>
                                </table>
                            </div>
                            <div class="tabs-item" id="tab-1">
                                <table class="table table-striped table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">NAME</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <div class="input-group mb-3">

                                                <input type="text" class="form-control"
                                                       id="text_cat"
                                                       placeholder="Recipient's username"
                                                       aria-label="Recipient's username"
                                                       aria-describedby="button-addon2">
                                                <button class="btn btn-outline-secondary my_class" type="button"
                                                        id="add_categories">Add
                                                </button>
                                            </div>
                                            <div id="my_add"><p></p></div>
                                        </td>
                                        <?php
                                        $categories_select = mysqli_query($connection, "SELECT * FROM `articles_categories` ORDER BY `id` DESC ");
                                        while ($cat = mysqli_fetch_assoc($categories_select)) {
                                        ?>
                                    </tr>
                                    <td>


                                            <div class="input-group">
                                                <input type="text" class="form-control"
                                                       value="<?php echo $cat['title'] ?>"
                                                       placeholder="Recipient's username"
                                                       aria-label="Recipient's username with two button addons">
                                                <button class="btn btn-outline-secondary" type="button">Update</button>
                                                <button class="btn btn-outline-secondary category_delete"  id_delete_category="<?php echo $cat['id'] ?>" type="button">Delete</button>
                                            </div>

                                    </td>
                                    </tr>
                                    <?php
                                    }
                                    //var_dump($categories_array);
                                    ?>
                                    </tbody>
                                </table>
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
include('include/footer.php');
?>


</div>

</body>
</html>