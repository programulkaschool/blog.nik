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
                    <div class="block new_text">
                        <div id="tabs">
                            <!-- Кнопки -->
                            <ul class="tabs-nav">
                                <li><a href="#tab-3">ADD</a></li>
                                <li><a href="#tab-2">Categoria</a></li>
                                <li><a href="#tab-1">Post</a></li>


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
                                        while ($articles = mysqli_fetch_assoc($articles_sel)) {
                                            // var_dump($articles);
                                            ?>
                                            <tr>
                                                <td><?php echo $i++ ?></td>
                                                <th scope="row"><a
                                                            href="article.php?id=<?php echo $articles['id']; ?>"><?php echo mb_substr(strip_tags($articles['title']), 0, 40, 'UTF-8'); ?>
                                                        ...</a></th>
                                                <td>
                                                    <?php

                                                    foreach ($categories_array as $value) {
                                                        // var_dump($articles['categoria_id']);
                                                        if ($value ["id"] == $articles['categoria_id']) {
                                                            echo '<a href="categories.php?id=' . $value ["id"] . '">';
                                                            echo $value ["title"];
                                                            echo '</a>';
                                                            break;
                                                        }
                                                    }
                                                    ?>
                                                </td>


                                                <td>
                                                    <div class="form-check form-switch">
                                                        <?php
                                                        $checked = '';
                                                        if ($articles['post_look'] == 1) {
                                                            $checked = "checked";
                                                        }


                                                        ?>
                                                        <input class="form-check-input checks"
                                                               id_on_off="<?php echo $articles['id']; ?>"
                                                               type="checkbox" <?php echo $checked; ?>
                                                               id="flexSwitchCheckDefault<?php echo $i++ ?>">

                                                    </div>
                                                </td>
                                                <td><?php echo $articles["pubdata"] ?></td>
                                                <td><input type="checkbox" class="btn-check" id="btn-check-2" checked
                                                           autocomplete="off">
                                                    <label class="btn btn-primary post_delete"
                                                           id_delete="<?php echo $articles['id']; ?>" for="btn-check-2">DELETE</label>
                                                </td>
                                            </tr>
                                            <?php
                                        }

                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tabs-item" id="tab-2">
                                    <table class="table">
                                        <thead>




                                        <tr>
                                            <th scope="col">Name</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>



                                                <td>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control txt"  placeholder="Enter title"
                                                           aria-label="Recipient's username"
                                                           aria-describedby="button-addon2">
                                                    <button class="btn btn-outline-secondary my_add" type="button"
                                                            id="button-add1">ADD
                                                    </button>

                                                </div>



                                            </td>


                                            <?php


                                            foreach ($categories_array as $cat) {
                                            ?>

                                        <tr/>



                                            <td>




                                                <div class="input-group wrap">
                                                    <input type="text" class="form-control my_upd" value="<?php echo $cat['title']?>" placeholder="Enter title"
                                                           aria-label="Recipient's username with two button addons">
                                                    <button class="btn btn-outline-secondary my_update" id_update="<?php echo $cat['id'] ?> " type="button">UPDATE
                                                    </button>
                                                    <button class="btn btn-outline-secondary my_delete" id_delete="<?php echo $cat['id'] ?> "  type="button">DELETE
                                                    </button>
                                                </div>



                                            </td>


                                        </tr>
                                        <?php
                                        }

                                        ?>

                                        </tbody>
                                    </table>


                                </div>

                                <div class="tabs-item" id="tab-3">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Title</th>
                                            <th scope="col">Text</th>
                                            <th scope="col">Cateoria</th>
                                            <th scope="col">ON/OFF</th>
                                            <th scope="col"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row"></th>
                                            <td>
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control my_title_post" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-floating">
                                                    <textarea class="form-control my_text_post" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                                    <label for="floatingTextarea2">Text</label>
                                                </div>
                                            </td>


                                            <td>
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>Select categoria</option>
                                                    <?php


                                                         foreach ($categories_array as $cat) {
                                                             ?>
                                                             <option class="my_categ" value="<?php echo $cat['id']?>"><?php echo $cat['title']?></option>
                                                             <?php
                                                                    }



                                                    ?>

                                                    <option class="my_categ" value="<?php echo $cat['id']?>">"<?php echo $cat['title']?>"</option>


                                                </select>
                                            </td>
                                            <td>


                                                <button class="btn btn-primary my_add_post" type="submit">ADD</button>
                                            </td>

                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input add_check" type="checkbox" value="" id="flexCheckDefault">
                                                    <label class="form-check-label" for="flexCheckDefault"></label>
                                                </div>
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
