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
                                                    <input class="form-check-input check_on_of" type="checkbox"
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
                            <div class="tabs-item" id="tab-3">
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
                                        foreach ($categories_array as $cat) { ?>
                                    </tr>
                                    <td>

                                        <div class="input-group">
                                            <input type="text" class="form-control text_up"
                                                   id="text_up"
                                                   value="<?php echo $cat['title'] ?>"
                                                   placeholder="Recipient's username"
                                                   aria-label="Recipient's username with two button addons">
                                            <button class="btn btn-outline-secondary category_update"
                                                    category_update_id="<?php echo $cat['id'] ?>" type="button">Update
                                            </button>
                                            <button class="btn btn-outline-secondary category_delete"
                                                    category_delete_id="<?php echo $cat['id'] ?>" type="button">Delete
                                            </button>
                                        </div>

                                    </td>

                                    <?php
                                    }
                                    //var_dump($categories_array);
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tabs-item" id="tab-1">
                                <table class="table table-striped table-dark">
                                    <thead>
                                    <tr>
                                        <th scope="col">№</th>
                                        <th scope="col">TITLE</th>
                                        <th scope="col">TEXT</th>
                                        <th scope="col">CATEGORY</th>
                                        <th scope="col">ON/OF</th>
                                        <th scope="col"></th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>
                                            <div class="input-group mb-3">
                                                <input type="text" id="title_post" class="form-control"
                                                       placeholder="Title"
                                                       aria-label="Username" aria-describedby="basic-addon1">
                                            </div>
                                        </td>
                                        <td>
                                            <div class="form-floating">
                                                <textarea class="form-control" id="text_post" placeholder="Leave a comment here" id="floatingTextarea"></textarea>
                                                <label for="floatingTextarea">Comments</label>
                                            </div>
                                        </td>




                                        <td>

                                            <select class="form-select" id="select_category_post" aria-label="Default select example">
                                                <option selected>Select category</option>
                                                <?php
                                                foreach ($categories_array as $cat) { ?>
                                                <option value="<?php echo $cat['id'] ?>" id=""><?php echo $cat['title'] ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>

                                        </td>
                                        <td>
                                            <div class="form-check form-switch">
                                                <?php
                                                $checked_on = '';
                                                if ($articles_oll['post_look'] == 1) {
                                                    $checked_on = 'checked';
                                                }

                                                ?>
                                                <input class="form-check-input" type="checkbox" id="Add_on_of">

                                            </div>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-outline-success add_post">ADD POST
                                            </button>
                                        </td>

                                    </tr>

                                    </tbody>
                                </table>
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