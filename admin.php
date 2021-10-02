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
                                            <th scope="col">Назва</th>
                                            <th scope="col">Категорія</th>
                                            <th scope="col">ON/OFF</th>
                                            <th scope="col">Дата</th>
                                            <th scope="col">yes</th>

                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php
                                        $articles_sel = mysqli_query($connection, "SELECT * FROM `articles` ORDER BY `id`");
                                        while($articles = mysqli_fetch_assoc( $articles_sel)) {
                                            // var_dump($articles);


                                    ?>

                                        <tr>
                                            <th scope="row">1</th>
                                            <td><?php echo $articles["title"];?></td>
                                            <td>Otto</td>
                                            <td>@mdo</td>
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
                                        </tbody>
                                    </table>
<?php
                                    }
?>
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
