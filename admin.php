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
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $articles = mysqli_query($connection, "SELECT * FROM `articles`  ");
                            while($articles_oll = mysqli_fetch_assoc($articles)) {
                               echo $articles_oll['title'];

                                ?>
                                <tr>
                                <th scope="row">1</th>
                                <td> <?php echo $articles_oll['title']; ?></td>
                            </tr>

                            <tr>
                                <th scope="row">2</th>
                                <td>Jacob</td>
                                <td>Thornton</td>
                                <td>@fat</td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Larry</td>
                                <td>the Bird</td>
                                <td>@twitter</td>
                            </tr>
                            <?php      }



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