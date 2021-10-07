<?php
include('config/config.php');

if (isset($_POST['my_input_object'])) {
    $error = array();
    if ($_POST['my_input_object']['name'] == '') {
        $error [] = 'Введіть Ім\'я';
    }
    if ($_POST['my_input_object']['nickname'] == '') {
        $error [] = 'Введіть Нік';
    }
    if ($_POST['page_id'] == '') {
        $error [] = 'NONE ID';
    }
    /* if (empty($error)) {
         echo '<span style="color: #00d118; font-weight: bold;">Комент добавлений</span><hr>';
         echo $_POST['my_input_object']['name'];
     }
    */

    if (empty($error)) {
        mysqli_query($connection, "INSERT INTO `comments` (`name`, `author`, `text`, `date`, `articles_id`) VALUES ('" . $_POST['my_input_object']['name'] . "', '" . $_POST['my_input_object']['nickname'] . "', '" . $_POST['my_input_object']['text'] . "', NOW() , '" . $_POST['page_id'] . "')");

        echo '<span style="color: #00d118; font-weight: bold;">Комент добавлений</span><hr>';
    } else {
        echo '<span style="color: red; font-weight: bold;">' . $error[0] . '</span><hr>';
    }
}
//////////////////////////////////// BUTTON DELETE\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
if (isset($_POST['delete_post'])) {
    mysqli_query($connection, "DELETE FROM `articles` WHERE `id`=" . $_POST['delete_post']);
};

//////////////////////////////////// ON/OF \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
//////////////////
if (isset($_POST['checked']) && isset($_POST['id_on_of'])) {

    mysqli_query($connection, "UPDATE `articles` SET `post_look`=" . $_POST['checked'] . " WHERE `id`=" . $_POST['id_on_of']);
}

//////////////////////////////////// ADD CATEGORIES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
if (isset($_POST['add_title_category'])) {
    mysqli_query($connection, "INSERT INTO `articles_categories` (`title`) VALUES ('" . $_POST['add_title_category']."')");
   /* echo '<span style="color: #00d118; font-weight: bold;">Комент добавлений</span><hr>';
} else {
    echo '<span style="color: red; font-weight: bold;">' . $error[0] . '</span><hr>';*/
}

//////////////////////////////////// DELETE CATEGORIES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
if (isset($_POST['delete_category'])) {
    mysqli_query($connection, "DELETE FROM `articles_categories` WHERE `id`=" . $_POST['delete_category']);
};
//////////////////////////////////// UPDATE CATEGORIES \\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\\
if (isset($_POST['up_cat_id']) && isset($_POST['val_cate'])) {

    mysqli_query($connection, "UPDATE `articles_categories` SET `title`=" . $_POST['val_cate'] . " WHERE `id`=" . $_POST['up_cat_id']);
}