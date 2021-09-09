
<header id="header">
    <div class="header__top">
        <div class="container">
            <div class="header__top__logo">
                <h1><?php echo $config['title'];?></h1>
            </div>
            <nav class="header__top__menu">
                <ul>
                    <li><a href="/">Головна</a></li>
                    <li><a href="/about_mu.php">Про мене</a></li>
                    <li><a target="_blank" href="http://programulka.lviv.ua">Сайт Programulka</a></li>
                </ul>
            </nav>
        </div>
    </div>

    <?php
    $categories_select = mysqli_query($connection, "SELECT * FROM `articles_categories`");
    $categories_array = array();
    while($cat = mysqli_fetch_assoc($categories_select)) {
        $categories_array [] = $cat;
    };

    //var_dump($categories_array);

    ?>

    <div class="header__bottom">
        <div class="container">
            <nav>
                <ul>
                      <?php
                      foreach ($categories_array as $cat) {
                          echo '<li><a href=" categories.php?id='.$cat['id'].'">'.$cat['title'].'</a></li>';
                      }
                      ?>
                </ul>
            </nav>
        </div>
    </div>
</header>